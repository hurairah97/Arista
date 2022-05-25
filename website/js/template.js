//[Master Javascript]



//Template script here
(function($) {
  'use strict' ;
	
	
//slider

var tpj=jQuery;

							var revapi490;
							tpj(document).ready(function() {
								if(tpj("#rev_slider_490_1").revolution == undefined){
									revslider_showDoubleJqueryError("#rev_slider_490_1");
								}else{
									revapi490 = tpj("#rev_slider_490_1").show().revolution({
										sliderType:"hero",
				jsFileLocation:"revolution/js/",
										sliderLayout:"fullwidth",
										dottedOverlay:"none",
										delay:9000,
										navigation: {
										},
										responsiveLevels:[1240,1024,778,480],
										visibilityLevels:[1240,1024,778,480],
										gridwidth:[1240,1024,778,480],
										gridheight:[800,500,400,300],
										lazyType:"none",
										parallax: {
											type:"mouse",
											origo:"slidercenter",
											speed:2000,
											levels:[2,3,4,5,6,7,12,16,10,50,46,47,48,49,50,55],
											type:"mouse",
										},
										shadow:0,
										spinner:"off",
										autoHeight:"off",
										disableProgressBar:"on",
										hideThumbsOnMobile:"off",
										hideSliderAtLimit:0,
										hideCaptionAtLimit:0,
										hideAllCaptionAtLilmit:0,
										debugMode:false,
										fallbacks: {
											simplifyAll:"off",
											disableFocusListener:false,
										}
									});
								}
							});	/*ready*/

// Counter
	$('.count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});

// widgetClientTestimonial on blog page widget
	$(document).ready(function(){
    "use strict"; // Start of use strict
        $('.widgetClientTestimonial').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            directionNav: false
        })
	}); // End of use strict
  
// prettyPhoto
	$("a[rel^='prettyPhoto[gallery1]']").prettyPhoto();	
	


	
 })(jQuery);// End of use strict

	


	



