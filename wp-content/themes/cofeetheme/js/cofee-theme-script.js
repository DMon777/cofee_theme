jQuery(document).ready(function($) {

    $(window).load(function () {


        $(function() {

            $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

        });

        $(function() {
            $('.gallery a').Chocolat();
        });




        var cofeeVisibleItems = parseInt(cofeeObject.visible_items);
        var cofeeAnimationSpeed = parseInt(cofeeObject.animation_speed);

        $("#flexiselDemo3").flexisel({

            visibleItems: cofeeVisibleItems,
            animationSpeed: cofeeAnimationSpeed,
            autoPlay: true,
            autoPlaySpeed: 1000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 2
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

    });
});
