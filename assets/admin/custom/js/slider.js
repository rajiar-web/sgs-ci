$(document).ready(function(){
  $("#spinner").hide();
         
    $('#slider').submit(function(){
 //alert("hi");
          $('.validation-error').html('');
          $("#spinner").show();
          $(".cat-btn").hide();
          var baseurl   = $("#base").val();
          var form_data = $("#slider").serializeArray();
             $.ajax({
                  type:'POST',
                  dataType:'json',
                url:baseurl+'submit-slider',
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
                          setTimeout(function(){ window.location=baseurl+'slider_list'; }, 700);
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
    // $('#inputlargefile').change(function () {
                  $('#imgPath').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
                 var baseurl = $('#base').val();
                 var file_data = $('#inputlargefile').prop('files')[0];
                 var form_data = new FormData();
                 //     var categoryId = $('#newsCategory').val();
                 // var width=784px;
                 // var height=410px;
                 form_data.append('file', file_data);
                 $.ajax({
                     url : baseurl+'image', 
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
                        //   var imgsrc = '<div><img class="image-preview" src='+baseurl + filePath + '  class="upload-preview" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;">Delete <i class="fa fa-trash" aria-hidden="true"></i></div></div>';
                        var imgsrc = '<div><img class="image-preview" src='+baseurl + filePath + '  class="upload-preview" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
                          $("#imgPath").html(imgsrc); 
                          $('#imgname').val(fileName); 
                         }
                               
                     }
                 });
             });
 
  $(document).on('click','.uploadbtnlarge',function(){
 //$('.uploadbtnlarge').on('click', function ()
       //  {
             $('#inputlargefile').click();
 
         });






$(document).on('change','#inputlargefile2',function(){
                        $('#imgPath2').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
                       var baseurl = $('#base').val();
                       var file_data = $('#inputlargefile2').prop('files')[0];
                       var form_data = new FormData();
                       form_data.append('file', file_data);
                       $.ajax({
                           url : baseurl+'image', 
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
                                var imgsrc2 = '<div><img class="image-preview2" src='+baseurl + filePath + '  class="upload-preview2" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
                                $("#imgPath2").html(imgsrc2); 
                                $('#imgname2').val(fileName); 
                               }
                                     
                           }
                       });
                   });
       
        $(document).on('click','.uploadbtnlarge2',function(){
       //$('.uploadbtnlarge').on('click', function ()
             //  {
                   $('#inputlargefile2').click();
       
               });









         $(document).on('click','.del-slider',function(){
            $('.main-card-title').html('Delete Slider');
           var id = $(this).attr('id');
          
           alertify.confirm("Are you sure ?.",
             function(){
                   
                   var form_data = new FormData();
                   var baseurl = $('#base').val();
                  
                   form_data.append('id', id);
                   $.ajax({
                           url : baseurl+'deleteslider',
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
                                //$('.del-age').closest('tr').remove();
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
             }).set({title:"Confirm delete Slider"}).set({labels:{ok:'Delete', cancel: 'Cancel'}});
        });
 