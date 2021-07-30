<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_classification extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
   function product_classification()
	{
      
        $query = $this->db->get("tbl_product_classification"); 
        $data['records'] = $query->result();
	
		$query = $this->db->get("tbl_products"); 
        $data['products'] = $query->result();

		$data['breadcrumb'] = array("title"=>"Product Classification","links"=>array("Home"=>"#","Classification"=>"#"));
		$this->load->view('admin/product_classification_list',$data); 
	}
	

	public	function add_classification($id='')
	{ 
        
        if($id!='')
		{
         
            $data['records']=$this->Main->getDetailedData('*','tbl_product_classification',array('pc_id'=>$id));
	
			
			

		}
         $data['breadcrumb'] = array("title"=>"Add Classification","links"=>array("Home"=>"#","Add Classification"=>"#"));
	
		$this->load->view('admin/add_classification',$data); 


         
    }
	
    function classification_action()
	{
	
        $this->load->library('form_validation');
          
   
        $this->form_validation->set_rules('classification','Classification','required');
  
        
        if(!$this->form_validation->run())
        {
            
			
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		
			
		
		}
	
        else
        {
        
		
			    $sId = $this->input->post('cid');
                $param['pc_classification'] = $this->input->post('classification');
              
       
        
        
        
				if(empty($sId))
				{
				
					
					if($this->Main->insert($param,"tbl_product_classification"))
						$res = array("res"=>1,"msg"=>'Classification Added');
					else
						$res = array("res"=>0,"msg"=>'Failed to add Classification');
				}
				else
				{
					


					
					if($this->Main->update_classification($param,$sId))
						$res = array("res"=>1,"msg"=>'Classification Edited');
					else
						$res = array("res"=>0,"msg"=>'Failed to edit Classification');

				}
			
  
			}
			echo json_encode($res);
		}
	
	


   function classification_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_classification($id))
					$res = array("res"=>1,"msg"=>'Classification deleted');
				
				else
					$res = array("res"=>0,"msg"=>'Failed to delete classification');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
	}

   

	public function Classifications()
	{
		$data['breadcrumb'] = array("title"=>"Classifications","links"=>array("Home"=>"#","Classifications"=>"#"));

		$this->load->view('admin/product-classifications',$data);
	}
	function product_classify_list()
	{
		$data['plist'] = $this->Main->loadClassificationProducts();

		$this->load->view('admin/inc/product_classify_table',$data);
	}
	function setClassification()
	{
		$param1 = array();
		//$param2 = array();
	    $param3 = array();
		$pplr = $this->input->post('popular');
		$prms = $this->input->post('prmtional');
		//$ltsts = $this->input->post('latest');
		$this->db->empty_table('product_classify'); 
		if(count($prms)>0)
		{
			foreach($prms as $key=>$value)
			{
				$arry1 = array("product_id"=>$key,"cl_status"=>$value);
				array_push($param1, $arry1);
			}
			$this->db->insert_batch('product_classify', $param1); 
		}
		// if(count($ltsts)>0)
		// {
		// 	foreach($ltsts as $key1=>$value1)
		// 	{
		// 		$arry2 = array("product_id"=>$key1,"cl_status"=>$value1);
		// 		array_push($param2, $arry2);
		// 	}
		// 	$this->db->insert_batch('product_classify', $param2); 
		// }
		if(count($pplr)>0)
		{
			foreach($pplr as $key2=>$value2)
			{
				$arry3 = array("product_id"=>$key2,"cl_status"=>$value2);
				array_push($param3, $arry3);
			}
			$this->db->insert_batch('product_classify', $param3); 
		}
		$res = array("res"=>1,'msg'=>'Classifications Updated');
		echo json_encode($res);
		
	}
	


	
}

