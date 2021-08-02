$(document).ready(function(){
         
    $('#cform').submit(function(){
 
          $('.validation-error').html('');
          $("#spinner").show();
          $(".cat-btn").hide();
          var baseurl   = $("#base").val();
          var form_data = $("#cform").serializeArray();
         // form_data.push({name: 'desc', value: CKEDITOR.instances.desc.getData()});  
             $.ajax({
                  type:'POST',
                  dataType:'json',
              
                url:baseurl+'classification-action',
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
                          setTimeout(function(){ window.location=baseurl+'pr-classification'; }, 700);
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




         $(document).on('click','.del-classification',function(){
            $('.main-card-title').html('Delete Classification');
           var id = $(this).attr('id');
          
           alertify.confirm("Are you sure ?.",
             function(){
                   
                   var form_data = new FormData();
                   var baseurl = $('#base').val();
                  
                   form_data.append('id', id);
                   $.ajax({
                           url : baseurl+'delete-classification',
                           type : 'post',
                           data : form_data,
                           cache: false,
                           contentType: false,
                           processData: false,
                           dataType:'json',
                           success:function(data)
                           { 
                          
                              if(data.res==1)
                              {
                                   success(data.msg);
                               
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
             }).set({title:"Confirm delete Classification"}).set({labels:{ok:'Delete', cancel: 'Cancel'}});
        });
 


     