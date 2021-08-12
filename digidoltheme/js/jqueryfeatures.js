jQuery(window).load(function()
{
	
  // Set a timeout...
  setTimeout(function(){
    // Hide the address bar!
    window.scrollTo(0, 1);
  }, 0);
	
	var properties = {
   color : 'white' ,
   opacity: 1.0
};

	jQuery.each($('.menu-item a'), function(i, el){

  //  $(el).css({'opacity':0});
    
    setTimeout(function(){
       $(el).pulse(properties, 300, 1);},50 + ( i * 300 ));
       
		
    
});

setTimeout(function(){
       $('#link-block').remove();},3000);




if(jQuery.support.opacity){
			    	jQuery('.menu-item a').mouseover(function() {
					   jQuery(this).stop().animate({opacity:1},100);
					}).mouseout(function(){
					   jQuery(this).stop().animate({opacity:0.3},100);
					});
				}





 });
 
 jQuery.fn.pulse = function( properties, duration, numTimes, interval) {  
   
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