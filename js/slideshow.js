function slideSwitch() {
    var $active = jQuery('#art-slideshow IMG.active');

    if ( $active.length == 0 ) $active = jQuery('#art-slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : jQuery('#art-slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
     var $sibs  = $active.siblings();
     var rndNum = Math.floor(Math.random() * $sibs.length );
     var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 3000, function() {
            $active.removeClass('active last-active');
        });
}


jQuery(function() {

	slideSwitch();
  setInterval( "slideSwitch()", 5000 );
   
});