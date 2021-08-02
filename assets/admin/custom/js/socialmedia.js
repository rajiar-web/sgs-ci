$(document).ready(function(){
    
    var sm = [];
    sm["Facebook"] = "fab fa-facebook-f";
    sm["Instagram"] = "fab fa-instagram";
    sm["Twitter"] = "fab fa-twitter";
    sm["linkedin"] = "fab fa-linkedin-in";
    sm["youtube"] = "fab fa-youtube";
    sm["Pinterest"] = "fab fa-pinterest-p";
    sm["Skype"] = "fab fa-skype";
    sm["Dribbble"] = "fab fa-dribbble";
    sm["Pinterest"] = "fab fa-pinterest-p";
    sm["Snapchat"] = "fab fa-snapchat-ghost";
    sm[ "Vimeo"] = "fab fa-vimeo";
    
   
    
	$('#smform').submit(function(){
        var flag=true
        $('input[name^="icon"]').each(function(i){
            var vv = $(this).val();
            if(vv=="" || vv==null)
            {
                flag=false;
                
            }
       });
       if(flag)
       {
            $('.validation-error').html('');
            $("#spinner").show();
            $(".cat-btn").hide();
            var baseurl   = $("#base").val();
            var form_data = new FormData();
            var token   = $("#token").val();
            var hash   = $("#hash").val();
            form_data.append(token, hash);
            $('input[name^="icon"]').each(function(i){
                form_data.append('icon'+i,$(this).val());
                
             });
             $('input[name^="title"]').each(function(i){
                form_data.append('title'+i,$(this).val());
                
             });
             $('input[name^="link"]').each(function(i){
                form_data.append('link'+i,$(this).val());
                
             });
             var count = $(".table .fields-row").length ;
             form_data.append("count", count);
             $.ajax({
                url : baseurl+'social-media-action',
                type : 'post',
                data : form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType:'json',
                success:function(data)
                { 
                    $(".error").html("");
                    $("#spinner").hide();
                    $(".cat-btn").show();
                    
                    if(data.res == 1)
                    {
                        success(data.msg);
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
        }
        else
        {
            error('Please choose icon!');
        }

            return false;
    })
    $(document).on('click','.icon-item',function(){
        var flag=true;
        var no = $(this).attr('no');
        var media = $(this).attr('index');
        var cval = $(this).attr('cval');

        $('input[name^="icon"]').each(function(i){
            var vv = $(this).val();
            if(vv==cval)
            {
                flag=false;
                
            }
       });
       if(flag)
       {
            $('.icon-btn'+no).html('<i class="'+cval+'"></i>');
            $('#title'+no).val(media);
            $('#icon'+no).val(cval);
       }
       else
       {
           error("Social Media already added");
       }
        
        
    });
    $(document).on('click','.del-sm',function(){
        
        var row = $(this).attr('row');
        $('#row_'+row).remove();
        
    });
    $(document).on('click','.add-more-sm',function(){

        var count = $(".table .fields-row").length ;
        var str="";
        str+='<tr id="row_'+count+'" class="fields-row"><input type="hidden" id="row_hidden'+count+'" name="row_hidden[]" value="'+count+'">'+
        '<td>'+
        '<div class="btn-group">'+
        
                '<button type="button" class="btn btn-success icon-btn'+count+'"><i class="fa fa-ban"></i></button>'+

                '<div class="btn-group">'+
                '<button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">'+
                '</button>'+
                '<div class="dropdown-menu" x-placement="bottom-start" x-out-of-boundaries="" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">';
                for(var key in sm)
                {
                   var ee = sm[key];
                   str+='<a class="dropdown-item icon-item" href="#" no="'+count+'" index="'+key+'" cval="'+ee+'"><i class="'+ee+'"></i> '+key+'</a>';

                }
                str+='</div>'+
                '</div>'+
            '</div>'+
        '</td>'+
        '<td>'+
            '<input type="hidden"  id="icon'+count+'" name="icon[]"  value=""> '+
            '<input type="text" class="form-control" id="title'+count+'" name="title[]" placeholder="Enter Title" value="">'+
            '<span id="title'+count+'_error" class="validation-error"></span> '+
       '</td>'+
        '<td>'+
            '<input type="text" class="form-control" id="link'+count+'" name="link[]" placeholder="Enter URL" value="">'+
            '<span id="link'+count+'_error" class="validation-error"></span> '+
        '</td>'+
        '<td>'+
            '<a href="javascript:void(0)" row="'+count+'" class="del-sm btn btn-danger"><i class="fa fa-trash"></i></a>'+
        '</td>'+
    
    '</tr>';
    $('#smTbl').append(str);
        
        
    });
    //end view category.................... 
			  

		  //image uploading function b
		  $('#inputlargefile').change(function () {
			   
			$('#inputlargefile_error').html("");
            $('#spinner').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
            $("#displayImage").hide(); 
			var base = $('#base').val();
			var file_data = $('#inputlargefile').prop('files')[0];
			var form_data = new FormData();
			var token   = $("#token").val();
			var hash   = $("#hash").val();
		   
			form_data.append(token, hash);
			form_data.append('file', file_data);
			form_data.append('type', 'large');
			$.ajax({
				url : base+'service-image',
				type: "POST",
				dataType:'json',
				data: form_data,
				contentType: false,  
				cache: false,
				processData: false,
				success: function (data) 
				{
                    console.log(data);
					if(data.res==1)
					{
						var filePath = data.path;
						var fileName = data.name;
						if(filePath)
						{
							var flpth = "'"+ filePath +"'";
                            var imgsrc =   base + filePath;
                            $("#displayImage").show(); 
						    $("#displayImage").attr("src",imgsrc); 
						    $('#imgname').val(fileName); 
						}
					}
					else
					{
						$('#inputlargefile_error').html(data.response);
					}
					$('#spinner').html('');
					
				   
				}
			});
		});

		$('.iconFileUpload').on('click', function ()
        {
            
            $('#iconFile').click();

        });
        $('.contentImg').on('click', function ()
        {
            
            $('#inputlargefile').click();

        });
})
function populatesiteContentList()
{
        $('#siteContentList').html('<div align="center"><i class="fa fa-spin fa-spinner"></i></div>');;
       var baseurl   = $("#base").val();
        var form_data = new FormData();
        
        var form_data = new FormData();
                var token   = $("#token").val();
                var hash   = $("#hash").val();
                
                form_data.append(token, hash);
                form_data.append('service_id', $('#service_id').val());
                console.log($('#service_id').val());
        $.ajax({
                type:'POST',
                url:baseurl+'polulate-service-content',
                data : form_data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data)
                { 
                    $('#siteContentList').html(data);
                }
            });

}  