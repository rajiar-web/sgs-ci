<?php
class Main extends CI_Model
{
	
	public function  getData($table='',$cond=NULL,$limit='0',$start='',$order=array('','asc'))
  {
    $this->db->select('*')->from($table)->order_by($order[0],$order[1]);
    if(!empty($limit))
      $this->db->limit($limit,$start);
    if(!empty($cond))
      $this->db->where($cond);
    $res=$this->db->get();

    if($res->num_rows()>0)
    {
      return $res->result();
    }
    return false;
  }
  public function  getDetailedData($select='*',$table='',$cond=NULL,$limit='0',$start='',$order=array('','asc'),$join=array(),$grp_by=null)
  {
    $this->db->select($select)->from($table);
    if(!empty($order[0]))
      $this->db->order_by($order[0],$order[1]);
    if(!empty($start) || !empty($limit))
    {
      $this->db->limit($limit,$start);
    }
    if(!empty($join))
    {
      foreach($join as $j)
      {
        $this->db->join($j[0],$j[1],$j[2]);
      }
    }
    if(!empty($cond))
      $this->db->where($cond);
    if(!empty($where_in))
      $this->db->where_in($where_in);
    if(!empty($grp_by))
      $this->db->group_by($grp_by);
    $res=$this->db->get();

    if($res->num_rows()>0)
    {
      return $res->result();
    }
    return false;
  }
  public function batch_insert($data,$table)
  {
    return $this->db->insert_batch($table,$data);
  }
  public function insert($data, $table)
  {
    $this->db->insert($table,$data);
    return $this->db->insert_id();
  }
  public function update($data, $table, $cond)
  {
    $this->db->where($cond);
    return $this->db->update($table,$data);
  }
  public function delete($item,$cond)
  {
    $this->db->where($cond);
    return $this->db->delete($item);
  }
  public function grab($dbdata)
  {
    if (!empty($dbdata['distinct']))
    {
      $this->db->distinct();
    }
    if (empty($dbdata['select']))
    {
      $dbdata['select'] = '*';
    }
    if (empty($dbdata['limit']))
    {
      $dbdata['limit'] = NULL;
    }
    if (empty($dbdata['offset']))
    {
      $dbdata['offset'] = NULL;
    }
    if (!empty($dbdata['select']))
    {
      $this->db->select($dbdata['select']);
    }
    if (!empty($dbdata['where']))
    {
      $this->db->where($dbdata['where']);
    }
    if (!empty($dbdata['or_where']))
    {
      $this->db->group_start();
      $this->db->or_where($dbdata['or_where']);
      $this->db->group_end();
    }
    if(!empty($dbdata['where_in']))
    {
      foreach ($dbdata['where_in'] as $key => $value) {
         $this->db->where_in($key,$value);
      }
     
    }
    if(!empty($dbdata['or_where_in']))
    {
      $this->db->or_where_in($dbdata['or_where_in'][0],$dbdata['or_where_in'][1]);
    }
    if(!empty($dbdata['where_not_in']))
    {
      $this->db->group_start();
      $this->db->where_not_in($dbdata['where_not_in'][0],$dbdata['where_not_in'][1]);
      $this->db->group_end();
    }
    if (!empty($dbdata['order_by']))
    {
      $this->db->order_by($dbdata['order_by'][0],$dbdata['order_by'][1]);
    }
    if (!empty($dbdata['like']))
    {
      $this->db->group_start();
      $this->db->like($dbdata['like']);
      $this->db->group_end();
    }
    if (!empty($dbdata['or_like']))
    {
      $this->db->group_start();
      $this->db->or_like($dbdata['or_like']);
      $this->db->group_end();
    }
    if(!empty($dbdata['join_table']))
    {
      $c=count($dbdata['join_table']);
      $jn=$dbdata['join_table'];
      for ($i=0; $i <$c ; $i++)
      {
        if(!empty($jn[$i+2]))
          $this->db->join($jn[$i],$jn[$i+1],$jn[$i+2]);
        else
          $this->db->join($jn[$i],$jn[$i+1]);
        $i=$i+2;
      }
    }
    $result = $this->db->get($dbdata['table'], $dbdata['limit'], $dbdata['offset']);
    if ($result->num_rows() > 0)
    {
      if (!empty($dbdata['object']))
      {
        return $result->result();
      }
      else
      {
        return $result->result_array();
      }
    }
    else
    {
      return FALSE;
    }
  }
  
  
  
  
  
  
  
  
  function checkUser($uname)
  {
    $this->db->where('username',$uname);
    $this->db->where('login_status','1');
    $q = $this->db->get('login');
    return $q->result();
  }
  // function insert_category($param)
  // {
  //   return $this->db->insert("menu_category",$param);
  // }
  // function update_category($param,$cid)
  // {
  //   $this->db->where("mc_id",$cid);
  //   return $this->db->update("menu_category",$param);
  // }
  // function list_categories()
  // {
  //   $this->db->where("mc_status",'1');
  //   $this->db->order_by("mc_id",'desc');
  //   $q = $this->db->get("menu_category");
  //   return $q->result();
  // }
  // function categoryData($id)
  // {
  //   $this->db->select("c.*");
  //   $this->db->from('menu_category c') ; 
  // //  $this->db->join('login l1','l1.login_id=c.created_by',"left") ; 
  // //  $this->db->join('login l2','l2.login_id=c.modified_by',"left") ;
  //   $this->db->where("mc_id",$id);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // // function list_subcategories($cat)
  // // {
  // //  $this->db->where("status",'1');
  // //  $this->db->where("parent_id",$cat);
  // //  $this->db->order_by("catgory_id",'desc');
  // //  $q = $this->db->get("category");
  // //  return $q->result();
  // // }
  // function insert_menu($param)
  // {
  //   if($this->db->insert("menu",$param))
  //     return $this->db->insert_id();
  //   else
  //     return false;
  // }
  // function insert_seo($param)
  // {
  //   return $this->db->insert("menu_seo",$param);
  // }
  
