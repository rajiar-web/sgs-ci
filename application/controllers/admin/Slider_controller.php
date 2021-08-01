<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function slider_list()
	{
		$data['plist'] = $this->Main->SliderList();
		$data['breadcrumb'] = array("title"=>" Slider","links"=>array("Home"=>"#","Add Slider"=>"#"));
		$this->load->view('admin/slider_list',$data); 
	}
	

	public function add_slider($id='')
	{ 
		if(!empty($id))
		{
			$sliderdata = $this->Main->SliderOne($id);
			$data['sliderdata'] = $sliderdata[0];
		}
		else
		{
			$data['sliderdata'] ="";
		}
        $data['breadcrumb'] = array("title"=>"Add Slider","links"=>array("Home"=>"#","Add Slider"=>"#"));
		//$data['mnulist'] = $this->Main->loadMenus();
		// echo "<pre>";
		// print_r($data['sliderdata']);exit;
		$this->load->view('admin/slider',$data); 


         
    }
	
    function addSlider()
	{
	
        $this->load->library('form_validation');
          
        $this->form_validation->set_rules('title','Title','required|trim');
		$this->form_validation->set_rules('imgname','Slider Images','required');
		$this->form_validation->set_rules('imgname2','Background Slider Images','required');
        
        if(!$this->form_validation->run())
        {
            // $errors = $this->form_validation->error_array();
			// $res = array("res"=>0,"errors"=>$errors);
			
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		
			
			//echo json_encode($res);
		}
	
        else
        {
        
		//echo $this->input->post('description');
		$data = array();
		$sId = $this->input->post('sId');

		$data['s_title'] = $this->input->post('title');
		$img = $this->input->post('imgname');
		if($img!='')
		$sliderImg = $img;
		if(!empty($sliderImg))
			  $data['s_image'] = $sliderImg;
			  
		$img2 = $this->input->post('imgname2');
		if($img2!='')
		$sliderImg2 = $img2;
		if(!empty($sliderImg2))
			$data['s_bag_img'] = $sliderImg2;
		
		$data['s_status'] = '1';
		
		if(is_numeric($sId))
		{
			$this->db->where("s_id",$sId);
            $this->db->update('vd_slider',$data);
		}
		else
		{
		$this->db->insert('vd_slider',$data);	
		}
		$res = array("res"=>1,"msg"=>'Slider Inserted');
		//echo json_encode($res);
		}
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
			$r_num=rand(10000,4);
			$newfile_name= preg_replace('/[^A-Za-z0-9.]/', "", $file_name); 
			$config['file_name'] = $r_num.$newfile_name;
		    // Load upload library 
		    $this->load->library('upload',$config); 
		    // File upload
			    if($this->upload->do_upload('file'))
			    { 
			    	 $fileData = $this->upload->data();
					 $this->resize_images($path,$fileData['file_name'],1920,976);
					 $this->resize_images($path,$fileData['file_name'],308,531);
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


   function slider_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_slider($id))
					$res = array("res"=>1,"msg"=>'Slider deleted');
					// $this->load->view('admin/reasons_list',$data); 
				else
					$res = array("res"=>0,"msg"=>'Failed to delete Slider');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
	}
}

