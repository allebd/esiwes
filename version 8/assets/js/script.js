;(function($) {



"use strict";



var $body = $('body');

var $head = $('head');

var $header = $('#header');

var transitionSpeed = 300;

var pageLoaded = setTimeout(addClassWhenLoaded, 1000);

var marker = 'img/marker.png';





// Mediaqueries

// ---------------------------------------------------------

var XS = window.matchMedia('(max-width:767px)');

var SM = window.matchMedia('(min-width:768px) and (max-width:991px)');

var MD = window.matchMedia('(min-width:992px) and (max-width:1199px)');

var LG = window.matchMedia('(min-width:1200px)');

var XXS = window.matchMedia('(max-width:480px)');

var SM_XS = window.matchMedia('(max-width:991px)');

var LG_MD = window.matchMedia('(min-width:992px)');







// Touch

var dragging = false;



$body.on('touchmove', function() {

	dragging = true;

});



$body.on('touchstart', function() {

	dragging = false;

});







function mobileHeaderSearchToggle(SM_XS) {

	if (!SM_XS.matches) {

		$headerSearchToggle.removeAttr('style');

	}

}


// Responsive Tabs

// ---------------------------------------------------------

if ($.fn.responsiveTabs) {

	$('.responsive-tabs').responsiveTabs();

}







// Responsive Videos

// ---------------------------------------------------------

if ($.fn.fitVids) {

	$('.fitvidsjs').fitVids();

}







// Latest Jobs Section Slider

// ---------------------------------------------------------

if ($.fn.flexslider && $('.latest-jobs-section').length > 0) {

	$('.latest-jobs-section .flexslider').flexslider({

		pauseOnHover: true,

		controlNav: true,

		directionNav: false,

		slideshow: true,

		animationSpeed: 500

	});

}




// Home Slider

// ---------------------------------------------------------

if ($.fn.flexslider && $('.header-slider').length > 0) {

	$('.header-slider').each(function () {

		var $this = $(this);



		$this.find('.slides > li > div').each(function () {

			$(this).css('background-image', 'url(' + $(this).data('image') + ')');

		});



		$this.flexslider({

			pauseOnHover: false,

			controlNav: true,

			directionNav: false,

			slideshow: true,

			animationSpeed: 1000,

			animation: 'fade',

			start: function () {

				$this.css('opacity', 1);

			}

		});

	});

}


// User Defined

// -------------------------------------


$(document).ready(function(){

    //Get state in Nigeria
    $("#thecountry").click(function() {
        if($("#thecountry").val() == "NIGERIA")
        {
            $("#thestate").show();
        }else{
            $("#thestate").hide();
        }
    });  
    //End of Getting state in Nigeria

    //Beginning of Modal window
    $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.theform').attr('action', $(e.relatedTarget).data('href'));
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
        });
    //End of Modal window

    //New views
    $("#shownew").click(function() {
            $("#thenew").show();
            $("#thegentable").hide();
    });  

    $("#hidenew").click(function() {
            $("#thenew").hide();
            $("#thegentable").show();
    });  
    //End of New views
});




$(window).load(function () {



	// Add body loaded class for fade transition

	addClassWhenLoaded();

	clearTimeout(pageLoaded);



});



function addClassWhenLoaded() {

	if (!$body.hasClass('loaded')) {

		$body.addClass('loaded');

	}

}



}(jQuery));