  // function update_menu($param,$cid)
  // {
  //   $this->db->where("m_id",$cid);
  //   return $this->db->update("menu",$param);
  // }
  // function update_seo($param,$cid)
  // {
  //   $this->db->where("m_id",$cid);
  //   return $this->db->update("menu_seo",$param);
  // }
  
  // function loadMenus()
  // {
  //   $this->db->select("c1.mc_category as cat,m.*", FALSE);
  //   $this->db->from('menu m') ; 
  //   $this->db->join('menu_category c1','c1.mc_id=m.m_mc_id',"left") ; 
  //   $this->db->where("m.m_status",'1');
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function singleMenu($id)
  // {
    
  //   $this->db->select("c1.mc_id as catid,c1.mc_category as catname,m.*,s.*", FALSE);
  //   $this->db->from('menu m') ; 
  //   $this->db->join('menu_category c1','c1.mc_id=m.m_mc_id',"left") ; 
  //   $this->db->join('menu_seo s','s.m_id=m.m_id',"left") ;
  //   $this->db->where("m.m_status",'1');
  //   $this->db->where("m.m_id",$id);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function delete_menu($id)
  // {
  //   return $this->db->delete("menu",array("m_id"=>$id));
  // }
  // // further updations
  // // sub category functions start
  // function subcategoryData($id)
  // {
  //   $this->db->select(array("l1.username as addedby","l2.username as modifiedby","c2.category as parent","c.*"));
  //   $this->db->from('category c') ; 
  //   $this->db->join('category c2','c.parent_id=c2.catgory_id') ;
  //   $this->db->join('login l1','l1.login_id=c.created_by',"left") ; 
  //   $this->db->join('login l2','l2.login_id=c.modified_by',"left") ;
  //   $this->db->where("c.catgory_id",$id);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function list_subcategories()
  // {

  //   $this->db->select(array("c2.category as parent","c.*"));
  //   $this->db->from('category c') ; 
  //   $this->db->join('category c2','c.parent_id=c2.catgory_id') ; 
  //   $this->db->where("c.status",'1');
  //   $this->db->where("c.parent_id!=",'0');
  //   $this->db->order_by("c.catgory_id",'desc');
  //   $q=$this->db->get();
  //   //echo $this->db->last_query();
  //   return $q->result(); 
  // }

  // function filllist_subcategories($catId)
  // {

