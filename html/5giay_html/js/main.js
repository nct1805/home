$('.carousel-all[data-type="multi"] .item').each(function() {
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (var i = 0; i < 3; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}

		next.children(':first-child').clone().appendTo($(this));
	}
});
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
