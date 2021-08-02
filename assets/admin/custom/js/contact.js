

$(document).on('click','.view-cat',function(){
    var id = $(this).attr('id');
     var form_data = new FormData();
        var base = $('#base').val();
        // var csrfName = $('#csrf_token').val();
        // var csrfHash = $('#csrf_hash').val();
        // form_data.append(csrfName,csrfHash);
        form_data.append('id', id);
        $.ajax({
                url : base+'contact_list',
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