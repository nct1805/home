//$('.carousel-all[data-type="multi"] .item').each(function() {
//	var next = $(this).next();
//	if (!next.length) {
//		next = $(this).siblings(':first');
//	}
//	next.children(':first-child').clone().appendTo($(this));
//
//	for (var i = 0; i < 2; i++) {
//		next = next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//	}
//});


//$('.carousel-all[data-type="multi"] .item').each(function() {
//	var next = $(this).next();
//	 var totalItems = $('.item').length;
//	if (!next.length) {
//		next = $(this).siblings(':first');
//	}
//	next.children(':first-child').clone().appendTo($(this));
//	if(totalItems>5){
//		for (var i = 0; i < 2; i++) {
//		next = next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//		}
//	}else{
//		for (var i = 0; i < 5; i++) {
//		next = next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//	}
//	}
//
//	
//});

//$('#carousel .item').each(function() {
//	var next = $(this).next();
//	 var totalItems = $('.item2').length;
//	if (!next.length) {
//		next = $(this).siblings(':first');
//	}
//	next.children(':first-child').clone().appendTo($(this));
//	if(totalItems>=4){
//		for (var i = 0; i < 5; i++) {
//		next = next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//		}
//	}else{
//		for (var i = 0; i <2; i++) {
//		next = next.next.next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//	}
//	}	
//});
//
//$('#carousel2 .item').each(function() {
//	var next = $(this).next();
//	 var totalItems = $('.item2').length;
//	if (!next.length) {
//		next = $(this).siblings(':first');
//	}
//	next.children(':first-child').clone().appendTo($(this));
//	if(totalItems>4){
//		for (var i = 0; i < 5; i++) {
//		next = next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//		}
//	}else{
//		for (var i = 0; i <2; i++) {
//		next = next.next.next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//	}
//	}	
//});
//
//$('#carousel3 .item').each(function() {
//	var next = $(this).next();
//	 var totalItems = $('.item3').length;
//	if (!next.length) {
//		next = $(this).siblings(':first');
//	}
//	next.children(':first-child').clone().appendTo($(this));
//	if(totalItems>=4){
//		for (var i = 0; i < 5; i++) {
//		next = next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//		}
//	}else{
//		for (var i = 0; i <2; i++) {
//		next = next.next.next.next();
//		if (!next.length) {
//			next = $(this).siblings(':first');
//		}
//
//		next.children(':first-child').clone().appendTo($(this));
//	}
//	}	
//});
$('.carousel4[data-type="multi4"] .item4').each(function() {
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (var i = 0; i < 7; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}

		next.children(':first-child').clone().appendTo($(this));
	}
});
$(document).ready(function(){	
    Slide_Product();
	$('#global-modal1').modal('show');
});

function Slide_Product(){   
	 var owl1 = $(".slpt1"); 
    owl1.owlCarousel({
     // items :5, //10 items above 1000px browser width
//      itemsDesktop : [4030,5], //5 items between 1000px and 901px
//      itemsDesktopSmall : [1024,5], // betweem 900px and 601px
//      itemsTablet: [768,4], //2 items between 600 and 0
//      itemsMobile : [375,2], // itemsMobile disabled - inherit from itemsTablet option
      autoPlay: false,
      lazyLoad : true,
      slideSpeed: 300
    });
    $('.slider_prev1').click(function(e) {
        owl1.trigger('owl.prev');
    });
    $('.slider_next1').click(function(e) {
        owl1.trigger('owl.next');
    });
	var owl2 = $(".slpt2"); 
    owl2.owlCarousel({
      //items :16, //10 items above 1000px browser width
//      itemsDesktop : [4030,8], //5 items between 1000px and 901px
//      itemsDesktopSmall : [1024,8], // betweem 900px and 601px
//      itemsTablet: [768,4], //2 items between 600 and 0
//      itemsMobile : [375,2], // itemsMobile disabled - inherit from itemsTablet option
      autoPlay: false,
      lazyLoad : true,
      slideSpeed: 300
    });
    $('.slider_prev2').click(function(e) {
        owl2.trigger('owl.prev');
    });
    $('.slider_next2').click(function(e) {
        owl2.trigger('owl.next');
    });
	var owl3 = $(".slpt3"); 
    owl3.owlCarousel({
      //items :16, //10 items above 1000px browser width
//      itemsDesktop : [4030,8], //5 items between 1000px and 901px
//      itemsDesktopSmall : [1024,8], // betweem 900px and 601px
//      itemsTablet: [768,4], //2 items between 600 and 0
//      itemsMobile : [375,2], // itemsMobile disabled - inherit from itemsTablet option
      autoPlay: false,
      lazyLoad : true,
      slideSpeed: 300
    });
    $('.slider_prev3').click(function(e) {
        owl3.trigger('owl.prev');
    });
    $('.slider_next3').click(function(e) {
        owl3.trigger('owl.next');
    });
	 
}
 jQuery(document).ready(function ($) {
    $('img.lazyload').each(function () {
        $(this).attr('data-original', $(this).attr('src'));
        $(this).attr('src', lazyImage);
        $(this).lazyload({
            effect: "fadeIn"
        });
    })   
});
///////////////
$(document).on('scroll', function() {
  if ($(document).scrollTop() > 150) {
	  $('#header').addClass('navbar-fixed-top');							
  } else {
	  $('#header').removeClass('navbar-fixed-top');						
  }
});
