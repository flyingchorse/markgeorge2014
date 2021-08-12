

   
 


 $(function() {


 $('.gallery-thumbnail').bind('mouseenter',function(){
					var $elem = $(this);
					$elem.addClass('active')
					})
					.bind('mouseleave',function(){
					var $elem = $(this);
					$elem.removeClass('active')

					});

 $('#white-button').click(function (){
 
    			    		$('body').addClass('white-back');
    			    		$.post("http://mg.digidol-media.com/wp-content/themes/digidoltheme/getsession.php", { bgcolor: "white-back"});
    	});
  $('#black-button').click(function (){
 
    			    		$('body').removeClass('white-back');
    			    		$.post("http://mg.digidol-media.com/wp-content/themes/digidoltheme/getsession.php", { bgcolor: "black-back"});
    	});


 });
 
 