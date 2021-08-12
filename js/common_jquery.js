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


$(".icon-bar a").hover(
  function () {
    $(this).addClass("active");
  }, 
  function () {
    $(this).removeClass("active");
  }
);


//$('#news-pane').animate({right: -275}, 1000);

$('#news-pane-button').toggle(
	function() 
	{
	
	$('#news-pane').animate({width: 300}, 1000);
	$('#news-pane-button').animate({width: 280}, 1000);
	$('#news-pane article').show();
		
	},
	function()
	{
		$('#news-pane').animate({width: 0}, 1000);
		$('#news-pane-button').animate({width: 145}, 1000, function(){
		$('#news-pane article').hide();});
		
	
	});


/*


$("#animate").click(function() {
    $("#content").animate(
            {"height": "100px", "width": "250px"},
            "slow", function(){
                $(this).html("Animation Completed");
            });
});



$('#close-pane').bind('click', function() {
	
	$('#news-pane').animate({right: -300}, 1000);
	$('#news-pane-button').animate({right: -260}, 1000);	
});
*/

$('.fancybox').fancybox({
	helpers: {
		title: null
	}
});


 });