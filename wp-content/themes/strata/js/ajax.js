var $j = jQuery.noConflict();
var firstLoad = true;

function perPageBindings () {
	"use strict";
	
	$j('.qode_slider_preloader .ajax_loader_slider').hide();
	content = $j('.content_inner');
	initQodeSlider();
	initQodeCarousel();
	initMessageHeight();
	initToCounter();
	initCounter();
	initProgressBars();
	initListAnimation();
	initPieChart();
	initPieChartWithIcon();
	initServiceAnimation();
	initParallaxTitle();
	initParallax(parallax_speed);
	initNiceScroll();
	loadMore();
	prettyPhoto();
	initFlexSlider();
	fitVideo();
	initAccordion();
	initAccordionContentLink();
	initMessages();
	fitAudio();
	initProgressBarsIcon();
	initMoreFacts();
	placeholderReplace();
	initPortfolio();
	initPortfolioSingleInfo();
	initTabs();
	initTestimonials();
	initBlog();
	showContactMap();
	backButtonShowHide();
	initElementsAnimation();
	backToTop();
	initSteps();
	updateShoppingCart();
	initProgressBarsVertical();
	initImageHover();
	countClientsPerRow();
	animatedTextIconHeight();
	checkAnchorOnScroll();
	initVideoBackground();
	initVideoBackgroundSize();
	initIconWithTextAnimation();
	initPortfolioSlider();
	initCoverBoxes();
	countAnimatedTextIconPerRow();
	ajaxSubmitCommentForm();
	createContentMenu();
	contentMenuScrollTo();
	contentMenuCheckLastSection();
	createSelectContentMenu();
}

function ajaxSetActiveState(me){
	"use strict";
	
	if(me.closest('.main_menu').length > 0){
		$j('.main_menu a').parent().removeClass('active');
	}
	
	if(me.closest('.second').length === 0){
		me.parent().addClass('active');
	}else{
		me.closest('.second').parent().addClass('active');
	}
	
	if(me.closest('.mobile_menu').length > 0){
		$j('.mobile_menu a').parent().removeClass('active');
		me.parent().addClass('active');
	}
	
	$j('.main_menu a, .mobile_menu a').removeClass('current');
	me.addClass('current');
	
}

 function setPageMeta(content) {
	"use strict";
 
	// set up title, meta description and meta keywords
	var newTitle = content.find('.meta .seo_title').text();
	var newDescription = content.find('.meta .seo_description').text();
	var newKeywords = content.find('.meta .seo_keywords').text();
	$j('head meta[name="description"]').attr('content', newDescription);
	$j('head meta[name="keywords"]').attr('content', newKeywords);
	document.title = newTitle;
	
	var newBodyClasses = content.find('.meta .body_classes').text();
	var myArray = newBodyClasses.split(',');
	$j("body").removeClass();
	for(var i=0;i<myArray.length;i++){
		if (myArray[i] !== "page_not_loaded"){
			$j("body").addClass(myArray[i]);
		}
	}
}

 function setToolBarEditLink(content) {
	"use strict";
	
	if($j("#wp-admin-bar-edit").length > 0){
		// set up edit link when wp toolbar is enabled
		var page_id = content.find('#qode_page_id').text();
		var old_link = $j('#wp-admin-bar-edit a').attr("href");
		var new_link = old_link.replace(/(post=).*?(&)/,'$1' + page_id + '$2');
		$j('#wp-admin-bar-edit a').attr("href", new_link);
	}
}

/* function for managing effect transition */
function balanceNavArrows () {
	"use strict";

	var navLinks = $j('.main_menu a');
	var seenCurrent = false;
	navLinks.each(function (link) {
		var me = $j(link);
		if (me.hasClass('current')) {
			seenCurrent = true;
			return;
		}
		if (seenCurrent) {
			me.removeClass('up');
			me.removeClass('left');
			me.addClass('down');
			me.addClass('right');
		} else {
			me.removeClass('down');
			me.removeClass('right');
			me.addClass('up');
			me.addClass('left');
		}
	});
}

