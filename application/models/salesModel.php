<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesModel extends CI_Model {
	public function TambahUser($tableName,$data){
		$res = $this -> db -> insert($tableName,$data);
		return $res;
	}
	public function cek_user($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('tuser')->row();
	}
	public function authen_user($username){
		$this->db->select('authentication');
		$this->db->where('username', $username);
		$this->db->from('tuser');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function wrong_password($username, $value){
		$this->db->set('authentication', $value);
		$this->db->where("username", $username);
		$this->db->update('tuser');
	}
	
	public function progress(){
		$data = $this->db->query('select tlead.id_lead, tlead.customer, tlead.employee, tlead.city, 
								lead_sale.productcode, lead_sale.productname, 
								supp_assign.supp_code1, lead_sale.lead_sales, supp_mstr.supp_commision,
								progress.iq, progress.fu, progress.pre, progress.pro, progress.poc, progress.adj, tlead.status
								from tlead 
								left join lead_sale
								on tlead.id_lead = lead_sale.id_lead
								left join supp_assign
								on tlead.id_lead = supp_assign.id_lead
								left join supp_mstr
								on supp_assign.supp_code1 = supp_mstr.supp_code
								left join progress
								on tlead.id_lead = progress.id_lead
								where status = "aktif" order by (progress.iq + progress.fu + progress.pre + progress.pro + progress.poc + progress.adj) DESC');
		return $data->result_array();
	}
	
	public function tasklist(){
		$datatasks = $this->db->query('select tfollowup.*, tlead.status, tlead.customer from tfollowup left join tlead on tfollowup.id_lead = tlead.id_lead where `followup_date` = (select max(`followup_date`) from tfollowup as m2 where tfollowup.`id_lead` = m2.`id_lead`) and tlead.status = "aktif" order by tfollowup.followup_date asc');
		return $datatasks->result_array();
	}
	
	public function lastevent(){
		$lastevent = $this->db->query('select tfollowup.*, tlead.status, tlead.customer from tfollowup left join tlead on tfollowup.id_lead = tlead.id_lead where `followup_date` = (select max(`followup_date`) from tfollowup as m2 where tfollowup.`id_lead` = m2.`id_lead`) and tlead.status = "aktif" order by tfollowup.followup_date asc');
		return $lastevent->result_array();
	}
	
	public function browseInq(){
		$browseInq = $this->db->query('select tinq.*, tlead.id_lead from tinq left join tlead on tinq.inq_no = tlead.inq_no');
		return $browseInq->result_array();
	}
	public function addInq($tableName,$data){
		$res = $this -> db -> insert($tableName,$data);
		return $res;
	}
	public function showCustomer($where=""){
		$showCustomer = $this->db->query('select distinct customer, id_lead from tlead '.$where);
		return $showCustomer->result_array();
	}
	public function selectCustomer(){
		$query=$this->db->query('select distinct customer from tlead');
		return $query->result_array();
	}
	public function customerTimeline($id){
		$query=$this->db->query('select * from tlead '.$id);
		return $query->result_array();
	}
	public function timelinefollowup($id){
		$query=$this->db->query('select * from tfollowup '.$id);
		return $query->result_array();
	}
	public function ricdata($id){
		$selectProduct = $this->db->query('select * from tleadcontact '.$id);
		return $selectProduct->result_array();
	}
	public function presentDate($id){
		$selectProduct = $this->db->query('select * from tpresentation '.$id);
		return $selectProduct->result_array();
	}
	public function participant($id){
		$selectProduct = $this->db->query('select * from tpre_participant '.$id);
		return $selectProduct->result_array();
	}
	public function tpoc($id){
		$selectProduct = $this->db->query('select * from tpoc '.$id);
		return $selectProduct->result_array();
	}
	public function tpoc_item($id){
		$selectProduct = $this->db->query('select * from tpoc_item '.$id);
		return $selectProduct->result_array();
	}
	public function HapusData($tableName, $where){
		$res = $this -> db -> delete($tableName,$where);
		return $res;
	}
	public function terakhir($today){
		$query = $this->db->query("SELECT substr(max(id_lead),3,7) AS last FROM tlead WHERE substr(id_lead,3,4) LIKE ".$today);
		return $query->result_array();
	}
	public function quotation_Terakhir($today){
		$query = $this->db->query("SELECT substr(max(id_quotation),4,7) AS last FROM quotation WHERE substr(id_quotation,4,4) LIKE ".$today);
		return $query->result_array();
	}
	public function selectProduct($jpay){
		$selectProduct = $this->db->query('select productcode, productname, price, employeelimit from productmaster '.$jpay);
		return $selectProduct->result_array();
	}
	public function selectPatner(){
		$showPatner = $this->db->query("select * from tlead where status = 'aktif'");
		return $showPatner->result_array();
	}
	public function selectAssign(){
		$showPatner = $this->db->query("select * from supp_mstr");
		return $showPatner->result_array();
	}
	public function UpdateData($tableName,$data,$where){
		$res = $this -> db -> update($tableName,$data,$where);
		return $res;
	}
	public function lead_sale($where){
		$data = $this->db->query("select tlead.id_lead, tlead.customer, lead_sale.productcode, lead_sale.productname, lead_sale.lead_sales from tlead inner join lead_sale on lead_sale.id_lead = tlead.id_lead ".$where);
		return $data->result_array();
	}
	public function aprogress($where){
		$data = $this->db->query("select tlead.id_lead, tlead.customer, progress.iq, progress.fu, progress.pre, progress.pro, progress.poc, progress.adj FROM tlead INNER JOIN progress ON tlead.id_lead = progress.id_lead ".$where);
		return $data->result_array();
	}
	public function progressReport(){
		$progress=$this->db->query("select progress.id_lead, tlead.customer, progress.iq, progress.fu, progress.pre, progress.pro, progress.poc, progress.adj, tlead.status from progress inner join tlead on progress.id_lead = tlead.id_lead where status = 'aktif';");
		return $progress->result_array();
	}
	public function saleasLead(){
		$sales=$this->db->query("select tlead.id_lead, tlead.customer, tlead.employee, tlead.city, lead_sale.productcode, lead_sale.productname, supp_assign.supp_code1, lead_sale.lead_sales, supp_mstr.supp_commision, progress.iq, progress.fu, progress.pre, progress.pro, progress.poc, progress.adj, tlead.status from tlead left join lead_sale on tlead.id_lead = lead_sale.id_lead left join supp_assign on tlead.id_lead = supp_assign.id_lead left join supp_mstr on supp_assign.supp_code1 = supp_mstr.supp_code left join progress on tlead.id_lead = progress.id_lead where status = 'aktif'");
		return $sales->result_array();
	}
	public function quatation(){
		$query=$this->db->query("select quotation.*, tlead.customer from quotation left join tlead on quotation.id_lead = tlead.id_lead order by id_quotation");
		return $query->result_array();
	}
	public function quatationSend(){
		$query=$this->db->query("select quotation.*, tlead.customer from quotation left join tlead on quotation.id_lead = tlead.id_lead order by id_lead");
		return $query->result_array();
	}
	public function proposalSummary(){
		$query=$this->db->query("select proposal.*, tlead.customer from proposal left join tlead on proposal.id_lead = tlead.id_lead order by idproposal");
		return $query->result_array();
	}
	public function selectProposalSend(){
		$query=$this->db->query("select proposal.*, tlead.customer from proposal left join tlead on proposal.id_lead = tlead.id_lead order by id_lead");
		return $query->result_array();
	}
	public function productSelect(){
		$query=$this->db->query("select lead_sale.id_lead, lead_sale.productcode, lead_sale.productname, lead_sale.lead_sales, productmaster.employeelimit, tlead.status from lead_sale left join tlead on tlead.id_lead = lead_sale.id_lead left join productmaster on lead_sale.productcode = productmaster.productcode");
		return $query->result_array();
	}
	public function desSelect($where){
		$query=$this->db->query("select lead_sale.id_lead, lead_sale.productcode, workday_std.description, workday_std.wd from lead_sale left join workday_std on lead_sale.productcode = workday_std.productcode ".$where);
		return $query->result_array();
	}
	public function showProduct(){
		$product = $this->db->query("select * from productmaster");
		return $product->result_array();
	}
	public function quotationReview($where){
		$data = $this->db->query("select quotation.*, quotation_detail.*, tlead.customer from quotation left join quotation_detail on quotation.id_quotation = quotation_detail.id_quotation left join tlead on quotation.id_lead = tlead.id_lead ".$where);
		return $data->result_array();
	}
	public function proposalSend($where){
		$data = $this->db->query("select proposal.*, tlead.customer, tlead.id_lead from proposal left join tlead on proposal.id_lead = tlead.id_lead ".$where);
		return $data->result_array();
	}
	public function lastProposal($today){
		$data = $this->db->query("select substr(max(idproposal),4,7) as last from proposal where substr(idproposal,4,4) ".$today);
		return $data->result_array();
	}
	public function workday($where){
		$data = $this->db->query("select proposal_license.*, productmaster.productcode, productmaster.productname,
			productmaster.employeelimit, productmaster.price from proposal_license left join productmaster on proposal_license.license = productmaster.productcode ".$where);
		return $data->result_array();
	}
	public function workdayPro($where){
		$data = $this->db->query("select * from proposal_workdays ".$where);
		return $data->result_array();
	}
	public function proposalPdf($where){
		$data = $this->db->query("select proposal.*, tlead.customer from proposal left join tlead on proposal.id_lead = tlead.id_lead ".$where);
		return $data->result_array();
	}
	public function proposalMaster($where){
		$data = $this->db->query("select proposal_license.*, productmaster.* from proposal_license left join productmaster on proposal_license.license = productmaster.productcode ".$where);
		return $data->result_array();
	}
	public function proposalLast($where){
		$data = $this->db->query("select proposal_license.license, sum(proposal_workdays.qty*proposal_workdays.rate) as totalwd, sum(proposal_workdays.qty) as wdqty, productmaster.remark FROM proposal_license left join proposal_workdays on proposal_license.idproposal = proposal_workdays.id_proposal left join productmaster on proposal_license.license = productmaster.productcode  ".$where);
		return $data->result_array();
	}
	public function customwd($where){
		$data = $this->db->query("select * from proposal_custom_workdays ".$where);
		return $data->result_array();
	}
	public function total($where){
		$data = $this->db->query("select sum(qty) as cwdqty, sum(qty * rate) as totalcwd FROM proposal_custom_workdays ".$where);
		return $data->result_array();
	}
}