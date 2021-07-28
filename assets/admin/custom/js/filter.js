$(document).ready(function(){
         
    $('#filter').submit(function(){
 //alert("hi");
          //$('.validation-error').html('');
          $("#spinner").show();
          $(".cat-btn").hide();
          var baseurl   = $("#base").val();
          var form_data = $("#filter").serializeArray();
          //form_data.push({name: 'desc', value: CKEDITOR.instances.desc.getData()});  
             $.ajax({
                  type:'POST',
                  dataType:'json',           
                  url:baseurl+'addfilter',
                  data:form_data,
                 
                  success:function(data)
                  { 
                      //console.log(data);
                      $(".error").html("");
                      $("#spinner").hide();
                      $(".cat-btn").show();
                      if(data.res == 1)
                       { 
                          success(data.msg);
                          setTimeout(function(){ window.location=baseurl+'filter_list'; }, 700);
                          
                       }
                       else
                    {
                        if($.isEmptyObject(data.errors))
                        {
                            error(data.msg);
                        }
                        else
                        {
                            for(var key in data.errors)
                            {
                                console.log(key);
                                var v = data.errors[key];
                                $('#'+key+"_error").html(v);;

                            }
                        }
                    }
  
                     
                  }
              }); 
  
          return false;
      })
  })

  $(document).ready(function() {
    $('.mdb-select').materialSelect();
    });



    $(document).ready(function() {
    $('select').selectpicker();
});


$(document).on('click','.del-filter',function(){
    $('.main-card-title').html('Delete Country');
   var id = $(this).attr('id');
  
   alertify.confirm("Are you sure ?.",
     function(){
           
           var form_data = new FormData();
           var base = $('#base').val();
          
           form_data.append('id', id);
           $.ajax({
                   url : base+'deletefilter',
                   type : 'post',
                   data : form_data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   dataType:'json',
                   success:function(data)
                   { 
                     // console.log(data);
                      if(data.res==1)
                      {
                           success(data.msg);
                        //    poplutale_subcat();
                        //$(this).closest('tr').remove();
                        location.reload();
                      }
                      else
                      {
                        error(data.msg);
                      }
                    
                   }
               });
     },
     function(){
       alertify.error('Canceled');
     }).set({title:"Confirm delete details"}).set({labels:{ok:'Delete', cancel: 'Cancel'}});
});