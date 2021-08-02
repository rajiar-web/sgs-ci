<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
 {

	
	function __construct() 
	{
        parent::__construct();
        checkSess();
    }
	public function index()
	{
		$q = $this->db->get('tbl_products');
		$data['count_services'] =$q->num_rows();
	
		
		$reviews = $this->db->get('user');
		$data['count_slider'] =$reviews->num_rows();
		
		
		$offers = $this->db->get('tbl_product_classification');
		$data['count_talent'] =$offers->num_rows();	
	
	
		$data['breadcrumb'] = array("title"=>"Dashboard","links"=>array("Dashboard"=>"#"));
		$this->load->view('admin/dashboard',$data);
	}
}