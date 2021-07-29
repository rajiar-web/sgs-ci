$(document).ready(function(){

    $('#registerForm').submit(function(){
        var base=$("#base").val();
        
       
    
        
        $('.validation-error').html('');
        $("#spinner").show();
        
        var baseurl   = $("#base").val();
        var form_data = $("#registerForm").serializeArray();
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'reg-action',
                data:form_data,
               
                success:function(data)
                {
                    
                   
                        if(data.res == 1)
                        {
                            $('#r_id').val(data.l_id);
                            $("#register-otp").hide();
                            $("#register-otp-fld").show();
                            alertify.success(data.msg);
                            $('#registerForm').trigger('reset');
                        }
                        else
                        {
                           
                            if($.isEmptyObject(data.errors))
                            {
                                alertify.error(data.msg);
                                // console.log(data);
                            }
                            else
                            {
                                for(var key in data.errors)
                                    {
                                        
                                        var v = data.errors[key];
                                        alertify.error(v);
                                        
                                        

                                        // console.log(key);
                                    }
                            }
                           

                        }
            
                    
                 
                }
            }); 

        return false;
    });






    $('#otpForm').submit(function(){
        var base=$("#base").val();
        
        
    
        
        $('.validation-error').html('');
        $("#spinner").show();
        
        var baseurl   = $("#base").val();
        var form_data = $("#otpForm").serializeArray();
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'otp-action',
                data:form_data,
               
                success:function(data)
                {
                    
                   
                        if(data.res == 1)
                        {
                            alertify.success(data.msg);
                            $('#otpForm').trigger('reset');
                            setTimeout(function(){ window.location=baseurl+'user-login'; }, 700);
                        }
                        else
                        {
                           
                            if($.isEmptyObject(data.errors))
                            {
                                alertify.error(data.msg);
                                // console.log(data);
                            }
                            else
                            {
                                for(var key in data.errors)
                                    {
                                        
                                        var v = data.errors[key];
                                        alertify.error(v);
                                        
                                        

                                        // console.log(key);
                                    }
                            }
                           

                        }
            
                    
                 
                }
            }); 

        return false;
    });


    $('#loginForm').submit(function(){
        var base=$("#base").val();
        
       
    
        
        $('.validation-error').html('');
        $("#spinner").show();
        
        var baseurl   = $("#base").val();
        var form_data = $("#loginForm").serializeArray();
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'user-login-action',
                data:form_data,
               
                success:function(data)
                {
                    
                   
                        if(data.res == 1)
                        {
                            alertify.success(data.msg);
                            $('#loginForm').trigger('reset');
                            setTimeout(function(){ window.location=baseurl+'user-profile'; }, 700);
                        }
                        else
                        {
                           
                            if($.isEmptyObject(data.errors))
                            {
                                alertify.error(data.msg);
                                // console.log(data);
                            }
                            else
                            {
                                for(var key in data.errors)
                                    {
                                        
                                        var v = data.errors[key];
                                        alertify.error(v);
                                        
                                        

                                        // console.log(key);
                                    }
                            }
                           

                        }
            
                    
                 
                }
            }); 

        return false;
    });




    $('#forgetForm').submit(function(){
        var base=$("#base").val();
        
        
    
        
        $('.validation-error').html('');
        $("#spinner").show();
        
        var baseurl   = $("#base").val();
        var form_data = $("#forgetForm").serializeArray();
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'forget-password-action',
                data:form_data,
               
                success:function(data)
                {
                    
                   
                        if(data.res == 1)
                        {
                            alertify.success(data.msg);
                            $('#forgetForm').trigger('reset');
                            setTimeout(function(){ window.location=baseurl+'user-login'; }, 700);
                        }
                        else
                        {
                           
                            if($.isEmptyObject(data.errors))
                            {
                                alertify.error(data.msg);
                                // console.log(data);
                            }
                            else
                            {
                                for(var key in data.errors)
                                    {
                                        
                                        var v = data.errors[key];
                                        alertify.error(v);
                                        
                                        

                                        // console.log(key);
                                    }
                            }
                           

                        }
            
                    
                 
                }
            }); 

        return false;
    });

});