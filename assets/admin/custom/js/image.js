function remove_img(item,path,remdiv)
{
  var baseurl=$('#base').val();
  var form_data = new FormData();
  var csrfName = $('#token').val(),
      csrfHash = $('#hash').val();
      form_data.append(csrfName,csrfHash);
      form_data.append("item",item);
      form_data.append("path",path);
      form_data.append("remdiv",remdiv);
      $.ajax({
                url: baseurl+"delete-image",
                type:"post",
                dataType:'json',
                data:form_data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(result)
                {  
                  
                  if(result.res==1)
                  {
                   
                     $('#'+remdiv).remove();
                     error(result.msg);
                  } 
                  else
                  {

                       error(result.msg);
                  }
                   
               }
          });
}
function select_thumb(value,id)
{
  $(".fileuploader-items>ul>li").attr("style",'');
    $('#'+id).attr("style",'border: 3px solid #28a745;border-radius: 10px;');
    $('#images_thumbnail').val(value);
     success('Thumbnail selected');
}
function upload_grp_images(data,item)
{
    var baseurl=$('#base').val();
    var msg="";
    $('#progressbar').html('<div align="center"><i class="fa fa-spin fa-spinner"></i></div>');
    $('#file_msg').html("");
    var numItems = $(".fileuploader-items-list li");
    var count=numItems.length;
    var str=$('#all_images').val();
    if(count>8)
    {
        msg="Only 8 files are allowed to be uploaded.";
       
    }
    else
    {
      
        var form_data = new FormData();
        var len=data.length;
        var temp_count = len + count;
        var form_data = new FormData();
        for(i=0;i<len;i++) 
         {
          // alert(data[i].size);
            var flag=0;
            if(i<8)
            {
                if(parseFloat(data[i].size)>5024000)//
                {   var name=data[i]['name'];
                  
                     $('#progressbar').html("");
                     $('#progressbar1').html("");
                     msg= 'Please Upload file upto 4.5 MB';
                    flag=1;
                }
                if(data[i]['name'].length>150)
                {
                   
                    $('#progressbar').html("");
                    $('#progressbar1').html("");
                     msg="File name must be less than 150 characters.";
                    
                      flag=1;
                }
                if(flag==0)
                {
                    form_data.append('file-'+i,  data[i]); 
                }
                else
                {
                    error(msg);
                }
            }
            else
            {
                   msg="Only 8 files are allowed to be uploaded.";
                  error(msg);
                   break;
            }

         }
         var csrfName = $('#token').val(),
             csrfHash = $('#hash').val();
          form_data.append(csrfName,csrfHash);
          form_data.append('item',item);
          ajax_fun(form_data,item);
      }
       
}
function ajax_fun(form_data,item)
{
 
  var baseurl=$('#base').val();
	$.ajax({
            url: baseurl+'upload-images',
            type:"post",
            dataType:'json',
            data:form_data,
            cache: false,
			      contentType: false,
			      processData: false,

                success:function(result)
                {  
                  console.log(result);
                   $('#progressbar').html(' ');
                   $('#progressbar1').html(' ');
                	  if(result.msg==1)
                    {
                    	var str="";
                    	var images = result.data;
                    	
    				
                  for(var key in images)
			            {
                      if(item=="up_file")
                        var v = baseurl+'mathsone/admin/images/file_png.png';
                      else
  				                var v = images[key]['filepathfull'];
				               
                        if(item=="files")
                        {
                            var numItems = $(".fileuploader-items-list li");
                            var count=numItems.length;
                            var div_id="img_list_"+(count+1);
                            if($("#" + div_id).length > 0) 
                            {
                               div_id="img_list_"+(count+1+100);
                            }
                        }
                        else
                        {
                            var div_id=item+"_list1";
                        }
                       console.log(item);
                        var thumb = "'"+images[key]['filepath']+"'";
                        var thumb_divid = "'"+div_id+"'";
                        var divid = item+"-images_list";
                        var input_item = item+"_input";
                        var del_args = "'"+item+"','"+images[key]['filepath']+"','"+div_id+"'";

                        if(item=="up_file" || item=="preview_img" || item=="education_img")
                        {
                          str='<li id="'+div_id+'" class="fileuploader-item file-has-popup file-type-image file-ext-jpg">'+
                                  '<div class="columns">'+
                                    '<div class="column-thumbnail">'+
                                      '<div class="fileuploader-item-image">'+
                                        '<img src="'+v+'" width="48" height="36">'+
                                         '<input type="hidden" name="'+input_item+'[]" id="'+input_item+'" value="'+images[key]['filename']+'">'+
                                      '</div>'+
                                      '<span class="fileuploader-action-popup"></span>'+
                                    '</div>'+
                                    '<div class="column-title"><div title="Hydrangeas.jpg">'+images[key]['filename']+'</div><span>'+images[key]['filesize']+' KB</span></div>'+
                                    '<div class="column-actions">'+
                                      '<a class="fileuploader-action fileuploader-action-remove" onclick="remove_img('+del_args+')" title="Remove"><i></i></a>'+
                                    '</div>'+
                                  '</div>'+
                                  '<div class="progress-bar2"><span></span></div>'+
                                  '</li>';
                                  $('#'+divid).html(str);
                              
                        }
                        else
                        {
                            str='<li  class="fileuploader-item file-type-image file-ext-jpg" id="'+div_id+'">'+
                          '<div class="fileuploader-item-inner">'+
                          '<input type="hidden" name="'+input_item+'[]" value="'+images[key]['filepath']+'">'+
                              '<div class="thumbnail-holder">'+
                                  '<div class="fileuploader-item-image fileupload-no-thumbnail" onclick="select_thumb('+thumb+','+thumb_divid+')"><img src="'+v+'" >'+
                                  '</div>'+
                              '</div>'+
                  '<div class="actions-holder"><a onclick="remove_img('+del_args+')" class="remove-btn" title="Remove">'+
                  '<i class="fa fa-trash icon-style"></i></a>'+
                              '</div>'+
                          '</div>'+
                      '</li>';
                      $('#'+divid).append(str);

                        }
	                    	
                     
	                    	
	                    	count++;
	                    }
	                   
	                    $('#progressbar').html("");
	                      var msg="File uploaded.";
		                   success(msg);
                    }
                    else
                    {
                     if(!$.isEmptyObject(result.error))
                          error(result.error);
                    }
                 
               }
          });
   
}
function replace_comma(str)
{
    if (str.match(/,.*,/)) 
    { // Check if there are 2 commas
        str = str.replace(',', ''); // Remove the first one
    }
    return str;
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
