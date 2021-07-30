<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Featured_products extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function featured_products()
	{
        
        $query = $this->db->get("tbl_featured_products"); 
        $data['records'] = $query->result();
		$data['breadcrumb'] = array("title"=>"Featured Products","links"=>array("Home"=>"#","Featured Products"=>"#"));
		$this->load->view('admin/featured_products_list',$data); 
	}
	

	public function add_featured_products($id='')
	{ 
      
        if($id!='')
		{
         
            $data['records']=$this->Main->getDetailedData('*','tbl_featured_products',array('id'=>$id));
			 
		}
         $data['breadcrumb'] = array("title"=>"Add Featured Products","links"=>array("Home"=>"#","Add Featured Products"=>"#"));
	
		$this->load->view('admin/add_featured_products',$data); 


         
    }
	
    function featured_products_action()
	{
	
        $this->load->library('form_validation');
          
        $this->form_validation->set_rules('imgname','Product Image','required');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('original','Original Price','required|numeric');
        $this->form_validation->set_rules('discount','Discount Price','required|numeric');
        $this->form_validation->set_rules('link','URL','required');
      
        
  
        
        if(!$this->form_validation->run())
        {
            
			
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		
			
		
		}
	
        else
        {
        
		
			    $sId = $this->input->post('cid');
                $param['image'] = $this->input->post('imgname');
                $param['title'] = $this->input->post('title');
                $param['dis_rate'] = $this->input->post('discount');
                $param['org_rate'] = $this->input->post('original');
                $param['link'] = $this->input->post('link');
              
        
        
        
				if(empty($sId))
				{
				
					
					if($this->Main->insert($param,"tbl_featured_products"))
						$res = array("res"=>1,"msg"=>'Featured Products Added');
					else
						$res = array("res"=>0,"msg"=>'Failed to add Featured Products');
				}
				else
				{
					


					
					if($this->Main->update($param,'tbl_featured_products',array('id'=>$sId)))
						$res = array("res"=>1,"msg"=>'Featured Products Edited');
					else
						$res = array("res"=>0,"msg"=>'Failed to edit Featured Products');

				}
			
  
			}
			echo json_encode($res);
		}
	
	


   function featured_products_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete('tbl_featured_products',array('id'=>$id)) )
					$res = array("res"=>1,"msg"=>'Featured Products deleted');
				
				else
					$res = array("res"=>0,"msg"=>'Failed to delete Featured Products');
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
			$path = 'assets/front/assets/img/';
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



   
	
}