  //   $this->db->select(array("c2.*"));
  //   $this->db->from('category c') ; 
  //   $this->db->join('category c2','c.catgory_id=c2.parent_id') ; 
  //   $this->db->where("c.status",'1');
  //   $this->db->where("c.catgory_id",$catId);
  //   // $this->db->where("c.parent_id!=",'0');
  //   $this->db->order_by("c.catgory_id",'desc');
  //   $q=$this->db->get();
  //   //echo $this->db->last_query();
  //   return $q->result(); 
  // }
  // // sub category functions end
  // //blog function start
  // function list_blogs()
  // {
  //   $this->db->where("status",'1');
  //   $this->db->order_by("blog_id",'desc');
  //   $q = $this->db->get("tbl_blog");
  //   return $q->result();
  // }
  // function insert_blog($param)
  // {
  //   return $this->db->insert("tbl_blog",$param);
  // }


  //reason
  function update_reasons($param,$cid)
  {
    
    $this->db->where("r_id",$cid);
    return $this->db->update("cc_reasons",$param);
  }
  function getReasonData($id)
  {
    $this->db->select('*');    
    $this->db->from('cc_reasons');
    $this->db->where("r_id",$id);
    $query = $this->db->get();
   return $query->result(); 
   
  }



  function delete_reasons($id)
  {
       $this->db->where('r_id', $id);
       $this->db->delete('cc_reasons');
       return true;
  }

  


  //country
  function update_country($param,$cid)
  {
    
    $this->db->where("c_id",$cid);
    return $this->db->update("cc_country",$param);
  }

