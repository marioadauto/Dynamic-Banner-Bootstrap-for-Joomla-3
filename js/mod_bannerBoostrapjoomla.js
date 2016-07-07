jQuery(document).ready(function(){
 
var myCarousel = jQuery("#main-banner");

myCarousel.append("<ol class='carousel-indicators'></ol>");

var indicators = jQuery(".carousel-indicators"); 

myCarousel.find(".carousel-inner").children(".item").each(function(index) {

      (index === 0) ? 

      indicators.append("<li data-target='#main-banner' data-slide-to='"+index+"' class='active'></li>") : 

      indicators.append("<li data-target='#main-banner' data-slide-to='"+index+"' class=''></li>");

 });    

 jQuery('#main-banner').carousel({

    interval: 5000

 });
jQuery("#main-banner").swiperight(function () {
              jQuery(this).carousel('prev');
});
jQuery("#main-banner").swipeleft(function () {
              jQuery(this).carousel('next');
});

});