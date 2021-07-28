<table id="cat_list" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="35%">Blog</th>
                  <th width="25%">Image</th>
                  <th width="20%">Date</th>
                  <th width="20%">Action</th>
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
                        <td><?=$l->title ;?>
                        </td>
                        <td><?=($l->image!=''?'<img class="image-preview" src=' . $l->image . '  class="upload-preview" width="20%" />':'');?>
                        </td>
                        <td><?=date('Y-m-d',strtotime($l->date_added));?></td>
                        <td>
                           <a href="javascript:void(0)" id="<?=$l->blog_id;?>" class="btn view-cat btn-success" title="View <?=$l->title;?>" > <i class="fa fa-eye"></i></a>
                         <a href="addBlog/<?=$l->blog_id;?>"  class="btn edit-cat btn-info" title="Edit <?=$l->title;?>"> <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0)" id="<?=$l->blog_id;?>" class="btn del-blog  btn-danger" title="Delete <?=$l->title;?>"> <i class="fa fa-trash"></i></a>
                        </td>
                        
                      </tr>
                      <?php
                    }
                  }
                ?>
              </tbody>
            </table>