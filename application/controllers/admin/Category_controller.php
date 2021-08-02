<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function category()
	{
    //     $query = $this->db->get("tbl_category"); 
    //    $data['records'] = $query->result();
	    $data['records'] = $this->Main->getCategory();
	    $data['breadcrumb'] = array("title"=>"Category","links"=>array("Home"=>"#","Category"=>"#"));
		$this->load->view('admin/category_list',$data); 
	}
	

	public function add_category($id='')
	{ 
		$data['category'] = $this->Main->getData('tbl_category',array('c_status'=>'1'));
        if($id!='')
		{
         
            $cat=$this->Main->getDetailedData('*','tbl_category',array('c_id'=>$id));
			$data['records'] = $cat;
			
			

		}
         $data['breadcrumb'] = array("title"=>"Add Category","links"=>array("Home"=>"#","Add Category"=>"#"));
	
		$this->load->view('admin/add_category',$data); 


         
    }
	
    function category_action()
	{
	
        $this->load->library('form_validation');
          
   
        $this->form_validation->set_rules('category','Category','required');
		//$this->form_validation->set_rules('category_type','Category Type','required');
        
        if(!$this->form_validation->run())
        {
            
			
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		
			
		
		}
	
        else
        {
        
		
			    $sId = $this->input->post('cid');
                $param['c_category'] = $this->input->post('category');
				$param['c_parent_id'] = $this->input->post('parent_category');
				//$param['c_status'] = $this->input->post('category_type');
        
        
        
				if(empty($sId))
				{
				
					
					if($this->Main->insert($param,"tbl_category"))
						$res = array("res"=>1,"msg"=>'Category Added');
					else
						$res = array("res"=>0,"msg"=>'Failed to add Category');
				}
				else
				{
					


					
					if($this->Main->update_category($param,$sId))
						$res = array("res"=>1,"msg"=>'Category Edited');
					else
						$res = array("res"=>0,"msg"=>'Failed to edit Category');

				}
			
  
			}
			echo json_encode($res);
		}
	
	


   function Category_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_category($id))
					$res = array("res"=>1,"msg"=>'Category deleted');
				
				else
					$res = array("res"=>0,"msg"=>'Failed to delete Category');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
	}

   
	
}

