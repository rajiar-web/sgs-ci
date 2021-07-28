<?php
class Homemodel extends CI_Model
{
    
    function getContactinfomodel ()
    {
      $q = $this->db->get('tbl_main_contact');
      return $q->result();
    }

    function getcat ()
    {
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
		// print_r($category);exit;
      return $category;
    }


}