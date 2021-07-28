<table id="mnu_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Title</th>
                 <th>Image</th>
                 <th>Price(£)</th>
                 <th>Staus</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 

                  if(!empty($plist))
                  {
                    foreach($plist as $index=>$l)
                    {
                      $images = json_decode($l->m_images);
                      if(!empty($images))
                      {
                        $pathinfo = pathinfo($images[0]);
                        if(file_exists('./assets/front/img/menu/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']))
                        {
                          $pp = base_url('assets/front/img/menu/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']);
                          $img = '<img src="'.$pp.'">';
                        }
                        else
                        {
                          $pp = base_url('assets/front/img/menu/'.$images[0]);
                          $img = '<img src="'.$pp.'" width="60" height="60">';
                        }

                      }
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        
                        <td><?=$l->cat;?>
                        </td>
                                              
                        <td><?=$l->m_title;?>
                        </td>
                        <td>
                          <?php
                          echo $img;
                          ?>
                        </td>
                       
                        <td><?=$l->m_price;?>
                        </td>
                         <td><?=put_product_status($l->m_status);?>
                        </td>
                        <!-- <td><?=$l->selling_price;?> 
                        </td>-->
                      
                        <td>
                          
                          <a href="<?=base_url('edit-menu/'.enc($l->m_id));?>" id="<?=$l->m_id;?>" class="btn edit-cat btn-info" title="Edit <?=$l->m_title;?>"> <i class="fa fa-edit"></i></a>
                          
                          <a href="javascript:void(0)" id="<?=$l->m_id;?>" class="btn mnu-product btn-danger" title="Delete <?=$l->m_id;?>"> <i class="fa fa-trash"></i></a>
                           
                        </td>
                        
                      </tr>
                      <?php
                    }
                  }
                ?>
              </tbody>
            </table>
