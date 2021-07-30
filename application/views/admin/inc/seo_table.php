<table id="cat_list" class="table table-bordered table-hover" width="100%" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th >Page</th>
                  <th >Title</th>
                 <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php if(!empty($meteData))
                  {
                    foreach($meteData as $index=>$l)
                    {
                     ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        <td>
                            <?php
                            if (filter_var($l->ht_slug, FILTER_VALIDATE_URL)) { 
                                 echo '<a href="'.$l->ht_slug.'" target="_blank">'.$l->ht_slug.'</a>';
                                }
                                else
                                echo $l->ht_slug;
                            
                            ?>
                            
                        </td>
                        <td><?=$l->ht_title ;?>
                        </td>
                       
                        
                        <td>
                           <a href="javascript:void(0)" id="<?=enc($l->ht_id);?>"  class="btn view-seo btn-success" title="View" > <i class="fa fa-eye"></i></a>
                         <a href="<?=base_url('edit-onpage-seo/'.enc($l->ht_id));?>"  class="btn edit-cat btn-info" title="Edit"> <i class="fa fa-edit"></i></a>
                         <a href="javascript:void(0)" id="<?=enc($l->ht_id);?>" class="btn del-seo  btn-danger" title="Delete"> <i class="fa fa-trash"></i></a>
                        </td>
                        
                      </tr>
                      <?php
                    }
                  }
                ?>
              </tbody>
            </table>