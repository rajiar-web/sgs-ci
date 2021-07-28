<div class="content-header">
      <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$breadcrumb['title'];?></h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php if(!empty($breadcrumb['links']))
              {
                $j=0;
                $c=count($breadcrumb['links']);
                foreach($breadcrumb['links'] as $i=>$l)
                {
                 
                   print('<li class="breadcrumb-item">');
                   if($j==($c-1))
                      echo $i;
                   else
                      print('<a href="'.$l.'">'.$i.'</a>');
                  print('</li>');
                  
                  $j++;
                }
              }?>
             </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>