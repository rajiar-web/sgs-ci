<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
	  $this->load->database(); 
	  checkSess();
    

     
       
	}
	
    function services_list()
	{
		$data['plist'] = $this->Main->ServicesList();
		$data['breadcrumb'] = array("title"=>" Services","links"=>array("Home"=>"#","Add Services"=>"#"));
		$this->load->view('admin/services_list',$data); 
	}
	

	public function add_services($id='')
	{ 
		if(!empty($id))
		{
			$sliderdata = $this->Main->ServicesOne($id);
			$data['sliderdata'] = $sliderdata[0];
		}
		else
		{
			$data['sliderdata'] ="";
		}
        $data['breadcrumb'] = array("title"=>"Add Services","links"=>array("Home"=>"#","Add Services"=>"#"));
		$this->load->view('admin/add_services',$data); 


         
    }
	
    function addservices()
	{
	
        $this->load->library('form_validation');
          
        $this->form_validation->set_rules('title','Title','required|trim');
        $this->form_validation->set_rules('desc','Shot description','required|trim');
        $this->form_validation->set_rules('desc2','Full description','required|trim');
		$this->form_validation->set_rules('imgname','Service icon','required');
        $this->form_validation->set_rules('imgname2','Service Image','required');
        $this->form_validation->set_rules('imgname3','Service Detail  Main Image','required');
        $this->form_validation->set_rules('imgname4','Service Detail Sub Image','required');
		$this->form_validation->set_rules('imgname5','Service Detail Sub Image','required');
        
        if(!$this->form_validation->run())
        {
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		}
	
        else
        {
        
		$data = array();
		$sId = $this->input->post('sId');

		$data['s_title'] = $this->input->post('title');
		$slug_title = preg_replace('/\s+/', '-', $data['s_title']);
		$data['s_slug'] = $slug_title;
        $data['s_shot_des'] = $this->input->post('desc');
        $data['s_full_des'] = $this->input->post('desc2');
        $data['s_detail_main_heading'] = $this->input->post('s_detail_main_heading');
		$img = $this->input->post('imgname2');
		if($img!='')
		$sliderImg = $img;
		if(!empty($sliderImg))
			  $data['s_icon'] = $sliderImg;
			  
		$img2 = $this->input->post('imgname');
		if($img2!='')
		$sliderImg2 = $img2;
		if(!empty($sliderImg2))
            $data['s_image'] = $sliderImg2;


        $img3 = $this->input->post('imgname3');
        if($img3!='')
        $sliderImg3 = $img3;
        if(!empty($sliderImg3))
            $data['s_detail_main_image'] = $sliderImg3;

        $img4 = $this->input->post('imgname4');
        if($img4!='')
        $sliderImg4 = $img4;
        if(!empty($sliderImg4))
            $data['s_detail_sub_image1'] = $sliderImg4;

        $img5 = $this->input->post('imgname5');
        if($img5!='')
        $sliderImg5 = $img5;
        if(!empty($sliderImg5))
            $data['s_detail_sub_image2'] = $sliderImg5;
		
		$data['s_status'] = '1';
		
		if(is_numeric($sId))
		{
			$this->db->where("s_id",$sId);
            $this->db->update('vd_services',$data);
            $res = array("res"=>1,"msg"=>'Service Updated');
		}
		else
		{
            $this->db->insert('vd_services',$data);	
            $res = array("res"=>1,"msg"=>'Service Inserted');
		}
		
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
			$newfile_name= preg_replace('/[^A-Za-z0-9.]/', "", $file_name); 
			$r_num=rand(10000,4);
			$config['file_name'] = $r_num.$newfile_name;
		    // Load upload library 
		    $this->load->library('upload',$config); 
		    // File upload
			    if($this->upload->do_upload('file'))
			    { 
			    	 $fileData = $this->upload->data();
			    	 $this->resize_images($path,$fileData['file_name'],350,233);
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
        // if ( ! $this->image_lib->resize())
        //     {
        //         echo $this->image_lib->display_errors();
        //     }
        
   }


   function services_delete()
	{
		 $id = $this->input->post('id');
		
		if(!empty($id))
		{
			
				if($this->Main->delete_services($id))
					$res = array("res"=>1,"msg"=>'Service deleted');
					// $this->load->view('admin/reasons_list',$data); 
				else
					$res = array("res"=>0,"msg"=>'Failed to delete Service');
		}
		else
			$res = array("res"=>0,'msg'=>'Id not found');
		echo json_encode($res);
	}
}

