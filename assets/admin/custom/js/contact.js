$(document).on('click','.del-contact',function(){
    $('.main-card-title').html('Delete Contact details');
   var id = $(this).attr('id');
  
   alertify.confirm("Are you sure ?.",
     function(){
           
           var form_data = new FormData();
           var baseurl = $('#base').val();
          
           form_data.append('id', id);
           $.ajax({
                   url : baseurl+'deletecontact',
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
     }).set({title:"Confirm delete Contact Details"}).set({labels:{ok:'Delete', cancel: 'Cancel'}});
});





$(document).on('click','.view-cat',function(){
    var id = $(this).attr('id');
     var form_data = new FormData();
        var base = $('#base').val();
    
        form_data.append('id', id);
        $.ajax({
                url : base+'view-contact',
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
                    $("#tbodytr").removeAttr("style");
                    $("#tbodytr").removeAttr("id");
                    

                    
                    
                }
            });
});