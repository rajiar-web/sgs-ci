<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class About_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function about_list()
	{
		$data['breadcrumb'] = array("title"=>" About","links"=>array("Home"=>"#"," About"=>"#"));
		$data['plist'] = $this->Main->AboutList();
		$this->load->view('admin/about_list',$data); 
	}
	

    public function add_about($id='')
    
	{ 
        if(!empty($id))
        	{
        		$cat = $this->Main->AboutList($id);
            
				$data['aboutdata'] = $cat;
				
                
        	}
        $data['com_type']=array("Investment Manager");
        $data['breadcrumb'] = array("title"=>"Add Company","links"=>array("Home"=>"#","Add Company"=>"#"));
		$this->load->view('admin/about',$data); 


         
    }


function addabout()
	{
		$comId = $this->input->post('comId');
	
        $this->load->library('form_validation');
          
        
		$this->form_validation->set_rules('title','Title','required|trim');
		$this->form_validation->set_rules('desc','Front Description','required|trim');
		$this->form_validation->set_rules('desc2','Bottom Description','required|trim');
		$this->form_validation->set_rules('imgname','Logo','required');
        
        if(!$this->form_validation->run())
        {
            
			
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		
			
			
		}
	
        else
        {
        
	
		$data = array();
		$comId = $this->input->post('comId');
        
        
		$data['a_title'] = $this->input->post('title');
		$data['a_top_des'] = strip_tags($this->input->post('desc'));
		$data['a_bottom_des'] = strip_tags($this->input->post('desc'));
		$img = $this->input->post('imgname');
		if($img!='')
		$companyImg = $img;
		if(!empty($companyImg))
          	$data['a_image'] = $companyImg;
		
		$data['a_status'] = '1';
		
		
		if(!empty($comId))
		{
			$this->db->where("a_id",$comId);
			$this->db->update('vd_about',$data);
			$res = array("res"=>1,"msg"=>' Updated');
		}
		else
		{
		$this->db->insert('vd_about',$data);
		$res = array("res"=>1,"msg"=>' Inserted');	
		}
       
}
        echo json_encode($res);
    
  
	}


	
	function logo()
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
			//$path = 'admin/uploads/'; 	
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
			$config['max_size'] = '5024000'; // max_size in kb 
			$file_name=$_FILES['file']['name']; 
			$newfile_name= preg_replace('/[^A-Za-z0-9.]/', "", $file_name);
			$r_num=rand(10000,4);
			// print_r($newfile_name);exit;
			$config['file_name'] = $r_num.$newfile_name; 
		    // Load upload library 
		    $this->load->library('upload',$config); 
		    // File upload
			    if($this->upload->do_upload('file'))
			    { 
					 $fileData = $this->upload->data();
					 $this->resize_images($path,$fileData['file_name'],554,421);
					 $this->resize_images($path,$fileData['file_name'],540,530);
			   		 $data['path'] = $path.$fileData['file_name'];	
			   		 $data['filename'] = $r_num.$newfile_name;	
			   		
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
        $config['new_image'] = './'.$path.$w.'_'.$h.'_'.$name;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = $w;
        $config['height']   = $h;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        
   }


   function about_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_about($id))
					$res = array("res"=>1,"msg"=>'Deleted');
					// $this->load->view('admin/reasons_list',$data); 
				else
					$res = array("res"=>0,"msg"=>'Failed to delete company details');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
    }
    



    // function menu_list_byId()
	// {
		
	// 		$id = $this->input->post('id');
	// 		$cat = $this->Main->singleMenu($id);
	// 		if(!empty($cat))
	// 			{
	// 				$info['id'] = $cat[0]->com_id;
	// 				$info['title'] = $cat[0]->com_titile;
	// 				$info['img'] = json_decode($cat[0]->com_logo);
	// 				$info['desc'] = $cat[0]->com_desc;
				
	// 				$res = array("res"=>1,"cat"=>$info);
	// 			}
	// 	else
	// 		$res = array("res"=>0);
	// 	echo json_encode($res);
			

	// }
}

