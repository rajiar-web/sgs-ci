<table id="search_list" >  
       <thead>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone no</th>
        <th>From</th>
        <th>action</th> 
        </tr>
    </thead>
    <tbody>
        <?php  $i=1; foreach($records as $r) {
          if($r->c_status == 1) { ?>
        <tr id="tbodytr" style="font-weight: bold;color : blue;">
      
        <td><?php echo $i++;?></td>
       <?php  echo "<td>".$r->c_name."</td>";  ?>
       <?php  echo "<td>".$r->c_email ."</td>";  ?>
       <?php  echo "<td>".$r->c_phone."</td>";  ?>
       <?php if($r->c_home_contact_status == 0) { ?>
          <?php  echo "<td>Contact Form</td>";  ?>
       <?php }
       else { ?>
         <?php  echo "<td>Home Enquiry</td>";  ?>
      <?php } ?>

    
     <td>
                         
     <a href="javascript:void(0)" id="<?=$r->c_id;?>" class="btn btn-small view-cat btn-success" title="View <?=$r->c_name;?>" > <i class="fa fa-eye"></i></a>
                          
                        </td>
        </tr>
        
        <?php }
      else{
        ?>
        <tr>
      
      <td><?php echo $i++;?></td>
     <?php  echo "<td>".$r->c_name."</td>";  ?>
     <?php  echo "<td>".$r->c_email ."</td>";  ?>
     <?php  echo "<td>".$r->c_phone."</td>";  ?>
     <?php if($r->c_home_contact_status == 0) { ?>
          <?php  echo "<td>Contact Form</td>";  ?>
       <?php }
       else { ?>
         <?php  echo "<td>Home Enquiry</td>";  ?>
      <?php } ?>

    <td>
                         
      <a href="javascript:void(0)" id="<?=$r->c_id;?>" class="btn view-cat btn-small btn-success" title="View <?=$r->c_name;?>" > <i class="fa fa-eye"></i></a>
                                              
    </td>
    </tr>
   <?php

      } } ?>
        
      
    </tbody>
</table> 