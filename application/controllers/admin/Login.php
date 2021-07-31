<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() 
	{
        parent::__construct();
        $this->load->library('Enc');
    }
	public function index()
	{
		if($this->session->userdata('user_log'))
		{
			redirect('dashboard');
		}
		else
		$this->load->view('admin/login');
		
	}
	function laction()
	{
		$this->load->library('form_validation');
          
        $this->form_validation->set_rules('login_username','User Name','required|trim');
        $this->form_validation->set_rules('login_password','Password','required|trim');
        if(!$this->form_validation->run())
        {
            $errors = $this->form_validation->error_array();
            $res = array("res"=>0,"errors"=>$errors);
        }
        else
        {
        	$this->load->model('Main');
        	$username = $this->input->post('login_username');
        	$password = $this->input->post('login_password');
          
			
			$login_data = $this->Main->checkUser($username);
			
			if(empty($login_data))
			{
				$res = array("res"=>0,"msg"=>('Invalid user/password. Try again!'));
			}
			else
			{
				
				$unique = $login_data[0]->unique_id;
				$upassword = $this->enc->encrypt_pwd($unique,$password);
				
				if(empty(strcmp($upassword, $login_data[0]->password)))
				{
					$sess['uname'] = $login_data[0]->username;
					$sess['logid'] = $login_data[0]->login_id;
					//$sess['uid'] = $login_data[0]->user;
					$sess['token'] = md5(rand(1000,20000));
					$sess['type'] = $login_data[0]->user_type;
					
					$this->session->set_userdata("user_log",$sess);
					$url = 'dashboard';//$this->uri->segment(1).!empty($this->uri->segment(2)?'/'.$this->uri->segment(2):"");

					
					
					$res = array("res"=>1,"msg"=>'Successfully logged in!',"url"=>$url);

				}
				else
				{
					$res = array("res"=>0,"msg"=>'Invalid user/password. Try again!');
				}
				
			}
	    }
	        echo json_encode($res);
	}
	function admin_logout()
	{
		if($this->session->userdata('user_log'))
		{
			$this->session->unset_userdata('user_log');
		}
		redirect('login');
	}

	function change_password()
	{
		checkSess();
		$query = $this->db->get("login"); 
		$data['records'] = $query->result(); 
		$data['breadcrumb'] = array("title"=>"Change password","links"=>array("Home"=>"#","Change password"=>"#"));
		
		
		//$decrypted_string = $this->encrypt->decode($encrypted_password, $key);
        $this->load->view('admin/change_password',$data); 

	}

	function password_action()
	{
		checkSess();
		$this->load->library('form_validation');
          
        $this->form_validation->set_rules('currentpassword','Current Password','required|trim');
		$this->form_validation->set_rules('newpassword','New Password','required|trim|min_length[4]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','required|trim|min_length[4]|matches[newpassword]');
        if(!$this->form_validation->run())
        {
            $errors = $this->form_validation->error_array();
            $res = array("res"=>0,"errors"=>$errors);
        }
        else
        {
        	$this->load->model('Main');
        	$currentpassword = $this->input->post('currentpassword');
			$newpassword = $this->input->post('newpassword');
		    $confirmpassword=$this->input->post('confirmpassword');
			$id=$this->input->post('cid');
			
			
			$this->db->where('login_id',$id);
			$query = $this->db->get("login")->result();
			
			
			$unique = $query[0]->unique_id;
			$upassword = $this->enc->encrypt_pwd($unique,$currentpassword);
			$npassword = $this->enc->encrypt_pwd($unique,$newpassword);
		//print_r($upassword);

			$login_data = $this->Main->checkpassword($upassword,$id);

			if(empty($login_data))
			{
				$res = array("res"=>0,"msg"=>('Invalid current password. Try again!'));
			}
			else
			{
				
				if($this->Main->update_password($npassword,$id))
					$res = array("res"=>1,"msg"=>'Password changed');
				else
					$res = array("res"=>0,"msg"=>'Failed to edit password');
			}
	    }
	        echo json_encode($res); 

	}
}
