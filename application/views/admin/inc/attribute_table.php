<table id="cat_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="70%">Attribute</th>
                  <!-- <th>Date</th> -->
                  <th width="25%">Action</th>
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
                        <td><?=$l->name;?>
                        </td>
                        <!-- <td><?=date('Y-m-d',strtotime($l->date_added));?></td> -->
                        <td>
                         <a href="javascript:void(0)" id="<?=$l->attr_id;?>" rel="<?=$l->name;?>" class="btn set-vals btn-success" title="Set Values" > Set Values</a>
                            <!-- <a href="javascript:void(0)" id="<?=$l->attr_id;?>" class="btn edit-cat btn-info" title="Edit <?=$l->name;?>"> <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0)" id="<?=$l->attr_id;?>" class="btn del-cat  btn-danger" title="Delete <?=$l->name;?>"> <i class="fa fa-trash"></i></a> -->
                        </td>
                        
                      </tr>
                      <?php
                    }
                  }
                ?>
              </tbody>
            </table>