function callCallback(callbacks, name, self, args) {
	"use strict";
	
	if (callbacks[name]) { 
		callbacks[name].apply(self, args);
	}
}

//sliding out current page
function slideOutOldPage(content, direction, direction2, animationTime, callbacks) { 
	"use strict";
	
	var animation;
	
	if($j('.content_inner').hasClass('updown')){
		animation = 'ajax_updown';
	}else if($j('.content_inner').hasClass('fade')){
		animation = 'ajax_fade';
	}else if($j('.content_inner').hasClass('updown_fade')){
		animation = 'ajax_updown_fade';
	}else if($j('.content_inner').hasClass('leftright')){
		animation = 'ajax_leftright';
	}else if($j('body').hasClass('ajax_updown')){
		animation = 'ajax_updown';
	}else if($j('body').hasClass('ajax_fade')){
		animation = 'ajax_fade';
	}else if($j('body').hasClass('ajax_updown_fade')){
		animation = 'ajax_updown_fade';
	}else if($j('body').hasClass('ajax_leftright')){
		animation = 'ajax_leftright';
	}
	
	var contentHeight = content.height();	
	var targetHeight = Math.max(contentHeight, $j(window).height());
	viewport.css('min-height',targetHeight);
	content.css({position: 'relative', height: contentHeight});
	
	var windowWidth = $j(window).width();
	$j('html, body').animate({scrollTop: 0}, 400, function(){
		if($j('.carousel').length){
			$j('.carousel').carousel('pause');
		}
		
		if(animation === "ajax_updown"){
			var targetTop;
			if ('down' === direction) {
				targetTop = 0 - contentHeight;
			} else {
				targetTop = targetHeight;
			}

			content.stop().animate({top: targetTop}, animationTime, function () {
				$j(this).hide().remove();
				
				callCallback(callbacks,"oncomplete", null, []);
				$j('.ajax_loader').fadeIn();
			});
		}else if(animation === "ajax_fade" || animation === "ajax_updown_fade"){
			content.delay(300).stop().fadeOut(animationTime,function(){
				$j(this).hide().remove();
				callCallback(callbacks,"oncomplete", null, []);
				$j('.ajax_loader').fadeIn();
			});
		}else if(animation === "ajax_leftright"){
			var targetLeft;
			if ('left' === direction2) {
				targetLeft = 0 - windowWidth;
			} else {
				targetLeft = windowWidth;
			}
			
			content.stop().animate({left: targetLeft}, animationTime, function () {
				$j(this).hide().remove();
				
				callCallback(callbacks,"oncomplete", null, []);
				$j('.ajax_loader').fadeIn();
			});
			
		}
	
	});
	
}

