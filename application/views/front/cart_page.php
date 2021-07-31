<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('front/inc/head');?>
    </head>


    
    <body>
        <?php $this->load->view('front/inc/menu');?>

        <!-- banner -->
        <section class="single-product-sec">
            <div class="container">
                <div class="row col-12">
                <div class="col-12 mt-3 mt-lg-5 mb-2 mb-lg-3" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="600">
                    <nav class="arrow-devider" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
                </div>
    <?php if(!empty($cart_list[0]['p_id'])) {  ?>          
            
                <div class="row row-cols-1 row-cols-md-2 checkout-page cart-page" >
                    <div class="col coupen-box mb-4 cart-items">
                <?php if(!empty($cart_list)) {
                foreach($cart_list as $cl)
                { ?>

                            <input type="hidden" name="product_id" id="o_id<?=$cl['p_id']?>" value="<?=$cl['o_id']?>" />
                            <input type="hidden" name="product_id" id="product_id<?=$cl['p_id']?>" value="<?=$cl['p_id']?>" />
                            <input type="hidden" name="product_base_price" id="product_base_price<?=$cl['p_id']?>" value="<?=$cl['p_discound_price']?>" />
                            <input type="hidden" name="product_org_price" id="product_org_price<?=$cl['p_id']?>" value="<?=$cl['p_original_price']?>" />                            
                            <input type="hidden" name="product_tot_quantity" id="product_tot_quantity<?=$cl['p_id']?>" value="<?=$cl['c_qty']?>" />
                            <input type="hidden" name="product_tot_price" id="product_tot_price<?=$cl['p_id']?>" value="<?=$cl['c_totprice']?>" />
                            <input type="hidden" name="product_dis_price" id="product_dis_price<?=$cl['p_id']?>" value="<?=$cl['c_discount']?>" />

                        <div class="row row-cols-1">
                            <div class="col px-4 py-2 ">
                                <div class="row p-3 card-white">
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-center">
                                        <a href="<?=base_url()?>product-detail/<?=$cl['p_slug']?>"><img src="<?=front_images().$cl['p_image']?>" class="img-thumbnail" alt=""></a>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="row row-cols-2 py-3">
                                        <a href="<?=base_url()?>product-detail/<?=$cl['p_slug']?>"><p class="coupen-title"><?=$cl['p_title']?></p></a>
                                            <p class="d-flex expect-date justify-content-end">Delivery in 2 days, Sun</p>
                                            <p class="mt-3 price-product-checkout d-flex align-items-center" id="changr_price<?=$cl['p_id']?>">	£<?=$cl['c_totprice']?> <span class="ms-2">£<?=$cl['c_to_mrp']?></span></p>
                                            <div class="col-12 d-block d-lg-flex align-items-center">
                                                <label for="qtynumber" class="me-0 me-md-4">QTY</label>
                                                <div class="border-1" id="disinc<?=$cl['p_id']?>">
                                                    <div class="value-button border-end-0 decrease" id="decrease" name="<?=$cl['p_id']?>" onclick="decreaseValue_cart(<?=$cl['p_id']?>)" value="Decrease Value">-</div>
                                                    <input type="number" id="product<?=$cl['p_id']?>" class="product_base_quantity_cart" name="<?=$cl['p_id']?>" value="<?=$cl['c_qty']?>">
                                                    <div class="value-button border-start-0 increase" id="increase" name="<?=$cl['p_id']?>" onclick="increaseValue_cart(<?=$cl['p_id']?>)" value="Increase Value">+</div>
                                                </div>
                                                <span id="<?=$cl['p_id']?>spinner" style="display:none;"><i class="fa fa-spin fa-spinner fa-2x"></i></span>
                                                <button type="button" id="<?=$cl['p_id']?>" class="btn btn-primary remove-btn qty-btn ms-0 ms-md-4 mt-3 mt-lg-0 remove_product" data-mdb-toggle="popover" data-mdb-placement="bottom">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } }?>

                    </div>


                <div class="col">
                    <h2 class="mb-3 mb-lg-4">Your order</h2>
                    <table class="table table-striped border">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        </thead>
                        <?php if(!empty($cart_list)) {
                          foreach($cart_list as $cl)
                        { ?>
                        <tbody>
                        <tr>
                            <th scope="row"><?=$cl['p_title']?></th>
                            <td id="c_to_list<?=$cl['p_id']?>"><?=$cl['c_totprice']?></td>
                        </tr>
                        <?php } }?>
                        <tr>
                            <th scope="row" class=" txt-bold">Total</th>
                            <?php if(!empty($cart_list[0]['o_subtotal'])) { ?>
                            <td class=" txt-bold">£<?=$cart_list[0]['o_subtotal']?></td>
                            <?php } ?>
                        </tr>
                        </tbody>
                    </table>
                    <?php if(!empty($cart_list)) { ?>
                    <div class="col d-flex justify-content-lg-end justify-content-center">
                        <a href="<?=base_url()?>checkout" class="btn btn-dark text-right mt-3 mt-lg-3 place-ordr">Proceed to checkout</a>
                    </div>
                    <?php } ?>
                </div>
                </div>
        <?php } 
        else
        { ?>
        <p>No Items Found</p>
            <div class="col d-flex justify-content-lg-end justify-content-center">
                <a href="<?=base_url()?>listing" class="btn btn-dark text-right mt-3 mt-lg-3 place-ordr">Go to List</a>
            </div>
        <?php } ?>
            </div>
        </section>
        

      


        <!-- footer Start -->
        <?php $this->load->view('front/inc/footer');?>   
        <?php $this->load->view('front/inc/scripts');?>
        <script>

            function increaseValue_cart(id) 
            {
                var value = parseInt(document.getElementById('product'+id).value, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                document.getElementById('product'+id).value = value;

                var checkqty = $('#product'+id).val();
                if(checkqty <= 1)
                {
                    $('#product'+id).val('1');
                    alertify.error('Minimum Quantity is 1');
                }

            }
                
            function decreaseValue_cart(id) 
            {
                var value = parseInt(document.getElementById('product'+id).value, 10);
                value = isNaN(value) ? 0 : value;
                value < 1 ? value = 1 : '';
                value--;
                document.getElementById('product'+id).value = value;

                var checkqty = $('#product'+id).val();
                if(checkqty <= 1)
                {
                    $('#product'+id).val('1');
                    alertify.error('Minimum Quantity is 1');
                }                
            }

        </script>

        <script type="text/javascript" src="<?=front_js();?>cart_page.js"></script>
        
    </body>
</html>