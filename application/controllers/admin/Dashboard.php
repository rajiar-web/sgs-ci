<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	function __construct() 
	{
        parent::__construct();
        checkSess();
    }
	public function index()
	{
		$querycountmessage = $this->db->where('c_status !=','2');
		$q = $this->db->get('vd_contact');
		$data['count_message'] =$q->num_rows();
		$querycountsearch = $this->db->where('s_status','1');
		$qsearch = $this->db->get('vd_services');
		$data['count_search'] =$qsearch->num_rows();
		$querycountcompany = $this->db->where('status','1');
		$qcompany = $this->db->get('vd_recent_works');
		$data['count_company'] =$qcompany->num_rows();
		$data['breadcrumb'] = array("title"=>"Dashboard","links"=>array("Dashboard"=>"#"));
		$this->load->view('admin/dashboard',$data);
	}
}