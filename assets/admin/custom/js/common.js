$(document).ready(function(){
      
         $('.noNum').keypress(function(e) {
            preventNumberInput(e);
        });
        $('.nonAlpha').keypress(function (key) {
   
            if(key.charCode < 48 || key.charCode > 57) return false;
        });
         $('.isNumeric').keypress(function(e) {
            CheckDecimal(e);
        });
    
})
  function preventNumberInput(e)
  {
      var keyCode = (e.keyCode ? e.keyCode : e.which);
      if (keyCode > 48 && keyCode < 57){
          e.preventDefault();
      }
  }
  function CheckDecimal(evt) 
  { 

   if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) 
        evt.preventDefault();
  }
function success(msg)
{
	alertify.success(msg);
}
function error(msg)
{
	alertify.error(msg);
}