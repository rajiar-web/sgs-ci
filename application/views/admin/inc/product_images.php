   <?php
    if(!empty($gallery_images))
        {
            foreach($gallery_images as $index=>$img)
            {
                $v=null;
                $pathinfo = pathinfo($img);
                 if(file_exists('./assets/front/img/menu/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']))
                {
                  $v = base_url('assets/front/img/menu/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']);
                
                }
                else
                {
                    if(file_exists('./assets/front/img/menu/'.$img))
                        $v = base_url('assets/front/img/menu/'.$img);
                    else
                        $v=null;
                  
                }
               if(!empty($v))
               {
                    $div_id="img_list_".($index+1);
                $thumb = "'".$img."'";
                $thumb_divid = "'".$div_id."'";
                $del_args = "'".$item."','".$img."','".$div_id."'";
                $input_item = $item."_input";
                        print('<li class="fileuploader-item file-type-image file-ext-jpg" id="'.$div_id.'">'.
                '<div class="fileuploader-item-inner">'.
              '<input type="hidden" name="'.$input_item.'[]" value="'.$img.'">'.
                    '<div class="thumbnail-holder">'.
                        '<div class="fileuploader-item-image fileupload-no-thumbnail"><img src="'.$v.'" >'.
                        '</div>'.
                    '</div>'.
        '<div class="actions-holder"><a  class="remove_image" title="Remove" onclick="remove_img('.$del_args.')">'.
        '<i class="fa fa-trash icon-style"></i></a>'.
                    '</div>'.
                '</div>'.
            '</li>');
               }
                
                    }
        }
?>