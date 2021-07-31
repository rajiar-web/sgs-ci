<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct();
		$this->load->Model('Homemodel');
    }

	public function index()
	{
        // $this->session->unset_userdata('guest_cart');
        // $this->session->unset_userdata('guest_order');
        // exit;
        $data['cart_list'] =array();
        $sss = $this->session->get_userdata("lg_user");
        if(!empty($sss['lg_user']['user_id']))
        {
            $user_id = enc($sss['lg_user']['user_id'] ,'d');
            $cond = array('o.o_r_id'=>$user_id);
            $chk_pr_cart = $this->Main->getDetailedData('c.*,o.*,p.*','tbl_order o',$cond,null,null,array('c.c_p_id','asc'),array(array('tbl_cart c','c.c_o_id=o.o_id','left'),array('tbl_products p','p.p_id=c.c_p_id','left')));
            // p($chk_pr_cart);
            if(!empty($chk_pr_cart))
            {
                foreach($chk_pr_cart as $cpc)
                {
                    $info['c_totprice'] = $cpc->c_totprice;
                    $info['c_discount'] = $cpc->c_discount;
                    $info['c_to_mrp'] = $cpc->c_totprice + $cpc->c_discount;
                    $info['c_qty'] = $cpc->c_qty;
                    $info['p_title'] = $cpc->p_title;
                    $info['p_image'] = $cpc->p_image;
                    $info['p_slug'] = $cpc->p_slug;

                    $info['p_original_price'] = $cpc->p_original_price;
                    $info['p_discound_price'] = $cpc->p_discound_price;

                    $info['o_subtotal'] = $cpc->o_subtotal;
                    $info['o_id'] = $cpc->o_id;

                    $info['p_id'] = $cpc->p_id;

                    array_push($data['cart_list'],$info);
                }
            }

            // p($data['cart_list']);
        }
        else if(!empty($this->session->get_userdata("guest_cart")['guest_cart']))
        {
            $chk_pr_cart = $this->session->get_userdata("guest_cart")['guest_cart'];
            $chk_pr_order = $this->session->get_userdata("guest_cart")['guest_order'];
            // p($chk_pr_order[0]['o_subtotal']);
            foreach($chk_pr_cart as $cpc)
            {
                $info['c_totprice'] = $cpc['c_totprice'];
                $info['c_discount'] = $cpc['c_discount'];
                $info['c_to_mrp'] = $cpc['c_totprice'] + $cpc['c_discount'];
                $info['c_qty'] = $cpc['c_qty'];

                $cond = array('p_id'=>$cpc['c_p_id']);
                $productData = $this->Main->getDetailedData(array('p_id','p_image','p_desc','p_category','p_offer','p_slug','p_title','p_original_price','p_discound_price'),'tbl_products',$cond,null,null,array("p_title","desc"));
           

                $info['p_title'] = $productData[0]->p_title;
                $info['p_image'] = $productData[0]->p_image;
                $info['p_slug'] = $productData[0]->p_slug;

                $info['p_original_price'] = $productData[0]->p_original_price;
                $info['p_discound_price'] = $productData[0]->p_discound_price;

                $info['o_subtotal'] = $chk_pr_order[0]['o_subtotal'];
                $info['o_id'] = "0";

                $info['p_id'] = $cpc['c_p_id'];

                array_push($data['cart_list'],$info);
            }
            //  p($data['cart_list']);
        }
        else
        {
            $data['cart_list'] = "";
        }
		$this->load->view('front/cart_page',$data);
	}

    public function add_to_cart()
	{
		$data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('product_id','Some','required|trim');

		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors,"msg"=>"Sorry Some error occurred");
    			
    		}
		 else
            {	
                if(!empty($this->session->get_userdata("lg_user")['lg_user']['user_id']))
                {	
                    $sss = $this->session->get_userdata("lg_user");                
                    $r_id = enc($sss['lg_user']['user_id'] ,'d'); 
                    $tax=0; 

                    $old_order=$this->Main->getDetailedData('o_id ,o_subtotal,o_grandtotal,o_tax,o_pro_discount','tbl_order',array('o_status'=>'1','o_r_id'=>$r_id));
                    // print_r($old_order);exit;

                    if(!empty($old_order))
                    {                        
                        $data_order['o_subtotal'] = $this->input->post('product_tot_price') + $old_order[0]->o_subtotal;
                        $data_order['o_pro_discount'] = $this->input->post('product_dis_price') + $old_order[0]->o_pro_discount;
                        $data_order['o_tax'] = $tax + $old_order[0]->o_tax;
                        $data_order['o_grandtotal'] = $this->input->post('product_tot_price') + $old_order[0]->o_grandtotal;
                        
                    }
                    else
                    {
                        $data_order['o_subtotal'] = $this->input->post('product_tot_price');
                        $data_order['o_pro_discount'] = $this->input->post('product_dis_price');
                        $data_order['o_tax'] = $tax;
                        $data_order['o_grandtotal'] = $this->input->post('product_tot_price');
                    }

                    $data_order['o_r_id'] = $r_id;
                    $data_order['o_status'] = '1';                    
                    $data_order['o_shipping'] = '0';
                    $data_order['o_promocode'] = '0';
                    $data_order['o_discount'] = '0';
                    
                    
                    $data_cart['c_p_id'] = $this->input->post('product_id');
                    $data_cart['c_mrp'] = $this->input->post('product_org_price');
                    $data_cart['c_price'] = $this->input->post('product_base_price');
                    $data_cart['c_qty'] = $this->input->post('product_tot_qty');
                    $data_cart['c_discount'] = $this->input->post('product_dis_price');
                    $data_cart['c_totprice'] = $this->input->post('product_tot_price');

                    $this->db->trans_start();
                        
                        $data_cart['c_status'] = '1';

                        if(!empty($data_order))
                        {
                            if(!empty($old_order))
                            {
                                $o_id = $old_order[0]->o_id;
                                $this->Main->update($data_order,'tbl_order',array("o_id"=>$o_id));
                                $data_cart['c_o_id'] = $o_id;

                            }
                            else
                            {
                                $this->Main->insert($data_order,'tbl_order');
                                $data_cart['c_o_id'] = $this->db->insert_id();
                            }
                            
                        }
                        if(!empty($data_cart))
                        {
                            $this->Main->insert($data_cart,'tbl_cart');
                        }
                    
                    $this->db->trans_complete();
                    if($this->db->trans_status()===true)
					    $res = array("res"=>1,"msg"=>'Items Added To Cart');
				    else
					    $res = array("res"=>0,"msg"=>'Failed to add Item');

               } 
               else
               {
                    $tax=0;

                    if(!empty($this->session->get_userdata("guest_order")))
                    {
                        $old_order = $this->session->get_userdata("guest_order");

                    }
                    else
                    {
                        $old_order = "";
                    }
                    // $this->session->unset_userdata('guest_cart');
                    // $this->session->unset_userdata('guest_order');
                    // print_r($old_order);exit;

                    if(!empty($old_order['guest_order']))
                    {        
                        // print_r($old_order);exit;                
                        $data_order['o_subtotal'] = $this->input->post('product_tot_price') + $old_order['guest_order'][0]['o_subtotal'];
                        $data_order['o_pro_discount'] = $this->input->post('product_dis_price') + $old_order['guest_order'][0]['o_pro_discount'];
                        $data_order['o_tax'] = $tax + $old_order['guest_order'][0]['o_tax'];
                        $data_order['o_grandtotal'] = $this->input->post('product_tot_price') + $old_order['guest_order'][0]['o_grandtotal'];
                        
                    }
                    else
                    {
                        // print_r("hii");exit;
                        $data_order['o_subtotal'] = $this->input->post('product_tot_price');
                        $data_order['o_pro_discount'] = $this->input->post('product_dis_price');
                        $data_order['o_tax'] = $tax;
                        $data_order['o_grandtotal'] = $this->input->post('product_tot_price');
                    }

                    $data_order['o_status'] = '1';                    
                    $data_order['o_shipping'] = '0';
                    $data_order['o_promocode'] = '0';
                    $data_order['o_discount'] = '0';
                    
                    
                    $data_cart['c_p_id'] = $this->input->post('product_id');
                    $data_cart['c_mrp'] = $this->input->post('product_org_price');
                    $data_cart['c_price'] = $this->input->post('product_base_price');
                    $data_cart['c_qty'] = $this->input->post('product_tot_qty');
                    $data_cart['c_discount'] = $this->input->post('product_dis_price');
                    $data_cart['c_totprice'] = $this->input->post('product_tot_price');
                    
                    $data_cart_new = array();
                    
                    if(!empty($old_order['guest_order']))
                    {   
                        $data_cart_new = $this->session->get_userdata("guest_cart")['guest_cart'];
                        array_push($data_cart_new,$data_cart);
                        $data_order_new[] = $data_order;
                    }
                    else
                    {
                        $data_order_new[] = $data_order;
                        $data_cart_new[] = $data_cart;
                    }   

                   

                    $this->session->set_userdata("guest_cart",$data_cart_new);
                    $this->session->set_userdata("guest_order",$data_order_new);
                            
                    //  p($this->session->get_userdata("guest_cart"));
                    
                    $res = array("res"=>1,"msg"=>'Items Added To Cart');
                    
               }

               
                
            }
            
		echo json_encode($res);
	}



    public function remove_from_cart()
	{
		$data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('p_id','Some','required|trim');

		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors,"msg"=>"Sorry Some error occurred");
    			
    		}
		 else
            {	
                if(!empty($this->session->get_userdata("lg_user")['lg_user']['user_id']))
                {	
                    $sss = $this->session->get_userdata("lg_user");                
                    $r_id = enc($sss['lg_user']['user_id'] ,'d'); 
                    $p_id = $this->input->post('p_id');
                    // $cond = array('p_id'=>$p_id);
                    // $productData = $this->Main->getDetailedData(array('p_id','p_image','p_desc','p_category','p_offer','p_slug','p_title','p_original_price','p_discound_price'),'tbl_products',$cond,null,null,array("p_id","desc"));

 
                    $cond = array('o.o_r_id'=>$r_id);
                    $chk_pr_cart = $this->Main->getDetailedData('c.*,o.*,p.*','tbl_order o',$cond,null,null,array('c.c_p_id','asc'),array(array('tbl_cart c','c.c_o_id=o.o_id','left'),array('tbl_products p','p.p_id=c.c_p_id','left')));
                    foreach($chk_pr_cart as $cpc)
                    {
                        if($cpc->p_id == $p_id)
                        {
                            $crnt_cart_id = $cpc->c_id;
                            $crnt_order_id = $cpc->c_o_id;
                        }

                    }
                    
                    $crnt_cart_data = $this->Main->getDetailedData('c_totprice,c_discount','tbl_cart',array('c_id'=>$crnt_cart_id));
                    $crnt_cart_c_totprice = $crnt_cart_data[0]->c_totprice;
                    $crnt_cart_c_discount = $crnt_cart_data[0]->c_discount;

                    // print_r($crnt_cart_data);exit;
                    $crnt_order_data = $this->Main->getDetailedData('o_id ,o_subtotal,o_grandtotal,o_tax,o_pro_discount','tbl_order',array('o_status'=>'1','o_id'=>$crnt_order_id));
                    $crnt_order_o_subtotal = $crnt_order_data[0]->o_subtotal;
                    $crnt_order_o_pro_discount = $crnt_order_data[0]->o_pro_discount;

                    $new_crnt_order_o_subtotal =  $crnt_order_o_subtotal - $crnt_cart_c_totprice ;
                    $new_crnt_order_o_pro_discount = $crnt_order_o_pro_discount - $crnt_cart_c_discount;

                    // print_r($new_crnt_order_o_pro_discount);exit;
                    $data_order['o_subtotal'] = $new_crnt_order_o_subtotal;
                    $data_order['o_pro_discount'] = $new_crnt_order_o_pro_discount;
                    $data_order['o_grandtotal'] = $new_crnt_order_o_subtotal;
        	        if($this->Main->update($data_order,'tbl_order',array("o_id"=> $crnt_order_id)))
        	        {
        	            $this->Main->delete('tbl_cart',array('c_id'=>$crnt_cart_id));
                        $res = array("res"=>1,"msg"=>'Product Deleted From Cart');
        	        }
                    else
                    {
                        $res = array("res"=>0,"msg"=>'Some error occured');
                    }

                    

               } 
               else
               {
                    $p_id = $this->input->post('p_id');

                    $guest_order = $this->session->get_userdata("guest_order")['guest_order'];
                    $guest_cart = $this->session->get_userdata("guest_cart")['guest_cart'];

                    foreach($guest_cart as $index=>$gc)
                    {
                        if($gc['c_p_id'] == $p_id)
                        {
                            $pr_index = $index;
                            $crnt_cart_c_totprice = $gc['c_totprice'];
                            $crnt_cart_c_discount = $gc['c_discount'];
                        }

                    }

                    $crnt_order_o_subtotal = $guest_order[0]['o_subtotal'];
                    $crnt_order_o_pro_discount = $guest_order[0]['o_pro_discount'];

                    $new_crnt_order_o_subtotal =  $crnt_order_o_subtotal - $crnt_cart_c_totprice ;
                    $new_crnt_order_o_pro_discount = $crnt_order_o_pro_discount - $crnt_cart_c_discount;

                    

                    // print_r($new_crnt_order_o_pro_discount);exit;  

                    $data_order['o_subtotal'] = $new_crnt_order_o_subtotal;
                    $data_order['o_pro_discount'] = $new_crnt_order_o_pro_discount;
                    $data_order['o_tax'] = 0;
                    $data_order['o_grandtotal'] = $new_crnt_order_o_subtotal;

                    $data_order['o_status'] = '1';                    
                    $data_order['o_shipping'] = '0';
                    $data_order['o_promocode'] = '0';
                    $data_order['o_discount'] = '0';
                    

                    $data_order_new[] = $data_order;
                    
                    $this->session->set_userdata("guest_order",$data_order_new);

                    unset($guest_cart[$pr_index]);
                    $data_cart_new = $guest_cart;
                    $this->session->set_userdata("guest_cart",$data_cart_new);
                            
                    //  p($this->session->get_userdata("guest_cart"));
                    
                    $res = array("res"=>1,"msg"=>'Product Removed From Cart');
                    
               }

               
                
            }
            
		echo json_encode($res);
	}


    public function add_to_cart_from_cart()
	{
		$data = array();
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('product_id','Some','required|trim');

		 if(!$this->form_validation->run())
            {
    			$errors = $this->form_validation->error_array();
    			$res = array("res"=>0,"errors"=>$errors,"msg"=>"Sorry Some error occurred");
    			
    		}
		 else
            {	
                if(!empty($this->session->get_userdata("lg_user")['lg_user']['user_id']))
                {	
                    $sss = $this->session->get_userdata("lg_user");                
                    $r_id = enc($sss['lg_user']['user_id'] ,'d'); 
                    $tax=0; 
                    $product_id=$this->input->post('product_id');

                    // $old_order=$this->Main->getDetailedData('o_id ,o_subtotal,o_grandtotal,o_tax,o_pro_discount','tbl_order',array('o_status'=>'1','o_r_id'=>$r_id));
                    
                    $cond = array('o.o_r_id'=>$r_id,'o.o_id'=>$this->input->post('o_id'));
                    $old_order = $this->Main->getDetailedData('c.*,o.*,p.*','tbl_order o',$cond,null,null,array('c.c_p_id','asc'),array(array('tbl_cart c','c.c_o_id=o.o_id','left'),array('tbl_products p','p.p_id=c.c_p_id','left')));
                    foreach($old_order as $oo)
                    {
                        if($product_id == $oo->p_id)
                        {
                            $crnt_pr_c_totprice = $oo->c_totprice;
                            $crnt_pr_tot_c_discount = $oo->c_discount;
                            $crnt_cart_id = $oo->c_id;
                        }
                    }

                    if(!empty($old_order))
                    {                        
                        $data_order['o_subtotal'] = $this->input->post('product_tot_price') + $old_order[0]->o_subtotal - $crnt_pr_c_totprice;
                        $data_order['o_pro_discount'] = $this->input->post('product_dis_price') + $old_order[0]->o_pro_discount - $crnt_pr_tot_c_discount;
                        $data_order['o_tax'] = $tax + $old_order[0]->o_tax;
                        $data_order['o_grandtotal'] = $this->input->post('product_tot_price') + $old_order[0]->o_grandtotal - $crnt_pr_c_totprice;
                        
                    }
                    $data_order['o_r_id'] = $r_id;
                    $data_order['o_status'] = '1';                    
                    $data_order['o_shipping'] = '0';
                    $data_order['o_promocode'] = '0';
                    $data_order['o_discount'] = '0';

                    
                    
                    $data_cart['c_p_id'] = $this->input->post('product_id');
                    $data_cart['c_mrp'] = $this->input->post('product_org_price');
                    $data_cart['c_price'] = $this->input->post('product_base_price');
                    $data_cart['c_qty'] = $this->input->post('product_tot_qty');
                    $data_cart['c_discount'] = $this->input->post('product_dis_price');
                    $data_cart['c_totprice'] = $this->input->post('product_tot_price');
                    $data_cart['c_o_id'] = $this->input->post('o_id');

                    $this->db->trans_start();
                        
                        $data_cart['c_status'] = '1';

                        if(!empty($data_order))
                        {
                            if(!empty($old_order))
                            {
                                $o_id = $this->input->post('o_id');
                                $this->Main->update($data_order,'tbl_order',array("o_id"=>$o_id));

                            }
                            
                        }
                        if(!empty($data_cart))
                        {
                            $this->Main->update($data_cart,'tbl_cart',array("c_id"=>$crnt_cart_id));
                        }
                    
                    $this->db->trans_complete();
                    if($this->db->trans_status()===true)
					    $res = array("res"=>1,"msg"=>'Item Updated To Cart');
				    else
					    $res = array("res"=>0,"msg"=>'Failed to add Item');

               } 
               else
               {
                //    $this->session->unset_userdata('guest_cart');
                //     $this->session->unset_userdata('guest_order');
                //     exit;

                    $tax=0;
                    $product_id=$this->input->post('product_id');

                    if(!empty($this->session->get_userdata("guest_order")))
                    {
                        $old_order = $this->session->get_userdata("guest_order")['guest_cart'];
                        $old_guest_order = $this->session->get_userdata("guest_order")['guest_order'];
                        // print_r($old_guest_order);exit;
                        foreach($old_order as $ind=>$oo)
                        {
                            if($product_id == $oo['c_p_id'])
                            {
                                $crnt_pr_c_totprice = $oo['c_totprice'];
                                $crnt_pr_tot_c_discount = $oo['c_discount'];
                                $crnt_cart_ind = $ind;
                            }
                        }

                    }
                    
                    


                    if(!empty($old_guest_order))
                    {        
                        // print_r($old_guest_order);exit;                
                        $data_order['o_subtotal'] = $this->input->post('product_tot_price') + $old_guest_order[0]['o_subtotal'] - $crnt_pr_c_totprice;
                        $data_order['o_pro_discount'] = $this->input->post('product_dis_price') + $old_guest_order[0]['o_pro_discount'] - $crnt_pr_tot_c_discount;
                        $data_order['o_tax'] = $tax + $old_guest_order[0]['o_tax'];
                        $data_order['o_grandtotal'] = $this->input->post('product_tot_price') + $old_guest_order[0]['o_grandtotal'] - $crnt_pr_c_totprice;
                        $data_order['o_status'] = '1';                    
                        $data_order['o_shipping'] = '0';
                        $data_order['o_promocode'] = '0';
                        $data_order['o_discount'] = '0';
                    }                   
                    
                    
                    $data_cart['c_p_id'] = $this->input->post('product_id');
                    $data_cart['c_mrp'] = $this->input->post('product_org_price');
                    $data_cart['c_price'] = $this->input->post('product_base_price');
                    $data_cart['c_qty'] = $this->input->post('product_tot_qty');
                    $data_cart['c_discount'] = $this->input->post('product_dis_price');
                    $data_cart['c_totprice'] = $this->input->post('product_tot_price');
                    
                    $data_cart_new = array();
                    
                    if(!empty($old_guest_order))
                    {   
                        $data_cart_new = $this->session->get_userdata("guest_cart")['guest_cart'];
                        // unset($data_cart_new[$crnt_cart_ind]);
                        // array_push($data_cart_new,$data_cart);

                        $data_cart_new[$crnt_cart_ind] = $data_cart;
                        // array_push($data_cart_new,$data_cart);

                        $data_order_new[] = $data_order;
                        $this->session->set_userdata("guest_cart",$data_cart_new);
                        $this->session->set_userdata("guest_order",$data_order_new);
                    }

                   

                    
                            
                    //  p($this->session->get_userdata("guest_cart"));
                    
                    $res = array("res"=>1,"msg"=>'Items Updated To Cart');
                    
               }

               
                
            }
            
		echo json_encode($res);
	}


}