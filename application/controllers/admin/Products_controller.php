<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function products()
	{
        
        $data['records'] = $this->Main->getProducts();
		$data['breadcrumb'] = array("title"=>"Products","links"=>array("Home"=>"#","Products"=>"#"));
		$this->load->view('admin/products_list',$data); 
	}
	

	public function add_products($id='')
	{ 
        $data['category'] = $this->Main->getData('tbl_category',array('c_status'=>'1'));
        
        if($id!='')
		{
         
            $data['records']=$this->Main->getDetailedData('*','tbl_products',array('p_id'=>$id));
			 
		}
         $data['breadcrumb'] = array("title"=>"Add Products","links"=>array("Home"=>"#","Add Products"=>"#"));
	
		$this->load->view('admin/add_products',$data); 


         
    }
	
    function products_action()
	{
	
        $this->load->library('form_validation');
          
        $this->form_validation->set_rules('imgname','Product Image','required');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('original','Original Price','required|numeric');
        $this->form_validation->set_rules('discount','Discount Price','required|numeric');
        $this->form_validation->set_rules('category','Category','required');
        
  
        
        if(!$this->form_validation->run())
        {
            
			
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		
			
		
		}
	
        else
        {
        
		
			    $sId = $this->input->post('cid');
                $param['p_image'] = $this->input->post('imgname');
                $param['p_title'] = $this->input->post('title');
                $param['p_desc'] = $this->input->post('desc');
                $param['p_discound_price'] = $this->input->post('discount');
                $param['p_original_price'] = $this->input->post('original');
                $param['p_category'] = $this->input->post('category');
        
        
        
				if(empty($sId))
				{
				
					
					if($this->Main->insert($param,"tbl_products"))
						$res = array("res"=>1,"msg"=>'Product Added');
					else
						$res = array("res"=>0,"msg"=>'Failed to add Product');
				}
				else
				{
					


					
					if($this->Main->update_products($param,$sId))
						$res = array("res"=>1,"msg"=>'Products Edited');
					else
						$res = array("res"=>0,"msg"=>'Failed to edit products');

				}
			
  
			}
			echo json_encode($res);
		}
	
	


   function products_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_products($id))
					$res = array("res"=>1,"msg"=>'Products deleted');
				
				else
					$res = array("res"=>0,"msg"=>'Failed to delete Products');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
	}

    function image()
	{
		$data = array();
		$filepath ='';
		$this->load->library('image_lib');
			if(!empty($_FILES['file']['name']))
			{ 
			$path = 'assets/front/img/products/';
			$uploadPath = './'.$path;
	        if (!is_dir($uploadPath))
	        {
	            mkdir($uploadPath, 0755, TRUE);
	        }
			
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		    $config['max_size'] = '5024000'; // max_size in kb 
			$config['file_name'] = $_FILES['file']['name'];
			$file_name=$_FILES['file']['name']; 
			$newfile_name= preg_replace('/[^A-Za-z0-9.]/', "", $file_name); 
            $config['file_name'] = $newfile_name;
            $new_name = time().$newfile_name;
            $config['file_name'] = $new_name;
		    // Load upload library 
		    $this->load->library('upload',$config); 
		    // File upload
			    if($this->upload->do_upload('file'))
			    { 
			    	 $fileData = $this->upload->data();
			    	 $this->resize_images($path,$fileData['file_name'],87,87);
			         $data['path'] = $path.$fileData['file_name'];	
			   		 $data['filename'] = $new_name;	
			   		
			    }
			    else
			    { 
			       $data['response'] = 'failed'; 
			    } 
		   }else
		   { 
		    $data['response'] = 'failed'; 
		   } 
		   echo json_encode($data);
	}
	function resize_images($path,$name,$w,$h)
   {
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = './'.$path.$name;
        $config['new_image'] = './'.$path.$h.'_'.$w.'_'.$name;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = $w;
        $config['height']   = $h;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        
        
   }



   function set_attribute($id='')
   {
       
       $data['id']=$id;
   
       $data['records'] = $this->Main->getData('tbl_products_attributes',array('a_id!='=>NULL));
       $product=$this->Main->getDetailedData('*','tbl_product_details',array('p_id'=>$id));
       $prd = array();
       if(!empty($product))
       {
           
           foreach($product as $prdct)
           {
               $prd[$prdct->pdn_id] = $prdct->pd_answer;
           }
       }
       $data['prcateg'] = $prd;
       
       $data['breadcrumb'] = array("title"=>"Set Attribute","links"=>array("Home"=>"#","Set Attribute"=>"#"));
       $this->load->view('admin/set_attribute',$data); 
   }


function attribute_action()
{

    $pid=$this->input->post('cid');
	$pdnid=$this->input->post('attribute');
	$answers=$this->input->post('answer');
	
	$arr=array();
	$ansarr=array();
	if(count($pdnid)>0)
	{
		if(!empty($pid))
		{
			$this->Main->delete_attributes($pid);
		}
		foreach($pdnid as $val)
		{
		$ans=$answers[$val];
		$ansarr=array("pdn_id"=>$val,"p_id"=>$pid,'pd_answer'=>$ans);
		array_push($arr,$ansarr);
		}
	
	   if($this->Main->batch_insert($arr,"tbl_product_details"))
	   {
	    $res = array("res"=>1,"msg"=>'Attributes Inserted Successfully');
	    }
		else
		{
		$res = array("res"=>0,"msg"=>'Failed to insert Attributes');			
		}
		echo json_encode($res);
}

}


	
}

