(function($){


    $(document).ready(function() {
        $("body").css("display", "none");
     
        $("body").fadeIn(1900);
     
        $("a.transition").click(function(event){
            event.preventDefault();
            linkLocation = this.href;
            $("body").fadeOut(700, redirectPage);      
        });
             
        function redirectPage() {
            window.location = linkLocation;
        }
    });

    
    jQuery(document).ready(function() {
        var offset = 650;
        var duration = 300;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.back-to-top').fadeIn(duration);
            } else {
                jQuery('.back-to-top').fadeOut(duration);
            }
        });
     
        jQuery('.back-to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });


    $(document).ready(function() {
      $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
      );
      $('.collapsible').collapsible();
    }); 


    $(document).ready(function() {
      smoothScroll.init({
        speed: 1000,
        easing: 'easeInOutCubic',
        offset: 0,
        updateURL: true,
        callbackBefore: function ( toggle, anchor ) {},
        callbackAfter: function ( toggle, anchor ) {}
      });
    }); 


    // $(document).ready(function(){
    //   $('.slider').slider({full_width: true});
    // });


})(jQuery); // end of jQuery name space