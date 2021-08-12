$(document).ready(function() {
	
/*	
	var properties = {
   color : 'white'};
	jQuery.each($('.contact .main-navigation li'), function(i, el){

 //   $(el).css({'opacity':0});
   

    setTimeout(function(){
       $(el).pulse(properties, 20, 1);},20 + ( i * 130 ));

       

    
});	*/


 
         var i = 0,
         delay = 25,
         animate = 25;
         function animateList(){
                 var imax = $("ul#menu-contact_menu li").length -2;
                 $("ul#menu-contact_menu li:eq(" + i + ")")
                         .addClass("current_page_item")
                         .animate({"fontSize" : "60px"}, delay)
                         .animate({"fontSize" : "60px"}, animate, function(){
	                         	 $("ul#menu-contact_menu li:eq(" + i + ")").removeClass("current_page_item")
                                 if (i == imax) 
                                 {
                                 
                                 }
                                 else
                                 { i++;
                                 animateList();
                                 }
                         });
 
                 };
 
       animateList();


var pulseicons = {opacity:0.3};

$('#biog-icon').pulsed(pulseicons , 5010, 40, 50);




$('#menu-item-1099').addClass('current_page_item');

$('.menu-item').mouseover(function() {
					var menuitem = $(this).attr('id');
						if (menuitem == 'menu-item-1099'){}
						else
						{
						$('#menu-item-1099').removeClass("current_page_item current-menu-item");
						}
					}).mouseout(function(){
					   $('#menu-item-1099').addClass('current_page_item');
					});


/*
setTimeout(function(){
       $('#link-block').remove();},3000);
*/




/*
if(jQuery.support.opacity){
			    	jQuery('.menu-item a').mouseover(function() {
					   jQuery(this).stop().animate({opacity:1},100);
					}).mouseout(function(){
					   jQuery(this).stop().animate({opacity:0.3},100);
					});
				}
*/


// Need to add if to check if menu-item-316 is current if so stop.


 });
 
 jQuery.fn.pulse = function( properties, duration, numTimes, interval) {  
   
   if (duration === undefined || duration < 0) duration = 500;
   if (duration < 0) duration = 500;

   if (numTimes === undefined) numTimes = 1;
   if (numTimes < 0) numTimes = 0;

   if (interval === undefined || interval < 0) interval = 0;

   return this.each(function() {
      var $this = jQuery(this);
      
      var subsequentTimeout = 0;
      for (var i = 0; i < numTimes; i++) {
         window.setTimeout(function() {
	         $this.addClass("current_page_item").delay(130).queue(function(next){
	         	var themenuitem = $(this).attr('id');
	         	if(themenuitem == 'menu-item-1099'){}
	         	else
	         	{
	         	$(this).removeClass("current_page_item")
	         	}
	         	next();
	         	});	
         }, (duration + interval)* i);
      }
   }); 
};


jQuery.fn.pulsed = function( properties, duration, numTimes, interval) {  
   
   if (duration === undefined || duration < 0) duration = 500;
   if (duration < 0) duration = 500;

   if (numTimes === undefined) numTimes = 1;
   if (numTimes < 0) numTimes = 0;

   if (interval === undefined || interval < 0) interval = 0;

   return this.each(function() {
      var $this = jQuery(this);
      var origProperties = {};
      for (property in properties) {
         origProperties[property] = $this.css(property);
      }

      var subsequentTimeout = 0;
      for (var i = 0; i < numTimes; i++) {
         window.setTimeout(function() {
            $this.animate(
               properties,
               {
                  duration:duration / 2,
                  complete:function(){
                     $this.animate(origProperties, duration / 2)}
               }
            );
         }, (duration + interval)* i);
      }
   }); 
};
