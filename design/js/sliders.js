// Jquery no conflict mode
$j = jQuery.noConflict();

/* ******************************************************************************************
 * Bootstrap
 * ******************************************************************************************/
$j(document).ready(function() {
	
	InitSlider();
	
	InitWidgetSlider();
});

/* ******************************************************************************************
 * AnythingSlider Init
 * ******************************************************************************************/
function InitSlider() {
	if($j('body').has('ul#slider').length){

	  var delay = parseInt($j('#slider-delay').text());
	  var animTime = parseInt($j('#slider-animTime').text());
	  var sliderHeight = parseInt($j('#slider-height').text());

	  var actualSlide = 0;

	  //$j('#slider').css("width","1024px");
	  $j('#slider').css("height",sliderHeight+"px");

	  $j('#slider').anythingSlider({
	  	  easing: 'linear',
	  	  autoPlay: true,
	  	  pauseOnHover: true,
	  	  autoPlayLocked: true,
	  	  resumeOnVideoEnd    : true,
	  	  autoPlayDelayed     : true,
		  delay               : delay,
		  animationTime       : animTime,
		  resumeDelay         : delay,
		 onInitialized       : function(e, slider){
			
			var newBackground = slider.$currentPage.find("div.background-image").text();
			if(newBackground){
				$j("#main-background-slider-top").show();
				$j("#main-background-slider-bottom").show();
				$j("#main-background-slider-top img").attr("src",newBackground);
			}
			if($j('#slider li.activePage').hasClass('video')){
    	 		$j(".anythingSlider .anythingControls").css("bottom","45px");
    	 	} else {
    	 		$j(".anythingSlider .anythingControls").css("bottom","10px");
    	 	}
    	 	
		 },
    	 onSlideInit         : function(e, slider){
    	  	// set bottom background image
    	  	var newBackground = slider.$targetPage.find("div.background-image").text();
			if(newBackground){
				$j("#main-background-slider-bottom").show();
				$j("#main-background-slider-bottom img").attr("src",newBackground);
				$j("#main-background-slider-top img").fadeOut(animTime);
				$j("#main-background-slider-bottom img").fadeIn(animTime);

			} else {
				$j("#main-background-slider-top img").fadeOut(animTime);
				$j("#main-background-slider-bottom").hide();
				$j("#main-background-slider-top").show();
			}
			
    	 },
    	 onSlideComplete     : function(slider){
			// set top background image
			var newTopBackground = slider.$currentPage.find("div.background-image").text();
			if(newTopBackground){
				//$j("#main-background-slider-bottom").show();
				$j("#main-background-slider-top img").attr("src",newTopBackground);
				$j("#main-background-slider-top").show();
				$j("#main-background-slider-top img").fadeIn(100);
			} else {
				$j("#main-background-slider-top img").hide();
				$j("#main-background-slider-top").hide();
			}

    	 	if($j('#slider li.activePage').hasClass('video')){
    	 		$j(".anythingSlider .anythingControls").css("bottom","45px");
    	 	} else {
    	 		$j(".anythingSlider .anythingControls").css("bottom","10px");
    	 	}
    	 	
    	 }
	  });

	 // $j('div.anythingSlider .forward').hide();
	  //$j('div.anythingSlider .back').hide();
	  $j('div.anythingSlider .start-stop').hide();

	  $j('div.anythingSlider')/*.anythingSliderFx({
	 '.fade' : [ 'fade' ],
	 // '.selector' : [ 'caption', 'distance/size', 'time', 'easing' ]
	 // 'distance/size', 'time' and 'easing' are optional parameters
	 '.caption-top'    : [ 'caption-Top', '50px' ],
	 '.caption-topfull': [ 'caption-Top', '50px' ],
	 '.caption-right'  : [ 'caption-Right', '150px', '1000', 'easeOutBounce' ],
	 '.caption-bottom' : [ 'caption-Bottom', '50px' ],
	 '.caption-bottomfull': [ 'caption-Bottom', '50px' ],
	 '.caption-left'   : [ 'caption-Left', '130px', '1000', 'easeOutBounce' ],
	 '.expand'         : [ 'expand', '20%', '800', 'easeOutBounce' ],
	 '.fromTop'		 : [ 'top', '300px', '1500', 'easeOutElastic' ]
	})*/
	/* add a close button (x) to the caption */
	.find('div[class*=caption]')
	  .css({ position: 'absolute' })
	  .prepend('<span class="close">x</span>')
	  .find('.close').click(function(){
		var cap = $j(this).parent(),
		 ani = { bottom : -50 }; // bottom
		if (cap.is('.caption-top')) { ani = { top: -50 }; }
		if (cap.is('.caption-left')) { ani = { left: -150 }; }
		if (cap.is('.caption-right')) { ani = { right: -200 }; }
		cap.animate(ani, 400, function(){ cap.hide(); } );
	  });
	}
}
/*
 * Widget Slider
 */
function InitWidgetSlider() {
	if($j('body').has('ul#home-widget-slider').length){
		
		$j('ul#home-widget-slider').css("width","500px");
		$j('ul#home-widget-slider').css("height","300px");
		
		$j('ul#home-widget-slider').anythingSlider({
	  	  	autoPlay: true,
	  	  	pauseOnHover: true,
	  	    autoPlayLocked: true,
	  	    autoPlayDelayed: true,
	  	  	delay : 5000,
	  	  	animationTime : 300
		}).anythingSliderFx({
			'.fade' : [ 'fade' ]
		});
		
		$j('.widget-slider').show();
	}
}