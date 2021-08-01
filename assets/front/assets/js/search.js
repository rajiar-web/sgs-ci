$(document).ready(function(){
    $('#searchform').submit(function(){
        // alert('hii');
        var search_val = $('#searchinput').val();
        if(search_val == null || search_val =="")
        {
            alertify.error('Please enter any word for search');
        }
        else
        {
            // alert(search_val);
            var baseurl   = $("#base").val();

            var form_data = new FormData();
            form_data.append('search_val',search_val);  
               
                
            $.ajax({
                    type:'POST',
                    dataType:'json',
                    url:baseurl+'search-in-menu',
                    data:form_data,
                    contentType: false,  
                    cache: false,
                    processData: false,
                
                    success:function(data)
                    {                    
        
                        if(data.res == 1)
                        {
                            
                            alertify.success(data.msg);
                            setTimeout(function(){ window.location=baseurl+data.slug; }, 700);
                                                    
                            
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
                                    var v = data.errors[key];
                                    alertify.error(v);
        
                                }
                            }
                        }
                    }
                }); 

        }
        return false;
        
    });

    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
              }
            }
        });
      
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
      
              currentFocus++;
      
              addActive(x);
            } else if (e.keyCode == 38) { //up
      
              currentFocus--;
              addActive(x);
            } else if (e.keyCode == 13) {
              e.preventDefault();
              if (currentFocus > -1) {
      
                if (x) x[currentFocus].click();
              }
            }
        });
        function addActive(x) {
          if (!x) return false;
          removeActive(x);
          if (currentFocus >= x.length) currentFocus = 0;
          if (currentFocus < 0) currentFocus = (x.length - 1);
          x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
          for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
          }
        }
        function closeAllLists(elmnt) {
          var x = document.getElementsByClassName("autocomplete-items");
          for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
      }
      const prds =$('#prds_all').val();
    //   console.log(prds);
      const products = prds.split(",");
    //   console.log(products);
      
      autocomplete(document.getElementById("searchinput"), products);
});