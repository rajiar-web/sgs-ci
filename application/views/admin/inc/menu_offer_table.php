<table id="pdct_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">No</th>
                   <th width="25%">Title</th>
                  <th width="20%">Image</th>
                  <th width="20%">Offer Type</th>
                <!--   <th width="30%">Set Offer </th> -->
                   <th width="20%">Actions </th>
                 
                 
                </tr>
                </thead>
                <tbody><?php if(!empty($plist))
                  {
                    
                     $i=1;
                    foreach($plist as $index=>$l)
                    {
                     $img = '';
                      $images = json_decode($l->o_image);
                      if(!empty($images))
                      {
                        $pathinfo = pathinfo($images[0]);
                        if(file_exists('./assets/front/img/offers/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']))
                        {
                          $pp = base_url('assets/front/img/offers/'.$pathinfo['dirname'].'/60_60_'.$pathinfo['basename']);
                          $img = '<img src="'.$pp.'">';
                        }
                        else
                        {
                          $pp = base_url('assets/front/img/offers/'.$images[0]);
                          $img = '<img src="'.$pp.'" width="60" height="60">';
                        }

                      }
                 
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        <td><?=$l->o_title;?></td>
                        <td>
                          <?php
                          echo $img;
                          ?>
                        
                        </td>
                        <td><?php if($l->o_groups=='1'){ echo 'Latest';}else if($l->o_groups=='2'){ echo 'Party';}else if($l->o_groups=='3'){ echo 'Services';} else if($l->o_groups=='4'){ echo 'Sunday';}   ;?>
                      </td>
                       
                        
                       
                        
                          <td>
                          <a href="<?=base_url('edit-offer/'.enc($l->o_id));?>" id="<?=$l->o_id;?>" class="btn edit-cat btn-info" title="Edit <?=$l->o_title;?>"> <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0)" id="<?=$l->o_id;?>" class="btn del-offer  btn-danger" title="Delete <?=$l->o_title;?>"> <i class="fa fa-trash"></i></a>
                           
                        </td>
                        
                      </tr>
                      <?php
                      ++$i;
                    }
                  }
                ?>
              </tbody>
            </table>