  function getCountryData($id)
  {
    
    $this->db->select('*');    
    $this->db->from('cc_country');
    $this->db->where("c_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }

function delete_country($id)
  {
      $this->db->where('c_id', $id);
       $this->db->delete('cc_country');
       return true;
  }

  //Age range

  function update_age($param,$cid)
  {
    
    $this->db->where("a_id",$cid);
    return $this->db->update("cc_age_range",$param);
  }

  function getAgeData($id)
  {
    
    $this->db->select('*');    
    $this->db->from('cc_age_range');
    $this->db->where("a_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }

function delete_age($id)
  {
      $this->db->where('a_id', $id);
       $this->db->delete('cc_age_range');
       return true;
  }


//Profession
function update_profession($param,$cid)
  {
    
    $this->db->where("p_id",$cid);
    return $this->db->update("cc_profession",$param);
  }

  function getProfessionData($id)
  {
    
    $this->db->select('*');    
    $this->db->from('cc_profession');
    $this->db->where("p_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }

function delete_profession($id)
  {
      $this->db->where('p_id', $id);
       $this->db->delete('cc_profession');
       return true;
  }

  //investment objective
  function update_investment($param,$cid)
  {
    
    $this->db->where("i_id",$cid);
    return $this->db->update("cc_investment_objective",$param);
  }

  function getInvestmentData($id)
  {
    
    $this->db->select('*');    
    $this->db->from('cc_investment_objective');
    $this->db->where("i_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }

function delete_investment($id)
  {
      $this->db->where('i_id', $id);
       $this->db->delete('cc_investment_objective');
       return true;
  }

  //financial requirements
  function update_requirement($param,$cid)
  {
    
    $this->db->where("f_id",$cid);
    return $this->db->update("cc_financial_requirements",$param);
  }

  function getRequirementData($id)
  {
    
    $this->db->select('*');    
    $this->db->from('cc_financial_requirements');
    $this->db->where("f_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }

function delete_requirement($id)
  {
      $this->db->where('f_id', $id);
       $this->db->delete('cc_financial_requirements');
       return true;
  }

  //concerns
  function update_concerns($param,$cid)
  {
    
    $this->db->where("cons_id",$cid);
    return $this->db->update("cc_concerns",$param);
  }

  function getConcernsData($id)
  {
    
    $this->db->select('*');    
    $this->db->from('cc_concerns');
    $this->db->where("cons_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }

function delete_concerns($id)
  {
      $this->db->where('cons_id', $id);
       $this->db->delete('cc_concerns');
       return true;
  }

//lack of income
function update_income($param,$cid)
  {
    
    $this->db->where("l_id",$cid);
    return $this->db->update("cc_lack_of_income",$param);
  }

  function getIncomeData($id)
  {
    
    $this->db->select('*');    
    $this->db->from('cc_lack_of_income');
    $this->db->where("l_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }

function delete_income($id)
  {
      $this->db->where('l_id', $id);
       $this->db->delete('cc_lack_of_income');
       return true;
  }
//slider
  function SliderList()
  {
    $this->db->select('*');    
    $this->db->from('cc_slider');
    $q=$this->db->get();
    return $q->result(); 
  }

  function delete_slider($id)
  {
      $this->db->where('s_id', $id);
       $this->db->delete('cc_slider');
       return true;
  }
  

  //company
  
  function CompanyList($id='')
  {
     $this->db->select('*');  
     $this->db->from('cc_company');
    if($id!='')
{
   $this->db->where('com_id', $id);
   //$this->db->update('cc_company',$data);
}
    $q=$this->db->get();
    return $q->result(); 
  
}

function delete_company($id)
{
     $this->db->where('com_id', $id);
     $this->db->delete('cc_company');
     return true;
}

//filter

function FilterCoList()
{
     $this->db->select('*');  
     $this->db->from('cc_company');
     $q=$this->db->get();
     return $q->result(); 


   
}
function FilterObList()
{
     $this->db->select('*');  
     $this->db->from('cc_investment_objective');
     $q=$this->db->get();
     return $q->result(); 


   
}


function delete_filter($id)
  {
      $this->db->where('com_filter_id', $id);
       $this->db->delete('cc_company_filter_table');
       return true;
  }

//search


function getSearchData($id)
  {
    
     $this->db->select('t1.s_estimate_budget,t1.s_reason_id,t1.s_financial_requirement_id,t1.s_investment_objective_id,t1.s_id,t2.u_first_name,t2.u_last_name,t3.a_age_range,t4.cons_concern,t5.l_description ,t6.p_profession,t1.s_pension_planning,t7.c_country as nationality,t8.c_country as location,t9.c_country as retirement');    
    //$this->db->select('*');
    $this->db->from('cc_search_result t1');
    $this->db->join('cc_users_search t2','t1.s_user_id = t2.u_id');
    $this->db->join('cc_age_range t3','t1.s_age_id = t3.a_id');
    $this->db->join('cc_concerns t4','t1.s_concern_id = t4.cons_id');
    $this->db->join('cc_lack_of_income t5','t1.s_lack_of_income_id  = t5.l_id');
    $this->db->join('cc_profession t6','t1.s_profession_id = t6.p_id');
    $this->db->join('cc_country t7','t1.s_nationality_id = t7.c_id ');
    $this->db->join('cc_country t8','t1.s_location_id = t8.c_id ');
    $this->db->join('cc_country t9','t1.s_after_retire_country_id = t9.c_id');
    
    $this->db->where("t1.s_id",$id);
    $query = $this->db->get();
    //echo $this->db->last_query();
    return $query->row(); 
  }
function get_reasons($id)
{
  $this->db->select('r_title');    
  //$this->db->select('*');
  $this->db->from('cc_reasons');
  $this->db->where_in("r_id",$id);
  $query = $this->db->get();
  //echo $this->db->last_query();
  return $query->result(); 
}

function get_investment($id)
{
  $this->db->select('i_objective');    
  //$this->db->select('*');
  $this->db->from('cc_investment_objective');
  $this->db->where_in("i_id",$id);
  $query = $this->db->get();
  //echo $this->db->last_query();
  return $query->result(); 
}


function get_requirement($id)
{
  $this->db->select('f_requirement');    
  //$this->db->select('*');
  $this->db->from('cc_financial_requirements');
  $this->db->where_in("f_id",$id);
  $query = $this->db->get();
  //echo $this->db->last_query();
  return $query->result(); 
}

//contact
function getContactData($id)
  {
    
    
    $this->db->select('*');
    $this->db->from('contact');
    $this->db->where("c_id",$id);
    $query = $this->db->get();
    //echo $this->db->last_query();
    return $query->row(); 
  }


  function update_contact($param,$id)
  {
    
    $this->db->where("c_id",$id);
    return $this->db->update("contact",$param);
  }
  function update_search($param,$id)
  {
    
    $this->db->where("u_id",$id);
    return $this->db->update("cc_users_search",$param);
  }
 

  // function update_company($id)
  // {
    
  //   $this->db->where("com_id",$id);
  //   return $this->db->update("cc_company");
  // }
  // function singleMenu($id)
  // {
    
  //   $this->db->select('*');
  //   $this->db->from('cc_country') ; 
  //   $this->db->where("com_id",$id);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function delete_blog($id)
  // {
  //    $this->db->where('blog_id', $id);
  //      $this->db->delete('tbl_blog');
  //      return true;
  // }
  // //slider details
  // function insert_slider($param)
  // {
  //   return $this->db->insert("slider",$param);
  // }
  
  // function list_sliders()
  // {
  //   $this->db->where("status",'1');
  //   $this->db->order_by("slider_id",'desc');
  //   $q = $this->db->get("slider");
  //   return $q->result();
  // }
  // function update_slider($param,$cid)
  // {
  //   $this->db->where("slider_id",$cid);
  //   return $this->db->update("slider",$param);
  // }
  // function sliderData($id)
  // {
  //   $this->db->select(array("l1.username as addedby","l2.username as modifiedby","c.*"));
  //   $this->db->from('slider c') ; 
  //   $this->db->join('login l1','l1.login_id=c.created_by',"left") ; 
  //   $this->db->join('login l2','l2.login_id=c.modified_by',"left") ;
  //   $this->db->where("slider_id",$id);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // //attribute section
  // function list_attributes()
  // {
  //   // $this->db->where("status",'1');
  //   // $this->db->where("parent_id is NULL",null);
  //   $this->db->order_by("attr_id",'desc');
  //   $q = $this->db->get("product_attr");
  //   return $q->result();
  // }
  // function productAttributeData($id)
  // {
  //   $this->db->from('product_attr_values c');
  //   $this->db->where("c.attr_id ",$id);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function productFieldData($valId)
  // {
  //   $this->db->from('product_attr_field c');
  //   $this->db->where("c.val_id",$valId);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function update_product_attributes($data,$valId)
  // {
  //   $this->db->where('val_id', $valId);
  //       $this->db->update('product_attr_values', $data);
  // }
  // function update_attribute_fields($data,$fieldId)
  // {
  //   $this->db->where('field_id', $fieldId);
  //       $this->db->update('product_attr_field', $data);
  // }
  // function getProductAttribute($prdId)
  // {
  //   $this->db->select('t1.*,t2.set_id');
  //   $this->db->from('product_attr t1');
  //    $this->db->join('set_product_attribute t2', 't1.attr_id  = t2.attr_id AND t2.product_id='.$prdId,'left');
  //   // $this->db->order_by("t1.attr_id","asc");
  //   //$this->db->where("c.attr_id ",$id);
  //   $q=$this->db->get();
  //   //echo $this->db->last_query();
  //   return $q->result(); 
  // }
  // function getAttributeValues($attrId,$prdId)
  // {
  //   $this->db->select('t1.*,t2.setvl_id');
  //   $this->db->from('product_attr_values t1');
  //    $this->db->join('set_product_attrvalue t2', 't1.val_id  = t2.val_id AND t2.product_id='.$prdId,'left');
  //   $this->db->where("t1.attr_id",$attrId);
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function delete_productAttr($id)
  // {
  //    $this->db->where('product_id', $id);
  //      $this->db->delete('set_product_attribute');
  //      return true;
  // }
  // function delete_productAttrVal($id)
  // {
  //    $this->db->where('product_id', $id);
  //      $this->db->delete('set_product_attrvalue');
  //      return true;
  // }
  // function deleteProductClassifications($id)
  // {
  //    $this->db->where('product_id', $id);
  //      $this->db->delete('product_classify');
  //      return true;
  // }
  // function loadClassificationProducts()
  // {
  //   $this->db->select(array("t1.*","t2.cl_id AS prId","t3.cl_id AS ltId","t4.cl_id AS pplId"));
  //   $this->db->from('products t1') ; 
  //   $this->db->join('product_classify t2','t1.product_id=t2.product_id AND t2.cl_status="P"',"left") ; 
  //   $this->db->join('product_classify t3','t1.product_id=t3.product_id AND t3.cl_status="L"',"left") ; 
  //   $this->db->join('product_classify t4','t1.product_id=t4.product_id AND t4.cl_status="R"',"left") ; 
  //   $this->db->where("t1.status",'1');
  //   $this->db->order_by("t1.product_id","desc");
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function popular_products()
  // {
  //   $this->db->select(array("t1.*"));
  //   $this->db->from('products t1') ; 
  //   $this->db->join('product_classify t2','t1.product_id=t2.product_id') ; 
  //   $this->db->where("t1.status",'1');
  //   $this->db->where("t2.cl_status",'R');
  //   $this->db->order_by("t1.product_id",'desc');
  //   $this->db->limit(10);  
  //   $q=$this->db->get();
  //   //echo $this->db->last_query();
  //   return $q->result(); 
  // }
  // function promotional_products($limit='')
  // {
  //   $this->db->select(array("t1.*"));
  //   $this->db->from('products t1') ; 
  //   $this->db->join('product_classify t2','t1.product_id=t2.product_id') ; 
  //   $this->db->where("t1.status",'1');
  //   $this->db->where("t2.cl_status",'P');
  //   $this->db->order_by("t1.product_id",'desc');
  //   if($limit!='')
  //   $this->db->limit();  
  //   $q=$this->db->get();
  //   //echo $this->db->last_query();
  //   return $q->result(); 
  // }
  // function home_categories($limit='')
  // {
  //   $main = array();
  //   //$main['prd'] = array();
  //   //$sub = array();
  //   $this->db->where("status",'1');
  //   $this->db->where("parent_id is NULL",null);
  //   $this->db->order_by("catgory_id",'desc');
  //   if($limit!='')
  //     $this->db->limit($limit);
  //   $q = $this->db->get("category")->result();
    
  //   if(!empty($q))
  //   {
  //     foreach($q as $ct)
  //     {
  //       $sub = array();
  //       $ctgryId = $ct->catgory_id;
        
  //         $this->db->where("status",'1');
  //         $this->db->where("category",$ctgryId);
  //         $pr = $this->db->get("products")->result();
  //         if(!empty($pr))
  //         {
  //           foreach($pr as $pd)
  //           {
  //             $ary1 = array("product_id"=>$pd->product_id,"title"=>$pd->title);
  //             array_push($sub, $ary1);
  //           }
  //           //array_push($main, $sub);
  //         }
  //         $ary = array("catgory_id"=>$ctgryId,"category"=>$ct->category,"product"=>$sub);
  //           array_push($main, $ary);

  //     }
  //   }
  //   return $main;
  // }
  // function get_categoryProducts($catId='')
  // {
  //   $main = array();
  //   $this->db->where("status",'1');
  //   if($catId!='')
  //     $this->db->where("catgory_id",$catId);
  //   $ct = $this->db->get("category")->row();
    
  //   if(!empty($ct))
  //   {
      
  //       $sub = array();
  //       $ctgryId = $ct->catgory_id;
        
  //         $this->db->where("status",'1');
  //         $this->db->where("category",$ctgryId);
  //         $pr = $this->db->get("products")->result();
  //         if(!empty($pr))
  //         {
  //           foreach($pr as $pd)
  //           {
  //             $ary1 = array("product_id"=>$pd->product_id,"title"=>$pd->title);
  //             array_push($sub, $ary1);
  //           }
  //           //array_push($main, $sub);
  //         }
  //         $main = array("catgory_id"=>$ctgryId,"category"=>$ct->category,"product"=>$sub);
  //         //  array_push($main, $ary);

      
  //   }
  //   return $main;
  // }
  // function get_categorySubcategories($catId='')
  // {
  //   $main = array();
  //   $this->db->where("status",'1');
  //   if($catId!='')
  //     $this->db->where("catgory_id",$catId);
  //   $ct = $this->db->get("category")->row();
    
  //   if(!empty($ct))
  //   {
      
  //       $sub = array();
  //       $ctgryId = $ct->catgory_id;
        
  //         $this->db->where("status",'1');
  //         $this->db->where("parent_id ",$ctgryId);
  //         $sb = $this->db->get("category")->result();
  //         if(!empty($sb))
  //         {
  //           foreach($sb as $sc)
  //           {
  //             $ary1 = array("category_id"=>$sc->catgory_id,"category"=>$sc->category);
  //             array_push($sub, $ary1);
  //           }
  //           //array_push($main, $sub);
  //         }
  //         $main = array("catgory_id"=>$ctgryId,"category"=>$ct->category,"subcateg"=>$sub);
  //         //  array_push($main, $ary);

      
  //   }
  //   return $main;
  // }
  // function getHomeCategories($limit='')
  // {
  //   $this->db->select("SUBSTRING_INDEX(`category`, ' ', 1) AS shrtcategory,catgory_id,category,image,CASE WHEN parent_id IS NULL THEN 'M' ELSE 'S' END AS type ",false);
  //   $this->db->where("status",'1');
  //   if($limit!='')
  //     $this->db->limit($limit);
  //   return $this->db->get("category")->result_array();
  // }
  // function getAllCategoriesForMenu()
  // {
  //   $this->db->select(array("c1.catgory_id as cat_id","c1.category as cat_name","c2.catgory_id as subcat_id","c2.category as subcst_name","c2.parent_id as parent"));
  //   $this->db->from('category c1');
  //   $this->db->join("category c2","c2.parent_id=c1.catgory_id and c2.status='1'","left");
  //   $this->db->where('c1.status','1');
  //   $this->db->where('c1.parent_id',null);
  //   $this->db->order_by('c1.category','asc');
  //   //$this->db->order_by('c2.category','asc');
  //   $qry = $this->db->get();
  //   return $qry->result();

  // }
  // function getAllProducts($cond=null)
  // {
    
  //   $this->db->limit($cond['limit'], $cond['start']);
  //   $this->db->select(array("p.product_id","p.title as pname","p.images as pimages","p.selling_price"));
  //   $this->db->from('products p');
    
  //   $this->db->where('p.status','1');
  //   if(!empty($cond['cat']))
  //     $this->db->where('p.category',$cond['cat']);
  //   if(!empty($cond['subcat']))
  //     $this->db->where('p.subcategory',$cond['subcat']);
  //   $this->db->order_by('p.product_id','desc');
  //   //$this->db->order_by('c2.category','asc');
  //   $qry = $this->db->get();
  //   return $qry->result();
  // }
  
  // function getAllProductsCount($cond=null)
  // {
  //   $this->db->select("count(p.product_id) as pcount");
  //   $this->db->from('products p');
    
  //   $this->db->where('p.status','1');
  //   if(!empty($cond['cat']))
  //     $this->db->where('p.category',$cond['cat']);
  //   if(!empty($cond['subcat']))
  //     $this->db->where('p.subcategory',$cond['subcat']);
    
  //   //$this->db->order_by('c2.category','asc');
  //   $qry = $this->db->get();
  //   $pp =  $qry->result();
  //   if(!empty($pp[0]->pcount))
  //     return $pp[0]->pcount;
  //   else
  //     return 0;
  // }
  // function getCategory($id)
  // {

  //   $this->db->select('*');
  //   $this->db->from('category');
    
  //   $this->db->where('status','1');
  //   $this->db->where('catgory_id',$id);
  //   $qry = $this->db->get();
  //   return $qry->result();
  // }
  // function list_latest_blogs($id)
  // {
  //   $this->db->where("status",'1');
  //   $this->db->where("blog_id!=",$id);
  //   $this->db->order_by("blog_id",'desc');
  //   $q = $this->db->get("tbl_blog");
  //   return $q->result();
  // }
  //  function getOfferMenu($id)
  // {
    
  //   $this->db->select("m.m_id,t.ts_id,t.ts_title,t.ts_image");
  //   $this->db->from('menu m') ; 
  //   $this->db->join('todays_special t','m.m_id=t.m_id',"left") ;
  //   $this->db->where("m.m_status",'1');
  //   $this->db->where("m.m_id",$id);
  //   $q=$this->db->get();
  //    return $q->row(); 
  // }
  // function loadOfferMenu()
  // {
  //   $this->db->select(array("t1.*"));
  //   $this->db->from('offers t1') ; 
  //   $this->db->where("t1.o_status",'1');
  //   $this->db->order_by("t1.o_id","desc");
  //   $q=$this->db->get();
  //   return $q->result(); 
  // }
  // function getOfferById($id)
  // {
  //   $this->db->select("m.*");
  //   $this->db->from('offers m') ; 
  //   $this->db->where("m.o_status ",'1');
  //   $this->db->where("m.o_id",$id);
  //   $q=$this->db->get();
  //   return $q->row(); 
  // }
  // function delete_offer($id)
  // {
  //   return $this->db->delete("offers",array("o_id"=>$id));
  // }
}