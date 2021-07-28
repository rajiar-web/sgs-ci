$(document).ready(function(){
    var ac_ad_id = $('#a_id').val();
    if(ac_ad_id == null || ac_ad_id=="")
    {
        $('.address_edit').hide();
        $('.address_delete').hide();
    }
    

    $('.personal-address').click(function(){
        $('.address_edit').show();
        $('.address_delete').show();
        var baseurl   = $("#base").val();

        var id = $(this).attr("id");

        $(".personal-address").removeClass("active");
        $("#"+id+"").addClass("active");


        var form_data = $("#addgetform").serializeArray();

         form_data.push({name: 'crnt_id', value: id});  
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'address-get',
                data:form_data,
               
                success:function(data)
                { 
                   // console.log(data);
                    $(".error").html("");                     
    
                    if(data.res == 1)
                    {
                        // console.log(data.result['a_id']);
                        $('#a_id').val(data.result['add_id']);
                        $('#a_fullname').val(data.result['add_name']);
                        $('#a_phone').val(data.result['add_phone']);
                        $('#a_address_one').val(data.result['add_line1']);
                        $('#a_address_two').val(data.result['add_line2']);
                        $('#a_city').val(data.result['add_city']);
                        $('#a_state').val(data.result['add_state']);
                        $('#a_zip').val(data.result['add_zip']);
                        $('#a_country').val(data.result['add_country']);

                        alertify.success('This Address set as active');

                        
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
                                // console.log(key);
                                var v = data.errors[key];
                                alertify.error(v);
    
                            }
                        }
                    }
                }
            }); 
       
        
        
    });



    $('.address_add').click(function(){
        $('.address_edit').hide();
        $('.address_delete').hide();
        
        $(".personal-address").removeClass("active");
        $('#a_id').val(null);
        $('#a_fullname').val(null);
        $('#a_phone').val(null);
        $('#a_address_one').val(null);
        $('#a_address_two').val(null);
        $('#a_city').val(null);
        $('#a_state').val(null);
        $('#a_zip').val(null);
        $('#a_country').val('United Kingdom');
  
    });



    $('.address_delete').click(function(){

        alertify.confirm('Are yo sure !...', 'Your address will be permanently deleted.'
        , function(){

        var baseurl   = $("#base").val();
        var add_id = $('#a_id').val();
        // alert(add_id);
        var form_data = new FormData();

         form_data.append('crnt_id',add_id);  
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'address-delete',
                data:form_data,
                contentType: false,  
                cache: false,
                processData: false,
               
                success:function(data)
                { 
                   // console.log(data);
                    $(".error").html("");                     
    
                    if(data.res == 1)
                    {
                         
                            alertify.success(data.msg);
                            setTimeout(function(){ window.location=baseurl+'user-profile'; }, 700);
                                                 
                        
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
                                // console.log(key);
                                var v = data.errors[key];
                                alertify.error(v);
    
                            }
                        }
                    }
                }
            });
        }
        , function(){ alertify.error('Canceled')});
  
    });



    $('#profileupdateForm').submit(function(){
        var base=$("#base").val();   
        
        $('.validation-error').html('');
        $("#spinner").show();
        
        var baseurl   = $("#base").val();
        var form_data = $("#profileupdateForm").serializeArray();
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'profile-update-action',
                data:form_data,
               
                success:function(data)
                {
                    
                   
                        if(data.res == 1)
                        {
                            alertify.success(data.msg);
                            $('#fname').val(data.result['r_first_name']);
                            $('#lname').val(data.result['r_last_name']);
                            $('#a_phone').val(data.result['r_phone']);

                            
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



    $('#addressupdateForm').submit(function(){
        var base=$("#base").val();   
        
        $('.validation-error').html('');
        $("#spinner").show();
        
        var baseurl   = $("#base").val();
        var form_data = $("#addressupdateForm").serializeArray();
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'address-add',
                data:form_data,
               
                success:function(data)
                {
                    
                   
                        if(data.res == 1)
                        {
                            alertify.success(data.msg);
                            setTimeout(function(){location.reload(); }, 700);
                            
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




    $('#changepasswordForm').submit(function(){
        var base=$("#base").val();   
        
        $('.validation-error').html('');
        $("#spinner").show();
        
        var baseurl   = $("#base").val();
        var form_data = $("#changepasswordForm").serializeArray();
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'change-password',
                data:form_data,
               
                success:function(data)
                {
                    
                   
                        if(data.res == 1)
                        {
                            alertify.success(data.msg);
                            $('#changepasswordForm').trigger('reset');
                            setTimeout(function(){location.reload(); }, 700);
                            
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