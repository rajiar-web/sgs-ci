$('#cform').submit(function(){

    $('.validation-error').html('');
    $("#spinner").show();
    $(".cat-btn").hide();
    var baseurl   = $("#base").val();
    var form_data = $("#cform").serializeArray();
     form_data.push({name: 'desc', value: CKEDITOR.instances.desc.getData()});  
           
            
       $.ajax({
            type:'POST',
            dataType:'json',
            //url:baseurl+'admin/List_controller/reasons_action',
             url:baseurl+'incomeaction',
            data:form_data,
           
            success:function(data)
            { 
               // console.log(data);
                $(".error").html("");
                $("#spinner").hide();
                $(".cat-btn").show();
                 

                if(data.res == 1)
                {
                    success(data.msg);
                    $('#cid').val(null);
                      CKEDITOR.instances['desc'].setData("");
                    $('#cform').trigger('reset');
                    $('.main-card-title').html('New Income');
                    setTimeout(function(){ window.location = baseurl+'lack_of_income' }, 700);
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


$(document).on('click','.del-income',function(){
    $('.main-card-title').html('Delete Income');
   var id = $(this).attr('id');
  
   alertify.confirm("Are you sure ?.",
     function(){
           
           var form_data = new FormData();
           var base = $('#base').val();
          
           form_data.append('id', id);
           $.ajax({
                   url : base+'deleteincome',
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
                        //$('.del-income').closest('tr').remove();
                        location.reload(); 
                        //    poplutale_subcat();
                        
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
     }).set({title:"Confirm delete income"}).set({labels:{ok:'Delete', cancel: 'Cancel'}});
});