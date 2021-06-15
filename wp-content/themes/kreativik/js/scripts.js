jQuery(document).ready(function($){
	// menu
	var current;
	if($('li.current_page_ancestor').size() > 0) {
		current = 'li.current_page_ancestor';
	} else if($('li.current_page_parent').size() > 0) {
		current = 'li.current_page_parent';
	} else if($('li.current_page_item').size() > 0){
		current = 'li.current_page_item';
	}
	
	$("#nav a").attr("title", "");	// remove titles, this might cause menu to break under some browsers
	jQuery(" #nav ul ").css({display: "none"});
	jQuery(" #nav li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(400);
		if(jQuery(this).is(current+':has(ul)') && jQuery.browser.msie && jQuery.browser.version < 8){
			jQuery('.pointer').hide();
		}
	},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		jQuery('.pointer').show();
	});
	
	var position = jQuery(current).position().left;
	if(jQuery.browser.msie && jQuery.browser.version == 6){
		position = jQuery(current).position().left - jQuery('#nav').width();
	}
	
	// menu pointer
	jQuery('#menu a').bind('focus', function(){$(this).blur()});
	jQuery('#menu ul#nav').append("<li class='pointer'><img src='"+$('#pointer').text()+"' alt='' /></li>");
	jQuery('.pointer').css({
		'text-align': 'center',
		'position' : 'absolute',
		'left': position + 20,
		'width': (parseInt(jQuery(current).innerWidth()) - 20) + 'px',
		'height' : '15px',
		'margin-top' : '27px',
		'z-index' : '0'
	}).find("img").css({
		'width': '11px',
		'height': '9px'
	});
	
	var lis;
	
	if(!jQuery.browser.msie || (jQuery.browser.msie && jQuery.browser.version == 8)){
		lis = jQuery('ul#nav>li').not('.pointer');
	} else {
		lis = jQuery('ul#nav>li').not('.pointer').not(':has(ul)');
	}
	
	jQuery(lis).hover(function(){
		jQuery('.pointer').stop();
		var position = jQuery(this).position().left;
		if(jQuery.browser.msie){
			if(jQuery.browser.version == 6){
				position = jQuery(this).position().left - jQuery('#nav').width();
			}
		}
		
		jQuery('.pointer').animate({
			'left' : position + 20,
			'width': (parseInt(jQuery(this).innerWidth()) - 20) + 'px'
		});
	},function(){
		jQuery('.pointer').stop();
		var position = jQuery(current).position().left;
		if(jQuery.browser.msie){
			if(jQuery.browser.version == 6){
				var position = jQuery(current).position().left - jQuery('#nav').width();
			}
		}
		jQuery('.pointer').animate({
			'left': position + 20,
			'width': (parseInt(jQuery(current).innerWidth()) - 20) + 'px'
		});
	});
	
	// fix pointer on resize
	jQuery(window).resize(function(){
		jQuery('.pointer').css({
			'text-align': 'center',
			'position' : 'absolute',
			'left': position + 20,
			'width': (parseInt(jQuery(current).innerWidth()) - 20) + 'px',
			'height' : '15px',
			'margin-top' : '26px',
			'z-index' : '0'
		});
	});
	
	// IE6
	if(jQuery.browser.msie && jQuery.browser.version == 6){	
		jQuery('#wrapper-shadow').css('background-image', 'none');
		// fix png ribbons
		$('.portfolio-entry .ribbon').each(function(){
			var bgIMG = jQuery(this).css('background-image');
			var iebg = bgIMG.split('url("')[1].split('")')[0];
			jQuery(this).css('background-image', 'none');
			jQuery(this).get(0).runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + iebg + "',sizingMethod='scale')";
		});
	}
	
	// disallow horizonal resizing
	jQuery('#add-comment textarea').css('resize', 'vertical');
	
	if($('#portfolio').size() == 1){
		$("a[rel^='prettyPhoto']").prettyPhoto();
	}
	
});

/**
 *	make sure the log does not break JavaScript
 */
var log = function(variable){
	try {
		console.log(variable);
	} catch (Err) {}
}

/**
 *	these are animation functions used by the animate() function
 */
