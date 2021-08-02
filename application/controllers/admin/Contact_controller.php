<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
      $this->load->database(); 
    

      $this->load->helper(array('form'));
	  $this->load->library('form_validation');
	  checkSess();
       
	}
	public function contact()
	{ 

         $query = $this->db->get("vd_contact"); 
		 $data['records'] = $query->result(); 
		 $data['breadcrumb'] = array("title"=>"Contact Us","links"=>array("Home"=>"#","Contact Us"=>"#"));
         $this->load->view('admin/contact_list',$data); 


         
    }

    


	function contact_list()
	{
		$id = $this->input->post('id');
		if(!empty($id))
		{
			$param['c_status'] = '2';
			$cat = $this->Main->getContactData($id);
			if($this->Main->update_contact_contactus($param,$id))
			{
				$res = array("res"=>1,"msg"=>'Viewed');
			}
			else
			{
				$res = array("res"=>0,"msg"=>'Failed View');
			}
		
		
        
        
			//     print_r($cat);
			// exit;
			if(!empty($cat))
			{
				
			
				//print_r($rdata);
				print('<table class="table table-stripped singlesearch" id="singlesearch">');
				print('<tr>');
				print('<td>Name</td><td>:</td><td>'.$cat->c_name.'</td>');
				print('</tr>');
				print('<tr>');
				print('<td>Email</td><td>:</td><td>'.$cat->c_email.'</td>');
				print('</tr>');
			
				print('<tr>');
				print('<td>Phone</td><td>:</td><td>'.$cat->c_phone.'</td>');
				print('</tr>');

				
			if($cat->c_type != 0) 
			{
				$typ_cat = $this->Main->getTypecat($cat->c_type);
				print('<tr>');
				print('<td>Type</td><td>:</td><td>'.$typ_cat->t_name.'</td>');
				print('</tr>');  

			}
			else
			{
				print('<tr>');
				print('<td>Subject</td><td>:</td><td>'.$cat->c_subject.'</td>');
				print('</tr>');  

				print('<tr>');
				print('<td>Message</td><td>:</td><td>'.$cat->c_msg.'</td>');
				print('</tr>');  
			}
			
		
				
				print('</table>');

			}
			else
				'No Contact found';
		}

	}
}