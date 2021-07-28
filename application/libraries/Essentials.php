<?php class Essentials
{
   function menu()
  {
       $CI = & get_instance();
       $menu = $CI->Main->getData("menu_category",array("mc_status"=>'1'),null,null,array("mc_id","asc"));
       $menuArray=array();
       if(!empty($menu))
       {
          foreach($menu as $m)
          {
            $menuArray[$m->mc_category] = $m->mc_slug;
          }
       }
       return $menuArray;
  }
  function GetMenuDetails($idd)
  {
       $CI = & get_instance();
       $menu = $CI->Main->getData("menu",array("m_status"=>'1',"m_mc_id"=>$idd),null,null,array("m_id","asc"));
       return $menu;
  }
  function GetAllMenuDetails($id=null)
  {
    $CI = & get_instance();
       $menu = $CI->Main->getDetailedData(array("mc.mc_category","m.*"),"menu m",array("m.m_status"=>'1'),null,null,array("m_id","asc"),array(array("menu_category mc","mc.mc_id = m.m_mc_id and mc.mc_status='1'","left")));
       return $menu;
  }
  function GetAllMenuDetailsWithSlug($slug)
  {
    $CI = & get_instance();
       $menu = $CI->Main->getDetailedData(array("mc.*","m.*"),"menu m",array("m.m_status"=>'1',"m.m_slug"=>$slug),null,null,array("m_title","asc"),array(array("menu_category mc","mc.mc_id = m.m_mc_id and mc.mc_status='1'","left")));
       return $menu;
  }


  function getContactinfo ()
    {
     $CI = & get_instance();
      $q = $CI->Homemodel->getContactinfomodel();
      return $q;
    }
  
  function getCategory ()
  {
    $CI = & get_instance();
    $q = $CI->Homemodel->getcat();
    return $q;
  }


}