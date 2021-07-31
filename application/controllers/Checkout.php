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

}