//==============================================================
// CUSTOM SCRIPTS
// Author: Surendra Budhathoki
// 2014
// ==============================================================




  jQuery(document).ready(function() {

      jQuery('ul.features-nav a').smoothScroll();

      jQuery('#main-nav .scroll-btn a , .next-section, .banner-link').click(function(event){
          event.preventDefault();
          var targetelem = jQuery(this).attr('href');
          var elemoffsetvalue = jQuery(targetelem).offset().top;
          var finalvalue = elemoffsetvalue - 125;
          jQuery('body,html').animate({
              scrollTop:finalvalue
          })

      });


      jQuery('.go-to-top,#footer a.btn').click(function(){
          jQuery('body,html').animate({
              scrollTop:0
          })

      });
      jQuery('.menu-trigger').click(function(){

          jQuery('#main-nav').slideToggle();
      })

  }) ;


jQuery(window).load(function(){



    jQuery('.banner-slider').flexslider({
        controlNav: false,
        animation: "fade",

        start: function(slider){
            jQuery('body').removeClass('loading');
        }
    });

    jQuery('.features-control').flexslider({
        animation: "slide",
        slideshow: false,
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        itemWidth: 12,
        itemMargin: 25,
        asNavFor: '.features-slider'
    });

    jQuery('.features-slider').flexslider({
        animation: "fade",
        slideshow: false,
        manualControls: ".features-carousel li",
        sync: ".features-control",
        start: function(slider){
            jQuery('body').removeClass('loading');
        }
    });

    if(jQuery('html.no-touch').length){
        if(jQuery(window).width() > 767) {

            ( function( $ ) {

                // Initiat skrollr
                skrollr.init({
                    forceHeight: false
                });

            } )( jQuery );
        }
    }
});


  
 
