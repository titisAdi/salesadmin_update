<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['err_message'] = "";
		$this->load->view('v_login',$data);
	}
	public function process_login(){
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$secure = sha1(md5($password));

		$cek = $this->salesModel->cek_user($username, $secure);
		$tes = count($cek);
		$i = $this->salesModel->authen_user($username);
		if($tes > 0){
			$update = $this->salesModel->wrong_password($username,0) ;
			$data_login = $this->salesModel->cek_user($username, $secure);
			$level = $data_login -> level;
			$data = array('level'=>level,
				'username'=> $username);
			$this->session->set_userdata($data);

			if($level == 'admin'){
				redirect ('SalesAdmin/adminMasuk');
			}else{
				redirect ('SalesAdmin/salesMasuk');
			}
		}else{
			if ($i[0]['authentication'] < 3) {
				$update = $this->salesModel->wrong_password($username, $i[0]['authentication']+1);
				$data['err_message'] = "The username and password you entered did not match our records. Please double-check and try again.". ($i[0]['authentication']+1);
				$_SESSION['username'] = $username;
				$this->load->view('v_login',$data);
			}
			else{
				$data['err_message'] = "YOUR ACCOUNT HAVE BLOCKED. PLEASE CONTACT ADMINISTRATOR";
				$this->load->view('v_login', $data);
			}
		}
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect ('login/index');
	}
	public function profile(){
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_profile');
	}
}
