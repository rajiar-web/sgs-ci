<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_contact_controller extends CI_Controller 
{

	function __construct()
	{
	  parent::__construct();
      $this->load->helper('url'); 
      $this->load->database(); 
    
      $this->load->model('Main');
      $this->load->helper(array('form'));
      $this->load->library('form_validation');
      checkSess();
       
	}
	public function main_contact()
	{ 


        
         $query = $this->db->get("tbl_main_contact"); 
		 $data['records'] = $query->result(); 
		 $data['breadcrumb'] = array("title"=>"Main Contact","links"=>array("Home"=>"#","Main Contact"=>"#"));
         $this->load->view('admin/main_list',$data); 


         
    }

    
public function add_main($id='')
	{ 
       
        if($id!='')
		{
		
            $cat = $this->Main->getMaincontactData($id);
			
			$data['contactdata'] = $cat;
			
			

		}
        $data['breadcrumb'] = array("title"=>"Add Main Contact","links"=>array("Home"=>"#","Add Main Contact"=>"#"));
		
		$this->load->view('admin/add_main_contact',$data); 


         
	}
	

	public function main_action()
	{ 
		$cid = $this->input->post('cid');
        $this->load->library('form_validation');
          
       // $this->form_validation->set_rules('name','Name','required|trim');
       // $this->form_validation->set_rules('address','Address','required|trim');
		//$this->form_validation->set_rules('email',' Email','required|trim');
	    $this->form_validation->set_rules('phone','Phone no','required|trim');
	    $this->form_validation->set_rules('s_phone','Phone no','required|trim');
        if(!$this->form_validation->run())
        {
            $errors = $this->form_validation->error_array();
            $res = array("res"=>0,"errors"=>$errors);
           
        }
        else
        {
              
            
            $param['mc_id']=$this->input->post('cid');
            $param['mc_name'] = $this->input->post('name');
			$param['mc_sales_phone'] = $this->input->post('phone');
            $param['mc_support_phone'] = $this->input->post('s_phone');
        	$param['mc_email'] = $this->input->post('email');	  
            $param['mc_address'] = $this->input->post('address');
            // $param['mc_social_media'] = $this->input->post('sid');
			
			if($this->Main->update_main($param,$cid))
					$res = array("res"=>1,"msg"=>'Main Contact Details Edited');
				else
					$res = array("res"=>0,"msg"=>'Failed to edit Main Contact Details');
				
			
	         
	       


         
        }
        echo json_encode($res);
    
	}
    
    
    function view_main()
	{
		$id = $this->input->post('id');
		if(!empty($id))
		{
		
			$cat = $this->Main->getMaincontactData($id);
			
		
        
        
		
			if(!empty($cat))
			{
				
			
			
				print('<table class="table table-stripped singlesearch" id="singlesearch">');
                print('<tr>');
                print('<tr>');
				print('<td>Name</td><td>:</td><td>'.$cat->mc_name.'</td>');
				print('</tr>');
                print('<tr>');
				print('<td>Sales Phone No</td><td>:</td><td>'.$cat->mc_sales_phone.'</td>');
				print('</tr>');
                print('<tr>');
				print('<td>Support Phone No</td><td>:</td><td>'.$cat->mc_support_phone.'</td>');
				print('</tr>');
				print('<tr>');
				print('<td>Email</td><td>:</td><td>'.$cat->mc_email.'</td>');
				print('</tr>');
			    print('<tr>');
				print('<td>Address</td><td>:</td><td>'.$cat->mc_address.'</td>');
                print('</tr>');
                
                
               
			
			
		
				
				print('</table>');

			}
			else
				'No Contact found';
		}

    }
    




	public function socialmedia_info()
	{
         $data['breadcrumb'] = array("title"=>'<i class="fa fa-address-card"></i> Social Media',"links"=>array("Home"=>"#","Social Media"=>"#"));
       
        $data['cinfo'] = $this->Main->getData("tbl_main_contact");
        $data['icons'] = social_media();
        if(!empty($data['cinfo']))
        {
            $data['sm'] = json_decode($data['cinfo'][0]->mc_social_media);
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
            $param['mc_social_media'] = json_encode($resArray);
			if(empty($cinfo))
			{
				
				if($this->Main->insert($param,'tbl_main_contact'))
					$res = array("res"=>1,"msg"=>'Social media Added');
				else
					$res = array("res"=>0,"msg"=>'Failed to add social media');
			}
			else
			{
				$cid = $cinfo[0]->mc_id;
				if($this->Main->update($param,'tbl_main_contact',array("mc_id"=>$cid)))
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
                $res = array("res"=>0,"msg"=>'Invalid URL');
                return FALSE;
            } 
            else 
            {
                return TRUE;
            }
        }
        echo json_encode($res);
    } 
	
    
}