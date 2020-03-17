/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/* Slideshow */
	var swiper = new Swiper('.slideshow', {
		slidesPerView: 1,
		spaceBetween: 0,
		effect: 'fade', /* "fade", "cube", "coverflow" or "flip" */
		loop: true,
		autoplay: {
			delay: 4000,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
    });

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click","#toggleMenu",function(){
		$(this).toggleClass('open');
		$('.mobile-navigation').toggleClass('open');
		$('body').toggleClass('open-mobile-menu');
		$('.site-header .logo').toggleClass('fixed');
		var parentdiv = $(".mobile-navigation").outerHeight();
		var mobile_nav_height = $(".mobile-main-nav").outerHeight();
		if(mobile_nav_height>parentdiv) {
			$('.mobile-navigation').addClass("overflow-height");
		}
	});

});// END #####################################    END