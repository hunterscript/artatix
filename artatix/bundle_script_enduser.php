<script src="js/vendor/jquery-2.2.4.min.js"></script>

<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/ion.rangeSlider.js"></script>

<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/main.js"></script>

<script src="plugin/owlcarousel/dist/owl.carousel.min.js"></script>


<script>
    $('.owl-carousel').owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        lazyLoad: true,

        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                
            },
            600: {
                items: 1,
               
            },
            1000: {
                items: 1,
               
                loop: false
            }
        }

        
    })

    
</script>

<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    });    
</script>