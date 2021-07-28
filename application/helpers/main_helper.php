<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
{
  function front_css()
  {
    return base_url().'assets/front/assets/css/';
  }
  function front_js()
  {
    return base_url().'assets/front/assets/js/';
  }
  function front_fonts()
  {
    return base_url().'assets/front/assets/fonts/';
  }
  function front_images()
  {
    return base_url().'assets/front/assets/img/';
  }

  function alertify_css()
  {
    return base_url().'assets/alertify/css/';
  }
  function alertify_js()
  {
    return base_url().'assets/alertify/';
  }




  function admin($path=null)
  {
  	return base_url('assets/admin/'.$path);
  }
  function admin_custom_css($path=null)
  {
  	return base_url('assets/admin/custom/css/'.$path);
  }
  function admin_custom_js($path=null)
  {
  	return base_url('assets/admin/custom/js/'.$path);
  }

  function social_media()
  {
    $arr = array("Facebook"=>"fab fa-facebook-f",
                  "Instagram"=>"fab fa-instagram",
                  "Twitter"=>"fab fa-twitter",
                  "linkedin"=>"fab fa-linkedin-in",
                  "youtube"=>"fab fa-youtube",
                  "Pinterest"=>"fab fa-pinterest-p",
                  "Skype"=>"fab fa-skype",
                  "Dribbble"=>"fab fa-dribbble",
                  "Pinterest"=>"fab fa-pinterest-p",
                  "Snapchat"=>"fab fa-snapchat-ghost",
                  "Vimeo"=>"fab fa-vimeo");
                  return $arr;
                   
  }



  function getcontact()
  {
    $ff = & get_instance();
    $ff->load->library('Essentials');
    return $ff->essentials->getContactinfo();
  }

  function getcategory()
  {
    $ff = & get_instance();
    $ff->load->library('Essentials');
    return $ff->essentials->getCategory();
  }






  function p($abc)
  {
    echo "<pre>";
    print_r($abc);
    echo "</pre>";
  }
  
  function lq()
  {
  	$ff = & get_instance();
  	echo '<pre>';
  	echo $ff->db->last_query();
  	echo '</pre>';
  	exit;
  }
  
  function word($value,$count)
  {
    $ff = & get_instance();
    $ff->load->helper('text');
    $value=trim(strip_tags($value));
    return character_limiter($value, $count);
  }

  function this_user($a=NULL)
  {
    $CI = &get_instance();
    if(!empty($CI->session->userdata('l_uid')))
    {
      $sess=$CI->session->userdata('l_uid');
      if(!empty($a))
        $s=enc($sess[$a],'d');
      else
        $s=enc($sess['l_id'],'d');
      if(!empty($s))
        return $s;
      return false;
    }
    else
      return false;
  }

  function img1($x,$y)
  {
    if(!empty($x) && !empty($y))
    {
      if(file_exists(FCPATH.'ThreeSeasInfologics/'.$x.$y))
        return repo().$x.$y;
      else
        return repo().'uploads/no-image.jpg';
    }
    else
      return repo().'uploads/no-image.jpg';
  }

  function current_url1()
  {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  }

  function dateConvert($originalDate)
  {
    return date("d-m-Y", strtotime($originalDate));
  }

  function dateWord($originalDate)
  {
    $a=explode('-', $originalDate);
    switch ($a[1])
    {
      case '1': $b="Jan"; break;
      case '2': $b="Feb"; break;
      case '3': $b="Mar"; break;
      case '4': $b="Apr"; break;
      case '5': $b="May"; break;
      case '6': $b="Jun"; break;
      case '7': $b="Jul"; break;
      case '8': $b="Aug"; break;
      case '9': $b="Sep"; break;
      case '10': $b="Oct"; break;
      case '11': $b="Nov"; break;
      case '12': $b="Dec"; break;
      default: $b=''; break;
    }
    return $a[0].' - '.$b.' - '.$a[2];
  }

  function dateWord1($originalDate)
  {
    $a=explode('/', $originalDate);
    switch ($a[1])
    {
      case '1': $b="Jan"; break;
      case '2': $b="Feb"; break;
      case '3': $b="Mar"; break;
      case '4': $b="Apr"; break;
      case '5': $b="May"; break;
      case '6': $b="Jun"; break;
      case '7': $b="Jul"; break;
      case '8': $b="Aug"; break;
      case '9': $b="Sep"; break;
      case '10': $b="Oct"; break;
      case '11': $b="Nov"; break;
      case '12': $b="Dec"; break;
      default: $b=''; break;
    }
    return $a[0].' - '.$b.' - '.$a[2];
  }

  function nocache()
  {
    header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');
    header('Expires: Wed, 05 Oct 1988 09:30:00 GMT');
    header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
  }

  function noHtml($str, $encoding='UTF-8')
  {
    $str=strip_tags($str);
    return (htmlspecialchars($str, ENT_QUOTES, $encoding));
  }

  function seg($a=1)
  {
    $amnc = & get_instance();
    return $amnc->uri->segment($a);
  }

  function get_title()
  {
    $amnc = & get_instance();
    $a=$amnc->uri->segment(1);
    if(!empty($a))
    {
      $a=str_replace('-', ' ', $a);
      $a=strtoupper($a);
      $a=$a.' | ';
      if(!empty($amnc->uri->segment(2)))
      {
        $b=$amnc->uri->segment(2);
        $b=explode('-', $b);
        $b=array_reverse($b);
        foreach ($b as $k)
        {
          if(is_numeric(enc($k,'d')))
          {
          }
          else
          {
            $k=str_replace('-', ' ', $k);
            $k=strtoupper($k);
            if(!empty($k))
            {
              $a=$k.' '.$a;
              $a = preg_replace('/[0-9]+/', '', $a).'';
            }
          }
        }
      }
    }
    else
    {
      $a="";
    }
    return $a.'Himalaya';
  }

  function disable_bot()
  {
    $amnc = & get_instance();

    if(!$amnc->load->is_loaded('user_agent'))
      $amnc->load->library('user_agent');

    $agent = $amnc->agent->agent_string();

    if(strpos($agent,"WebCopier v.2.2") || strpos($agent,"WebCopier v2.5") || strpos($agent,"WebZIP/5.0 PR1 (http://www.spidersoft.com)") || strpos($agent,"HTTrack") )
    {
      header("Location: https://www.ThreeSeasInfologics.com/no_download");
      exit();
    }
  }

  function slug($x,$y=null)
 {
   $x=enc($x);
   $y=gen_slug($y);
   return $y.'-'.$x;
 }

  function slug_title($x=1)
  {
    $amnc = & get_instance();
    $words=ucwords(str_replace('-', ' ', $amnc->uri->segment($x)));
    return preg_replace('/[0-9]+/', '', $words);
  }

  function gen_slug($a)
  {
    $a=strtolower($a);
    $specialchar = array("9#39;","!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "-", "+", "=", "|", "/\/", "/", ".", '"', ",", "'", ":", ";", ",", "~", "`" ,"]", "[", "}", "{", "?");
    $title = str_replace($specialchar, "", $a);
    $title = str_replace(" ", "-", $title);
    return $title;
  }
 

  function get_id($b)
 {
   $b=explode('-',$b);
   $b=end($b);
   $b=enc($b,'d');
   return $b;
 }

  function random_num($size)
  {
    $alpha_key = '';
    $keys = range('A', 'Z');

    for ($i = 0; $i < 2; $i++)
    {
      $alpha_key .= $keys[array_rand($keys)];
    }

    $length = $size - 2;

    $key = '';
    $keys = range(0, 9);

    for ($i = 0; $i < $length; $i++)
    {
      $key .= $keys[array_rand($keys)];
    }

    return $alpha_key . $key;
  }
  function checkSess()
  {
  	$ff = & get_instance();
  	if(!$ff->session->userdata('user_log'))
  		redirect('login');
  	
  }
  function put_product_status($stat)
  {
    if($stat=='1')
    {
      $s = '<span class="badge badge-success">Active</span>';
    }
    elseif($stat=='0')
    {
      $s = '<span class="badge badge-danger">Inctive</span>';
    }
    return $s;
  }
  function enc($id,$e='e')
  {
    $ff = & get_instance();
    $ff->load->library('Enc');
    return $ff->enc->encrypt($id,$e);
  }
}
 function not($a,$b=NULL)
  {
    $a=trim($a);
    if(!empty($a))
      return $a;
    else
    {
      if(isset($b))
        return $b;
      else
        return '';
    }
  }
    function mobile_check()
  {
    $amnc = & get_instance();
    $amnc->load-> library('Mobile_Detect');
    $detect = new Mobile_Detect();
    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS())
    {
      $amnc->session->set_userdata('device','mobile');
      // header('Location: https://www.ThreeSeasInfologics.com/no_download');
      // exit;
    }
    else
    {
      $amnc->session->set_userdata('device','computer');
            //header("Location: ".$this->config->item('base_url')."/mobile");
    }
  }

  function b($a=null)
  {
    if(!empty($a))
    {
      return base_url($a);
    }
    return base_url();
  }

  function menu_active($x,$y=1,$z=1)
  {
    if(!empty($x))
    {
      $rr = & get_instance();
      $y=$rr->uri->segment($y);
      if($z==1)
      {
        if(in_array($y, $x))
          return "resp-tab-active";
      }
      else if($z==2)
      {
        if(in_array($y, $x))
          return "resp-tab-active";
      }
      else
      {
        if($x==$y)
          return "resp-tab-active active ";
      }
      return false;
    }
    return false;
  }


  function get_display_img( $path )
  {
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    if( strtolower($ext) == 'docx' || strtolower($ext) == 'doc')
      $data['img'] = base_url('admin/assets/images/docx.png');
    elseif( strtolower($ext) == 'pdf'  )
      $data['img'] = base_url('admin/assets/images/pdf.png');
    elseif( strtolower($ext) == 'gif' || strtolower($ext) == 'jpg' || strtolower($ext) == 'png' )
      $data['img'] = base_url('uploads/assets/docs/'.$path);
    else
      $data['img'] = base_url('admin/assets/images/file.png');

    $data['file'] = basename($path);
    return $data;
  }
  function offer($o)
  {
    if($o=='1')
      return 'Latest Offers';
    elseif($o=='2')
      return 'Party Offers';
    elseif($o=='1')
      return 'Services';
    else
      return 'Sunday Offers';
  }