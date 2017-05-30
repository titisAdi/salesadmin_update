<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesAdmin extends CI_Controller {
	public function adminMasuk()
	{
		if($this->session->userdata('level')){
			$data = $this->salesModel->progress();
			$lastevent = $this->salesModel->lastevent();
			$datatasks = $this->salesModel->tasklist();
			$this->load->view('v_navbar');
			$this->load->view('v_leftside');
			$this->load->view('v_main', array('data'=>$data, 'datatasks'=>$datatasks, 'lastevent' =>$lastevent));
			
		}else{
			redirect('v_login');
		}
	}
	public function salesMasuk()
	{
		if($this->session->userdata('level')){
			$data = $this->salesModel->progress();
			$lastevent = $this->salesModel->lastevent();
			$datatasks = $this->salesModel->tasklist();
			$this->load->view('v_navbar');
			$this->load->view('v_leftside');
			$this->load->view('v_main', array('data'=>$data, 'datatasks'=>$datatasks, 'lastevent' =>$lastevent));
			
		}else{
			redirect('v_login');
		}
	}
	public function idata(){
		$data = $this->salesModel->browseInq();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_idata',array('data'=>$data));
	}
	public function remove($kode){
		$where = array('tinq.inq_no' => $kode );
		$res = $this->salesModel->HapusData('tinq',$where);
		if($res >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been removed
                </div>'); 
			redirect('SalesAdmin/idata');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Delete Data Failed
                </div>'); 
			redirect('SalesAdmin/idata');
		}
	}
	public function aidata(){
		$data = $this->salesModel->showCustomer();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_aidata',array('data'=>$data));
	}
	public function addaidata(){

		$pic = $_POST['pic'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$position = $_POST['position'];
		$remark = $_POST['remark'];
		$via = $_POST['via'];
		$tanggalfu =  date("Y/m/d");
		$by = $_SESSION['username'];
		$id_lead = $_POST['lead'];
		$tambah_inq=array(
			'followup_date'=>$tanggalfu,
			'id_lead'=>$id_lead,
			'pic'=>$pic,
			'pos'=>$position,
			'phone'=>$phone,
			'email'=>$email,
			'comment'=>$remark,
			'via'=>$via,
			'fu_by'=>$by
		);
		$data = $this->salesModel->addInq('tfollowup',$tambah_inq);
		if($data >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/aidata');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/aidata');
		}
		
	}
	public function icdata(){
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$custData = $this ->salesModel -> selectCustomer();
		$this->load->view('v_icdata',array('data'=>$custData));
	}
	public function ricdata($id){
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$text = str_replace('%20', ' ', $id);
		$data = $this->salesModel->ricdata("where customer = '$text'");
		$detail = array(
		'customer' => $data[0]['customer'],
		'pic' => $data[0]['pic'],
		'pos' => $data[0]['pos'],
		'phone' => $data[0]['phone'],
		'email' => $data[0]['email'],
		'remark' => $data[0]['remark'] );
		$this->load->view('v_ricdata',$detail);
	}
	public function minquiry(){
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_minquiry');
	}
	public function manualinq(){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$company = $_POST['company'];
		$pos = $_POST['pos'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$zip = $_POST['zip'];
		$phone = $_POST['phone'];
		$fax = $_POST['fax'];
		$email = $_POST['email'];
		$employee = $_POST['employee'];
		$message = $_POST['message'];
		$tanggal =  date("Y/m/d");
		$waktu = date("h:i:sa");
		$tambah_manualInq=array(
			'fname' => $fname,
			'lname' => $lname,
			'company' => $company,
			'pos' => $pos,
			'address' => $address,
			'city' => $city,
			'zip' => $zip,
			'phone' => $phone,
			'fax'=>$fax,
			'email'=>$email,
			'employee'=>$employee,
			'message'=>$message,
			'idate'=>$tanggal,
			'itime'=>$waktu
			);
		$res = $this->salesModel->addInq('tinq',$tambah_manualInq);
		if($res >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/minquiry');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/minquiry');
		}
	}
	public function mlead(){
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_mlead');
	}
	public function manualLead(){
		$fu_date = $_POST['fu_date'];
		$leadidy = substr($fu_date,2,2);
		$leadidm = substr($fu_date,5,2);
		$today = $leadidy.$leadidm;
		$lastNumber = $this->salesModel->terakhir($today);
		$lastidlead = array('last'=>$lastNumber[0]['last']);
		$string = implode(';', $lastidlead);
		
		$lastid = substr($string, 5, 3); 
		$nextid = $lastid + 1;
		$nextidlead = sprintf('%03s', $nextid);
		$id_lead = "LS".$today.$nextidlead;
		$inq = 0;
		$customer = $_POST['customer'];
		$city = $_POST['city'];
		$pic = $_POST['pic'];
		$pos = $_POST['pos'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$industry = $_POST['industry'];
		$employee = $_POST['employee'];
		$site = $_POST['site'];
		$cabang = $_POST['cabang'];
		$comment = $_POST['editor1'];
		$via = $_POST['via'];
		$by = $_SESSION['username'];
		if ($employee <= 100) {
			$product = "JPLEB";
		} else if ($employee >100 && $employee <=400) {
			$product = "JPSEB";
		} else if ($employee >400 && $employee <=1000) {
			$product = "JPEEPB";
		} else {
			$product = "JPEEUB";}
		$selectProduct = $this ->salesModel -> selectProduct("where productcode = '$product'");
		$chooseProduct = array(
		'productname'=> $selectProduct[0]['productname'],
		'price'=>$selectProduct[0]['price']
		);
		$tambah_lead=array(
			'id_lead'=>$id_lead,
			'inq_no'=>$inq,
			'lead_date'=>$fu_date,
			'customer'=>$customer,
			'city'=>$city,
			'pic'=>$pic,
			'pos'=>$pos,
			'phone'=>$phone,
			'email'=>$email,
			'field_type'=>$industry,
			'employee'=>$employee,
			'site'=>$site,
			'branch'=>$cabang,
			'status'=>'aktif'
		);
		
		$tambah_leadSale=array(
			'id_lead'=>$id_lead,
			'productcode'=>$product,
			'productname'=>$chooseProduct['productname'],
			'employee'=>$employee,
			'lead_sales'=>$chooseProduct['price']
		);
		$tambah_leadContact=array(
			'customer'=>$customer,
			'pic'=>$pic,
			'pos'=>$pos,
			'phone'=>$phone,
			'email'=>$email,
			'remark'=>$comment
		);
		$tambah_progress=array(
			'id_lead'=>$id_lead,
			'iq'=> '0',
			'fu'=> '20',
			'pre'=> '0',
			'pro'=> '0',
			'poc'=> '0',
			'adj'=> '0'
		);
		$tambah_followup=array(
			'followup_date'=>$fu_date,
			'id_lead'=>$id_lead,
			'pic'=>$pic,
			'pos'=>$pos,
			'phone'=>$phone,
			'email'=>$email,
			'comment'=>$comment,
			'via'=>$via,
			'fu_by'=>$by
		);
		$res  = $this->salesModel->addInq('tlead',$tambah_lead);
		$res1 = $this->salesModel->addInq('lead_sale',$tambah_leadSale);
		$res2 = $this->salesModel->addInq('tleadcontact',$tambah_leadContact);
		$res3 = $this->salesModel->addInq('progress',$tambah_progress);
		$res4 = $this->salesModel->addInq('tfollowup',$tambah_followup);
		if($res >=1 || $res1 >=1 || $res2 >=1 || $res3 >=1 || $res4 >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/mlead');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/mlead');
		}
	}
	public function fuform(){
		$data = $this->salesModel->showCustomer();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_fuform',array('data'=>$data));
	}
	public function followup(){
		$path_file = 'upload/'.$_POST['pic'];
		$type = explode('.', $_FILES['document']['name']);
		$type = $type[count($type)-1];
		$loc = $path_file.'.'.$type;
			in_array($type, array('docx', 'doc', 'pptx', 'pdf'));
			is_uploaded_file($_FILES['document']['tmp_name']);
			move_uploaded_file($_FILES['document']['tmp_name'], $loc);
		
		$fu_date = $_POST['fu_date'];
		$id_lead = $_POST['lead'];
		$pic = $_POST['pic'];
		$pos = $_POST['pos'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$comment = $_POST['editor1'];
		$via = $_POST['via'];
		$by = $_SESSION['username'];
		$document = $_POST['pic'].'.'.$type;
		
		$tambah_follow = array(
			'followup_date'=>$fu_date,
			'id_lead'=>$id_lead,
			'pic'=>$pic,
			'pos'=>$pos,
			'phone'=>$phone,
			'email'=>$email,
			'comment'=>$comment,
			'via'=>$via,
			'fu_by'=>$by,
			'document'=>$document
		);

		$data = $this->salesModel->addInq('tfollowup',$tambah_follow);
		if($data >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/fuform');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/fuform');
		}

	}
	public function passign(){
		$data = $this->salesModel->selectPatner();
		$assign = $this->salesModel-> selectAssign();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_passign',array('data'=>$data,'assign'=>$assign));
	}
	public function passign_process(){
		$fu_date = $_POST['fu_date'];
		$lead = $_POST['lead'];
		$partner = $_POST['partner'];
		$by = $_SESSION['username'];
		$tambah_tfollow=array(
			'followup_date'=>$fu_date,
			'id_lead'=>$lead,
			'pic'=>"",
			'pos'=>"",
			'phone'=>"",
			'email'=>"",
			'comment'=>"lead di assign ke ".$partner,
			'via'=>"partner assignment",
			'fu_by'=>$by
		);
			$tambah_supp=array(
			'id_lead'=>$lead,
			'supp_code1'=>$partner,
			'supp_code2'=>"",
			'supp_code3'=>""
		);
		$tfollow = $this->salesModel->addInq('tfollowup',$tambah_tfollow);
		$supp = $this->salesModel->addInq('supp_assign',$tambah_supp);
		if($tfollow >=1 || $supp >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/passign');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/passign');
		}		
	}
	public function present(){
		$data = $this->salesModel->selectPatner();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_present',array('data'=>$data));
	}
	public function pro_presentation(){
		$path_file = 'presentation/'.$_POST['by'];
		$type = explode('.', $_FILES['document']['name']);
		$type = $type[count($type)-1];
		$url = $path_file.'.'.$type;
			in_array($type, array('docx', 'doc', 'pptx', 'pdf'));
			is_uploaded_file($_FILES['document']['tmp_name']);
			move_uploaded_file($_FILES['document']['tmp_name'], $url);
		
		$lead = $_POST['lead'];
		$date = $_POST['fu_date'];
		$loc = $_POST['loc'];
		$by = $_POST['by'];
		$comment = $_POST['editor1'];
		$txtbox = $_POST['txt'];
		$value = $_POST['txt2'];
		$document = $_POST['by'].'.'.$type;
		
		$tambah_tfollowpresent=array(
			'followup_date'=>$date,
			'id_lead'=>$lead,
			'pic'=>"",
			'pos'=>"",
			'phone'=>"",
			'email'=>"",
			'comment'=>"presentasi di ".$loc." Hasilnya adalah ".$comment,
			'via'=>"presentasi",
			'fu_by'=>$by
		);
		$tambah_present=array(
			'id_lead'=>$lead,
			'pre_date'=>$date,
			'location'=>$loc,
			'by'=>$by,
			'comment'=>$comment,
			'document'=>$document
		);
		$update_data=array(
			'pre'=>"30"
		);
		foreach ($txtbox as $a => $b) {
			$tambah_participant=array(
			'id_lead'=>$lead,
			'pre_date'=>$date,
			'name'=> $txtbox[$a],
			'pos'=>$value[$a]
		);
			$participant = $this->salesModel->addInq('tpre_participant',$tambah_participant);
		}
		$where = array('id_lead' => $lead );
		$res = $this->salesModel->UpdateData('progress',$update_data,$where);
		$tfollowpresent = $this->salesModel->addInq('tfollowup',$tambah_tfollowpresent);
		$tpresent = $this->salesModel->addInq('tpresentation',$tambah_present);
		if($res >=1 || $tfollowpresent >=1 || $tpresent >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/present');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/present');
		}
	}
	public function poc(){
		$data = $this->salesModel->selectPatner();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_poc',array('data'=>$data));
	}
	public function pro_poc(){
		$path_file = 'poc/'.$_POST['by'];
		$type = explode('.', $_FILES['document']['name']);
		$type = $type[count($type)-1];
		$url = $path_file.'.'.$type;
			in_array($type, array('docx', 'doc', 'pptx', 'pdf'));
			is_uploaded_file($_FILES['document']['tmp_name']);
			move_uploaded_file($_FILES['document']['tmp_name'], $url);
		
		$lead = $_POST['lead'];
		$date = $_POST['fu_date'];
		$loc = $_POST['loc'];
		$by = $_POST['by'];
		$comment = $_POST['editor1'];
		$txtbox = $_POST['txt'];
		$value = $_POST['value'];
		$document = $_POST['by'].'.'.$type;
		
		$tambah_followpoc=array(
			'followup_date'=>$date,
			'id_lead'=>$lead,
			'pic'=>"",
			'pos'=>"",
			'phone'=>"",
			'email'=>"",
			'comment'=>"POC di ".$loc."Hasilnya adalah ".$comment,
			'via'=>"POC",
			'fu_by'=>$by
		);
		$tambah_tpoc=array(
			'id_lead'=>$lead,
			'poc_date'=>$date,
			'loc'=>$loc,
			'by'=>$by,
			'comment'=>$comment,
			'document'=>$document
		);
		$update_data=array(
			'poc'=>"10"
		);
		foreach ($txtbox as $a => $b) {
			$tambah_pocitem=array(
			'id_lead'=>$lead,
			'poc_date'=>$date,
			'item'=> $txtbox[$a],
			'proven'=>$value[$a]
		);
			$participant = $this->salesModel->addInq('tpoc_item',$tambah_pocitem);
		}
		$where = array('id_lead' => $lead );
		$res = $this->salesModel->UpdateData('progress',$update_data,$where);
		$followpoc = $this->salesModel->addInq('tfollowup',$tambah_followpoc);
		$tpoc = $this->salesModel->addInq('tpoc',$tambah_tpoc);

		if($res >=1 || $followpoc >=1 || $tpoc >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/poc');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/poc');
		}
	}
	public function poption(){
		$data = $this->salesModel->selectPatner();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_poption',array('data'=>$data));
	}
	public function leadChange($kode){
		$data = $this ->salesModel -> lead_sale("where lead_sale.id_lead ='$kode'");
		$product = array('id_lead' => $data[0]['id_lead'],
		'customer' => $data[0]['customer'],
		'productcode' => $data[0]['productcode'],
		'productname' => $data[0]['productname'],
		'lead_sales' => $data[0]['lead_sales'] );
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this -> load ->view('v_updateProduct',$product);
	}
	public function leadChangeUpdate(){
		$lead = $_POST['id_lead'];
		$productcode = $_POST['productcode'];
		$productname = $_POST['productname'];
		$lead_sales = $_POST['lead_sales'];
		$tanggal =  date("Y/m/d");
		$by = $_SESSION['username'];
		$update_product=array(
			'productcode'=>$productcode,
			'productname'=>$productname,
			'lead_sales'=>$lead_sales
		);
		$tambah_followup=array(
			'followup_date'=>$tanggal,
			'id_lead'=>$lead,
			'pic'=>"",
			'pos'=>"",
			'phone'=>"",
			'email'=>"",
			'comment'=>"Product dirubah menjadi ".$productname.". Dengan harga ".$lead_sales,
			'via'=>"Product Change",
			'fu_by'=>$by
		);
		$where = array('id_lead' => $lead );
		$res = $this->salesModel->UpdateData('lead_sale',$update_product,$where);
		$insertFollowup = $this->salesModel->addInq('tfollowup',$tambah_followup);
		if($res >=1 || $insertFollowup >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded<br>
            			ID Lead : '.$lead.'
                </div>'); 
			redirect('SalesAdmin/poption');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/poption');
		}
	}
	public function aprogress(){
		$data = $this->salesModel->selectPatner();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_aprogress',array('data'=>$data));
	}
	public function adjusmentProgress($kode){
		$data = $this ->salesModel -> aprogress("where progress.id_lead ='$kode'");
		$product = array('id_lead' => $data[0]['id_lead'],'customer' => $data[0]['customer'],
		'iq' => $data[0]['iq'], 'fu' => $data[0]['fu'],
		'pre' => $data[0]['pre'], 'pro' => $data[0]['pro'],
		'poc' => $data[0]['poc'], 'adj' => $data[0]['adj']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this -> load ->view('v_adjustmentUpdate',$product);
	}
	public function adjusmentUpdate(){
		$lead = $_POST['id_lead'];
		$tanggal =  date("Y/m/d");
		$adjustment = $_POST['adjustment'];
		$remark = $_POST['remark'];
		$by = $_SESSION['username'];
		$total = $_POST['total'];
		$adj=$_POST['adj'];
		$totalBaru=$total+$adjustment;
		$adjustmentNew=$adjustment+$adj;
		$updateProgress=array(
			'adj'=>$adjustmentNew
		);
		$where = array('id_lead' => $lead );
		$res = $this->salesModel->UpdateData('progress',$updateProgress,$where);
		$tambah_followAdjust=array(
			'followup_date'=>$tanggal,
			'id_lead'=>$lead,
			'pic'=>"",
			'pos'=>"",
			'phone'=>"",
			'email'=>"",
			'comment'=>"Adjustment progress ".$adjustment."%. ".$remark,
			'via'=>"Adjustment",
			'fu_by'=>$by
		);
		$followAdjust = $this->salesModel->addInq('tfollowup',$tambah_followAdjust);
		if($followAdjust >=1 || $res >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded<br>
            			ID Lead : '.$lead.'
                </div>'); 
			redirect('SalesAdmin/aprogress');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/aprogress');
		}
	}
	public function dprospect(){
		$data = $this->salesModel->selectPatner();
		$assign = $this->salesModel-> selectAssign();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_dprospect',array('data'=>$data,'assign'=>$assign));
	}
	public function drop_update(){
		$fu_date = $_POST['fu_date'];
		$lead = $_POST['lead'];
		$status = $_POST['status'];
		$by = $_SESSION['username'];
		$comment = $_POST['comment'];
		$tambah_followup=array(
			'followup_date'=>$fu_date, 'id_lead'=>$lead,
			'pic'=>"", 'pos'=>"", 'phone'=>"",'email'=>"",
			'comment'=>"lead di ".$status."Reason : ".$comment,
			'via'=>"Status Change", 'fu_by'=>$by
		);
		$update_status = array(
			'status'=>$status
		);
		$drop = $this->salesModel->addInq('tfollowup',$tambah_followup);
		$where = array('id_lead' => $lead );
		$res = $this->salesModel->UpdateData('tlead',$update_status,$where);
		if($drop >=1 || $res >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded<br>
                </div>'); 
			redirect('SalesAdmin/dprospect');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/dprospect');
		}
	}
	public function futimeline(){
		$data = $this->salesModel->showCustomer();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_futimeline',array('data'=>$data));
	}
	public function timeline($id){
		$data = $this->salesModel->customerTimeline("where id_lead= '$id'");
		$time = $this->salesModel->timelinefollowup("where id_lead= '$id'");
		$status = array (
			'status'=>$data[0]['status'], 'via'=>$time[0]['via'],'fu_by'=>$time[0]['fu_by'],
			'date'=>$time[0]['followup_date'],'pic'=>$time[0]['pic'],'pos'=>$time[0]['pos'],
			'phone'=>$time[0]['phone'],'email'=>$time[0]['email'],'comment'=>$time[0]['comment']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_timeline',$status);
	}
	public function presentport(){
		$data = $this->salesModel->showCustomer();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_presentport',array('data'=>$data));
	}
	public function presentReport($id){
		$time = $this->salesModel->presentDate("where id_lead= '$id'");
		$tanggal = array('pre_date'=>$time[0]['pre_date']);
		$comma_separated = implode("", $tanggal);
		$participant = $this->salesModel->participant("where pre_date= '$comma_separated'");
		$date = array(
			'pre_date'=>$time[0]['pre_date'],'location'=>$time[0]['location'],
			'by'=>$time[0]['by'],'name'=>$participant[0]['name'], 'pos'=>$participant[0]['pos'],
			'comment'=>$time[0]['comment']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_presentReport',$date);
	}
	public function pocport(){
		$data = $this->salesModel->showCustomer();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_pocport',array('data'=>$data));
	}
	public function pocreport($id){
		$time = $this->salesModel->tpoc("where id_lead= '$id'");
		$tanggal = array('poc_date'=>$time[0]['poc_date']);
		$comma_separated = implode("", $tanggal);
		$participant = $this->salesModel->tpoc_item("where poc_date= '$comma_separated'");
		$date = array(
			'poc_date'=>$time[0]['poc_date'], 'loc'=>$time[0]['loc'],
			'by'=>$time[0]['by'], 'item'=>$participant[0]['item'],
			'proven'=>$participant[0]['proven'], 'comment'=>$time[0]['comment']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_pocreport',$date);
	}

	public function prgreport(){
		$progress = $this->salesModel->progressReport();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_prgreport',array('progress'=>$progress));
	}
	public function slreport(){
		$sales=$this->salesModel->saleasLead();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_slreport',array('sales'=>$sales));
	}
	public function cquotation(){
		$data = $this->salesModel->showCustomer();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_cquotation',array('data'=>$data));
	}
	public function cquotation_process(){
		$lead = $_POST['lead'];
		$date = $_POST['fu_date'];
		$address = $_POST['address'];
		$subject = $_POST['subject'];
		$subtotal = $_POST['subtotal'];
		$discount = $_POST['discount'];
		$subtotal2 = $_POST['subtotal2'];
		$remark = $_POST['editor1'];

		$idy = substr($date,2,2);
		$idm = substr($date,5,2);
		$today = $idy.$idm;
		
		$lastNumber = $this->salesModel->quotation_Terakhir($today);
		$lastid = array('last'=>$lastNumber[0]['last']);
		$string = implode(';', $lastid);
		
		$lastid = substr($string, 5, 3); 
		$nextid = $lastid + 1;
		$nextid = sprintf('%03s', $nextid);
		$id_qu = "QJP".$today.$nextid;
		$line = $_POST['line'];
		$txtbox = $_POST['item'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$um = $_POST['um'];
		$total = $_POST['total'];
		$type = $_POST['type'];
		$revisi = 'R0';
		$id_rev = $id_qu.$revisi;
		

		$quoteData = array(
			'id_lead'=>$lead, 'id_quotation'=>$id_qu, 'rev'=>$revisi,
			'qdate'=>$date, 'subject'=>$subject, 'address'=>$address,
			'subtotal1'=>$subtotal,'subtotal2'=>$subtotal2,'discount'=>$discount,
			'remark'=>$remark,'status'=>'','id_rev'=>$id_rev
		);

		foreach ($txtbox as $a => $b) {
			$detailData = array(
			'id_lead'=>$lead, 'id_quotation'=>$id_qu,
			'rev'=>$revisi,'qdate'=>$date,
			'line'=>$line[$a], 'type'=>$type[$a],
			'description'=>$txtbox[$a],'price'=>$price[$a],
			'qty'=>$quantity[$a], 'um'=>$um[$a], 'total'=>$total[$a]
		);
			$detail = $this->salesModel->addInq('quotation_detail',$detailData);
		}
		$quote = $this->salesModel->addInq('quotation',$quoteData);
		if($quote >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/cquotation');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/cquotation');
		}
	}
	public function squotation(){
		$data = $this->salesModel->quatationSend();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_squotation',array('data'=>$data));
	}
	public function sendquotation($where){
		$data = $this->salesModel->quotationReview("where quotation.id_quotation='$where'");
		$quote = array(
			'id_quotation'=>$data[0]['id_quotation'],'qdate'=>$data[0]['qdate'],
			'subject'=>$data[0]['subject'], 'address'=>$data[0]['address'],
			'line'=>$data[0]['line'], 'type'=>$data[0]['type'],
			'description'=>$data[0]['description'],
			'price'=>$data[0]['price'], 'qty'=>$data[0]['qty'],
			'um'=>$data[0]['um'], 'total'=>$data[0]['total'],
			'subtotal1'=>$data[0]['subtotal1'],
			'discount'=>$data[0]['discount'],'subtotal2'=>$data[0]['subtotal2'],'ppn'=>$data[0]['subtotal2']*0.1,
			'remark'=>$data[0]['remark'],'id_lead'=>$data[0]['id_lead'],'id_rev'=>$data[0]['id_rev']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_sendquote',$quote);

	}
	public function qSendProcess(){
		$fu_date = $_POST['fu_date'];
		$id = $_POST['id'];
		$rev = substr($id,10,2);
		$idquo = substr($id,0,10);
		$remark = $_POST['remark'];
		$by = $_SESSION['username'];
		$lead = $_POST['lead'];

		$tambah_sendqu=array(
			'followup_date'=>$fu_date,
			'id_lead'=>$lead,
			'pic'=>'',
			'pos'=>'',
			'phone'=>'',
			'email'=>'',
			'comment'=>'Quotation '.$id."<br>".$remark,
			'via'=>'Send Quotation',
			'fu_by'=>$by
			);
		$update_data=array(
			'pro'=>'5'
		);
		$update_status=array(
			'status'=>'Sent'
		);
		$where = array('id_lead' => $lead );
		$idrev = array('id_quotation'=>$idquo,
						'rev'=>$rev
		);
		$resa = $this->salesModel->UpdateData('progress',$update_data,$where);
		$res = $this->salesModel->UpdateData('quotation',$update_status,$idrev);
		$data = $this->salesModel->addInq('tfollowup',$tambah_sendqu);
		if($data >=1 || $resa >=1 || $res>=1 ){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/squotation');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/squotation');
		}

	}
	public function qsummary(){
		$data = $this->salesModel->quatation();
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_qsummary',array('data'=>$data));
	}
	public function qreview($where){
		$data = $this->salesModel -> quotationReview("where quotation_detail.id_rev ='$where'");
		$preview = array('customer' => $data[0]['customer'],'address'=>$data[0]['address'],
			'subject'=>$data[0]['subject'], 'description'=>$data[0]['description'], 
			'price'=>$data[0]['price'], 'qty'=>$data[0]['qty'],
			'um'=>$data[0]['um'], 'total'=>$data[0]['total'],
			'line'=>$data[0]['line'], 'type'=>$data[0]['type'],'subtotal1'=>$data[0]['subtotal1'],
			'discount'=>$data[0]['discount'],'subtotal2'=>$data[0]['subtotal2'],'ppn'=>$data[0]['subtotal2']*0.1,
			'remark'=>$data[0]['remark'], 'id_quotation'=>$data[0]['id_quotation'],'rev'=>$data[0]['rev'],'qdate'=>$data[0]['qdate']
		);
		$this -> load ->view('v_qpreview',$preview);
	}	
	public function qprint($where){
		$data = $this->salesModel -> quotationReview("where quotation_detail.id_rev ='$where'");
		$print = array('customer' => $data[0]['customer'],'address'=>$data[0]['address'],
			'subject'=>$data[0]['subject'], 'description'=>$data[0]['description'], 
			'price'=>$data[0]['price'], 'qty'=>$data[0]['qty'],
			'um'=>$data[0]['um'], 'total'=>$data[0]['total'],
			'line'=>$data[0]['line'], 'type'=>$data[0]['type'],'subtotal1'=>$data[0]['subtotal1'],
			'discount'=>$data[0]['discount'],'subtotal2'=>$data[0]['subtotal2'],'ppn'=>$data[0]['subtotal2']*0.1,
			'remark'=>$data[0]['remark'], 'id_quotation'=>$data[0]['id_quotation'],'rev'=>$data[0]['rev'],'qdate'=>$data[0]['qdate']
		);
		$this -> load ->view('v_qprint',$print);
	}
	public function qrevision($where){
		$data = $this->salesModel->quotationReview("where quotation.id_quotation='$where'");
		$quote = array(
			'id_quotation'=>$data[0]['id_quotation'],'qdate'=>$data[0]['qdate'],
			'subject'=>$data[0]['subject'], 'address'=>$data[0]['address'],
			'line'=>$data[0]['line'], 'type'=>$data[0]['type'],
			'description'=>$data[0]['description'],
			'price'=>$data[0]['price'], 'qty'=>$data[0]['qty'],
			'um'=>$data[0]['um'], 'total'=>$data[0]['total'],
			'subtotal1'=>$data[0]['subtotal1'],
			'discount'=>$data[0]['discount'],'subtotal2'=>$data[0]['subtotal2'],'ppn'=>$data[0]['subtotal2']*0.1,
			'remark'=>$data[0]['remark']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_revision',$quote,array('data'=>$data));
	}
	public function psummary(){
		$data = $this->salesModel->proposalSummary();
		$datac = count($data);
		if($datac>0){
			$this->load->view('v_navbar');
			$this->load->view('v_leftside');
			$this->load->view('v_psummary',array('data'=>$data));
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Database not found!
                </div>'); 
			redirect('SalesAdmin/psummary')
		}
		
	}
	public function sproposal(){
		$data = $this->salesModel->selectProposalSend();
		$datac = count($data);
		if($datac > 0){
			$this->load->view('v_navbar');
			$this->load->view('v_leftside');
			$this->load->view('v_sproposal',array('data'=>$data));
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Database not found!
                </div>'); 
			redirect('SalesAdmin/sproposal');
		}
	}
	public function sendPropose($get){
		$idpro = substr($get,0,10);
		$rev = substr($get,10,2);
		$data = $this->salesModel->proposalSend(" where proposal.idproposal ='$idpro' and proposal.rev ='$rev'");
		$datac=count($data);
		if($datac>0){
			$quote = array(
			'id_lead'=>$data[0]['id_lead'],'date'=>$data[0]['date'],
			'idproposal'=>$data[0]['idproposal'], 'rev'=>$data[0]['rev'],
			'term'=>$data[0]['term'], 'signer'=>$data[0]['signer'],
			'customer'=>$data[0]['customer']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_sendProposal',$quote);
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/sendProposal');
		}
		
	}
	public function sendProposal(){
		$fu_date = $_POST['fu_date'];
		$id = $_POST['id'];
		$idpro = substr($id,0,10);
		$rev = substr($id,10,2);
		$lead = substr($id,12,9);
		$remark = $_POST['remark'];
		$by = $_SESSION['username'];
		$tambah_send=array(
			'followup_date'=>$fu_date,
			'id_lead'=>$lead,
			'pic'=>'',
			'pos'=>'',
			'phone'=>'',
			'email'=>'',
			'comment'=>'Proposal : '.$idpro.' '.$rev.' '.'Dengan comment '.$remark,
			'via'=>'Send Proposal',
			'fu_by'=>$by
			);
		$update_data=array(
			'pro'=>"5"
		);
		$update_proposal=array(
			'status'=>'Sent'
		);
		$where = array('id_lead' => $lead );
		$updateWhere = array(
			'idproposal'=> $idpro,
			'rev'=>$rev
		);
		$res = $this->salesModel->UpdateData('progress',$update_data,$where);
		$pro = $this->salesModel->UpdateData('proposal',$update_proposal,$updateWhere);
		$data = $this->salesModel->addInq('tfollowup',$tambah_send);
		$datac = count($data);
		$pro = count($proc);
		$res = count($resc);
		if($datac >=1 || $resc>=1 || $proc>=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/sproposal');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/sproposal');
		}
	}
	public function cproposal(){
		$data = $this->salesModel->showCustomer();
		$product = $this->salesModel->showProduct();
		$datac = count($data);
		$productc = count($product);
		if($data > 0 && $productc >0){
			$this->load->view('v_navbar');
			$this->load->view('v_leftside');
			$this->load->view('v_cproposal',array('data'=>$data,'product'=>$product));
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Batabase not found!
                </div>'); 
			redirect('SalesAdmin/cproposal')
		}
		
	}	
	public function cproposal_process(){
		$lead = $_POST['idlead'];
		$date = $_POST['date'];
		$term = $_POST['editor1'];
		$signer = $_POST['signer'];

		$leadidy = substr($date,2,2);
		$leadidm = substr($date,5,2);
		$today2 = $leadidy.$leadidm;

		$data = $this->salesModel->lastProposal("like '$today2'");
		$lastidlead = array('last'=>$data[0]['last']);
		$string = implode(';', $lastidlead);
		$lastid = substr($string, 5, 3); 
		$nextid = $lastid + 1;
		$nextidlead = sprintf('%03s', $nextid);

		$id_pro='PJP'.$leadidy.$leadidm.$nextidlead;

		$lic_line = $_POST['lic_line'];
		$type = $_POST['type'];
		$limit = $_POST['limit'];
		$discount = $_POST['discount'];
		
		//wd
		$line = $_POST['line'];
		$wddesc = $_POST['wddesc'];
		$wdquantity = $_POST['wdquantity'];
		$wdrate = $_POST['wdrate'];
		$wdtotal = $_POST['wdtotal'];

		//cwd
		$cwdline = $_POST['cwdline'];
		$cwddesc = $_POST['cwddesc'];
		$cwdquantity = $_POST['cwdquantity'];
		$cwdrate = $_POST['cwdrate'];
		$cwdtotal = $_POST['cwdtotal'];

		$tambah_inq=array(
			'id_lead'=>$lead,
			'idproposal'=>$id_pro,
			'rev'=>'R0',
			'date'=>$date,
			'term'=>$term,
			'signer'=>$signer,
			'status'=>''
			);
		foreach($lic_line as $a => $b) {
			$tambah_lic=array(
				'id_lead'=>$lead,
				'idproposal'=>$id_pro,
				'rev'=>'R0',
				'date'=>$date,
				'line'=>$lic_line[$a],
				'license'=>$type[$a],
				'custom_limit'=>$limit[$a],
				'discount'=>$discount[$a]
			);
			$lic = $this->salesModel->addInq('proposal_license',$tambah_lic);
		}
		foreach($line as $a => $b) {
			$tambah_line=array(
				'id_lead'=>$lead,
				'id_proposal'=>$id_pro,
				'rev'=>'R0',
				'date'=>$date,
				'line'=>$line[$a],
				'description'=>$wddesc[$a],
				'qty'=>$wdquantity[$a],
				'rate'=>$wdrate[$a]
			);
			$line = $this->salesModel->addInq('proposal_workdays',$tambah_line);
		}
		foreach($cwdline as $a => $b) {
			$tambah_cwdline=array(
				'id_lead'=>$lead,
				'id_proposal'=>$id_pro,
				'rev'=>'R0',
				'date'=>$date,
				'line'=>$cwdline[$a],
				'description'=>$cwddesc[$a],
				'qty'=>$cwdquantity[$a],
				'rate'=>$cwdrate[$a]
			);
			$cwdline = $this->salesModel->addInq('proposal_custom_workdays',$tambah_cwdline);
		}
		$data = $this->salesModel->addInq('proposal',$tambah_inq);
		if($data >=1){
			$this->session->set_flashdata('msg', 
            	'<div class="alert alert-info alert-dismissible" role="alert">
            		<i class="fa fa-info-circle"></i>
            			Data has been recorded 
                </div>'); 
			redirect('SalesAdmin/cproposal');
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Data input failed
                </div>'); 
			redirect('SalesAdmin/cproposal');
		}
	}
	public function revProposal($get){
		$idpro = substr($get,0,10);
		$rev = substr($get,10,2);
		$data = $this->salesModel->proposalSend(" where proposal.idproposal ='$idpro' and proposal.rev ='$rev'");
		$workday = $this->salesModel->workday(" where idproposal ='$idpro' and rev ='$rev'");
		$panel = $this->salesModel->workdayPro(" where id_proposal = '$idpro' and rev='$rev'");
		$hitungData = count($data);
		$hitungwd = count($workday);
		$hitungpanel = count($panel);
		if($hitungData>0 && $hitungpanel>0 && $hitungwd>0){
			$quote = array(
			'id_lead'=>$data[0]['id_lead'],'date'=>$data[0]['date'],
			'idproposal'=>$data[0]['idproposal'], 'rev'=>$data[0]['rev'],
			'term'=>$data[0]['term'], 'signer'=>$data[0]['signer'],
			'customer'=>$data[0]['customer'], 'productname'=>$workday[0]['productname'],
			'productcode'=>$workday[0]['productcode'],'price'=>$workday[0]['price'],'line'=>$workday[0]['line'],'license'=>$workday[0]['license'],
			'discount'=>$workday[0]['discount'],'custom_limit'=>$workday[0]['custom_limit'],'employeelimit'=>$workday[0]['employeelimit'],
			'line'=>$panel[0]['line'],'description'=>$panel[0]['description'],'rate'=>$panel[0]['rate'],'qty'=>$panel[0]['qty']
		);
		$this->load->view('v_navbar');
		$this->load->view('v_leftside');
		$this->load->view('v_revProposal',$quote);
		}else{
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                	<i class="fa fa-times-circle"></i>
	                    Database Not Found
                </div>'); 
			redirect('SalesAdmin/psummary');
		}
		
		
	}
	
}
