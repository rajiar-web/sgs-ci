<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function register()
	{
        $query = $this->db->get("user"); 
        $data['records'] = $query->result();
		$data['breadcrumb'] = array("title"=>"Register","links"=>array("Home"=>"#","Register"=>"#"));
		$this->load->view('admin/register_list',$data); 
	}
	

	


   function register_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_register($id))
					$res = array("res"=>1,"msg"=>'Registration deleted');
				
				else
					$res = array("res"=>0,"msg"=>'Failed to delete Registration');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
	}

    function view_register()
	{
		$id = $this->input->post('id');
		if(!empty($id))
		{
			
			$cat = $this->Main->getRegisterData($id);
			
      
            if(!empty($cat))
            {
                
                print('<table class="table table-stripped singlesearch" id="singlesearch">');
                print('<tr>');
                print('<td>First Name</td><td>:</td><td>'.$cat->name.'</td>');
				print('</tr>');
				print('<tr>');
                print('<td>Last Name</td><td>:</td><td>'.$cat->last_name.'</td>');
                print('</tr>');
                print('<tr>');
                print('<td>Phone No</td><td>:</td><td>'.$cat->contact.'</td>');
                print('</tr>');
                print('<td>Email</td><td>:</td><td>'.$cat->email.'</td>');
                print('</tr>');
                print( '<td>') ;
	}
}
	}

	
}

