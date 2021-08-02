$(document).ready(function(){
         
    $('#cform').submit(function(){
 //alert("hi");
          $('.validation-error').html('');
          $("#spinner").show();
          $(".cat-btn").hide();
          var baseurl   = $("#base").val();
          var form_data = $("#cform").serializeArray();
          form_data.push({name: 'address', value: CKEDITOR.instances.address.getData()});  
             $.ajax({
                  type:'POST',
                  dataType:'json',
              
                url:baseurl+'mainaction',
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
                          setTimeout(function(){ window.location=baseurl+'main_contact'; }, 700);
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



  
$(document).on('click','.view-cat',function(){
    var id = $(this).attr('id');
     var form_data = new FormData();
        var base = $('#base').val();
       
        form_data.append('id', id);
        $.ajax({
                url : base+'view-main',
                type : 'post',
                data : form_data,
                cache: false,
                contentType: false,
                processData: false,
               
                success:function(data)
                { 
                    console.log(data);
                    $(".modal-body").html(data);
                    $('#catModal').modal('show');
                    $("#tbodytr"+id).removeAttr("style");
                    $("#tbodytr"+id).removeAttr("id");

                    
                    
                }
            });
});