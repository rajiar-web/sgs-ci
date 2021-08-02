$('#cform').submit(function(){

    $('.validation-error').html('');
    $("#spinner").show();
    $(".cat-btn").hide();
    var baseurl   = $("#base").val();
    var form_data = $("#cform").serializeArray();
  
     form_data.push({name: 'address', value: CKEDITOR.instances.address.getData()});  
     form_data.push({name: 'ftr_abt', value: CKEDITOR.instances.ftr_abt.getData()});  
           
            
       $.ajax({
            type:'POST',
           dataType:'json',
            //url:baseurl+'admin/List_controller/reasons_action',
             url:baseurl+'contact_action',
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
                    $('#cid').val(null);
                    //  CKEDITOR.instances['desc'].setData("");
                    $('#cform').trigger('reset');
                    $('.main-card-title').html('Contact');
                    setTimeout(function(){ window.location=baseurl+'settings'; }, 700);
                    // window.location = baseurl+'settings' ;
                    //poplutale_cat();
                    
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
