$(document).ready(function(){

    car_dtl_change();


    function car_dtl_change()
    {
        var checkqty = $('.product_base_quantity').val();
        if(checkqty <= 0)
        {
            $('.product_base_quantity').val(1);
            alertify.error('Minimum Quantity is 1');
        }
        var product_org_price = $('#product_org_price').val();        
        var qty = $('.product_base_quantity').val();

        var pr_org_price = qty * product_org_price;

        var product_price = $('#product_base_price').val();

        tot_price = qty * product_price;

        dis_price = pr_org_price - tot_price;
        $('#product_dis_price').val(dis_price);

        $('#product_tot_price').val(tot_price);
        $('#product_tot_quantity').val(qty);

        $('#changr_price').html('£ '+ tot_price+ ' <span class="ms-3">£ '+pr_org_price+' </span>');
        // alertify.success(qty + ' * ' + product_price + ' = ' +  tot_price );
    }



    $('.product_base_quantity').on('input', function() {

        car_dtl_change();
    });

    $('#decrease').click(function(){
        car_dtl_change();

    });

    $('#increase').click(function(){
        car_dtl_change();

    });


    $('#add_to_cart').click(function(){
        var product_org_price = $('#product_org_price').val();
        var product_base_price = $('#product_base_price').val();
        var product_dis_price = $('#product_dis_price').val();
        var product_tot_qty = $('#product_tot_quantity').val();
        var product_tot_price = $('#product_tot_price').val();
        var product_id = $('#product_id').val();
        $('#spinner').show();
        $('#add_to_cart').hide();


        var baseurl   = $("#base").val();
        var form_data = new FormData();

         form_data.append('product_org_price',product_org_price);
         form_data.append('product_base_price',product_base_price); 
         form_data.append('product_dis_price',product_dis_price); 
         form_data.append('product_tot_qty',product_tot_qty); 
         form_data.append('product_tot_price',product_tot_price);   
         form_data.append('product_id',product_id); 
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'add-to-cart',
                data:form_data,
                contentType: false,  
                cache: false,
                processData: false,
               
                success:function(data)
                { 
                    $('#spinner').hide(); 
                                     
    
                    if(data.res == 1)
                    {
                            alertify.success(data.msg);
                            setTimeout(function(){ window.location.reload(); }, 700);
                                                 
                        
                    }
                    else
                    {
                        $('#add_to_cart').show();
                        if($.isEmptyObject(data.errors))
                        {
                            alertify.error(data.msg);
                        }
                        else
                        {
                            for(var key in data.errors)
                            {
                                // console.log(key);
                                var v = data.errors[key];
                                alertify.error(v);
    
                            }
                        }
                    }
                }
            });

        


    });











});