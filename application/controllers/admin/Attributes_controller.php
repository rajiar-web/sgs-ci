<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function attributes()
	{
        
        $query = $this->db->get("tbl_products_attributes"); 
        $data['records'] = $query->result();
		$data['breadcrumb'] = array("title"=>"Attributes","links"=>array("Home"=>"#","Attributes"=>"#"));
		$this->load->view('admin/attributes_list',$data); 
	}
	

	public function add_attributes($id='')
	{ 
        
        if($id!='')
		{
         
            $data['records']=$this->Main->getDetailedData('*','tbl_products_attributes',array('a_id'=>$id));
			 
		}
         $data['breadcrumb'] = array("title"=>"Add Attributes","links"=>array("Home"=>"#","Add Attributes"=>"#"));
	
		$this->load->view('admin/add_attributes',$data); 


         
    }
	
    function attributes_action()
	{
	
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('attribute','Product Attribute','required');
  
        
        if(!$this->form_validation->run())
        {
            
			
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		
			
		
		}
	
        else
        {
        
		
			    $sId = $this->input->post('cid');
                $param['a_attribute'] = $this->input->post('attribute');
             
        
        
        
				if(empty($sId))
				{
				
					
					if($this->Main->insert($param,"tbl_products_attributes"))
						$res = array("res"=>1,"msg"=>'Attribute Added');
					else
						$res = array("res"=>0,"msg"=>'Failed to add Attribute');
				}
				else
				{
					


					
					if($this->Main->update_attributes($param,$sId))
						$res = array("res"=>1,"msg"=>'Attribute Edited');
					else
						$res = array("res"=>0,"msg"=>'Failed to edit attributes');

				}
			
  
			}
			echo json_encode($res);
		}
	
	


   function attributes_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_attributes($id))
					$res = array("res"=>1,"msg"=>'Attributes deleted');
				
				else
					$res = array("res"=>0,"msg"=>'Failed to delete Attributes');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
	}

   

	
}