//sliding in current page
function slideInNewPage(text, direction, direction2, animationTime, callbacks, url) {
	"use strict";
	
	viewport.html('');
		
	var newHTML = $j(text);
	var animation;
	var header_style;
	
	if(newHTML.find('.content_inner').hasClass('updown')){
		animation = 'ajax_updown';
	}else if(newHTML.find('.content_inner').hasClass('fade')){
		animation = 'ajax_fade';
	}else if(newHTML.find('.content_inner').hasClass('updown_fade')){
		animation = 'ajax_updown_fade';
	}else if(newHTML.find('.content_inner').hasClass('leftright')){
		animation = 'ajax_leftright';
	}else if(newHTML.find('.content_inner').hasClass('no_animation')){
		animation = 'ajax_no_animation';
	}else if($j('body').hasClass('ajax_updown')){
		animation = 'ajax_updown';
	}else if($j('body').hasClass('ajax_fade')){
		animation = 'ajax_fade';
	}else if($j('body').hasClass('ajax_updown_fade')){
		animation = 'ajax_updown_fade';
	}else if($j('body').hasClass('ajax_leftright')){
		animation = 'ajax_leftright';
	}
	
	if(newHTML.find('header.page_header').hasClass('light')){
		header_style = 'light';
	}else if(newHTML.find('header.page_header').hasClass('dark')){
		header_style = 'dark';
	}else{
		header_style = header_style_admin;
	}
	
	var header_color;
	if(newHTML.find('.header_bottom').attr('style')){
		header_color = newHTML.find('.header_bottom').attr('style');
	} else {
		header_color="";
	}
	
	var header_color_top;
	if(newHTML.find('.header_top').attr('style')){
		header_color_top = newHTML.find('.header_top').attr('style');
	} else {
		header_color_top="";
	}
	
	var content_margin;
	if(newHTML.find('.content').hasClass('content_top_margin')){
		content_margin = "content_top_margin";
	} else {
		content_margin="";
	}

	var newContent = newHTML.find('.content_inner').hide().css({position: 'relative', visibility: 'hidden'}).show();
	newContent.find('.animate_title_text .title h1').css({visibility: 'hidden'});
	viewport.append(newContent);
	
	$j('.side_menu_button a').removeClass('opened');
	newHTML.filter('script').each(function(){
			$j.globalEval(this.text || this.textContent || this.innerHTML || '');
	});
	
	newContent.waitForImages(function() {
		//after load of all pictures show sliders/portfolios
		$j('.flexslider, .slider_small, .portfolio_outer').css('visibility','visible');
		
		perPageBindings();
		
		var newHeight = newContent.height();
		if($j(window).height() > newHeight){
			viewport.css('min-height',newHeight);
		}else{
			viewport.css('min-height',$j(window).height());
		}
		newContent.find('.animate_title_text .title h1').css({visibility: 'visible'});
		var windowWidth = $j(window).width();
		
		var hash = url.split('#')[1];
		if($j('.ajax_loader').length){
			$j('.ajax_loader').fadeOut(400,function(){
				//scroll to section if url has hash
				if(hash !== undefined && $j('[data-q_id="#'+hash+'"]').length > 0){
					$j('html, body').animate({
						scrollTop: $j('[data-q_id="#'+hash+'"]').offset().top - $j('header.page_header').height()
					}, 1500);
					return false;
				}
			});
		}else{
			//scroll to section if url has hash
			if(hash !== undefined && $j('[data-q_id="#'+hash+'"]').length > 0){
				$j('html, body').animate({
					scrollTop: $j('[data-q_id="#'+hash+'"]').offset().top - $j('header.page_header').height()
				}, 1500);
			}
		}
		
		/* check for dark/light class - start */
		if($j('header.page_header').hasClass('light')){
			if(header_style === "dark" || header_style === ""){
				$j('header').removeClass('light').addClass(header_style);
			}
		}else if($j('header.page_header').hasClass('dark')){
			if(header_style === "light" || header_style === ""){
				$j('header').removeClass('dark').addClass(header_style);
			}
		}else if(header_style === "light" || header_style === "dark" || header_style === ""){
			$j('header.page_header').addClass(header_style);
		}else{
			$j('header.page_header').removeClass("left right").addClass(header_style);
		}
		if($j('.carousel').length){
			checkSliderForHeaderStyle($j('.carousel .active'));
		}
		/* check for dark/light class - end */
		
		/* check for page background color - start */
		
		if(header_color !== ""){
			$j('.header_bottom').attr('style', header_color);
		} else {
			$j('.header_bottom').removeAttr("style");
		}
		
		if(header_color_top !== ""){
			$j('.header_top').attr('style', header_color_top);
		} else {
			$j('.header_top').removeAttr("style");
		}
		
		/* check for page background color - end */
		
		/* check for content margin - start */
		
		if(content_margin !== ""){
			$j('.content').addClass(content_margin);
		} else {
			$j('.content').removeClass('content_top_margin');
		
		}
		
		/* check for content margin - end */
		
		if(animation === "ajax_updown" || animation === "ajax_updown_fade"){
			if ('down' === direction) {
			newContent.css({top: viewport.height()});
			} else {
				newContent.css({top: - newHeight});
			}
			
			
			newContent.css({visibility: 'visible'}).stop().animate({top: 0}, animationTime, function(){
				initPortfolioSingleInfo();
				initTitleAreaAnimation();
				$j('.blog_holder.masonry').isotope( 'reLayout');
				$j('.content').css('min-height',$j(window).height()-$j('header.page_header').height()-$j('footer:not(.uncover)').height() + 100); // min height for content to cover side menu bar, 100 is negative margin on content
				if($j('nav.content_menu').length > 0){
					content_menu_position = $j('nav.content_menu').offset().top;
					contentMenuPosition();
				}
				callCallback(callbacks,"oncomplete", null, []);
			});
			
		}else if(animation === "ajax_fade"){
			
			newContent.css({visibility: 'visible', display:'none'}).stop().fadeIn(animationTime,function(){
				initPortfolioSingleInfo();
				initTitleAreaAnimation();
				$j('.blog_holder.masonry').isotope( 'reLayout');
				$j('.content').css('min-height',$j(window).height()-$j('header.page_header').height()-$j('footer:not(.uncover)').height()); // min height for content to cover side menu bar
				if($j('nav.content_menu').length > 0){
					content_menu_position = $j('nav.content_menu').offset().top;
					contentMenuPosition();
				}
				callCallback(callbacks,"oncomplete", null, []);
			});
		}else if(animation === "ajax_no_animation"){
			
			newContent.css({visibility: 'visible', display:'none'}).stop().fadeIn(0,function(){
				initPortfolioSingleInfo();
				initTitleAreaAnimation();
				$j('.blog_holder.masonry').isotope( 'reLayout');
				$j('.content').css('min-height',$j(window).height()-$j('header.page_header').height()-$j('footer:not(.uncover)').height() + 100); // min height for content to cover side menu bar, 100 is negative margin on content
				if($j('nav.content_menu').length > 0){
					content_menu_position = $j('nav.content_menu').offset().top;
					contentMenuPosition();
				}
				callCallback(callbacks,"oncomplete", null, []);
			});
		}
		else if(animation === "ajax_leftright"){
			if ('left' === direction2) {
				newContent.css({left: windowWidth});
			} else {
				newContent.css({left: - windowWidth});
			}
			
			newContent.css({visibility: 'visible'}).stop().animate({left: 0}, animationTime, function(){
				initPortfolioSingleInfo();
				initTitleAreaAnimation();
				$j('.blog_holder.masonry').isotope( 'reLayout');
				$j('.content').css('min-height',$j(window).height()-$j('header.page_header').height()-$j('footer:not(.uncover)').height() + 100); // min height for content to cover side menu bar, 100 is negative margin on content
				if($j('nav.content_menu').length > 0){
					content_menu_position = $j('nav.content_menu').offset().top;
					contentMenuPosition();
				}
				callCallback(callbacks,"oncomplete", null, []);
			});
		}
	});
	
	setPageMeta(newHTML);
	setToolBarEditLink(newHTML);
} 

