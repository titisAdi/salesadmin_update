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
	public function signup()
	{
		$this->load->view('v_signup');
	}
	public function addUser(){
		$username = $_POST['username'];
		$namalengkap = $_POST['name'];
		$password = $_POST['password'];
		$secure = sha1(md5($password));
		$data['err_message'] = "";
		$tambahUser = array(
			'username' => $username,
			'namalengkap' => $namalengkap,
			'password' => $secure,
			'level' => "sales"
		);
		$res = $this->salesModel->TambahUser('tuser',$tambahUser);
		if($res >=1){
			redirect ('SalesAdmin/salesMasuk');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Delete Data Failed
                </div>'); 
			redirect('SalesAdmin/signup');
		}
	}
	public function profile(){
		$by = $_SESSION['username'];
		$data = $this->salesModel->show_profile("where username = '$by'");
		$profile = array(
			'username'=>$data[0]['username'], 'namalengkap'=>$data[0]['namalengkap'],
			'password'=>$data[0]['password'], 'level'=>$data[0]['level'],
			'dateofjoin'=>$data[0]['dateofjoin'], 'email'=>$data[0]['email'],
			'address'=>$data[0]['alamat'],'phone'=>$data[0]['telepon']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_profile',$profile);
	}
	public function changePassword(){
		$curpassword = $_POST['curpassword'];
		$secure = sha1(md5($curpassword));
		$newpassword = $_POST['newpassword'];
		$confpassword = $_POST['confpassword'];
		$by = $_SESSION['username'];
		$where = array('username' => $by );
		$cek = $this->salesModel->cek_user($by, $secure);
		$tes = count($cek);
		if($tes > 0){
			if($newpassword==$confpassword){
				$passBaru = sha1(md5($newpassword));
				$updatePass=array(
					'password'=>$passBaru
				);
				$res = $this->salesModel->UpdateData('tuser',$updatePass,$where);
				$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Your Password succesfully changed 
                </div>'); 
				redirect('Login/profile');
			}else{
				$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Your password doesn&acute;t match 
                </div>'); 
			redirect('Login/profile');
			}
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    The password you entered is incorrect. Try again
                </div>'); 
			redirect('Login/profile');
		}
		
	}
}
