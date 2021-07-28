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
//welth planing
function getWelthData($id)
{
  $this->db->select('*');    
  $this->db->from('cc_welth_planing');
  $this->db->where("w_id",$id);
  $query = $this->db->get();
 return $query->result(); 
 
}

function update_welth($param,$cid)
{
  
  $this->db->where("w_id",$cid);
  return $this->db->update("cc_welth_planing",$param);
}

function delete_welth($id)
{
     $this->db->where('w_id', $id);
     $this->db->delete('cc_welth_planing');
     return true;
}


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
    $this->db->from('vd_slider');
    $q=$this->db->get();
    return $q->result(); 
  }

  function SliderOne($id)
  {
    $this->db->select('*');  
    $this->db->where('s_id', $id);  
    $this->db->from('vd_slider');
    $q=$this->db->get();
    return $q->result(); 
  }


  function delete_slider($id)
  {
      $this->db->where('s_id', $id);
       $this->db->delete('vd_slider');
       return true;
  }

//services
function ServicesList()
{
  $this->db->select('*');    
  $this->db->from('vd_services');
  $q=$this->db->get();
  return $q->result(); 
}

function ServicesOne($id)
{
  $this->db->select('*');  
  $this->db->where('s_id', $id);  
  $this->db->from('vd_services');
  $q=$this->db->get();
  return $q->result(); 
}


function delete_services($id)
{
    $this->db->where('s_id', $id);
     $this->db->delete('vd_services');
     return true;
}
  

  //about
  
  function AboutList($id='')
  {
     $this->db->select('*');  
     $this->db->from('vd_about');
    if($id!='')
    {
      $this->db->where('a_id', $id);
    }
    $q=$this->db->get();
    return $q->result(); 
  
}

function delete_about($id)
{
     $this->db->where('a_id', $id);
     $this->db->delete('vd_about');
     return true;
}


  //recent_work
  
  function RecentworkList($id='')
  {
     $this->db->select('*');  
     $this->db->from('vd_recent_works');
    if($id!='')
    {
      $this->db->where('id', $id);
    }
    $q=$this->db->get();
    return $q->result(); 
  
  }

  function delete_recentwork($id)
  {
      $this->db->where('id', $id);
      $this->db->delete('vd_recent_works');
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
  function getSearchDataforelse($id)
  {
    
    $this->db->select('t1.s_estimate_budget,t1.s_reason_id,t1.s_financial_requirement_id,t1.s_investment_objective_id,t1.s_id,t2.u_first_name,t2.u_last_name,t3.a_age_range,t4.cons_concern ,t6.p_profession,t1.s_pension_planning,t7.c_country as nationality,t8.c_country as location');    
    $this->db->from('cc_search_result t1');
    $this->db->join('cc_users_search t2','t1.s_user_id = t2.u_id');
    $this->db->join('cc_age_range t3','t1.s_age_id = t3.a_id');
    $this->db->join('cc_concerns t4','t1.s_concern_id = t4.cons_id');
    $this->db->join('cc_profession t6','t1.s_profession_id = t6.p_id');
    $this->db->join('cc_country t7','t1.s_nationality_id = t7.c_id ');
    $this->db->join('cc_country t8','t1.s_location_id = t8.c_id ');
    
    $this->db->where("t1.s_id",$id);
    $query = $this->db->get();
    //echo $this->db->last_query();
    return $query->row(); 
  }
  function get_searchdataforcheck($id)
    {
      $this->db->select('s_pension_planning');    
      $this->db->from('cc_search_result');
      $this->db->where_in("s_id",$id);
      $query = $this->db->get();
      return $query->result(); 
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
    $this->db->from('vd_contact');
    $this->db->where("c_id",$id);
    $query = $this->db->get();
    //echo $this->db->last_query();
    return $query->row(); 
  }
  function update_contact_contactus($param,$cid)
  {
    
    $this->db->where("c_id",$cid);
    return $this->db->update("vd_contact",$param);
  }
 




  //contact

  
  function update_contact($param,$cid)
  {
    
    $this->db->where("mc_id",$cid);
    return $this->db->update("tbl_main_contact",$param);
  }

  function getContact_infoData()
  {
    
    $this->db->select('*');    
    $this->db->from('tbl_main_contact');
   // $this->db->where("c_id",$id);
    $query = $this->db->get();
    return $query->result(); 
   
  }


  function update_search($param,$id)
  {
    
    $this->db->where("u_id",$id);
    return $this->db->update("cc_users_search",$param);
  }
 

    //change password
    function checkpassword($upassword,$id)
    {
      $this->db->select('*');    
      $this->db->from('login');
      $this->db->where('password',$upassword);
      $this->db->where('login_id',$id);
      $q = $this->db->get();
      return $q->result();
    }
    function update_password($npassword,$id)
    {
      
      $this->db->where("login_id",$id);
      return $this->db->update("login",array("password"=>$npassword));
    }

    function getTypecat($id)
    {
      
      
      $this->db->select('*');
      $this->db->from('vd_type_cat');
      $this->db->where("t_id",$id);
      $query = $this->db->get();
      return $query->row(); 
    }







///start now/////////////





  function update_userotpstatus($param,$sId)
	{
		
		$this->db->where("r_id",$sId);
		return $this->db->update("tbl_register",$param);
	}

  function getSingleRegister($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_register');
		$this->db->where("r_id",$id);
		$query = $this->db->get();
		return $query->row(); 
	}

  function getSingleRegisterbyemail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_register');
		$this->db->where("username",$id);
		$query = $this->db->get();
		return $query->row(); 
	}

  function getAddresslist($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_address');
		$this->db->where("add_user",$id);
		$query = $this->db->get();
		return $query->result(); 
	}
  function getActiveaddresslist($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_address');
		$this->db->where("add_user",$id);
    $this->db->where("add_status","1");
		$query = $this->db->get();
		return $query->result(); 
	}

  function updateuserfirstaddress($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_address');
		$this->db->where("add_user",$id);
    $this->db->limit(1);
		$query = $this->db->get();
		return $query->result(); 
	}

	function getOneaddress($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_address');
		$this->db->where("add_id",$id);
		$query = $this->db->get();
		return $query->result(); 
	}

	 //updateuserprofile
	function update_userprofile($param,$sId)
	{
	
	$this->db->where("r_id",$sId);
	return $this->db->update("tbl_register",$param);
	}


	//updateuseraddress
	function updateuseraddress($param,$sId)
	{
	
	$this->db->where("add_id",$sId);
	return $this->db->update("tbl_address",$param);
	}

  //update user  address status as active
	function updateuser_active_addressstatus($param,$sId)
	{	
    $this->db->where("add_id",$sId);
    return $this->db->update("tbl_address",$param);
	}

  //update user all address status to inactive
	function updateuseraddressstatus($param,$sId)
	{	
    $this->db->where("add_user",$sId);
    return $this->db->update("tbl_address",$param);
	}

  //delete user address 
	function deleteuseraddress($sId)
	{	
    $this->db->where("add_id",$sId);
    return $this->db->delete("tbl_address");
	}


}