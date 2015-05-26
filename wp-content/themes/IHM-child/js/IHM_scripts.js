var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

/*=== Homepage Stick Navigation ===*/

var windowH = $j(window).height();
var stickToBot = windowH - $j('.please_fit').outerHeight(true);

$j('.please_fit').css({'top': '0px', 'position':'relative', 'height': windowH});

/*=== Stories Slider ===*/

$j('#IHM_Stories')
	.fitVids()
	.flexslider({
	    animation: "fade",
	    animationLoop: false,
	    controlNav: true,
	    directionNav: true,
	    prevText:"",
	    nextText:"",
	    slideshow: false,
 });

/*=== Video Carousel ===*/

$j('#IHM_Videos')
	.flexslider({
		animation: "slide",
		animationLoop: true,
		itemWidth: 560,
		itemMargin: 5,
		controlNav: false,
		slideshow: false,
		move: 1,
		prevText:"",
	    nextText:"",
});

/*=== Fancybox ===*/

$j("a.IHM_popup").fancybox({
		 width  : '600',
		 type	: 'iframe',
		 autoSize : true,
		 helpers:  {
	        overlay : {
	            css : {'background': 'rgba(255,255,255,.75)',}
	        }
    	}
	});

$j("a.IHM_sys_popup").fancybox({
		 type	: 'iframe',
		 helpers:  {
	        overlay : {
	            css : {'background': 'rgba(255,255,255,.75)',}
	        }
    	}
	});

});



