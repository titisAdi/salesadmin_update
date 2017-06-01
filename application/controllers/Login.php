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
		$i = $this->salesModel->authen_user($username); //berapa kali login
		if($tes > 0){
			$update = $this->salesModel->wrong_password($username,0) ;
			$level = $cek -> level;
			$data = array('level'=>level,
				'username'=> $username);
			$this->session->set_userdata($data);
			$_SESSION['username'] = $username;

			if($level == 'admin'){
				redirect ('SalesAdmin/adminMasuk');
			}else{
				redirect ('SalesAdmin/salesMasuk');
			}
		}else{
			if ($i[0]['authentication'] < 3) {
				$update = $this->salesModel->wrong_password($username, $i[0]['authentication']+1);
				$data['err_message'] = "The username and password you entered did not match our records. Please double-check and try again.". ($i[0]['authentication']+1);
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
		$data['err_message'] = "";
		$this->load->view('v_signup',$data);
	}
	public function addUser(){
		$username = $_POST['username'];
		$namalengkap = $_POST['name'];
		$password = $_POST['password'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$dateofjoin=date("Y-m-d");
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$secure = sha1(md5($password));
		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
			$data['err_message'] = "Password must contain uppercase, lowercase, and number"."<br>".
									"Make Sure it contains minimal 8 characters";
			$this->load->view('v_signup',$data);						
		}else{
			$tambahUser = array(
			'username' => $username,
			'namalengkap' => $namalengkap,
			'password' => $secure,
			'level' => "sales",
			'alamat'=>$address,
			'email'=>$email,
			'telepon'=>$phone,
			'dateofjoin'=>$dateofjoin
			);
			$exist = $this->salesModel->userada($username);
			$tes = count($exist);
			if($tes > 0){
				$data['err_message'] = "Username has already exist";
				$this->load->view('v_signup', $data);
			}else{
				$res = $this->salesModel->TambahUser('tuser',$tambahUser);
				$_SESSION['username'] = $username;
				redirect ('SalesAdmin/salesMasuk');
			}
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
