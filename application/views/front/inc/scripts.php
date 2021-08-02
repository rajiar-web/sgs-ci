<script src="<?=front_js();?>jquery.min.js"></script>
<script type="text/javascript" src="<?=front_js();?>droopmenu.js"></script>
<script type="text/javascript" src="<?=front_js();?>mdb.min.js"></script>
<script type="text/javascript" src="<?=front_js();?>custom.js"></script>
<script src="<?=front_js();?>aos.js"></script>
<script src="<?=alertify_js();?>alertify.min.js"></script>
<script type="text/javascript" src="<?=front_js();?>search.js"></script>
<script>
    AOS.init();
</script>
<script>
    $(window).on('scroll', function () {
    if ($(this).scrollTop() > 300)
    $('.scroll-top-arrow').fadeIn('slow');
    else
    $('.scroll-top-arrow').fadeOut('3000');
    
    
    
    
    var scroll = $(window).scrollTop();    
    if (scroll <= 0) {
    $(".nav-coustom").removeClass("bg-dark");
    }
    else{
    $(".nav-coustom").addClass("bg-dark");
    }
    });
    
    //Click event to scroll to top
    $(document).on('click', '.scroll-top-arrow', function () {
    $('html, body').animate({scrollTop: 0}, 800);
    return false;
    });
</script>

<script type="text/javascript">		
    /*	--------------------------------------------------
    :: Initialize menu
    -------------------------------------------------- */
    jQuery(function($){
        $('.droopmenu-navbar').droopmenu({
            dmArrow:true,
            dmOffCanvas:true,
            dmOffCanvasPos:'dmoffright',
            dmArrowDirection:'dmarrowup'
        });
    });
</script>  