<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct();
		$this->load->Model('Homemodel');
    }
	public function index()
	{
		$data['slider'] =  $this->Main->getDetailedData(array('s_id','s_image','s_title','s_desc','s_discount_price','s_original_price','s_url','s_offer'),'tbl_slider',array('s_status'=>'1'),null,null,array("s_id","asc"));
		$data['top_product'] =  $this->Main->getDetailedData(array('id','title','des','image','link'),'tb_homepage_top_products',null,null,null,array("id","asc"));
		$data['featured_products'] =$this->Main->getDetailedData(array('id','title','dis_rate','org_rate','image','link'),'tbl_featured_products',null,null,null,array("id","asc"));
		$data['best_seller'] = $this->Main->getDetailedData(array('id','title','dis_rate','org_rate','image'),'home_best_sellers',null,null,null,array("id","asc"));
		
		$count_featured_products = count($data['featured_products']);
		
		$data['count_featured_limit'] = ceil($count_featured_products/4);

		$data['Active']='I';
		// print_r($data['count_featured_limit']);exit;
		$this->load->view('front/index',$data);
	}

	public function listing()
	{
		$data['Active']='L';
		$cond = array('m.c_status'=>'1');
        $categoryData = $this->Main->getDetailedData('m.c_id as main_cat_id, m.c_category as main_cat,m.c_slug main_slug,m.c_parent_id,s.c_category as sub_cat,s.c_slug sub_slug','tbl_category m',$cond,null,null,array('m.c_id','asc'),array(array('tbl_category s','m.c_id=s.c_parent_id','left')));
   
        if(!empty($categoryData)) 
        {
            $category = array();
            $maincat_ar = array();
            $subcat_ar = array();
            foreach ($categoryData as $key => $value) 
            {   
                if(empty($value->c_parent_id) || $value->c_parent_id==null)
                {
                    $maincat_ar[$value->main_cat] = array("slug"=>$value->main_slug,"id"=>$value->main_cat_id);
                }
                if(!empty($value->sub_cat))
                {
                    $subcat_ar[$value->main_cat_id][] = (array)array("c_category"=>$value->sub_cat,"c_slug"=> $value->sub_slug);
                }
            }
            if(!empty($maincat_ar))
            {
                foreach($maincat_ar as $index=>$m)
                {
                    $sss = !empty($subcat_ar[$m['id']]) ? $subcat_ar[$m['id']] : null;
                    $category[] = array("cat"=>$index,"slug"=>$m['slug'],"id"=>$m['id'],"subcat"=>$sss);
                }
            }
           
        } 
        $data['categoryData'] = $category;
		$data['products'] = $this->Main->getDetailedData(array('p_id','p_image','p_slug','p_title','p_original_price','p_discound_price'),'tbl_products',null,null,null,array("p_id","desc"));

   		$data['page_count'] = ceil(count($data['products'])/9);
		$this->load->view('front/listing',$data);
	}


	public function product_detail($slug)
	{
		$data['Active']='L';
		$data['slug']=$slug;
		$data['pr_cart_status']=0;

		$cond = array('p_slug'=>$slug);
        $productData = $this->Main->getDetailedData(array('p_id','p_image','p_desc','p_category','p_offer','p_slug','p_title','p_original_price','p_discound_price'),'tbl_products',$cond,null,null,array("p_id","desc"));
   		$data['products'] = $productData[0];
		$cat_id = $data['products']->p_category;
		$product_id = $data['products']->p_id;

		if(!empty($this->session->get_userdata("lg_user")['lg_user']['user_id']))
        {
			$sss = $this->session->get_userdata("lg_user");                
            $r_id = enc($sss['lg_user']['user_id'] ,'d'); 
			$cond = array('c.c_p_id'=>$product_id);
			$chk_pr_cart = $this->Main->getDetailedData('c.*,o.*','tbl_order o',$cond,null,null,array('c.c_p_id','asc'),array(array('tbl_cart c','c.c_o_id=o.o_id','left')));
			if(!empty($chk_pr_cart))
			{
				$data['pr_cart_status']=1;
			}
			else
			{
				$data['pr_cart_status']=0;
			}
			// print_r($data['pr_cart_status']);exit;
		}
		else if(!empty($this->session->get_userdata("guest_cart")['guest_cart']))
		{
		   $g_cart = $this->session->get_userdata("guest_cart")['guest_cart'];
		   foreach($g_cart as $gc)
		   {
			   if($gc['c_p_id'] == $product_id)
			   {
				$data['pr_cart_status']=1;
			   }

		   }
		//    print_r($product_id);
		//    p($g_cart);
		}
		else
		{
			$data['pr_cart_status']=0;
		}

		// $cond1 = array('m.c_id'=>$cat_id);
        // $categoryData = $this->Main->getDetailedData('m.c_id as main_cat_id, m.c_category as main_cat','tbl_category m',$cond1,null,null,array('m.c_id','asc'));

		$cond3 = array('p_category'=>$cat_id);
        $data['catproductData'] = $this->Main->getDetailedData(array('p_id','p_image','p_desc','p_category','p_offer','p_slug','p_title','p_original_price','p_discound_price'),'tbl_products',$cond3,4,null,array("p_title","desc"));
		// print_r($catproductData);exit;
		$this->load->view('front/product_detail',$data);
	}

	public function cat_detail($slug)
	{
		$data['Active']='L';
		$cond = array('m.c_status'=>'1');
        $categoryData = $this->Main->getDetailedData('m.c_id as main_cat_id, m.c_category as main_cat,m.c_slug main_slug,m.c_parent_id,s.c_category as sub_cat,s.c_slug sub_slug','tbl_category m',$cond,null,null,array('m.c_id','asc'),array(array('tbl_category s','m.c_id=s.c_parent_id','left')));
   
        if(!empty($categoryData)) 
        {
            $category = array();
            $maincat_ar = array();
            $subcat_ar = array();
            foreach ($categoryData as $key => $value) 
            {   
                if(empty($value->c_parent_id) || $value->c_parent_id==null)
                {
                    $maincat_ar[$value->main_cat] = array("slug"=>$value->main_slug,"id"=>$value->main_cat_id);
                }
                if(!empty($value->sub_cat))
                {
                    $subcat_ar[$value->main_cat_id][] = (array)array("c_category"=>$value->sub_cat,"c_slug"=> $value->sub_slug);
                }
            }
            if(!empty($maincat_ar))
            {
                foreach($maincat_ar as $index=>$m)
                {
                    $sss = !empty($subcat_ar[$m['id']]) ? $subcat_ar[$m['id']] : null;
                    $category[] = array("cat"=>$index,"slug"=>$m['slug'],"id"=>$m['id'],"subcat"=>$sss);
                }
            }
           
        } 
        $data['categoryData'] = $category;

		$cond1 = array('m.c_slug'=>$slug);
        $slug_categoryData = $this->Main->getDetailedData('m.c_id as main_cat_id,m.c_slug main_slug, m.c_category as main_cat','tbl_category m',$cond1,null,null,array('m.c_id','asc'));

		$catm_id =  $slug_categoryData[0]->main_cat_id;
		$data['main_cat'] = $slug_categoryData[0]->main_cat;
		$cond2 = array('p_category'=>$catm_id);
		$data['products'] = $this->Main->getDetailedData(array('p_id','p_image','p_slug','p_title','p_original_price','p_discound_price'),'tbl_products',$cond2,null,null,array("p_id","desc"));
		// print_r($data['products']);exit;
		if(!empty($data['products']))
		{
			$data['page_count'] = ceil(count($data['products'])/9);
		}
   		
		$this->load->view('front/cat_detail',$data);
	}

	public function register()
	{
		$data['Active']='R';
		$this->load->view('front/register',$data);
	}

	public function registeraction()
	{
	    $data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
		$this->form_validation->set_rules('ph_no','Phone','required|trim');
		$this->form_validation->set_rules('r_email','Email','required|trim|valid_email|is_unique[user.username]');
		$this->form_validation->set_rules('address_one','Address 1','required|trim');
		$this->form_validation->set_rules('address_two','Address 2','required|trim');
		$this->form_validation->set_rules('city','City','required|trim');
		$this->form_validation->set_rules('state','State','required|trim');
		$this->form_validation->set_rules('zip','Zip Code','required|trim');
		$this->form_validation->set_rules('r_country','Country','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {
                // print_r($this->input->post('fname'));exit;
        	   $data['r_first_name'] = $this->input->post('fname');
        	   $data['r_last_name'] = $this->input->post('lname');        	   
        	   $data['r_email'] = $this->input->post('r_email');
			   $data['r_phone'] = $this->input->post('ph_no');
			   $data['r_password'] = enc($this->input->post('password'));
			   $data['r_otp'] = rand(1000,9999);
			   $data['r_type'] = '1';
			   $data['r_status'] = '2';

        	   $data['address_one'] = $this->input->post('address_one');        	   
        	   $data['address_two'] = $this->input->post('address_two');
        	   $data['city'] = $this->input->post('city');
        	   $data['state'] = $this->input->post('state');
        	   $data['zip'] = $this->input->post('zip');
        	   $data['country'] = $this->input->post('r_country');
        	   
        	   
        	   
        	   
               

               $data1['add_name'] = $this->input->post('fname')." ".$this->input->post('lname');
        	   $data1['add_phone'] = $this->input->post('ph_no');
        	   $data1['add_line1'] = $this->input->post('address_one');        	   
        	   $data1['add_line2'] = $this->input->post('address_two');
        	   $data1['add_city'] = $this->input->post('city');
        	   $data1['add_state'] = $this->input->post('state');
        	   $data1['add_zip'] = $this->input->post('zip');
        	   $data1['add_country'] = $this->input->post('r_country');
			   $data1['add_status'] = '1';


        	//    if( $this->send_otp($data,'Hello'.$data['name']))

            if( $this->db->insert('tbl_register',$data))
	            {
	                $l_id = $this->db->insert_id();
                    $data1['add_user'] = $l_id;
                    $this->db->insert('tbl_address',$data1);
        	      
        	        $res = array("res"=>1,"msg"=>"OTP send to mail","l_id"=>enc($l_id));
        	   }
        	   else
        	   {
        	       $res = array("res"=>0,"msg"=>"something wrong");
        	   }
            }
            
		echo json_encode($res);
	  
	}

	public function send_otp($param,$subject)
	{
	 
		$this->load->library('email');
		$config = array();
        $config = Array(
			  'protocol' => 'sendmail',
			  'smtp_host' => '',
			  'smtp_port' => 25,
			  'smtp_user' => 'localhost', // change it to yours
			  'smtp_pass' => '', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);
    		$this->email->initialize($config);   
            $this->email->set_newline("\r\n");
			$from_email = 'info@sgs.co.uk';
		   
		    $toemail = $param['email'];
	 	
			$msubject = 'Registration Details';
			$data = array(
			'name'=> $param['name'],
			'contactno'=> $param['contact'],
			'email' => $param['email'],
			'otp' => $param['otp']
				);           

		$this->email->from($from_email, 'SGS');
	    $this->email->subject($msubject);
	     $this->email->to($toemail);

        $body = $this->load->view('emails/templ.php',$data,TRUE);
        //echo  $body;
        //$body ='test';
        $this->email->message($body);  
        if($this->email->send())
        {
    	return true;
        }
		else
		{
			return false;
		}
	}


    public function register_otp_confirm()
	{
	    $data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('r_id','Some','required|trim');
		$this->form_validation->set_rules('r_otp','Otp','required|trim');
		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {
               $r_id =  enc($this->input->post('r_id'),'d');
               $r_otp =  $this->input->post('r_otp');
               $r_array= $this->Main->getSingleRegister($r_id);
            //   print_r($r_array);exit;
               $r_tbl_otp =$r_array->r_otp;
               $email =$r_array->r_email;
               if($r_tbl_otp == $r_otp)
               {
                    // $data['r_id'] = $this->input->post('r_id');
        	        $data['r_status'] = '1';
                    $data['username'] = $email;
                    $data['r_unique'] = $this->input->post('r_id');
        	        if($this->Main->update_userotpstatus($data,$r_id))
        	        {
        	            $res = array("res"=>1,"msg"=>"Registration success",);
        	        }
        	        else
                    {
                        $res = array("res"=>0,"msg"=>"something wrong");
                    }
        	        
               }
               else
        	   {
        	       $res = array("res"=>0,"msg"=>"otp wrong");
        	   }
            }
            
            echo json_encode($res);
	  
	}

	public function user_profile()
	{
		// print_r($this->session->get_userdata("lg_user")['lg_user']['name']);exit;
		$sss = $this->session->get_userdata("lg_user");
		if(!empty($sss['lg_user']['user_id']))
		{
		$user_id = enc($sss['lg_user']['user_id'] ,'d');
		}
		if(empty($user_id))
		{
			redirect('user-login');
		}
		else
		{
			$data['r_array']= $this->Main->getSingleRegister($user_id);
			$data['address_array']= $this->Main->getAddresslist($user_id);
			$active_add = $this->Main->getActiveaddresslist($user_id);
			if(!empty($active_add))
			{
				$data['active_address_array'] = $active_add[0];
			}
			
			// print_r($data['active_address_array']);exit;
			$this->load->view('front/user_profile',$data);
		}
		
	}

	public function addressget()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('crnt_id','Some','required|trim');
		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {
				$sss = $this->session->get_userdata("lg_user");
				$r_id = enc($sss['lg_user']['user_id'] ,'d');

				$add_data['add_status'] = '2';
				$this->Main->updateuseraddressstatus($add_data,$r_id);

                $r_array=array();
                $crnt_id = $this->input->post('crnt_id');
				$ad_ar = explode("-",$crnt_id);
				$ad_id = $ad_ar['1'];
				$param['add_status'] = '1';
                $this->Main->updateuser_active_addressstatus($param,$ad_id);
                $r_array= $this->Main->getOneaddress($ad_id);
                // print_r($r_array);exit;
               if(!empty($r_array))
               {
					$res = array("res"=>1,"msg"=>"address found","result"=>$r_array['0']); 
                   
               }
               else
        	   {
        	       $res = array("res"=>0,"msg"=>"not found any address");
        	   }
               
            }
            
		echo json_encode($res);
		
	}

	public function profileupdateaction()
	{
	    $data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
		$this->form_validation->set_rules('phone','Phone','required|trim');

		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {
        	   $data['r_first_name'] = $this->input->post('fname');
        	   $data['r_last_name'] = $this->input->post('lname');
        	   $data['r_phone'] = $this->input->post('phone');
               $sss = $this->session->get_userdata("lg_user");
               $r_id = enc($sss['lg_user']['user_id'] ,'d');
                if( $this->Main->update_userotpstatus($data,$r_id))
	            {
        	      
        	        $res = array("res"=>1,"msg"=>"Profile Updated","result"=>$data);
                }
                else
                {
                    $res = array("res"=>0,"msg"=>"something wrong");
                }
            }
            
		echo json_encode($res);
	  
	}

    public function add_address()
	{
	    $data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('a_fullname','First Name','required|trim');
		$this->form_validation->set_rules('a_phone','Phone','required|trim');
		$this->form_validation->set_rules('a_address_one','Address One','required|trim');
        $this->form_validation->set_rules('a_address_two','Address Two','required|trim');
		$this->form_validation->set_rules('a_city','City','required|trim');
		$this->form_validation->set_rules('a_state','State','required|trim');
        $this->form_validation->set_rules('a_zip','Zip Code','required|trim');
		$this->form_validation->set_rules('a_country','Country','required|trim');

		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {			   
               $sss = $this->session->get_userdata("lg_user");
			  // print_r($sss);
               $r_id = enc($sss['lg_user']['user_id'] ,'d');

			   $add_data['add_status'] = '2';
			   $this->Main->updateuseraddressstatus($add_data,$r_id);

               $a_id = $this->input->post('a_id');
               
        	   $data['add_name'] = $this->input->post('a_fullname');
        	   $data['add_phone'] = $this->input->post('a_phone');
        	   $data['add_line1'] = $this->input->post('a_address_one');
               $data['add_line2'] = $this->input->post('a_address_two');
        	   $data['add_city'] = $this->input->post('a_city');
        	   $data['add_state'] = $this->input->post('a_state');
        	   $data['add_zip'] = $this->input->post('a_zip');
        	   $data['add_country'] = $this->input->post('a_country');
			   $data['add_user'] = $r_id;
			   $data['add_status'] = '1';

               if(!empty($a_id))
               {
                    if( $this->Main->updateuseraddress($data,$a_id))
                    {
                    
                        $res = array("res"=>1,"msg"=>"Address Updated");
                    }
                    else
                    {
                        $res = array("res"=>0,"msg"=>"something wrong");
                    }

               }
               else
               {
                    if( $this->db->insert('tbl_address',$data))
                    {
                    
                        $res = array("res"=>1,"msg"=>"New Address Added");
                    }
                    else
                    {
                        $res = array("res"=>0,"msg"=>"something wrong");
                    }
                   
               }
               
                
            }
            
		echo json_encode($res);
	  
	}

	public function add_delete()
	{
	    $data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('crnt_id','Some','required|trim');

		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {			 
				$sss = $this->session->get_userdata("lg_user");
                $r_id = enc($sss['lg_user']['user_id'] ,'d');  
               $a_id = $this->input->post('crnt_id');
               

               if(!empty($a_id))
               {
                    if( $this->Main->deleteuseraddress($a_id))
                    {
						$frst_add = $this->Main->updateuserfirstaddress($r_id);
						$frst_add_id = $frst_add[0]->add_id;

						$param['add_status'] = '1';
                		$this->Main->updateuser_active_addressstatus($param,$frst_add_id);

                        $res = array("res"=>1,"msg"=>"Address Deleted");
                    }
                    else
                    {
                        $res = array("res"=>0,"msg"=>"something wrong");
                    }

               }
               else
               {
                        $res = array("res"=>1,"msg"=>"Some error Occured");
                    
               }
               
                
            }
            
		echo json_encode($res);
	  
	}

	public function aboutus()
	{
		$data['Active']='A';
		$data['about'] = $this->Homemodel->getAbout();
		$this->load->view('front/about_us',$data);
	}
	public function contactus()
	{
		$data['Active']='C';
		$this->load->view('front/contact_us',$data);
	}
	public function services()
	{
		$data['Active']='S';
		$data['service'] = $this->Homemodel->getServicepgae();
		$this->load->view('front/services',$data);
	}
	
	





	


	public function contact_act()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div style="color:red;" >', '</div>');
		$this->form_validation->set_rules('name','Name','required|min_length[3]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('message','Message','required');
		if ($this->form_validation->run() == FALSE) 
		{
				$errors = $this->form_validation->error_array();
				$res = array("res"=>0,"errors"=>$errors);
		}
		else
		{
			$this->load->model('Main');
			$data = array(
				'c_name' =>$this->input->post('name'),
				'c_email' =>$this->input->post('email'),
				'c_phone' =>$this->input->post('phone'),
				'c_subject' =>$this->input->post('subject'),
				
				'c_msg' =>$this->input->post('message'),
				'c_status' =>'1'
			);
            
            // $sentmailchk=$this->send_contact($this->input->post('name'),$this->input->post('phone'),$this->input->post('email'),$this->input->post('subject'),$this->input->post('message'));
			if ($this->Main->insert($data,'vd_contact') )  //&&  $sentmailchk == true
				{  
					
					$res = array("res"=>1,"msg"=>"Thank you! We will be in touch as soon as possible.");

					
				}
				else
				{

					$res = array("res"=>0,"msg"=>"something wrong");

				}
				
			
		}
      echo json_encode($res);
	}


    public function send_contact($name,$contactno,$email,$subject,$mesg)
	{
		$this->load->library('email');

			$config = array();
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'mail.greathimalayas.co.uk';
			$config['smtp_port']    = '587';
			$config['smtp_timeout'] = '7';
			$config['smtp_user']    = "info@greathimalayas.co.uk";
			$config['smtp_pass']    = "&0vC0PPfeH~,";
			$config['charset']    = 'iso-8859-1';
			$config['mailtype'] = 'html'; 
			$config['validation'] = TRUE;

    		$this->email->initialize($config);   

			$from_email = 'info@greathimalayas.co.uk';
			$toemail = 'steevothomas123@gmail.com';
			$subject = 'Contact details';
			$data = array(
			'name'=> $name,
			'contactno'=> $contactno,
			'email' => $email,
			'subject' => $subject,
			'mesg' => $mesg
				);           
		
		$this->email->from($from_email, 'Contact Details');
        $this->email->to($toemail);
        $this->email->subject($subject);

        $body = $this->load->view('emails/templ.php',$data,TRUE);
        $this->email->message($body);  
       if($this->email->send())
        {
            // echo "123";
			return true;
			// redirect('/main');
        }
		else
		{
			//	echo $this->email->print_debugger();
			return false;
		}
	}

	public function index_contact_act()
	{
		// print_r($this->input->post());exit;
		$this->load->library('form_validation');      
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('type','Type','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('phone','Phone','required|trim');
		if(!$this->form_validation->run())
        {    
            $res['res']=0;        
            $res['errors']=$this->form_validation->error_array();
                      
        }
        else
        {
			$param['c_type'] = $this->input->post('type'); 			 
			$param['c_name'] = $this->input->post('name');
			$param['c_email'] = $this->input->post('email');
			$param['c_phone'] = $this->input->post('phone');
			$param['c_status'] ='3';
			

			if($this->Homemodel->insert_formresult($param))
			{
				
				$res = array("res"=>1,"msg"=>'Thank you! We will be in touch as soon as possible.');
				
			}
			else
			{
				$res = array("res"=>0,"msg"=>'something wrong');
			}
			
			
	    }
			 echo json_encode($res);
	}
	public function searchinmenu()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('search_val','Some','required|trim');
		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {

               $search_val = $this->input->post('search_val');
			   $data =array();
			   $data = $this->Main->search_query($search_val);
			//    print_r($data[0]->p_slug);exit;

			

               if(!empty($data))
               {
					$url = "product-detail/".$data[0]->p_slug;
					$res = array("res"=>1,"msg"=>"Your result is ready","result"=>($data),"slug"=>$url); 
                   
               }
               else
        	   {
        	       $res = array("res"=>0,"msg"=>"not found any product");
        	   }
               
            }
            
		echo json_encode($res);
		
	}
}