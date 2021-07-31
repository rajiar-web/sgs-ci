<table id="cat_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php if(!empty($list))
                  {
                    foreach($list as $index=>$l)
                    {
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        <td><?=$l->mc_category;?>
                        </td>
                        <td>
                          <?php //echo date('Y-m-d',strtotime($l->date_added));?>
                            
                          </td>
                        <td>
                           <a href="javascript:void(0)" id="<?=$l->mc_id;?>" class="btn view-cat btn-success" title="View <?=$l->mc_category;?>" > <i class="fa fa-eye"></i></a>
                          <a href="javascript:void(0)" id="<?=$l->mc_id;?>" class="btn edit-cat btn-info" title="Edit <?=$l->mc_category;?>"> <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0)" id="<?=$l->mc_id;?>" class="btn del-cat  btn-danger" title="Delete <?=$l->mc_category;?>"> <i class="fa fa-trash"></i></a>
                        </td>
                        
                      </tr>
                      <?php
                    }
                  }
                ?>
              </tbody>
            </table>