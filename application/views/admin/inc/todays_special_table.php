<table id="pdct_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">No</th>
                   <th width="25%">Title</th>
                  <th width="20%">Image</th>
                  <th width="20%">Amount</th>
                <!--   <th width="30%">Set Offer </th> -->
                   <th width="20%">Actions </th>
                 
                 
                </tr>
                </thead>
                <tbody>
                  <?php if(!empty($specials))
                  {
                     $i=1;
                    foreach($specials as $index=>$l)
                    {
                      $img ='';
                      $images = json_decode($l->ts_image);
                      if(!empty($images))
                      {
                        $pathinfo = basename($images[0]);
                        if(file_exists('./assets/front/img/special/60_60_'.$pathinfo))
                        {
                          $pp = base_url('assets/front/img/special/60_60_'.$pathinfo);
                          $img = '<img src="'.$pp.'">';
                        }
                        else
                        {
                          $pp = base_url('assets/front/img/special/'.$images[0]);
                          $img = '<img src="'.$pp.'" width="60" height="60">';
                        }

                      }
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        <td><?=$l->ts_title;?></td>
                        <td>
                          <?php
                          echo $img;
                          ?>
                         
                        </td>
                        <td>
                          <?=$l->ts_price;?>
                        </td>
                       
                        
                       
                        
                          <td>
                          <a href="<?=base_url('edit-special/'.enc($l->ts_id));?>" id="<?=$l->ts_id;?>" class="btn edit-cat btn-info" title="Edit <?=$l->ts_title;?>"> <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0)" id="<?=$l->ts_id;?>" class="btn del-special  btn-danger" title="Delete <?=$l->ts_title;?>"> <i class="fa fa-trash"></i></a>
                           
                        </td>
                        
                      </tr>
                      <?php
                      ++$i;
                    }
                  }
                ?>
              </tbody>
            </table>
