
var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

	// Twitter Share

$j('a.tweet').click(function(e){

  e.preventDefault();

  var loc = $j(this).attr('href');

  var title  = encodeURIComponent($j(this).attr('title'));

  window.open('http://twitter.com/share?url=' + loc + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top='+($j(window).height()/2 - 225) +', left='+$j(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');

});

// Facebook Share

$j('li.facebook_share a').click(function(e) {
   e.preventDefault();
});

$j('.event_social_holder a').click(function(e) {
   e.preventDefault();
});

// Change Height of slider after page load

$j('#IHM_Stories')
  .delay(800)
  .queue(function (next) {
    $j(this).css('min-height', 'initial');
    next();
  })

// Slider Fullscreen on Load only if about Tablet portrait

if (window.matchMedia('(min-width: 768px)').matches) {

if( $j('#IHM_Stories_Home').length ) {
 $j(window).resize(function() {
         $j('#IHM_Stories .slides').height(
                 $j(window).height() - $j('#IHM_Stories_Home #IHM_Stories .slides').offset().top);
 });
 $j(window).resize();
}

}

// Resize function

function doResize() {
	$j(window).resize();
}

// Big Gif Resize

$j(".biggif_parent").delay(8000).fadeOut('slow', function(){
	$j("#IHM_Stories_Home").fadeIn(doResize);
});

// gif on Homepage
if ( $j(".home-logo-animation").length ){
	console.log('home animation present');
	$j("home-logo-animation").fadeIn('slow', function () {
    $j(this).delay(5000).fadeOut('slow');
  });
}

});