function onLinkClicked(me) {
	"use strict";
	
	//check if menu is regular menu href or select menu value
	var url;
	
	if(me.attr('href') === undefined){
		url = me.attr('value').split(root)[1];
	}else{
		url = me.attr('href').split(root)[1];
	}
	
	//do nothing if active link is clicked
	if(!me.hasClass('current')){
		return loadResource(url);
	}
}

//load new page, url:href of clicked link,
function loadResource(url) {
	"use strict";
	
	var me = $j("nav a[href='"+root+url+"']");
	
	var animationTime = $j('body').hasClass('page_not_loaded') ? 0 : PAGE_TRANSITION_SPEED;
	var direction = me.hasClass('up') ? 'up' : 'down';
	var direction2 = me.hasClass('left') ? 'left' : 'right';
	
	var exitFinished = false;
	
	$j.ajax({
		url: root+url,
		dataType: 'html',
		async : true,
		success: function (text, status, request) {
			function insertNewPage () {
				//don't slide in until the old page has gone
				if (!exitFinished) {
					return window.setTimeout(insertNewPage, 100);
					
				}
				//slide in new page
				
				slideInNewPage(text, direction, direction2, animationTime, { 
				oncomplete: function () {
						ajaxSetActiveState(me);
					}
				}, url);
				balanceNavArrows();
			}
			insertNewPage();
			firstLoad = false;
			//document.location.href = root + '#/' + url;
			if (window.history.pushState) {
				var pageurl = root + url;
				if(pageurl!==window.location){
					window.history.pushState({path:pageurl},'',pageurl);	
				}
				//does Google Analytics code exists on page?
				if(typeof _gaq !== 'undefined') {
					//add new url to Google Analytics so it can be tracked
					_gaq.push(['_trackPageview', pageurl]);
				}
			} else {
				document.location.href = root + '#/' + url;
			}
		},
		error: function () {
			
		},
		statusCode: {
			404: function() {
				alert('Page not found!');
			}
		}
	});
	
	//slide out old page; timeout is a fix beacause of transition delay
	slideOutOldPage(content, direction, direction2, animationTime, { 
		oncomplete: function () {
			exitFinished = true; 
		}
	});

	if($j('body').hasClass('page_not_loaded')){$j('body').removeClass('page_not_loaded');}

}

