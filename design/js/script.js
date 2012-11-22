$j = jQuery.noConflict();

$j(document).ready(function() {

	var isTouch = navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad|android)/);
	
	iconMenu();
	
	CustomizeMenu();
	
	RollUpMenu();
	
	ApplyColorbox();
	
	ApplyFancyboxVideo();
	
	//IconMenuSizeing() ;
	
	widgetsSize();
	
	InitMisc();
	
	HoverZoomInit();
	
	OpenCloseShortcode();
	
	PrettySociableInit();
	
	notificationClose();
	
	//notificationClose();

	//pngFix();

	sliderPrepareFix();

	sliderAlternativeFix();
});

$j(window).resize(function(){
	sliderAlternativeFix();
});

function sliderPrepareFix(){
	if($j(window).width() < 497){
		$j('.rev_slider_wrapper').addClass('reloadMe');
	} 
}

function sliderAlternativeFix(){
	if($j(window).width() < 497){
		if($j('.slider-alternative').children('img').attr('src') != ""){
			$j('.rev_slider_wrapper').hide();
			$j('.slider-alternative').show();
		} else {
			$j('.rev_slider_wrapper').show();
			$j('.slider-alternative').hide();
		}
	} else {
		$j('.rev_slider_wrapper').show();
		$j('.slider-alternative').hide();
		
		if($j('.rev_slider_wrapper').hasClass('reloadMe')){
			$j('.rev_slider_wrapper').removeClass('reloadMe');
			location.reload();
		}
	}
}

function pngFix(){
	/*$j('.rev_slider .caption img').each(function(){
		$j(this).css({'filter':"progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='crop',src='" + $j(this).attr('src') + "')"});
	});*/
	$j('html').find('img').each(function(){
		if($j(this).attr('src').indexOf('.png') != -1){
			$j(this).css({'filter':"progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='crop',src='" + $j(this).attr('src') + "')"});
		}
	});
}

function iconMenu() {
	$j('#sti-menu').iconmenu();
}

function PrettySociableInit(){
	
	var homeUrl = $j("body").data("themeurl");
	
	$j.prettySociable({websites: {
				facebook : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Facebook',
					'url': 'http://www.facebook.com/share.php?u=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/facebook.png',
					'sizes':{'width':70,'height':70}
				},
				twitter : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Twitter',
					'url': 'http://twitter.com/home?status=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/twitter.png',
					'sizes':{'width':70,'height':70}
				},
				delicious : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Delicious',
					'url': 'http://del.icio.us/post?url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/delicious.png',
					'sizes':{'width':70,'height':70}
				},
				digg : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Digg',
					'url': 'http://digg.com/submit?phase=2&url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/digg.png',
					'sizes':{'width':70,'height':70}
				},
				linkedin : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'LinkedIn',
					'url': 'http://www.linkedin.com/shareArticle?mini=true&ro=true&url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/linkedin.png',
					'sizes':{'width':70,'height':70}
				},
				reddit : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Reddit',
					'url': 'http://reddit.com/submit?url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/reddit.png',
					'sizes':{'width':70,'height':70}
				},
				stumbleupon : {
					'active': true,
					'encode':false, // If sharing is not working, try to turn to false
					'title': 'StumbleUpon',
					'url': 'http://stumbleupon.com/submit?url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/stumbleupon.png',
					'sizes':{'width':70,'height':70}
				},
				tumblr : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'tumblr',
					'url': 'http://www.tumblr.com/share?v=3&u=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/tumblr.png',
					'sizes':{'width':70,'height':70}
				}
			}});
}

function CustomizeMenu(){
	$j(".mainmenu > ul > li").each(function(){
		if($j(this).has('ul').length){
			$j(this).addClass("parent");	
		}
	});
}

function RollUpMenu(){
	var time = parseInt($j('#mainmenu-dropdown-duration').text());
	var easing = $j('#mainmenu-dropdown-easing').text();
	
	$j(".mainmenu ul li").hover(function(){
		var submenu = $j(this).children('ul');
		var size = $j(this).children('ul').children('li').size();
		
		$j(this).children('ul').children('li').each( function(){
			var sub = $j('.sub-menu').children('li');
			//alert(sub);
			liHeight = parseInt(sub.height());
			
			marT = $j('.sub-menu').children('li').css('marginTop').replace("px", "");
			marB = $j('.sub-menu').children('li').css('marginBottom').replace("px", "");
			
			paddT = $j('.sub-menu').children('li').css('paddingTop').replace("px", "");
			paddB = $j('.sub-menu').children('li').css('paddingBottom').replace("px", "");
			
			borderT = $j('.sub-menu').children('li').css('border-top-width').replace("px", "");
			borderB = $j('.sub-menu').children('li').css('border-bottom-width').replace("px", "");
			
			outerH = $j('.sub-menu').children('li').outerHeight();
		});
		
		var submenuHeight = ((liHeight*size)+(marT*size)+(marB*size)+(paddT*size)+(paddB*size)+(borderB*size));
		//alert(submenuHeight);
		
		//var submenuHeight = parseInt(submenu.height());

		submenu.css("display","block");
		submenu.height("1px");

		$j(this).children('ul').stop('true','true').animate({
			height: submenuHeight
		}, time, easing);
	}, function(){
		$j(this).children('ul').css("display","none");
		$j(this).children('ul').css('height','1px');
	});

}

