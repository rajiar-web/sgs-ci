<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
        $this->load->library('session');
        checkSess();
	}

	public function upload_files()
    {
        //$ip_address= $this->input->ip_address();
       // $this->session->set_userdata("ads_session",array("id"=>md5($ip_address)));
        //$this->load->model('Admin_model');
        $control = $this->input->post('item');
        $path='';
        if($control=='menu')
        {
            $session = 'menu_img';
            $path='assets/front/img/menu/';
            $this->session->unset_userdata('menu_img');
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
        } 
        elseif($control=='preview_img')
       {
            $session = 'download_preimg';
            $path='mathsone/admin/images/downloads/';
            $this->session->unset_userdata('preview_img');
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        } 
        elseif($control=="education_img")
        {
            $session='education_preimg';
            $path='mathsone/admin/images/education/';
            $this->session->unset_userdata('education_img');
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        }
        elseif($control=='files')
        {
            $session = 'product_sess';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        }
        else
        {
             $config['allowed_types'] = 'gif|jpg|png|jpeg';
        }
       
        $uploadPath = './'.$path;
        $data_img_id=array();  
        if (!is_dir($uploadPath))
        {
            mkdir($uploadPath, 0755, TRUE);
        }
        $temp_path = '';
        //$temp_path=date("Y").'/'.date("m").'/';
        $path = $path.$temp_path;
        $uploadPath = './'.$path;
        if (!is_dir($uploadPath))
        {
            mkdir($uploadPath, 0755, TRUE);
        }
        $config['upload_path'] = $uploadPath;
        $config['remove_spaces'] = FALSE;
        $config['max_size'] = '5024000'; 
        $this->load->library('upload', $config);
        $file_data=array();
        $imgs=array();
        foreach($_FILES as $n)
        {
            $namearray=explode(".",$n['name']);
            //print_r($namearray);
             $_FILES['userFile']['name'] = preg_replace('/\s+/', '-',$n['name']);
             //print_r( $_FILES['userFile']['name']);
            //$_FILES['userFile']['name'] = $n['name'];
            $_FILES['userFile']['type'] = $n['type'];
             // print_r( $_FILES['userFile']['type']);
            $_FILES['userFile']['tmp_name'] = $n['tmp_name'];
            $_FILES['userFile']['error'] = $n['error'];
            $_FILES['userFile']['size'] = $n['size'];
            // print_r($_FILES['userFile']);

           
            $this->upload->initialize($config);
            if($this->upload->do_upload('userFile'))
            {
                $fileData = $this->upload->data();
				$uploadData =  $uploadPath.$fileData['file_name'];
				$images=array();
				if($this->session->userdata($session))
				{
					$images = $this->session->userdata[$session]['images'];
				}
                $images[]= $temp_path.$fileData['file_name'];
              	$this->session->set_userdata($session,array("images"=>$images));

               
               
                if($control=='menu')
                {
                    $this->resize_images($path,$fileData['file_name'],635,668);
                  //  $this->resize_images($path,$fileData['file_name'],213,213);
                    $this->resize_images($path,$fileData['file_name'],60,60);

                } 
                $filepath = $temp_path.$fileData['file_name'];
                        $file_data[]=array(
                         "filepath"=>$filepath,
                         "filepathfull"=>base_url().$path.$fileData['file_name'],
                         "filename"=>$fileData['file_name'],
                         "filesize"=>$fileData['file_size']);
                     
                //}
                
            }
          
        }
        if(!empty($file_data))
        {
             echo json_encode(array("msg"=>1,"data"=>$file_data,"count"=>count($file_data)));
        }
        else 
        {
           echo json_encode(array("msg"=>0,'error' => $this->upload->display_errors()));
        }
    }
    public function delete_img()
    {
    	$item = $this->input->post('item');
        $path = $this->input->post('path');
         if($item=='up_file')
        {
            $session = 'download_upfile';
           
        } 
        elseif($item=='preview_img')
       {
            $session = 'download_preimg';
            
        } 
        elseif($item=="education_img")
        {
            $session='education_preimg';
        }
        elseif($item=='files')
        {
            $session = 'product_sess';
            
        }
       
    	$images = $this->session->userdata[$session]['images'];
        if(!empty($images))
        {
            $key = array_search($path, $images);
            // tsi($images);
            // echo $path;
            if($key>=0)
            {
                if($this->session->userdata('del_'.$session))
                {
                    $del_images = $this->session->userdata('del_'.$session);
                    $del_images[] = $images[$key];
                    $this->session->set_userdata('del_'.$session, $del_images);
                }
                unset($images[$key]);
                if($session=='download_upfile' || $session=='download_preimg'|| $session=='education_preimg')
                    $this->session->unset_userdata($session);
                else
                $this->session->set_userdata($session,array("images"=>$images));
                echo json_encode(array("res"=>1,"msg"=>'Image deleted!'));
            }
            else
                echo json_encode(array("res"=>0, "msg"=>'Invalid image!'));
        }
        else 
 			echo json_encode(array("res"=>0,"msg"=>'Image not deleted!'));
    }

   
   function resize_images($path,$name,$h,$w)
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
        // if ( ! $this->image_lib->resize())
        //     {
        //         echo $this->image_lib->display_errors();
        //     }
        
   }
}