if (window.history.pushState) {
/* the below code is to override back button to get the ajax content without reload*/
$j(window).bind('popstate', function() {
	"use strict";
	
	var url = location.href;
	url = url.split(root)[1];
	if (!firstLoad) {
		loadResource(url);
	}
});
}

//show active page
function showActivePage(){
	"use strict";

	var page_id = '';
	if ((document.location.href.indexOf("?s=") >= 0) || (document.location.href.indexOf("?animation=") >= 0) || (document.location.href.indexOf("?menu=") >= 0) || (document.location.href.indexOf("?footer=") >= 0)) {
		$j("body").removeClass("page_not_loaded");
		ajaxSetActiveState($j("nav a[href='"+root+"']"));
		return;
	}
	
	if (document.location.href === root) {
		if (window.history.pushState) {
		} else {
			loadResource("");
		}
	}
	
	if (typeof document.location.href.split("#/")[1] === "undefined") {
		ajaxSetActiveState($j("a.current"));
		$j('body').removeClass('page_not_loaded');
	} else {
		page_id = document.location.href.split("#/")[1];
		if (window.history.pushState) {
		} else {
			loadResource(page_id);
		}
	}
	
	
}

var content;
var viewport;
var PAGE_TRANSITION_SPEED;
var disableHashChange = true;

$j(document).ready(function() {
	"use strict";
	
	PAGE_TRANSITION_SPEED = 1000;
	viewport = $j('.content');
	content = $j('.content_inner');
	
	//if (!window.history.pushState) {
		showActivePage();
	//}
	
	if($j('body').hasClass('woocommerce') || $j('body').hasClass('woocommerce-page')){	
		return false;
	}else{
		$j(document).on('click','a[target!="_blank"]:not(.no_link)',function(click){
			if(click.ctrlKey == 1) {
				window.open($j(this).attr('href'), '_blank');
				return false;
			}
			
			if($j(this).hasClass('bx-prev')){ return false; }
			if($j(this).hasClass('bx-next')){ return false; }
			if($j(this).parent().hasClass('load_more')){ return false; }
			if($j(this).parent().hasClass('comments_number')){ var hash = $j(this).attr('href').split("#")[1];  $j('html, body').scrollTop( $j("#"+hash).offset().top );  return false;  }
			if($j(this).closest('.no_animation').length === 0){
				if(document.location.href.indexOf("?s=") >= 0){
					return true;
				}
				if($j(this).attr('href').indexOf("wp-admin") >= 0){
					return true;
				}
				if($j(this).attr('href').indexOf("wp-content") >= 0){
					return true;
				}
				if(jQuery.inArray($j(this).attr('href'), no_ajax_pages) !== -1){
					document.location.href = $j(this).attr('href');
					return false;
				}	
					
				if(($j(this).attr('href') !== "http://#") && ($j(this).attr('href') !== "#")){
						disableHashChange = true;
						
						var url = $j(this).attr('href');
						var start = url.indexOf(root);
						
						if(start === 0){
							click.preventDefault();
							click.stopImmediatePropagation();
							click.stopPropagation();
							onLinkClicked($j(this));
						}
					
				}else{
					return false;
				}
			}
		});
	}
});