function ApplyColorbox(){
	// Apply fancybox on all images
	$j("a[href$='gif']").colorbox({rel: 'group', maxHeight:"95%"});
	$j("a[href$='jpg']").colorbox({rel: 'group', maxHeight:"95%"});
	$j("a[href$='png']").colorbox({rel: 'group', maxHeight:"95%"});
	
	$j(".csss").css('display','block');
}
function ApplyFancyboxVideo(){
	// AIT-Portfolio videos
	$j(".ait-portfolio a.video-type").click(function() {

		var address = this.href
		if(address.indexOf("youtube") != -1){
			// Youtube Video
			$j.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'title'			: this.title,
				'width'			: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});
		} else if (address.indexOf("vimeo") != -1){
			// Vimeo Video
			// parse vimeo ID
			var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
			var match = this.href.match(regExp);

			if (match){
			    $j.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'title'			: this.title,
					'width'			: 680,
					'height'		: 495,
					'href'			: "http://player.vimeo.com/video/"+match[2]+"?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff",
					'type'			: 'iframe'
				});
			} else {
			    alert("not a vimeo url");
			}
		}
		return false;
	});

	// Images shortcode
	$j("a.sc-image-link.video-type").click(function() {

		var address = this.href
		if(address.indexOf("youtube") != -1){
			// Youtube Video
			$j.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'title'			: this.title,
				'width'			: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});
		} else if (address.indexOf("vimeo") != -1){
			// Vimeo Video
			// parse vimeo ID
			var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
			var match = this.href.match(regExp);

			if (match){
			    $j.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'title'			: this.title,
					'width'			: 680,
					'height'		: 495,
					'href'			: "http://player.vimeo.com/video/"+match[2]+"?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff",
					'type'			: 'iframe'
				});
			} else {
			    alert("not a vimeo url");
			}
		}
		return false;
	});
}

function SetArrows(actualPosition,productsCount){
	if(actualPosition > 0){
		$j('.product-nav .prev').removeClass('off');
	} else {
		$j('.product-nav .prev').addClass('off');
	}
	if(actualPosition <= productsCount-6){
		$j('.product-nav .next').removeClass('off');
	} else {
		$j('.product-nav .next').addClass('off');
	}
}
function InitMisc() {
  $j('#content input, #content textarea').each(function(index) {
    var id = $j(this).attr('id');
    var name = $j(this).attr('name');
	try{
    if (name.length != 0) {
      $j(this).attr('id', name);
    }
	}
	catch(e){}
  });

  $j('#content label').inFieldLabels();

  $j('.rule span').click(function() {
	  $j.scrollTo(0, 1000, {axis:'y'});
	  return false;
 });

}
function HoverZoomInit() {
  //// Post images
  //$j('#content .entry-thumbnail a').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8});

  // default wordpress gallery
  $j('#content .gallery-item a').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8,zoom:0});

  // ait-portfolio
  $j('#content .ait-portfolio a').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8,zoom:0});

  // schortcodes
  $j('#content a.sc-image-link').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8,zoom:0});

}

function OpenCloseShortcode(){
	
	//$j('#content .frame .frame-close.closed').parent().find('.frame-wrap').hide();
	$j('#content .frame .frame-close.closed .close.text').hide();
	$j('#content .frame .frame-close.closed .open.text').show();
	
	$j('#content .frame .frame-close').click(function(){
		if($j(this).hasClass('closed')){
			var $butt = $j(this);
			$j(this).parent().find('.frame-wrap').slideDown('slow',function(){
				$butt.removeClass('closed');
				$butt.find('.close.text').show();
				$butt.find('.open.text').hide();
			});
		} else {
			var $butt = $j(this);
			$j(this).parent().find('.frame-wrap').slideUp('slow',function(){
				$butt.addClass('closed');
				$butt.find('.close.text').hide();
				$butt.find('.open.text').show();
			});
			
		}
		
	});
}

function IconMenuSizeing() {
	sizeMI = $j('ul#sti-menu > li').size();
	sizeUL = $j('ul.sti-menu').width();
	ulSize = parseFloat(sizeUL, 10);
	
	//alert((ulSize/sizeMI) -8);
	
	widthLI = ( ulSize/sizeMI );
	$j('ul#sti-menu > li').css('width',(widthLI-1));
	
	$j('ul#sti-menu > li').each( function() {
		widthH2 = $j('ul#sti-menu > li > a > h2').width() + 20;
		wH2 = (widthLI - widthH2)/2;
		$j('ul#sti-menu > li > a > h2').css('left',wH2);
		
		widthH3 = $j('ul#sti-menu > li > a > h3').width() +20;
		wH3 = (widthLI - widthH3)/2;
		$j('ul#sti-menu > li > a > h3').css('left',wH3);
		
		widthSpan = $j('ul#sti-menu > li > a > span').width();
		wSpan = (widthLI - widthSpan)/2;
		$j('ul#sti-menu > li > a > span').css('left',wSpan);
	});
	
	//$j('#sti-menu').css('display','block')
}

function widgetsSize() {
	i=0;
	$j('div.widgets > div.box').each( function() {
		$j('div.widgets > div.box').eq(i).addClass('col-' + (i+1));
	i++;
	});
}

function notificationClose() {
	$j('.sc-notification').children('a.close').click( function(event) {
		event.preventDefault();
		$j(this).parent().fadeOut('slow');
	});
}

function notificationClose() {
	$j('.sc-notification').children('a.close').click( function(event) {
		event.preventDefault();
		$j(this).parent().fadeOut('slow');
	});
}


