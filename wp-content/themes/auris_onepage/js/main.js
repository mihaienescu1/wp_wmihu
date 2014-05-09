/* global jQuery:false, window, console, Modernizr, Cufon */

/* this prevents dom flickering */
(function($) {
    "use strict";

	$(window).load(function(){	
	
		// Settting  Same Height
		var port_item_wrapper = $('div.wt_portfolio_wrapper');
		var port_carousel = $('ul.carousel');
		port_item_wrapper.equalHeights();
		port_carousel.equalHeights();
		
		$(window).resize(function(){
			port_item_wrapper.children().css('min-height','0');
			port_item_wrapper.equalHeights();
			port_carousel.children().css('min-height','0');
			port_carousel.equalHeights();
		});
		// Isotope
		if($.isFunction($.fn.isotope)){
		
			$('.wt_portfolio-grid').isotope({
				itemSelector : '.wt_portofolio_item',
				layoutMode : 'fitRows',
				animationEngine : 'jquery'
			});
			
			/* ---- Filtering ----- */
			$('.sortableLinks a').click(function(){		
				var $this = $(this);			
				if ($this.hasClass('selected')) {
					return false;
				} else {				
					$('.sortableLinks .selected').removeClass('selected');				
					var selector = $this.attr('data-filter');
					$this.parent().next().isotope({ filter: selector });
					$this.addClass('selected');
					return false;			
				}
			});	
		}
		$('.skill').each(function () {
			var $this = $(this);
			var percentage = $this.attr("rel");
			$({ value: 0 }).animate({ value: percentage }, {
				duration: 2500,
				easing: 'swing',
				step: function () {
					$this.val(Math.ceil(this.value)).trigger('change');
				}
			});
		});
		$('#wt_progress_bars').waypoint(function() {
			$('.skill').each(function () {
				var $this = $(this);
				var percentage = $this.attr("rel");
				$({ value: 0 }).animate({ value: percentage }, {
					duration: 2500,
					easing: 'swing',
					step: function () {
						$this.val(Math.ceil(this.value)).trigger('change');
					}
				});
			});
		}, {
			triggerOnce: true,
			offset: '100%'
		});
	});
	$(document).ready(function($) {
		
		var win = $(window),            
			$smallThan960 = Modernizr.mq('only screen and (max-width: 1024px)');

		wt_functions_call();
		// parallax effect
		if (!$smallThan960) {
			$('#wt_separator_1').parallax("50%", 0.6);		
			$('#wt_separator_2').parallax("50%", 0.6);	
			$('#wt_separator_3').parallax("50%", 0.6);	
			$('#wt_separator_4').parallax("50%", 0.6);	
			$('#wt_separator_5').parallax("50%", 0.6);	
		}		
		// activates the nice scrolll function
		var $niceScroll = $('body').attr('data-nice-scrolling'); 
		if( $niceScroll === 1 && $(window).width() > 690 && $('body').outerHeight(true) > win.height()){ niceScrollInit(); }	
		
		$("#wt_wrapper").fitVids();
				
		$('.no_link').click(function(){
			return false;		
		});	
					
		$("#wt_page").preloader({
			select_image:'.wt_image_frame .wt_image_holder img',		
			onEachLoad:function(image){
                var image_overlay;
				$(image).closest('.wt_image_holder').css('background-image','none');
				image_overlay = $(image).closest('a');	
			}		
		});
									
		$('a[data-rel]').each(function() {                
			$(this).attr('rel', $(this).data('rel'));             
		});
		
		lightbox("a[rel^='prettyPhoto'], a[rel^='lightbox'], a[rel^='wt_lightbox']");
		$(window).smartresize(function() {
			lightbox("a[rel^='prettyPhoto'], a[rel^='lightbox'], a[rel^='wt_lightbox']");
		});
		
		menu("#nav ul, .widget_nav_menu ul");
		indent_menu("#nav ul ul a");
		$("#nav li:has(ul)").addClass("hasChild");		
		
		/* Enable these commented lines if you don't want sticky header on smaller screens */
			$(".stickyHeader #wt_header").sticky({ topSpacing: 0 });
	
		$(".widget_subnav li:has(ul)").addClass("hasChild").find(">:first-child").append('<span class="expand"></span>');
		fadeAndBorder("#wt_container .flickrWrap a, #wt_container .wt_adsWrap a");
		fade(".top a, a.prev, a.next, #widgetOpen a, #breadcrumbs a");	
			
		$('#commentform textarea, .wt_contact_form textarea').elastic();
		$(function(){
			$('.nospam').mailto();
		});
		//  Initialize auto-hint fields
		$('INPUT.auto-hint, TEXTAREA.auto-hint').focus(function(){
			if($(this).val() === $(this).attr('title')){ 
				$(this).val('');
				$(this).removeClass('auto-hint');
			}
		});	
		$('INPUT.auto-hint, TEXTAREA.auto-hint').blur(function(){
			if($(this).val() === '' && $(this).attr('title') !== ''){ 
				$(this).val($(this).attr('title'));
				$(this).addClass('auto-hint'); 
			}
		});	
		$('INPUT.auto-hint, TEXTAREA.auto-hint').each(function(){
			if($(this).attr('title') === ''){ return; }
			if($(this).val() === ''){ $(this).val($(this).attr('title')); }
			else { $(this).removeClass('auto-hint'); } 
		});
					
		// Tabs
		$("ul.wt_tabs").tabs(".panes > .pane", {initialIndex: null, effect: 'fade'});
		$.tools.tabs.addEffect("default", function(tabIndex, done) {		
			// hide all panes and show the one that is clicked
			this.getPanes().hide().eq(tabIndex).fadeIn();		
			// the supplied callback must be called after the effect has finished its job
			done.call();
		});
		// Toggles
		// Hide (Collapse) the toggle containers on load
		$(".wt_toggle .wt_toggle_content").hide(); 
		// Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	
		$(".wt_toggle h5.wt_toggle_title").toggle(
			function(){
				$(this).addClass("wt_toggle_active");
			}, 
			function () {
				$(this).removeClass("wt_toggle_active");
		});
		$(".wt_toggle h5.wt_toggle_title").click(function(){
			$(this).next(".wt_toggle_content").slideToggle('fast');
		});
	
		$('.wt_minimal_toggle').click(function () {
			var text = $(this).children('.wt_toggle_content');
			if (text.is(':hidden')) {
				text.slideDown('200');
				$(this).children('span').html('-');		
			} else {
				text.slideUp('200');
				$(this).children('span').html('+');		
			}
		});
		
		// Accordions
		$(".wt_framed_accordion h3:first").addClass("no_border");
		$(".wt_accordion").tabs(".wt_accordion div.wt_accPane", {tabs: 'h3', effect: 'slide', initialIndex: null});
		
		// Forms validation
		$('[data-minlength]').each(function() {                
			$(this).attr('minlength', $(this).data('minlength'));             
		}); 
		$('.widget_contact_form .wt_contact_form').each( function(){
			var form = $(this);
			form.validate();
			form.submit(function(e) {
				if (!e.isDefaultPrevented()) {
					var $id = form.find('input[name="contact_widget_id"]').val();
					var $name = $('input[name="contact_name_'+$id+'"]').val();
					
					if ($name !== "Name *") {
						$.post(this.action,{
							'to':$('input[name="contact_to_'+$id+'"]').val().replace("(at)", "@"),
							'name':$name,
							'email':$('input[name="contact_email_'+$id+'"]').val(),
							'content':$('textarea[name="contact_content_'+$id+'"]').val()
						},function(){
							form.fadeOut('fast', function() {
								$(this).siblings('p').show();
							});
						});
					
					}
					e.preventDefault();
				}
			});
		});	
		$('.wt_contact_form_wrap .wt_contact_form').each( function(){
			var form = $(this);
			form.validate();
			form.submit(function(e) {
				if (!e.isDefaultPrevented()) {
					var $id = form.find('input[name="contact_widget_id"]').val();
					$.post(this.action,{
						'to':$('input[name="contact_to_'+$id+'"]').val().replace("(at)", "@"),
						'first_name':$('input[name="contact_first_name_'+$id+'"]').val(),
						'last_name':$('input[name="contact_last_name_'+$id+'"]').val(),
						'phone_no':$('input[name="contact_phone_no_'+$id+'"]').val(),
						'email':$('input[name="contact_email_'+$id+'"]').val(),
						'subject':$('input[name="contact_subject_'+$id+'"]').val(),
						'content':$('textarea[name="contact_content_'+$id+'"]').val()
					},function(){
						form.fadeOut('fast', function() {
							$(this).siblings('.success').show();
						});
					});
					e.preventDefault();
				}
			});
		});
		
		// Side Navigation
		$('.wt_side-nav li').hoverIntent({
			over: function() {
				if($(this).find('> .children').length >= 1) {
					$(this).find('> .children').stop(true, true).slideDown('slow');
				}
			},
			out: function() {
				if(!$(this).find('.current_page_item').length) {
					$(this).find('.children').stop(true, true).slideUp('slow');
				}
			},
			timeout: 500
		});	
		
		html5_video();	
		scroll_top();	
	});
	
	// scrolling effect
	$(window).scroll(function(container){
		if(typeof container === 'undefined') {
			container = 'body';
		}
		var wrapp = $(container);
		wrapp.wt_scroll_effect();
		wrapp.wt_flex_scroll_effect();
	});
	
	function wt_functions_call(container){
		if(typeof container === 'undefined'){
			container = 'body';
		}
		var wrapp = $(container);
		
		// adding mobile class on smaller screens
		wrapp.is_smallerScreen();
		
		// navigation
		wrapp.wt_navigation(); // used for normal navigation
		wrapp.wt_one_page_nav(); // used for one page navigation	
		
		// responsive navigation
		wrapp.wt_responsive_nav();	
							
		// activates the hover effect for image links
		if($.fn.overlay_effect) {
			wrapp.overlay_effect();
		}
		if($.fn.hoverdir && $('html').is('.csstransforms')) {
			$('.image_frame', container).hoverdir();	
		}
	}
	
	/* Navigation
	================================================== */
	(function($) {
		$.fn.wt_navigation = function(vars) {
			var menu = $('#nav > ul'),
				first_level_items = menu.eq(0).find('>li a');
			
			menu.nav({
				child: {
					beforeFirstRender: function() {
						if ($(this).find('.cufon').length > 0) {
							Cufon.replace($('> a', this));
						}
					}
				},
				root: {
					effect: 'fade',
					beforeHoverIn: function() {
						if ($(this).find('.cufon').length > 0) {
							Cufon.replace($('> a', this));
						}
					},
					beforeHoverOut: function() {
						if ($(this).find('.cufon').length > 0) {
							Cufon.replace($('> a', this));
						}
					}
				}
			});
						
		};
	})(jQuery);
	
	/* One Page Navigation
	================================================== */
	(function($) {
		$.fn.wt_one_page_nav = function() {									
			// menu scrollTo
			$.localScroll({ filter:'#nav li a' }); 
			// curent menu items		
			$("#nav li").click(function () {
				$("#nav li").removeClass("current_page_item");
				$(this).addClass("current_page_item");
			}); 
			
			// visible sections
			var win = $(window),
				lastNavItem, 
				topNav = $("#nav ul"),
				topNavHeight = topNav.outerHeight() + 10,
				navItems = topNav.find('a'),
		
				scrollSections = navItems.map(function () {
					var wtSection = $(this).attr("href"),
						navItem = wtSection.match(/^#([^\/]+)$/i);
					if (navItem) {
						var item = $($(this).attr("href"));
						if (item.length) {
							return item;
						}
					}
				});
				
				win.scroll(function () {
				var topEdge = $(this).scrollTop() + topNavHeight;
				var currentItem = scrollSections.map(function () {
					if ($(this).offset().top < topEdge) {
						return this;
					}
				});
				currentItem = currentItem[currentItem.length - 1];
				var id = currentItem && currentItem.length ? currentItem[0].id : "";
				if (lastNavItem !== id) {
					lastNavItem = id;
					navItems.parent().removeClass("current_page_item")
					.end().filter("[href=#" + id + "]").parent().addClass("current_page_item");
				}
			});
		};
	})(jQuery);
	
	/* Responsive Navigation
	================================================== */
	(function($) {
		$.fn.wt_responsive_nav = function() {
			var win = $(window), header = $('.responsive #wt_header');
	
			if(!header.length) {
				return;
			}
	
			var menu              = header.find('#nav ul:eq(0)'),
				first_level_items = menu.find('>li').length,
				switchWidth = 768;
	
			if(first_level_items > 8) {
				switchWidth = 959;
			}
			// if there is no menu selected
			if(header.is('.drop_down_nav')) {
				menu.mobileMenu({
					switchWidth: switchWidth,
					topOptionText: $('#nav').data('select-name'), // first option text
					indentString: 'ontouchstart' in document.documentElement ? '- ' : "&nbsp;&nbsp;&nbsp;"  // string for indenting nested items
				});
			} else {
				var container       = $('#wt_wrapper'),
					responsive_nav_wrap	= $('<div id="wt_responsive_nav_wrap"></div>').prependTo(container),
					show_menu		= $('<a id="responsive_nav_open" href="#" class=""><i class="fontawesome-icon wt_icon-list-ul"></i></a>'),
					hide_menu		= $('<a id="responsive_nav_hide" href="#" class=""><i class="fontawesome-icon wt_icon-remove-sign"></i></a>'),
					responsive_nav  = menu.clone().attr({id:"wt-responsive-nav", "class":""}),
					menu_item       = responsive_nav.find('a'),    
					one_page_item   = menu_item.attr('href').match("^#") ? true : false,
					menu_added      = false;
									
					responsive_nav.find('ul').removeAttr("style");
					responsive_nav.find('.notMobile').remove();
					
					// hiding all sub-menus		
					/*	
					responsive_nav.find('li').each(function(){
						var el = $(this);
						if(el.find('> ul').length > 0) {
                             el.find('> a').append('<i class="fontawesome-icon wt_icon-angle-down"></i>');
						}
					});
	
					responsive_nav.find('li:has(">ul") > a').click(function(){
						var el = $(this),
							icon = el.find('.fontawesome-icon'),
							el_parent = el.parent().find('> ul'),
							screen_h  = win.height();
						
						var el_parent_height = el_parent.css({position:'relative'}).outerHeight(true),
							container_height = container.outerHeight(true),
							new_height = container_height + el_parent_height,
							new_height_1 = container_height - el_parent_height;
							
						el.toggleClass('active');
						el_parent.stop(true,true).slideToggle();
						
						if ( el.hasClass('active') ) {
							icon.removeClass('wt_icon-angle-down').addClass('wt_icon-angle-up');
							if(new_height < screen_h) new_height = screen_h;
								container.css({'height':new_height});
						} else {
							icon.removeClass('wt_icon-angle-up').addClass('wt_icon-angle-down');
							if(new_height_1 < screen_h) new_height_1 = screen_h;
								container.css({'height':new_height_1});
							
						}
						
						return false;
					});
					*/
					// end hiding all sub-menus	
					
					show_menu.click(function() {
						if(container.is('.show_responsive_nav')) {
							container.removeClass('show_responsive_nav');
							container.css({'height':"auto"});
						} else {
							container.addClass('show_responsive_nav');
							set_height();
						}
						return false;
					});
					
					// start responsive one page navigation	
					if (one_page_item) {			
						menu_item.click(function(e) {
							if(container.is('.show_responsive_nav')) {						
								container.removeClass('show_responsive_nav');
								container.css({'height':"auto"});
								$.scrollTo(this.hash || 0, 1100, { axis:'y',easing:'easeInOutExpo' });			
								e.preventDefault();
							}
						});
					}
					// end responsive one page navigation
					
					hide_menu.click(function() {
						container.removeClass('show_responsive_nav');
						container.css({'height':"auto"});
						return false;
					});
	
					var set_visibility = function() {
						if(win.width() > switchWidth) {
							header.removeClass('small_device_active');
							container.removeClass('show_responsive_nav');
							container.css({'height':"auto"});
						} else {
							header.addClass('small_device_active');
							if(!menu_added) {
								var before_menu = header.find('#nav');
								show_menu.insertBefore(before_menu);
								responsive_nav.prependTo(responsive_nav_wrap);
								hide_menu.prependTo(container);
								menu_added = true;
							}
	
							if(container.is('.show_responsive_nav')) {
								set_height();
							}
						}
					},
	
					set_height = function() {
						var height = responsive_nav.css({position:'relative'}).outerHeight(true),
							win_h  = win.height();
	
						if(height < win_h) {
							height = win_h;
						}
						responsive_nav.css({position:'absolute'});
						container.css({'height':height});
					};
	
					win.on("smartresize", set_visibility);
					set_visibility();
			}	
		};
		$( window ).load(function() {
			if($('.wt_affix #wt_header').length >0 ){
				//Affix Navigation	
				var pos = $('.wt_affix #wt_header').position();
				$('.wt_affix #wt_header').affix({
					offset: {
						top: pos.top + $('.wt_affix #wt_header').height()
					}
				});
			}
		});
		
		$( window ).resize(function() {
			if($('.wt_affix #wt_header').length >0 ){
				//Affix Navigation	
				var pos = $('.wt_affix #wt_header').position();
				$('.wt_affix #wt_header').affix({
					offset: {
						top: pos.top + $('.wt_affix #wt_header').height()
					}
				});
			}
		});
 
	})(jQuery);
	
	
	
		
	/* Hover Effect Activation
	================================================== */
	(function($) {
		$.fn.overlay_effect = function(vars) {
			var defaults = {
				overlayElements: 'a[class*="overlay_zoom"], a[class*="overlay_play"], a[class*="overlay_doc"], a[class*="overlay_link"]'
			};
			
			var overlay_options = $.extend(defaults, vars), css3 = $('html').is('.csstransforms'), opacity_val = 0.6;
			
			return this.each(function() {			
				if(css3) {
					opacity_val = 1;
				}
		
				$(overlay_options.overlayElements, this).contents('img').each(function() {
					var img = $(this),
						a = img.parent(),
						applied= false;					
									
					var overlay = $("<span class='image_overlay'><span class='image_overlay_inside'></span></span>").appendTo(a);
						overlay.css({display:'block', zIndex:5, opacity:0});
					
					overlay.hover(function() {	
						if(applied === false && img.css('opacity') > 0.5) {
							applied = true;
						}						
						$(this).stop().animate({opacity:opacity_val},400, 'easeOutExpo');
					}, function() {
						$(this).stop().animate({opacity:0},400, 'easeInExpo');
					});			
					
				});						
			});
		};
	})(jQuery);
	
	/* Scrolling Effect
	================================================== */
	(function($) {
		$.fn.wt_scroll_effect = function() {
			var win              = $(window),
				win_height       = $(window).height(),
				wt_scroll        = win.scrollTop(),
				container        = $('#home'),
				container_height = container.outerHeight(),
				separator        = $('.wt_separator'),
				el               = separator.find('.quotes_box'),
				scroll_effect    = function() {			
					if (win.width() > 767 ) {
						container.find('.home_box').css({'opacity' : 1 - (wt_scroll / container_height)});
						el.each(function(){
							var $this           = $(this),		
								el_height       = $this.outerHeight(),
								el_offset       = $this.offset().top;
													
							$this.css({'opacity' : 1 - ( (wt_scroll+win_height-el_offset) / (el_offset+el_height) ) });
						});
					} else {
						container.find('.home_box').css({'opacity' : 1 });
						el.css({'opacity' : 1 });
					}
				};
				win.on("smartresize", scroll_effect);
				scroll_effect();
		};
	})(jQuery);
	
	/* Flex Scrolling Effect
	================================================== */
	(function($) {
		$.fn.wt_flex_scroll_effect = function() {
			var win              = $(window),
				container        = $('#flexSlider'), 
				scroll_effect    = function() {	
					var wt_scroll        = win.scrollTop(),
						container_height = container.outerHeight();	
					if (win.width() > 767 ) {
						container.find('.flex-caption').css({'opacity' : 1 - (wt_scroll / container_height), 'top' : 50 + (wt_scroll/20) + '%'});
					} else {
						container.find('.flex-caption').css({'opacity' : 1 });
					}
				};
				win.on("smartresize", scroll_effect);
				scroll_effect();
		};
	})(jQuery);
	
	/* Adding Mobile Class
	================================================== */
	(function($) {
		$.fn.is_smallerScreen = function() {
			var win               = $(window),
				container         = $('html'),
				isResponsiveMode  = container.hasClass('responsive'),	
				check_screen      = function() {
					
					if( win.width() < 1000 && isResponsiveMode ){
						container.addClass('is_smallScreen');
					} else {
						container.removeClass('is_smallScreen');
					}
				};
	
				win.on("smartresize", check_screen);
				check_screen();
		};
	})(jQuery);
		
	
	/* Html5 Video Players
	================================================== */
	function html5_video(){
	
		var $video_player = $('.html5_video'),
			initVideo;
		
		if( $video_player.length ) {			
			initVideo = function initVideoPlayer( video_players ) {
							video_players.each(function() {
								var $this  = $(this);						
								$this.mediaelementplayer();			
							});
						};
			initVideo( $video_player );				
		}
	}
	
	// hiding your email addresses from spam harvesters
	$.fn.mailto = function() {
		return this.each(function(){
			var email = $(this).html().replace(/\s*\(.+\)\s*/, "@");
			$(this).before('<a href="mailto:' + email + '" rel="nofollow" title="Email ' + email + '">' + email + '</a>').remove();
		});
	};
	
	$.fn.fadeElement = function() {
		return this.each(function(){			
			$(this).animate({opacity:0.7},"fast");
			$(this).hover(function(){
				$(this).animate({opacity:1.0},"fast");
				},function(){
				$(this).animate({opacity:0.7},"fast");
			});			
		});
	};
	
	function fade($tags) {	
		$($tags).fadeTo("fast", 0.7); // This sets the opacity of the thumbs to fade down to 70% when the page loads
		$($tags).hover(function(){
			$(this).fadeTo("fast", 1.0); // This sets the opacity to 100% on hover
			},function(){
			$(this).fadeTo("fast", 0.7); // This sets the opacity back to 70% on mouseout
		});	
	}
	
	function indent_menu($tags) {	
		$($tags).animate({opacity:0.7},"fast");
		$($tags).hover(
			function() {
				$(this).stop().animate({paddingLeft:'24px',paddingRight:'4px',opacity:1.0},"fast");
			},
			function() {
				$(this).stop().animate({paddingLeft:'14px',paddingRight:'14px',opacity:0.7},"fast");
			});
	}
	
	function menu($tags) {	
		$($tags).each(function() {				
				$(this).find('li:first-child').addClass('firstItem current_page_item');
				$(this).find('li:last-child').addClass('lastItem');
				//$(this).find('.firstItem a').attr({href:"#wt_wrapper"})						
		});
		$($tags).contents("a").removeAttr('title');	
	}
	
	function fadeAndBorder($tags) {	
		$($tags).each(function() {		
			var originalThumbBorder = $(this).css('borderTopColor');
			var borderThumbCol = '#333333';
			$(this).hover(function(){
				$(this).animate({ borderTopColor: borderThumbCol , borderBottomColor: borderThumbCol , borderLeftColor: borderThumbCol , borderRightColor: borderThumbCol }, "fast");			
			},function(){
				$(this).animate({ borderTopColor: originalThumbBorder  , borderBottomColor: originalThumbBorder  , borderLeftColor: originalThumbBorder  , borderRightColor: originalThumbBorder  }, "fast");			
			});						
		});	
		$($tags).contents("img").fadeTo("fast", 0.7); // This sets the opacity of the thumbs to fade down to 70% when the page loads
		$($tags).contents("img").hover(function(){
			$(this).fadeTo("fast", 1.0); // This sets the opacity to 100% on hover
			},function(){
			$(this).fadeTo("fast", 0.7); // This sets the opacity back to 70% on mouseout
		});
		
	}
		
	function lightbox($attributes){
		$($attributes).prettyPhoto({
				"theme": 'pp_default' /* light_square / light_rounded / dark_square / dark_rounded / facebook */ ,
				"deeplinking": false,
				"social_tools": false																
			});
	}
	
	/* Scrolling To Top 
	================================================== */
	function scroll_top(){		
		if ($('body').is('.wt-top')) {
			$('body').append('<a href="#top" id="wt-top"><i class="wt_icon-circle-arrow-up"></i></a>');
			$(window).scroll(function() {
				if ($(this).scrollTop() > 100) {
					$('#wt-top').fadeIn();
				} else {
					$('#wt-top').fadeOut();
				}
			});
		}
		// scrolling to top
		$('#wt-top, .wt_top').click(function() {
			var $delay = $(window).scrollTop();
			$('body,html').animate({
				scrollTop: 0
			}, 500 * Math.atan($delay / 1500));
			return false;
		});
	}    
	
	/* Equal Height Function
	================================================== */
	
	/*
	function equalHeight(group) {
       tallest = 0;
       group.each(function() {
          thisHeight = $(this).height();
          if(thisHeight > tallest) {
             tallest = thisHeight;
          }
       });
       group.height(tallest);
    }
	*/
	
	(function($) {
		$.fn.equalHeight = function() {
			var tallest = 0;
			$(this).each(function(){
				var thisHeight = $(this).height();
				if (thisHeight > tallest) { tallest = thisHeight; }
			});
			$(this).height(tallest);
		};
	})(jQuery);
	
	
	(function($) {
		$.fn.equalHeights = function() {
			$(this).each(function(){
				var currentTallest = 0;
				$(this).children().each(function(){
					if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
				});
				$(this).children().css({'min-height': currentTallest}); 
			});
			return this;
		};
	})(jQuery);
	
	function mycarousel_initCallback(carousel){
		// Disable autoscrolling if the user clicks the prev or next button.
		carousel.buttonNext.bind('click', function() {
			carousel.startAuto(0);
		});
	
		carousel.buttonPrev.bind('click', function() {
			carousel.startAuto(0);
		});
	
		// Pause autoscrolling if the user moves with the cursor over the clip.
		carousel.clip.hover(function() {
			carousel.stopAuto();
		}, function() {
			carousel.startAuto();
		});
	}
	
	/* Direction Aware Hover Effect
	================================================== */
	
	// credits : http://tympanus.net/codrops
	
	(function( $, undefined ) {
					
		/*
		 * HoverDir object.
		 */
		$.HoverDir = function( options, element ) {
		
			this.$el	= $( element );
			
			this._init( options );
			
		};
		
		$.HoverDir.defaults = {
			hoverDelay	: 0,
			reverse		: false,
			hoverItem	: 'image_overlay_inside'
		};
		
		$.HoverDir.prototype = {
			_init : function( options ) {
				
				this.options = $.extend( true, {}, $.HoverDir.defaults, options );
				
				// load the events
				this._loadEvents();
				
			},
			_loadEvents			: function() {
				
				var _self = this;
				
				this.$el.on( 'mouseenter.hoverdir, mouseleave.hoverdir', function( event ) {
					
					var $el			= $(this),
						evType		= event.type,
						$hoverElem	= $el.find( '.'+ _self.options.hoverItem ),
						direction	= _self._getDir( $el, { x : event.pageX, y : event.pageY } ),
						hoverClasses= _self._getClasses( direction );
					
					$hoverElem.removeClass().addClass( _self.options.hoverItem);
					
					if( evType === 'mouseenter' ) {
						
						$hoverElem.hide().addClass( hoverClasses.from );
						
						clearTimeout( _self.tmhover );
						
						_self.tmhover	= setTimeout( function() {
							
							$hoverElem.show( 0, function() {
								$(this).addClass( 'da-animate' ).addClass( hoverClasses.to );
							} );
							
						
						}, _self.options.hoverDelay );
						
					}
					else {
					
						$hoverElem.addClass( 'da-animate' );
						
						clearTimeout( _self.tmhover );
						
						$hoverElem.addClass( hoverClasses.from );
						
					}
						
				} );
				
			},
			// credits : http://stackoverflow.com/a/3647634
			_getDir				: function( $el, coordinates ) {
				
					/** the width and height of the current div **/
				var w = $el.width(),
					h = $el.height(),
	
					/** calculate the x and y to get an angle to the center of the div from that x and y. **/
					/** gets the x value relative to the center of the DIV and "normalize" it **/
					x = ( coordinates.x - $el.offset().left - ( w/2 )) * ( w > h ? ( h/w ) : 1 ),
					y = ( coordinates.y - $el.offset().top  - ( h/2 )) * ( h > w ? ( w/h ) : 1 ),
				
					/** the angle and the direction from where the mouse came in/went out clockwise (TRBL=0123);**/
					/** first calculate the angle of the point, 
					add 180 deg to get rid of the negative values
					divide by 90 to get the quadrant
					add 3 and do a modulo by 4  to shift the quadrants to a proper clockwise TRBL (top/right/bottom/left) **/
					direction = Math.round( ( ( ( Math.atan2(y, x) * (180 / Math.PI) ) + 180 ) / 90 ) + 3 )  % 4;
				
				return direction;
				
			},
			_getClasses			: function( direction ) {
				
				var fromClass, toClass;
				
				switch( direction ) {
					case 0:
						// from top
						if ( !this.options.reverse ) { 
							fromClass = 'da-slideFromTop'; 
						} else { 
							fromClass = 'da-slideFromBottom';
						}
						toClass = 'da-slideTop';
						break;
					case 1:
						// from right
						if ( !this.options.reverse ) { 
							fromClass = 'da-slideFromRight'; 
						} else { 
							fromClass = 'da-slideFromLeft';
						}
						toClass = 'da-slideLeft';
						break;
					case 2:
						// from bottom
						if ( !this.options.reverse ) { 
							fromClass = 'da-slideFromBottom'; 
						} else { 
							fromClass = 'da-slideFromTop';
						}
						toClass	= 'da-slideTop';
						break;
					case 3:
						// from left
						if ( !this.options.reverse ) { 
							fromClass = 'da-slideFromLeft'; 
						} else { 
							fromClass = 'da-slideFromRight';
						}
						toClass	= 'da-slideLeft';
						break;
				}
				
				return { from : fromClass, to: toClass };
						
			}
		};
		
		var logError = function( message ) {
			if ( this.console ) {
				console.error( message );
			}
		};
		
		$.fn.hoverdir			= function( options ) {
		
			if ( typeof options === 'string' ) {
				
				var args = Array.prototype.slice.call( arguments, 1 );
				
				this.each(function() {
				
					var instance = $.data( this, 'hoverdir' );
					
					if ( !instance ) {
						logError( "cannot call methods on hoverdir prior to initialization; " +
						"attempted to call method '" + options + "'" );
						return;
					}
					
					if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
						logError( "no such method '" + options + "' for hoverdir instance" );
						return;
					}
					
					instance[ options ].apply( instance, args );
				
				});
			
			} 
			else {
			
				this.each(function() {
				
					var instance = $.data( this, 'hoverdir' );
					if ( !instance ) {
						$.data( this, 'hoverdir', new $.HoverDir( options, this ) );
					}
				});
			
			}
			
			return this;
			
		};
		
	})( jQuery );
	
	/* Carousels
	================================================== */
		(function($) {
	
			var $carousel = $('.jcarousel');
	
			if( $carousel.length ) {
	
				var scrollCount,
					_getWindowWidth,
					_initCarousel,
					_resizeCarousel,
					_resetToFirstItem,
					_swipeFunc;
					
				_getWindowWidth = function getWindowWidth() {
					if( $(window).width() < 480 ) {
						scrollCount = 1;
					} else if( $(window).width() < 768 ) {
						scrollCount = 1;
					} else if( $(window).width() < 960 ) {
						scrollCount = 4;
					} else {
						scrollCount = 4;
					}
				};
	
				_initCarousel = function initCarousel( carousels ) {
					carousels.each(function() {
						var $this  = $(this);
						$this.jcarousel({
							animation           : 600,
							easing              : 'easeOutCubic',
							scroll              : scrollCount,
							itemVisibleInCallback : {
								onBeforeAnimation : _resetToFirstItem( $this ),
								onAfterAnimation  : _resetToFirstItem( $this )
							},
							initCallback: mycarousel_initCallback,
							auto                : ( $this.data('auto') ? parseInt( $this.data('auto'), null ) : 0 ),
							wrap                : 'circular' // circular, null, last
						});
					});
				};
	
				_resizeCarousel = function resizeCarousel() {
					$carousel.each(function() {
						var $this    = $(this),
							$lis     = $this.children('li'),						
							width    = $this.width(),
							newWidth = $lis.length * $lis.first().outerWidth( true ) + 100;
						_getWindowWidth();
						// Resize only after the width was changed
						if( width !== newWidth ) {
							$this.css('width', newWidth).data('resize','true');
							_initCarousel( $this );
							$this.jcarousel('scroll', 1);
							var timer = window.setTimeout( function() {
								window.clearTimeout( timer );
								$this.data('resize', null);
							}, 800 );
						}
					});
				};
	
				_resetToFirstItem = function resetToFirstItem( elem ) {
					if( elem.data('resize') ) {
						elem.css('left', '0');
					}
				};
				
				_getWindowWidth();
				_initCarousel( $carousel );
				
				// Window resize
				$(window).resize(function() {
					var timer = window.setTimeout( function() {
						window.clearTimeout( timer );
						_resizeCarousel();
					}, 30 );
				});
	
				if( Modernizr.touch ) {				
					_swipeFunc = function swipeFunc( e, dir ) {				
						var $carousel = $(e.currentTarget);					
						if( dir === 'left' ) {
							$carousel.parent('.jcarousel-clip').siblings('.jcarousel-next').trigger('click');
						}					
						if( dir === 'right' ) {
							$carousel.parent('.jcarousel-clip').siblings('.jcarousel-prev').trigger('click');
						}					
					};			
					$carousel.swipe({
						swipeLeft       : _swipeFunc(),
						swipeRight      : _swipeFunc(),
						allowPageScroll : 'auto'
					});				
				}				
			}
	
		})(jQuery);		
	
	/* Html5 Audio players
	================================================== */
		
		(function($) {
	
			var $audio_player = $('.html5_audio'),
				_initAudioPlayer;
	
			if( $audio_player.length ) {
	
				_initAudioPlayer = function initAudioPlayer( audio_players ) {
					audio_players.each(function() {
						var $this  = $(this);	
						var $audioLoop = $this.data('html5_audio_loop');			
						var toggle = $this.parents(".toggle");
						
						$this.bind("initMediaelement",function(){
							$this.mediaelementplayer({loop: $audioLoop});
							$this.data("mediaelementInited",true);
						}).data("mediaelementInited",false);
	
						if(toggle.size()!== 0){
							toggle.find(".toggle_title").click(function() {
								if($this.data("mediaelementInited")===false){
									$this.trigger("initMediaelement");
								}
							});
						}else{
							$this.trigger("initMediaelement");
						}					
						
					});
				};
				_initAudioPlayer( $audio_player );		
			}
		})(jQuery);
	
	/* Styled Images
	================================================== */
		
		(function($) {
	
			var $image = $('.styled_image'),
				_styledImage;
	
			if( $image.length ) {
				_styledImage =function styledImage( images ) {
					images.each(function() {
						var win = $(window);
						var $this  = $(this);
						var $naturalWidth = $this.width();	
						function styledImg() {
							var $smallThan960 = Modernizr.mq('only screen and (max-width: 960px)');	
							
							if ($smallThan960 && $naturalWidth>738 && $this.parents(".fullWidth")) {
								$this.css({width: '738px'});
							} else if ($smallThan960 && $naturalWidth>498 && $this.parents(".withSidebar")) {
								$this.css({width: '498px'});
							} /*
							else {
								//$this.css({width: $naturalWidth+'px'});
							} */
						}					
						styledImg();
						win.bind('smartresize', styledImg);					
					});
				};
				_styledImage( $image );		
			}		
		})(jQuery);		
	
	/* Sliders
	================================================== */
	
	
	
	/* ----- Flex Slider ----- */
	
		(function($) {
			var $slider = $('.flexslider_wrap'),
				_initSlider;
	
			if( $slider.length ) {
				_initSlider = function initSlider( sliders ) {
					sliders.each(function() {					
						var $this  = $(this);				
						var $thumbsCarousel = '#'+$this.data('flex_sync');
						var $thumbs = $this.data('flex_controlnavthumbs');
						var $thumbsSlider = $this.data('flex_controlnavthumbsslider');						
						var $use_css = Modernizr.touch ? true : false;
											
						var $effect = $this.data('flex_animation');
						if ($effect === "fade") {
							$effect = Modernizr.touch ? "slide" : "fade";
						}
						
						if ($thumbsSlider) {
							$($thumbsCarousel).flexslider({
								animation: "slide",
								controlNav: false,
								animationLoop: false,
								slideshow: false,
								itemWidth: $($thumbsCarousel).parents().is('#intro') ? 190 : ($($thumbsCarousel).parents().hasClass('fullWidth') ? 183 : 123),
								itemMargin: 5,
								asNavFor: $this
							});	
						}
						$this.imagesLoaded(function() {					
							$this.flexslider({
								animation        : $effect,
								easing           : $effect==="slide" ? $this.data('flex_easing') : '',
								useCSS           : $use_css,
								direction        : $this.data('flex_direction'), 
								animationSpeed   : $this.data('flex_animationspeed'),
								slideshowSpeed   : $this.data('flex_slideshowspeed'),
								directionNav     : $this.data('flex_directionnav'), 
								controlNav       : $thumbs && !$thumbsSlider ? 'thumbnails' : $this.data('flex_controlnav'), 
								pauseOnAction    : $this.data('flex_pauseonaction'),
								pauseOnHover     : $this.data('flex_pauseonhover'),
								slideshow        : $this.data('flex_slideshow'),
								animationLoop    : $this.data('flex_animationloop'),
								sync             : $thumbsCarousel,
								before : function(){
									if ($effect==="slide") { 
										$this.find('.flex-caption').slideUp(400, 'easeOutExpo');
									} else { 
										return;
									}
								},
								after : function(){
									if ($effect==="slide") { 
										$this.find('.flex-caption').slideDown(100, 'easeInExpo');
									} else { 
										return;
									}
								}
							});
						});
							
					});
				};
				_initSlider( $slider );		
			}
		})(jQuery);
	
	/* ----- Cycle Slider ----- */
		
		(function($) {
	
			var $slider = $('.cycle-slideshow'),
				_settingCycle;
	
			if( $slider.length ) {
				_settingCycle = function settingCycle( sliders ) {
					sliders.each(function() {
						var $this  = $(this);	
						if (Modernizr.touch) { 
							$this.attr('data-cycle-fx', 'scrollHorz');
						} else {
							return;
						}
						$this.on( 'cycle-before', function() {
							$this.find('.cycle-overlay').slideUp(400, 'easeOutExpo');
	
						});		
						$this.on( 'cycle-after', function() {
							$this.find('.cycle-overlay').slideUp(400, 'easeOutExpo');
						});						
					});
				};
				_settingCycle( $slider );		
			}		
		})(jQuery);
	
	/* ----- Nivo Slider ----- */
	
		(function($) {
	
			var $slider = $('.nivoslider_wrap'),
				_initSlider;
	
			if( $slider.length ) {
				_initSlider = function initSlider( sliders ) {
					sliders.each(function() {
						var $this  = $(this);									
						var $effect = Modernizr.touch ? "slideInLeft" : $this.data('nivo_effect');
																	
						$this.nivoSlider({
							effect           : $effect,
							slices           : $this.data('nivo_slices'), 
							boxCols          : $this.data('nivo_boxcols'), 
							boxRows          : $this.data('nivo_boxrows'), 
							animSpeed        : $this.data('nivo_animspeed'),
							pauseTime        : $this.data('nivo_pausetime'),
							randomStart      : $this.data('nivo_randomstart'),
							directionNav     : $this.data('nivo_directionnav'), 
							controlNav       : $this.data('nivo_controlnav'), 
							controlNavThumbs : $this.data('nivo_controlnavthumbs'), 
							pauseOnHover     : $this.data('nivo_pauseonhover'),
							manualAdvance    : $this.data('nivo_manualadvance'),
							lastSlide        : function(){
								if($this.data('nivo_stopatend')){
									$this.data('nivoslider').stop();
								}
							}
						});
						if( Modernizr.touch ) {							
							$this.bind( 'swipeleft', function( e ) {
								$('a.nivo-nextNav').trigger('click');
								e.stopImmediatePropagation();
								return false;
							});  
						
							$this.bind( 'swiperight', function( e ) {
								$('a.nivo-prevNav').trigger('click');
								e.stopImmediatePropagation();
								return false;
							}); 
						}
					});
				};
				_initSlider( $slider );		
			}		
		})(jQuery);
		
	/* ----- Tweets Cycle ----- */
			
		(function($) {
			
			var $twitter = $('.cycle_tweets'),
				_initTwitter;
	
			if( $twitter.length ) {
				_initTwitter = function initTwitter( tweets ) {
					tweets.each(function() {
						var win = $(window);
						var container = $(this);
						var cycle_nav = container.find('.cycle_nav');
						var $this  = $(this).find('ul');									
						var $prev = cycle_nav.children(".cycle_prev");		
						var $next = cycle_nav.children(".cycle_next");
																
						function twitter() {									
							$this.cycle({
								slides        : '> li',
								autoHeight    : 'container',
								fx            : Modernizr.touch ? 'scrollHorz' : 'fade',
								timeout       : 5000,
								pauseOnHover  : true,
								prev          : $prev,
								next          : $next
							});
						}
						
						twitter();
						win.bind('smartresize', twitter);
					});
				};
				_initTwitter ( $twitter );		
			}		
		})(jQuery);
		
	/* ----- Rotator ----- */
	
		(function($) {
	
			var $rotator = $('.wt_items_rotator'),
				_initRotator;
	
			if( $rotator.length ) {
				_initRotator = function initRotator( rotators ) {
					rotators.each(function() {
						var win = $(window);
						var $this  = $(this);									
						var $prev = $this.prev().children(".wt_rotator_prev");		
						var $next = $this.prev().children(".wt_rotator_next");
						
						function cycleAfter() {
							var $elem_ht = $this.height();			
							//set the container's height to that of the current slide
							$this.parent().animate({height: $elem_ht});
						}	
						
						function rotator() {									
							$this.cycle({
								timeout : $this.data('rotator_timeout'), 
								speed   : $this.data('rotator_speed'), 
								pause   : $this.data('rotator_pauseonhover'),
								prev    : $this.data('rotator_buttons') ? $prev:'',
								next    : $this.data('rotator_buttons') ? $next:'',
								after   : cycleAfter
							});
						}
						
						rotator();
						win.bind('smartresize', rotator);
						if( Modernizr.touch ) {								
							$this.bind( 'swipeleft', function( e ) {
								$('button.qr_previous').trigger('click');
								e.stopImmediatePropagation();
								return false;
							});  
						
							$this.bind( 'swiperight', function( e ) {
								$('button.qr_next').trigger('click');
								e.stopImmediatePropagation();
								return false;
							}); 
						}
					});
				};
				_initRotator( $rotator );		
			}		
		})(jQuery);
				
	/* ----- Nice Scroll ----- */
	
	function niceScrollInit(){
		/*
		$("html").niceScroll({
			cursorwidth: 15,
			cursorborder: 0,
			cursorcolor: '#2D3032',
			cursorborderradius: 6,
			autohidemode: false
		});	
		$('body, body[data-nice-scrolling="1"] #headerWrapper').css('padding-right','16px');
		*/
		
		$("html").niceScroll({styler:"fb",cursorcolor:"#000"});
	}

})(jQuery);

