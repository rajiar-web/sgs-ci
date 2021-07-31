<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
      $this->load->database(); 
    

      $this->load->helper(array('form'));
	  $this->load->library('form_validation');
	  checkSess();
       
	}
	public function contact_info()
	{ 


        
        //  $query = $this->db->get("contact_info"); 
         
		//  $data['cinfo'] = $query->result(); 
         $data['breadcrumb'] = array("title"=>"Contact","links"=>array("Home"=>"#","Contact"=>"#"));
         $data['cinfo'] = $this->Main->getData("tbl_main_contact");
         //$data['cinfo']=$this->Main->getContact_infoData();
        
         $this->load->view('admin/add_contact',$data); 


         
    }

    

    
    
    public function contact_info_action()
	{ 
		
        $this->load->library('form_validation');
          
		$this->form_validation->set_rules('sales_no','Sales No','required|trim');
        $this->form_validation->set_rules('sales_email','Sales Email','required|trim|valid_email');
        $this->form_validation->set_rules('address','Address','required|trim');
        $this->form_validation->set_rules('ftr_abt','About','required|trim');
        
		
     
       
        if(!$this->form_validation->run())
        {
            $errors = $this->form_validation->error_array();
            $res = array("res"=>0,"errors"=>$errors);
           
        }
        else
        {
           	
			$cid = $this->input->post('cid');
            $param['c_phone'] = $this->input->post('sales_no');
	        $param['c_email'] = $this->input->post('sales_email'); 
            $param['c_address'] = $this->input->post('address');
            $param['c_footter_about'] = $this->input->post('ftr_abt');
            $param['c_open_time'] = $this->input->post('open_time');
        	  
			
			
			if(empty($cid))
			{
                
                //print_r($param);
				if($this->Main->insert($param,"tbl_main_contact"))
					$res = array("res"=>1,"msg"=>'Contact details Added');
				else
					$res = array("res"=>0,"msg"=>'Failed to add contact details');
			}
			else
			{


				
				if($this->Main->update_contact($param,$cid))
					$res = array("res"=>1,"msg"=>'Contact Edited');
				else
					$res = array("res"=>0,"msg"=>'Failed to edit ');
				
			
	         }
	       
// lq();

         
        }
        echo json_encode($res);
    
	}
	





    public function socialmedia_info()
	{
		$data['breadcrumb'] = array("title"=>'<i class="fa fa-address-card"></i> Social Media',"links"=>array("Home"=>"#","Social Media"=>"#"));
        $data['cinfo'] = $this->Main->getData("tbl_main_contact");
        $data['icons'] = social_media();
        if(!empty($data['cinfo']))
        {
            $data['sm'] = json_decode($data['cinfo'][0]->c_social_media);
        }
        $this->load->view('admin/social_media',$data);
    }
    function social_media_action()
    {
        $this->load->library('form_validation');
        $count   = $this->input->post('count');
        if(!empty($count))
        {
            for($j=0;$j<$count;$j++)
            {
                $this->form_validation->set_rules('title'.$j,'Media Title','required|trim');
                $this->form_validation->set_rules('link'.$j,'Link','required|trim|callback_validate_url');
            }
        }
		$this->form_validation->set_message("required","%s required");
        if(!$this->form_validation->run())
        {
            $errors = $this->form_validation->error_array();
            $res = array("res"=>0,"errors"=>$errors);
        }
        else
        {
            $resArray=array();
            for($j=0;$j<$count;$j++)
            {
                $title = $this->input->post('title'.$j);
                $icon = $this->input->post('icon'.$j);
                $link = $this->input->post('link'.$j);
                if(!empty($title) && !empty($icon) && !empty($link))
                {
                    $resArray[$title] = array("icon"=>$icon,"link"=>$link);
                }
            }
            $cinfo = $this->Main->getData("tbl_main_contact");
            $param['c_social_media'] = json_encode($resArray);
			if(empty($cinfo))
			{
				
				if($this->Main->insert($param,'tbl_main_contact'))
					$res = array("res"=>1,"msg"=>'Social media Added');
				else
					$res = array("res"=>0,"msg"=>'Failed to add social media');
			}
			else
			{
				$cid = $cinfo[0]->c_id;
				if($this->Main->update($param,'tbl_main_contact',array("c_id"=>$cid)))
					$res = array("res"=>1,"msg"=>'Social media Edited');
				else
					$res = array("res"=>0,"msg"=>'Failed to edit social media');
				
			}
        }
        echo json_encode($res);
    }
    function validate_url($url) 
    {
        if(!empty($url))
        {
           
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) 
            {
                $this->form_validation->set_message("validate_url","Invalid URL");
                return FALSE;
            } 
            else 
            {
                return TRUE;
            }
        }
     
    } 
	

}