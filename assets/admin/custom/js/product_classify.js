

$(document).ready(function(){
  
    list_prpducts();
   
});   



$(document).ready(function(){
        
 $('#clsform').submit(function(){

     //  $('.validation-error').html('');
       $("#spinner").show();
       $(".cat-btn").hide();
       var baseurl   = $("#base").val();
       var form_data = $("#clsform").serializeArray();
       
          $.ajax({
               type:'POST',
               dataType:'json',
               url:baseurl+'set-classification',
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
                       $('#attrModal').modal('hide');
                    }

                  
               }
           }); 

       return false;
   })
})

function list_prpducts()
{
 $("#category").html('<option value="">Select</option>');
 var baseurl   = $("#base").val();
       $.ajax({
               type:'POST',
               url:baseurl+'product-classify-load',
               success:function(data)
               { 
                 console.log(data);
                 $('#product_tbl_div').html(data);
                 $('#pdct_list').DataTable({
                     "paging": false,
                     "lengthChange": false,
                     "searching": true,
                     "ordering": true,
                     "info": true,
                     "autoWidth": false,
                   });
               }
           });
}