var animFunc1 = function(rows, cols){
	var n = rows*cols;
	for(i = 0; i < n; i++){
		setTimeout(
			"jQuery('#square'+"+i+").stop().animate({'opacity': 1}, "+anim_speed+");", 
			Math.round(Math.random() * anim_speed)
		);
	}
}

var animFunc2 = function(rows, cols){
	var n = rows*cols;
	for(i = 0; i < n; i++){
		setTimeout(
			"jQuery('#square'+"+i+").stop().animate({'opacity': 1}, "+anim_speed+");", 
			i * 70
		);
	}
}

var animFunc3 = function(rows, cols){
	var n = 0;
	for(i = 0; i < cols; i++){
		for(j = 0; j < rows; j++){
			setTimeout(
				"jQuery('#square'+"+(j*10+i)+").stop().animate({'opacity': 1}, "+anim_speed+");", 
				n * 70
			);
			n++;
		}
	}
}

/**
 *	this function is in charge of swapping images and running the animation functions
 */
var animate = function(rows, cols){
	// move current image to background
	jQuery('#billboard').css({
		'background-image': 'url('+images[cur_img]+')'
	});
	
	// set next image as bg to all the animation divs, and set their opacity to 0
	jQuery('#billboard div').css({
		'background-image': 'url('+images[nxt_img]+')',
		'opacity': '0'
	});
	
	// run the effect function
	var effect_setting = jQuery("#billboard-effect").text();
	if(effect_setting == 'random'){
		eval("animFunc1("+rows+", "+cols+");");
	} else if(effect_setting == 'horizontal'){
		eval("animFunc2("+rows+", "+cols+");");
	} else if(effect_setting == 'vertical'){
		eval("animFunc3("+rows+", "+cols+");");
	} else {
		eval("animFunc"+cur_eff+"("+rows+", "+cols+");");
	}
	
	
	if(cur_eff == 3) cur_eff = 1; else cur_eff++; // loop effect pointer
	if(images.length - 1 == cur_img) cur_img = 0; else cur_img++; // loop current image pointer
	if(images.length - 1 == nxt_img) nxt_img = 0; else nxt_img++; // loop next image pointer
		
	// clear timeout, just to be sure
	if(typeof t != 'undefined'){
		clearTimeout(t);
	}
	// and run self after specified time
	//window.t = setTimeout("animate("+rows+", "+cols+");", interval);
};

jQuery(window).load(function($){
	// no images to swith between, returning
	if(jQuery('#billboard img').size() < 2){
		return;
	}
	
	if(jQuery.browser.msie && jQuery.browser.version == 6){
		jQuery('#billboard').cycle({
			fx: 'fade'
		});
		return;
	}
	
	window.squares = [];
	window.images = [];
	window.cur_img = 0;
	window.nxt_img = 1;
	window.cur_eff = 1;
	window.interval = 8000;
	window.anim_speed = 1000;
	var variant = 94; // 47 or 94
	var rows = 376 / variant;
	var cols = 940 / variant;
	var billboard = jQuery('#billboard');
	
	// parse images within the billboard, add their sources to an array and remove them
	jQuery('#billboard img').each(function(){
		images.push(jQuery(this).attr('src'));
		jQuery(this).remove();
	});
	
	// set billboard background
	jQuery('#billboard').css({
		'background-image': 'url('+images[cur_img]+')'
	});
	
	// create divs for animation
	var n = 0;
	for(y = 0; y < rows; y++){
		for(x = 0; x < cols; x++){
			var current = document.createElement('div');
			current.style.backgroundPosition = -x*variant+'px '+(-y*variant)+'px';
			current.id = 'square'+n;
			billboard.append(current);
			squares.push(current.id);
			n++;
		}
	}
	
	jQuery('#billboard div').css({
		'opacity': '0',
		'width': variant+'px',
		'height': variant+'px',
		'float': 'left',
		'position': 'relative',
		'z-index': 1
	});
	
	if(jQuery('#billboard-delay').size() > 0){
		window.interval = parseInt(jQuery('#billboard-delay').text());
	}
	
	if(isNaN(interval) || typeof window.interval != 'number' || window.interval < 3000) window.interval = 3000;
	
	// and we're off
	setInterval("animate("+rows+", "+cols+");", window.interval);
});