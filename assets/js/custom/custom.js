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
	
	
	

    /* Order Option */
    $(document).on("click","#orderOption",function(e){
    	e.preventDefault();
    	if( $("div.order-options").length > 0 ) {
    		$("div.order-options").slideToggle(300);
    	}
    });

    $(document).on("click","#closeOrder",function(e){
    	e.preventDefault();
    	$("#orderOption").trigger('click');
    });

    /* Resize Height of Top Noise Bakground */
    resize_topbg();
    $(window).on("resize",function(){
    	resize_topbg();
    });
    function resize_topbg() {
    	var frameH = $("img.frame").height();
    	var divHelper = $(".bghelper").height();
	    var siteHead = $("#masthead").height();
	    var totalHeight = divHelper + siteHead;
	    if(totalHeight > siteHead) {
	    	$(".topbg").css("height",totalHeight+"px");
	    }
	    
    }

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click","#toggleMenu",function(){
		$(this).toggleClass('open');
		$('body').toggleClass('open-mobile-menu');
		$("#site-navigation").slideToggle(300);
	});

});// END #####################################    END
