$(document).ready(function(){
	
})
function login()
    {
        $('.validation-error').html('');
        $("#spinner").show();
        $(".log-btn").hide();
        var baseurl   = $("#base").val();
        var form_data = $("#lform").serializeArray();
               
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'login-action',
                data:form_data,
               
                success:function(data)
                { 
                    
                    $(".error").html("");
                    $("#spinner").hide();
                    $(".log-btn").show();
                     

                    if(data.res == 1)
                    { 
                        alertify.success(data.msg);
						setTimeout(function(){ window.location = baseurl+data.url }, 700);
                    }
                    else
                    {
                        if($.isEmptyObject(data.errors))
                        {
                            alertify.error(data.msg);
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
    }