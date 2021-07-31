$(document).ready(function(){
  $("#spinner").hide();
         
    $('#slider').submit(function(){
          $('.validation-error').html('');
          $("#spinner").show();
          $(".cat-btn").hide();
          var baseurl   = $("#base").val();
          var form_data = $("#slider").serializeArray();
          form_data.push({name: 'desc', value: CKEDITOR.instances.desc.getData()});  
          form_data.push({name: 'desc2', value: CKEDITOR.instances.desc2.getData()});  
             $.ajax({
                  type:'POST',
                  dataType:'json',
                 
                url:baseurl+'submit-services',
                  data:form_data,
                 
                  success:function(data)
                  { 
                      //console.log(data);
                      $(".error").html("");
                      $("#spinner").hide();
                      $(".cat-btn").show();
                      if(data.res == 1)
                       { 
                          success(data.msg);
                          setTimeout(function(){ window.location=baseurl+'services_list'; }, 700);
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
                                error(v);

                            }
                        }
                    }
  
                     
                  }
              }); 
  
          return false;
      })
  });






$(document).on('change','#inputlargefile',function(){
$('#imgPath').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
var baseurl = $('#base').val();
var file_data = $('#inputlargefile').prop('files')[0];
var form_data = new FormData();
//     var categoryId = $('#newsCategory').val();
// var width=784px;
// var height=410px;
form_data.append('file', file_data);
$.ajax({
    url : baseurl+'imageservices', 
    type: "POST",
    dataType:'json',
    data: form_data,
    contentType: false,  
    cache: false,
    processData: false,
    success: function (data) {
        var filePath = data.path;
        var fileName = data.filename;
    
        if(filePath)
        {
            var flpth = "'"+ filePath +"'";
    //   var imgsrc = '<div><img class="image-preview" src='+baseurl + filePath + '  class="upload-preview" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;">Delete <i class="fa fa-trash" aria-hidden="true"></i></div></div>';
    var imgsrc = '<div><img class="image-preview" src='+baseurl + filePath + '  class="upload-preview" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
        $("#imgPath").html(imgsrc); 
        $('#imgname').val(fileName); 
        }
            
    }
});
});

$(document).on('click','.uploadbtnlarge',function(){
$('#inputlargefile').click();

});






$(document).on('change','#inputlargefile2',function(){
$('#imgPath2').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
var baseurl = $('#base').val();
var file_data = $('#inputlargefile2').prop('files')[0];
var form_data = new FormData();
form_data.append('file', file_data);
$.ajax({
    url : baseurl+'imageservices', 
    type: "POST",
    dataType:'json',
    data: form_data,
    contentType: false,  
    cache: false,
    processData: false,
    success: function (data) {
        var filePath = data.path;
        var fileName = data.filename;
        
        if(filePath)
        {
        var flpth = "'"+ filePath +"'";
        var imgsrc2 = '<div><img class="image-preview2" src='+baseurl + filePath + '  class="upload-preview2" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
        $("#imgPath2").html(imgsrc2); 
        $('#imgname2').val(fileName); 
        }
                
    }
});
});

$(document).on('click','.uploadbtnlarge2',function(){
$('#inputlargefile2').click();

});
















$(document).on('change','#inputlargefile3',function(){
$('#imgPath3').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
var baseurl = $('#base').val();
var file_data = $('#inputlargefile3').prop('files')[0];
var form_data = new FormData();
form_data.append('file', file_data);
$.ajax({
    url : baseurl+'imageservices', 
    type: "POST",
    dataType:'json',
    data: form_data,
    contentType: false,  
    cache: false,
    processData: false,
    success: function (data) {
        var filePath = data.path;
        var fileName = data.filename;
        
        if(filePath)
        {
        var flpth = "'"+ filePath +"'";
        var imgsrc3 = '<div><img class="image-preview3" src='+baseurl + filePath + '  class="upload-preview3" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
        $("#imgPath3").html(imgsrc3); 
        $('#imgname3').val(fileName); 
        }
                
    }
});
});

$(document).on('click','.uploadbtnlarge3',function(){
$('#inputlargefile3').click();

});



$(document).on('change','#inputlargefile4',function(){
$('#imgPath4').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
var baseurl = $('#base').val();
var file_data = $('#inputlargefile4').prop('files')[0];
var form_data = new FormData();
form_data.append('file', file_data);
$.ajax({
    url : baseurl+'imageservices', 
    type: "POST",
    dataType:'json',
    data: form_data,
    contentType: false,  
    cache: false,
    processData: false,
    success: function (data) {
        var filePath = data.path;
        var fileName = data.filename;
        
        if(filePath)
        {
        var flpth = "'"+ filePath +"'";
        var imgsrc4 = '<div><img class="image-preview4" src='+baseurl + filePath + '  class="upload-preview4" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
        $("#imgPath4").html(imgsrc4); 
        $('#imgname4').val(fileName); 
        }
                
    }
});
});

$(document).on('click','.uploadbtnlarge4',function(){
$('#inputlargefile4').click();

});


$(document).on('change','#inputlargefile5',function(){
$('#imgPath5').html('<div ><i class="fa fa-spin fa-spinner"></i></div>');
var baseurl = $('#base').val();
var file_data = $('#inputlargefile5').prop('files')[0];
var form_data = new FormData();
form_data.append('file', file_data);
$.ajax({
    url : baseurl+'imageservices', 
    type: "POST",
    dataType:'json',
    data: form_data,
    contentType: false,  
    cache: false,
    processData: false,
    success: function (data) {
        var filePath = data.path;
        var fileName = data.filename;
        
        if(filePath)
        {
        var flpth = "'"+ filePath +"'";
        var imgsrc5 = '<div><img class="image-preview5" src='+baseurl + filePath + '  class="upload-preview5" width="30%" /><div i onclick="delblogImg('+ flpth + ')" style="width: 30%;text-align: right;cursor: pointer;"></div></div>';
        $("#imgPath5").html(imgsrc5); 
        $('#imgname5').val(fileName); 
        }
                
    }
});
});

$(document).on('click','.uploadbtnlarge5',function(){
$('#inputlargefile5').click();

});


$(document).on('click','.del-services',function(){
    // alert('ddd');
$('.main-card-title').html('Delete Service');
var id = $(this).attr('id');

alertify.confirm("Are you sure ?.",
    function(){
        
        var form_data = new FormData();
        var baseurl = $('#base').val();
        
        form_data.append('id', id);
        $.ajax({
                url : baseurl+'deleteservices',
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
    }).set({title:"Confirm delete Services"}).set({labels:{ok:'Delete', cancel: 'Cancel'}});
});
 