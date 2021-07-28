<table id="nl_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="35%">Email</th>
                  
                  <th width="20%">Date</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php if(!empty($nlData))
                  {
                    foreach($nlData as $index=>$l)
                    {
                      ?>
                      <tr>
                        <td><?=$index+1;?></td>
                        <td><?=$l->s_email ;?>
                        </td>
                        
                        <td><?=date('Y-m-d',strtotime($l->s_added));?></td>
                        <td>
                          
                           <a href="javascript:void(0)" id="<?=$l->s_id;?>" class="btn del-nletter  btn-danger" title="Delete <?=$l->s_email;?>"> <i class="fa fa-trash"></i></a>
                        </td>
                        
                      </tr>
                      <?php
                    }
                  }
                ?>
              </tbody>
            </table>