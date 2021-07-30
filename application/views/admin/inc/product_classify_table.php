<table id="pdct_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">No</th>
                   <th width="25%">Title</th>
                  <th width="50%">Image</th>
                  <th width="10%">Featured Products</th>
                  <th width="10%">Bestsellers</th>
                  
                 
                </tr>
                </thead>
                <tbody>
                  <?php if(!empty($plist))
                  {
                    foreach($plist as $index=>$l)
                    {
                        $img = '';
                        $images = $l->p_image;
                         if(!empty($images))
                         {
                          
                           $pathinfo = pathinfo($images);
                           if(file_exists('assets/front/img/products/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']))
                           {
                             $pp = base_url('assets/front/img/products/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']);
                             $img = '<img src="'.$pp.'">';
                           }
                           else
                           {
                             $pp = base_url('assets/front/img/products/'.$images);
                             $img = '<img class="zoom" src="'.$pp.'" width="60" height="60">';
                           }
   
                         } 
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        <td><?=$l->p_title;?>
                        <td>
                          <?php
                          echo $img;
                          ?>
                          <!-- <input type="hidden" name="prdId[]" id="prdId" value="<?=$l->product_id;?>"> -->
                        </td>
                        <td><input type="checkbox" <?php echo(!empty($l->pplId)?'checked':''); ?> name="popular[<?=$l->p_id;?>]" value="1"></td>
                        <td><input type="checkbox" <?php echo(!empty($l->prId)?'checked':''); ?> name="prmtional[<?=$l->p_id;?>]" value="2"></td>
                      
                        
                       
                   
                        
                      </tr>
                      <?php
                    }
                  }
                ?>
              </tbody>
            </table>
