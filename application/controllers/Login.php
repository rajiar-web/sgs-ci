<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('Main');
        date_default_timezone_set('asia/kolkata');
        // $this->load->library('facebook'); 
        // include_once APPPATH . "third_party/google-login/autoload.php";
        // $this->load->config('glogin');
    }


	public function log_action()
	{
	    $data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','required|trim|valid_email');
		$this->form_validation->set_rules('pwd','Password','required|trim');
		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {
                $r_array=array();
                $c_email = $this->input->post('username');
                $c_pwd = $this->input->post('pwd');
                
                $r_array= $this->Main->getSingleRegisterbyemail($c_email);
                // print_r(enc($r_array->password ,'d'));exit;
               if(!empty($r_array))
               {
                   if(enc($r_array->r_password ,'d') == $c_pwd )
                   {
                       $data['name'] = $r_array->r_first_name;
                	   $data['username'] =$r_array->username;
                	   $data['user_id'] = $r_array->r_unique;

                	   
                	   $this->session->set_userdata("lg_user",$data);
                	   
                	   $res = array("res"=>1,"msg"=>"successfully login");
                       
                   }
                   else
            	   {
            	       $res = array("res"=>0,"msg"=>"Password not correct");
            	   }

               }
               else
        	   {
        	       $res = array("res"=>0,"msg"=>"not found any user by this email");
        	   }
               
            }
            
		echo json_encode($res);
	  
	}


	public function forget_password()
	{
	    $data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('forget_pwd','Enter Email','required|trim|valid_email');
		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors);
    			
    		}
		 else
            {
                $r_array=array();
                $c_email = $this->input->post('forget_pwd');
                // $c_email = "steevothomas123@gmail.com";
                
                $r_array= $this->Main->getSingleRegisterbyemail($c_email);
                // print_r($r_array);exit;
               if(!empty($r_array))
               {
                   $data['name'] = $r_array->r_first_name;
            	   
            	   $data['contact'] =$r_array->r_phone;
            	   $data['email'] =$r_array->r_email;
            	   $data['password'] = enc($r_array->r_password ,'d');
                   if( $this->send_password($data,'Hello'.$data['name']))
    	            {
            	        $res = array("res"=>1,"msg"=>"successfully sent",);
                       
                   }
                   else
            	   {
            	       $res = array("res"=>0,"msg"=>"something wrong");
            	   }
                   
               }
               else
        	   {
        	       $res = array("res"=>0,"msg"=>"not found any user by this email");
        	   }
               
            }
            
		echo json_encode($res);
	  
	}


	public function send_password($param,$subject)
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
			'password' => $param['password']
				);           

		$this->email->from($from_email, 'SGS');
	    $this->email->subject($msubject);
	     $this->email->to($toemail);

        $body = $this->load->view('emails/templ_password.php',$data,TRUE);
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

	

	function user_logout()
	{
		if($this->session->userdata('lg_user'))
		{
			$this->session->unset_userdata('lg_user');
		}
		redirect('user-login');
	}

	function chagepass_action()
	{ 

			$this->load->library('form_validation');
			$this->form_validation->set_rules('cpass','Current Password','required');
			$this->form_validation->set_rules('npass','New Password','required|min_length[8]');
			$this->form_validation->set_rules('conpass','Confirm Password','required|matches[npass]|min_length[8]');
			if(!$this->form_validation->run())
			{
				$errors = $this->form_validation->error_array();
				$arr = array("res"=>0,"errors"=>$errors);
			}
			else
			{
				$form_cpass = $this->input->post('cpass');
				

				$sss = $this->session->get_userdata("lg_user");
                $r_id = enc($sss['lg_user']['user_id'] ,'d');
				$r_array= $this->Main->getSingleRegister($r_id);
				$crnt_pass  = enc($r_array->r_password,'d');

				// print_r($crnt_pass);exit;

				if($crnt_pass == $form_cpass)
				{
					$new_pwd = $this->input->post('npass');
					$new_enc_pwd = enc($new_pwd);
					$params['r_password'] = $new_enc_pwd;
					
					if($this->Main->update_userotpstatus($params,$r_id))
						$arr = array("res"=>1,"msg"=>'Successfully changed your password!.');
					else
						$arr = array("res"=>0,"msg"=>'Failed to change your password. Try again!!!');
					
				}
				else
				{
					$arr = array("res"=>0,"msg"=>'Current Password is Wrong | Try again!!!');
					
				}
				

				
			}
			echo json_encode($arr);
	}

	public function recaptcha($str='')
	{
		$google_url="https://www.google.com/recaptcha/api/siteverify";
		$secret='6LdCCcIUAAAAAEKy589Ok8X40G-gUFLK2ItCgzIa';
		$ip=$_SERVER['REMOTE_ADDR'];
		$url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
		$res = curl_exec($curl);
		curl_close($curl);
		$response= json_decode($res, true);

		//reCaptcha success check
		if($response['success'])
		{

			return TRUE;
		}
		else
		{

			$this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
			return FALSE;
		}
	}

	

}
