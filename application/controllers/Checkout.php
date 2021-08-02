<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct();
		$this->load->Model('Homemodel');
    }  

    function index(){

        $data['cart_list'] =array();
        $sss = $this->session->get_userdata("lg_user");
        if(!empty($sss['lg_user']['user_id']))
        {
            $user_id = enc($sss['lg_user']['user_id'] ,'d');
            $cond = array('o.o_r_id'=>$user_id);
            $chk_pr_cart = $this->Main->getDetailedData('c.*,o.*,p.*','tbl_order o',$cond,null,null,array('c.c_p_id','asc'),array(array('tbl_cart c','c.c_o_id=o.o_id','left'),array('tbl_products p','p.p_id=c.c_p_id','left')));

            foreach($chk_pr_cart as $cpc)
            {
                $info['c_totprice'] = $cpc->c_totprice;
                $info['c_to_mrp'] = $cpc->c_totprice + $cpc->c_discount;
                $info['c_qty'] = $cpc->c_qty;
                $info['p_title'] = $cpc->p_title;
                $info['p_image'] = $cpc->p_image;
                $info['p_slug'] = $cpc->p_slug;

                $info['p_original_price'] = $cpc->p_original_price;
                $info['p_discound_price'] = $cpc->p_discound_price;

                $info['o_subtotal'] = $cpc->o_subtotal;

                array_push($data['cart_list'],$info);
            }

        }
        else if(!empty($this->session->get_userdata("guest_cart")['guest_cart']))
        {
            $chk_pr_cart = $this->session->get_userdata("guest_cart")['guest_cart'];
            $chk_pr_order = $this->session->get_userdata("guest_cart")['guest_order'];

            foreach($chk_pr_cart as $cpc)
            {
                $info['c_totprice'] = $cpc['c_totprice'];
                $info['c_to_mrp'] = $cpc['c_totprice'] + $cpc['c_discount'];
                $info['c_qty'] = $cpc['c_qty'];

                $cond = array('p_id'=>$cpc['c_p_id']);
                $productData = $this->Main->getDetailedData(array('p_id','p_image','p_desc','p_category','p_offer','p_slug','p_title','p_original_price','p_discound_price'),'tbl_products',$cond,null,null,array("p_id","desc"));
           

                $info['p_title'] = $productData[0]->p_title;
                $info['p_image'] = $productData[0]->p_image;
                $info['p_slug'] = $productData[0]->p_slug;

                $info['p_original_price'] = $productData[0]->p_original_price;
                $info['p_discound_price'] = $productData[0]->p_discound_price;

                $info['o_subtotal'] = $chk_pr_order[0]['o_subtotal'];

                array_push($data['cart_list'],$info);
            }
        }
        else
        {
            $data['cart_list'] = "";
        }

        $this->load->view('front/checkout-page',$data);
    }

 function placeorderAction(){
        $order_data = $this->session->userdata('guest_order');
        $log_user = $this->session->userdata('lg_user');
        $username = $log_user['username'];

        $addressData = $this->Main->getDetailedData(array('a1.add_id'),'tbl_address a1',array('a2.username'=>$username),null,null,null,array(array('tbl_register a2','a2.r_id=a1.add_user','left')));

        if(!empty($addressData) && !empty($order_data)){

            $oData['ch_order'] = $order_data[0]['o_id'];
            $oData['ch_amount'] = $order_data[0]['o_grandtotal'];
            $oData['ch_address'] = $addressData[0]->add_id;

            if($this->Main->insert($oData,'tbl_checkout'))
            { 
              $cartData = $this->Main->getDetailedData(array('a1.c_id'),'tbl_cart a1',array('a1.c_o_id'=>$order_data[0]['o_id']),null,null,null,array(array('tbl_order a2','a2.o_id=a1.c_o_id','left')));

               foreach ($cartData as $value) {
                   $this->Main->update(array('c_status'=>'2'), 'tbl_cart', array('c_id'=>$value->c_id));
               }
                    
                $this->Main->update(array('o_status'=>'2'), 'tbl_order', array('o_id'=>$order_data[0]['o_id']));
                
                $this->session->unset_userdata('guest_order');
                $this->session->unset_userdata('guest_cart');

                $res = array('res'=>1,'msg'=>'Success');
            }
            else
                $res = array('res'=>0,'msg'=>'something went wrong');

        }
        else
            $res = array('res'=>0,'msg'=>'something went wrong');
        
        echo json_encode($res);
    }

    function log2Action(){
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

               if(!empty($r_array))
               {
                   if(enc($r_array->r_password ,'d') == $c_pwd )
                   {
                       $data['name'] = $r_array->r_first_name;
                       $data['username'] =$r_array->username;
                       $data['user_id'] = $r_array->r_unique;

                        
                       $guest_order = $this->session->userdata('guest_order');
                       $guest_cart = $this->session->userdata('guest_cart');

                       if(!empty($guest_order) && !empty($guest_cart)){
                        $this->db->trans_start();
                        $orderdata['o_r_id'] = $r_array->r_id;
                        $orderdata['o_status'] = $guest_order[0]['o_status'];;
                        $orderdata['o_subtotal'] = $guest_order[0]['o_subtotal'];
                        $orderdata['o_pro_discount'] = $guest_order[0]['o_pro_discount'];
                        $orderdata['o_tax'] = $guest_order[0]['o_tax'];
                        $orderdata['o_grandtotal'] = $guest_order[0]['o_grandtotal'];
                        $orderdata['o_shipping'] = $guest_order[0]['o_shipping'];
                        $orderdata['o_promocode'] = $guest_order[0]['o_promocode'];
                        $orderdata['o_discount'] = $guest_order[0]['o_discount'];
                         
                        $c_o_id = $this->Main->insert($orderdata,'tbl_order');
                         if(!empty($c_o_id)){

                            $guest_order[0]['o_id'] = $c_o_id;
                            $this->session->set_userdata('guest_order',$guest_order);

                        foreach ($guest_cart as $gucart) {
                            $cartdata['c_o_id'] = $c_o_id;
                            $cartdata['c_p_id'] = $gucart['c_p_id'];
                            $cartdata['c_mrp'] = $gucart['c_mrp'];
                            $cartdata['c_price'] = $gucart['c_price'];
                            $cartdata['c_qty'] = $gucart['c_qty'];
                            $cartdata['c_discount'] = $gucart['c_discount'];
                            $cartdata['c_totprice'] = $gucart['c_totprice'];

                            $cartdata_new[] = $cartdata;
                        }

                         $this->Main->batch_insert($cartdata_new,'tbl_cart');
                        }
                         $this->db->trans_complete();
                         if ($this->db->trans_status() === TRUE){
                            $this->session->set_userdata("lg_user",$data);

                            $res = array("res"=>1,"msg"=>"successfully login");
                         }
                          else
                             $res = array("res"=>0,"msg"=>"something went wrong");
                       }else{
                            $this->session->set_userdata("lg_user",$data);
                            $res = array("res"=>1,"msg"=>"successfully login");
                       }
                                         
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

     public function reg2action()
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

            if($this->db->insert('tbl_register',$data))
                {
                    $l_id = $this->db->insert_id();
                    $data1['add_user'] = $l_id;
                    $this->db->insert('tbl_address',$data1);

                       $guest_order = $this->session->userdata('guest_order');
                       $guest_cart = $this->session->userdata('guest_cart');

                       if(!empty($guest_order) && !empty($guest_cart)){
                        $this->db->trans_start();
                        $orderdata['o_r_id'] = $l_id;
                        $orderdata['o_status'] = $guest_order[0]['o_status'];;
                        $orderdata['o_subtotal'] = $guest_order[0]['o_subtotal'];
                        $orderdata['o_pro_discount'] = $guest_order[0]['o_pro_discount'];
                        $orderdata['o_tax'] = $guest_order[0]['o_tax'];
                        $orderdata['o_grandtotal'] = $guest_order[0]['o_grandtotal'];
                        $orderdata['o_shipping'] = $guest_order[0]['o_shipping'];
                        $orderdata['o_promocode'] = $guest_order[0]['o_promocode'];
                        $orderdata['o_discount'] = $guest_order[0]['o_discount'];
                         
                        $c_o_id = $this->Main->insert($orderdata,'tbl_order');
                         if(!empty($c_o_id)){

                        $guest_order[0]['o_id'] = $c_o_id;
                        $this->session->set_userdata('guest_order',$guest_order);

                        foreach ($guest_cart as $gucart) {
                            $cartdata['c_o_id'] = $c_o_id;
                            $cartdata['c_p_id'] = $gucart['c_p_id'];
                            $cartdata['c_mrp'] = $gucart['c_mrp'];
                            $cartdata['c_price'] = $gucart['c_price'];
                            $cartdata['c_qty'] = $gucart['c_qty'];
                            $cartdata['c_discount'] = $gucart['c_discount'];
                            $cartdata['c_totprice'] = $gucart['c_totprice'];

                            $cartdata_new[] = $cartdata;
                        }

                         $this->Main->batch_insert($cartdata_new,'tbl_cart');
                        }
                         $this->db->trans_complete();
                        if($this->db->trans_status() === TRUE)
                          $res = array("res"=>1,"msg"=>"OTP send to mail","l_id"=>enc($l_id));
                        else
                          $res = array("res"=>0,"msg"=>"something went wrong");

                       }else
                          $res = array("res"=>1,"msg"=>"OTP send to mail","l_id"=>enc($l_id));                       
               }
               else
               {
                   $res = array("res"=>0,"msg"=>"something wrong");
               }
            }
            
        echo json_encode($res);
      
    }

     public function register_otp_confirm2()
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
                       $user_data = $this->Main->getData('tbl_register',array('r_id'=>$r_id));
                       if(!empty($user_data)){

                        $sessdata['name'] = $user_data[0]->r_first_name;
                        $sessdata['username'] =$user_data[0]->username;
                        $sessdata['user_id'] = $user_data[0]->r_unique;

                        $this->session->set_userdata("lg_user",$sessdata);
                        $res = array("res"=>1,"msg"=>"Registration success");
                       }
                       else{
                        $res = array("res"=>0,"msg"=>"something wrong");
                       }
                        
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


}
