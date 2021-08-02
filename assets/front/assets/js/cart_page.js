$(document).ready(function(){
    $('.remove_product').click(function(){

        var p_id =$(this).attr('id'); 
        $('#'+p_id+'spinner').show();
        $('.remove_product').hide();
              
        


        var baseurl   = $("#base").val();
        var form_data = new FormData();

         form_data.append('p_id',p_id);
               
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'remove-cart-product',
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
                        $('.remove_product').show();
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

    function car_dtl_change(id)
    {
        // alert('ss');
        var checkqty = $('#product'+id).val();
        if(checkqty <= 1)
        {
            $('#product'+id).val('1');
            alertify.error('Minimum Quantity is 1');
        }

        var product_org_price = $('#product_org_price'+id).val();        
        var qty = $('#product'+id).val();        
        
        var pr_org_price = qty * product_org_price;

        var product_price = $('#product_base_price'+id).val();

        tot_price = qty * product_price;

        dis_price = pr_org_price - tot_price;

        // alert(dis_price);
        // alert(qty);

        $('#product_dis_price'+id).val(dis_price);
        $('#product_tot_price'+id).val(tot_price);
        $('#product_tot_quantity'+id).val(qty);

        $('#changr_price'+id).html('£ '+ tot_price+ ' <span class="ms-2">£ '+pr_org_price+' </span>');
        $('#c_to_list'+id).html(tot_price);



        var product_org_price = $('#product_org_price'+id).val();
        var product_base_price = $('#product_base_price'+id).val();
        var product_dis_price = $('#product_dis_price'+id).val();
        var product_tot_qty = $('#product_tot_quantity'+id).val();
        var product_tot_price = $('#product_tot_price'+id).val();
        var product_id = $('#product_id'+id).val();
        var o_id = $('#o_id'+id).val();


        var baseurl   = $("#base").val();
        var form_data = new FormData();

         form_data.append('product_org_price',product_org_price);
         form_data.append('product_base_price',product_base_price); 
         form_data.append('product_dis_price',product_dis_price); 
         form_data.append('product_tot_qty',product_tot_qty); 
         form_data.append('product_tot_price',product_tot_price);   
         form_data.append('product_id',product_id); 
         form_data.append('o_id',o_id); 
               $('#disinc'+id).hide();
               $('.remove_product').hide();
               $('#'+id+'spinner').show();
                
           $.ajax({
                type:'POST',
                dataType:'json',
                url:baseurl+'add-to-cart-from-cart',
                data:form_data,
                contentType: false,  
                cache: false,
                processData: false,
               
                success:function(data)
                { 
                    $('.border-1').hide();
                    $('.remove_product').hide();           
    
                    if(data.res == 1)
                    {
                            alertify.success(data.msg);
                            setTimeout(function(){ window.location.reload(); }, 10);
                                                 
                        
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
                                // console.log(key);
                                var v = data.errors[key];
                                alertify.error(v);
    
                            }
                        }
                    }
                }
            });
    }


    $('.product_base_quantity_cart').on('input', function() {
        var id =$(this).attr('name'); 
        car_dtl_change(id);
    });

    $('.decrease').click(function(){
        // alert('dd');
        var id =$(this).attr('name');
        car_dtl_change(id);
    });
    $('.increase').click(function(){
        // alert('ii');
        var id =$(this).attr('name');
        car_dtl_change(id);
    });

    
});