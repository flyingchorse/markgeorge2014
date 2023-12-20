var imgs=[];

function toggleElem(elem)
{
     var elemId = elem.id;
     var inImgs = $.inArray(elemId,imgs);
     if (inImgs > -1){
       imgs.splice(inImgs,1);
       $("ul#portfolio_ul #portfolio_"+elemId).remove();
       $(elem).siblings("img.check").hide();
     } else {
          imgs.push(elemId);
          $("ul#portfolio_ul").append("<li id='portfolio_"+elemId+"' >" +
               "<img class='handle'  src='../../plugins/pdf-portfolio/icn/handle@2x.png')' width=19 />" +
               "<img class='portThumb' src='" + elem.src.replace('w=600&h=400','w=200&h=132') + "' height=66 /><a href='#' class='remove_from_portfolio'><img src='../../plugins/pdf-portfolio/icn/delete@2x.png' width=19 /></a>" +
               "<input type='hidden' name='img[]' value='" + elemId + "' />" +
               "</li>");
          $(elem).siblings("img.check").show();
     }
     setOpacity(elem);
}

function setOpacity(elem)
{
	var positionInArray = $.inArray(elem.id,imgs); 
	opac = (positionInArray > -1) ? 0.5 : 1.0;
	$(elem).css('opacity',opac);
	if (imgs.length>0){
	  $("#downloadlink").removeClass("downloadoff downloadhover").addClass("downloadon");
	} else {
	  $("#downloadlink").removeClass("downloadon downloadhover").addClass("downloadoff");
	}
} 

$(document).ready(function()
{
	
	 $("#portfolio_ul").sortable({
      placeholder: 'ui-state-highlight',
      handle: 'img',
      opacity: 0.7
    });

    $('#portfolio_ul li a.remove_from_portfolio').live('click', function(){
      var li = this.parentNode;
      var thumbId = li.id.substring(10);
      toggleElem($('#' + thumbId)[0]);
      return false;
    });


$("ul.thumbgrid-container img.gal_thumb").each(function(){
          $(this).click(function()
          {
               toggleElem(this);
          });
          
     });
    
$("a#downloadlink").hover(function(){
		if (imgs.length > 0)
		{
			$("a#downloadlink").removeClass("downloadon downloadoff").addClass("downloadhover"); 
		} 
	},
	function()
		{
			if (imgs.length > 0){
				$("a#downloadlink").removeClass("downloadhover").addClass("downloadon"); 
			}
		} 
	).click(function(evt){
		if (imgs.length>0)
		{
			$("form#pdfform").submit();
		} 
		evt.preventDefault();
		return false; 
	});



});