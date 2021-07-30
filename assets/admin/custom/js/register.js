


  
         $(document).on('click','.del-register',function(){
            $('.main-card-title').html('Delete Registration Details');
           var id = $(this).attr('id');
          
           alertify.confirm("Are you sure ?.",
             function(){
                   
                   var form_data = new FormData();
                   var baseurl = $('#base').val();
                  
                   form_data.append('id', id);
                   $.ajax({
                           url : baseurl+'delete-register',
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
             }).set({title:"Confirm delete Registration Details"}).set({labels:{ok:'Delete', cancel: 'Cancel'}});
        });
 


        $(document).on('click','.view-cat',function(){
            var id = $(this).attr('id');
             var form_data = new FormData();
                var base = $('#base').val();
            
                form_data.append('id', id);
                $.ajax({
                        url : base+'view-register',
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