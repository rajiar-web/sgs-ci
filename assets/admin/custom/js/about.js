$(document).ready(function(){
         
    $('#about').submit(function(){
          $('.validation-error').html('');
          $("#spinner").show();
          $(".cat-btn").hide();
          var baseurl   = $("#base").val();
          var form_data = $("#about").serializeArray();
          form_data.push({name: 'desc', value: CKEDITOR.instances.desc.getData()});  
          form_data.push({name: 'desc2', value: CKEDITOR.instances.desc2.getData()});  
             $.ajax({
                  type:'POST',
                  dataType:'json',

                
                 url:baseurl+'addabout',
                

                  data:form_data,
                 
                  success:function(data)
                  { 
                      console.log(data);
                      $(".error").html("");
                      $("#spinner").hide();
                      $(".cat-btn").show();
                      if(data.res == 1)
                       { 
                          success(data.msg);
                          setTimeout(function(){ window.location=baseurl+'about_list'; }, 700);
                          
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


  $(document).on('change','#inputlargefile',function(){
                  $('#imgPath').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
                 var baseurl = $('#base').val();
                 var file_data = $('#inputlargefile').prop('files')[0];
                 var form_data = new FormData();
                 form_data.append('file', file_data);
                 $.ajax({
                     url : baseurl+'logo', 
                     type: "POST",
                     dataType:'json',
                     data: form_data,
                     contentType: false,  
                     cache: false,
                     processData: false,
                     success: function (data) {
                         var filePath = data.path;
                         var fileName = data.filename;
                        
                         if(filePath)
                         {
                          var flpth = "'"+ filePath +"'";
                          var imgsrc = '<div><img class="image-preview" src='+baseurl + filePath + '  class="upload-preview" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
                          $("#imgPath").html(imgsrc); 
                          $('#imgname').val(fileName); 
                         }
                               
                     }
                 });
             });
 
  $(document).on('click','.uploadbtnlarge',function(){
             $('#inputlargefile').click();
 
         });