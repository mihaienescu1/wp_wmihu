// Avoid `console` errors in browsers that lack a console.
if (!(window.console && console.log)) {
    (function() {
        var noop = function() {};
        var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'markTimeline', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'];
        var length = methods.length;
        var console = window.console = {};
        while (length--) {
            console[methods[length]] = noop;
        }
    }());
}


/* ================================================== */
/* jQuery/helper Plugins
================================================== */

/*! Nav - v0.2.0 - 2012-10-29
* https://github.com/KaptinLin/nav
* Copyright (c) 2012 KaptinLin; Licensed GPL */

(function(e,t,n){"use strict";var r="nav",i=t.nav=function(e,n){function o(){i.windowDimensions=s.getWindowDimensions(),u(),t(window).bind("resize",s.resize)}function u(){r=!0;var e=s.$nav.find("> li");a(e,s.settings.root),a(e.find("li"),s.settings.child)}function a(e,n){s.hover(e,n.hoverIntent,n.delay,function(){var e=this,r=t(this).find("> ul");n.beforeHoverIn.call(e);if(r.size()>0){var o=t(e).data("check");typeof o=="undefined"&&n.beforeFirstRender.call(e);if(typeof o=="undefined"||o!==i.windowDimensions)n.position.call(e,r,s),t(e).data("check",i.windowDimensions);n.effect==="fade"?r.hide().css("visibility","visible").fadeIn(n.inDuration,function(){n.afterHoverIn.call(e)}):r.hide().css("visibility","visible").slideDown(n.inDuration,function(){n.afterHoverIn.call(e)})}else n.afterHoverIn.call(e)},function(){var e=this,r=t(this).find("> ul");n.beforeHoverOut.call(e),r.size()>0?n.effect==="fade"?r.fadeOut(n.outDuration,function(){r.css("visibility","hidden"),n.afterHoverOut.call(e)}):r.slideUp(n.outDuration,function(){r.css("visibility","hidden"),n.afterHoverOut.call(e)}):n.afterHoverOut.call(e)})}this.nav=e,this.$nav=t(e),this.settings=t.extend(!0,{},i.defaults,n);var r=!1,s=this;t.extend(s,{getNav:function(){return this.$nav},getCurrent:function(){var e=this.$nav.find(this.settings.currentSelector);return e.size()===0&&(e=this.$nav.find("li:first")),e.find("> a")},getWindowDimensions:function(){return{w:t(window).width(),h:t(window).height()}},resize:function(){i.windowDimensions=s.getWindowDimensions()},isBuilted:function(){return r},hover:function(e,n,r,i,s){typeof t.fn.hoverIntent!="undefined"?t(e).hoverIntent({sensitivity:30,interval:n,timeout:r,over:i,out:s}):t(e).hover(i,s)}}),o()};i.defaults={root:{effect:"slide",delay:100,hoverIntent:100,inDuration:200,outDuration:200,beforeHoverIn:function(){},afterHoverIn:function(){t(this).addClass("is-open")},beforeHoverOut:function(){},afterHoverOut:function(){t(this).removeClass("is-open")},beforeFirstRender:function(){},position:function(e,n){var r=this,s=t(this),o={left:s.offset().left,top:s.offset().top},u={w:e.outerWidth(),h:e.outerHeight()};o.left+u.w<i.windowDimensions.w?e.css({left:0}):o.left+r.offsetWidth<u.w?o.left<i.windowDimensions.w/2?e.css({left:-o.left+n.$nav.offset().left}):e.css({left:i.windowDimensions.w-o.left-u.w-n.$nav.offset().left}):e.css({left:"auto",right:0})}},child:{effect:"fade",delay:150,hoverIntent:0,inDuration:200,outDuration:200,beforeHoverIn:function(){},afterHoverIn:function(){t(this).addClass("is-open")},beforeHoverOut:function(){},afterHoverOut:function(){t(this).removeClass("is-open")},beforeFirstRender:function(){},position:function(e,n){var r=this,s=t(r),o={left:s.offset().left,top:s.offset().top},u={w:e.outerWidth(),h:e.outerHeight()};o.left+r.offsetWidth+u.w<i.windowDimensions.w?e.css({left:r.offsetWidth}):e.css({left:0-r.offsetWidth})}}},t.fn.nav=function(e){return this.each(function(){t.data(this,r)||t.data(this,r,new i(this,e))})}})(document,jQuery);

/**
 * jQuery.LocalScroll
 * Copyright (c) 2007-2010 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 05/31/2010
 * @author Ariel Flesler
 * @version 1.2.8b
 **/
;(function(b){function g(a,e,d){var h=e.hash.slice(1),f=document.getElementById(h)||document.getElementsByName(h)[0];if(f){a&&a.preventDefault();var c=b(d.target);if(!(d.lock&&c.is(":animated")||d.onBefore&&!1===d.onBefore(a,f,c))){d.stop&&c._scrollable().stop(!0);if(d.hash){var a=f.id==h?"id":"name",g=b("<a> </a>").attr(a,h).css({position:"absolute",top:b(window).scrollTop(),left:b(window).scrollLeft()});f[a]="";b("body").prepend(g);location=e.hash;g.remove();f[a]=h}c.scrollTo(f,d).trigger("notify.serialScroll",
[f])}}}var i=location.href.replace(/#.*/,""),c=b.localScroll=function(a){b("body").localScroll(a)};c.defaults={duration:1E3,axis:"y",event:"click",stop:!0,target:window,reset:!0};c.hash=function(a){if(location.hash){a=b.extend({},c.defaults,a);a.hash=!1;if(a.reset){var e=a.duration;delete a.duration;b(a.target).scrollTo(0,a);a.duration=e}g(0,location,a)}};b.fn.localScroll=function(a){function e(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,"")==i&&(!a.filter||b(this).is(a.filter))}
a=b.extend({},c.defaults,a);return a.lazy?this.bind(a.event,function(d){var c=b([d.target,d.target.parentNode]).filter(e)[0];c&&g(d,c,a)}):this.find("a,area").filter(e).bind(a.event,function(b){g(b,this,a)}).end().end()}})(jQuery);




/**
 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.3.1
 */
;(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);




// Sticky Plugin v1.0.0 for jQuery
// =============
// Author: Anthony Garand
// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
// Improvements by Leonardo C. Daronco (daronco)
// Created: 2/14/2011
// Date: 2/12/2012
// Website: http://labs.anthonygarand.com/sticky
// Description: Makes an element on the page stick on the screen as you scroll
//       It will only set the 'top' and 'position' of your element, you
//       might need to adjust the width in some cases.

(function($) {
  var defaults = {
      topSpacing: 0,
      bottomSpacing: 0,
      className: 'is-sticky',
      wrapperClassName: 'sticky-wrapper',
      center: false,
      getWidthFrom: ''
    },
    $window = $(window),
    $document = $(document),
    sticked = [],
    windowHeight = $window.height(),
    scroller = function() {
      var scrollTop = $window.scrollTop(),
        documentHeight = $document.height(),
        dwh = documentHeight - windowHeight,
        extra = (scrollTop > dwh) ? dwh - scrollTop : 0;

      for (var i = 0; i < sticked.length; i++) {
        var s = sticked[i],
          elementTop = s.stickyWrapper.offset().top,
          etse = elementTop - s.topSpacing - extra;

        if (scrollTop <= etse) {
          if (s.currentTop !== null) {
            s.stickyElement
              .css('position', '')
              .css('top', '');
            s.stickyElement.parent().removeClass(s.className);
            s.currentTop = null;
          }
        }
        else {
          var newTop = documentHeight - s.stickyElement.outerHeight()
            - s.topSpacing - s.bottomSpacing - scrollTop - extra;
          if (newTop < 0) {
            newTop = newTop + s.topSpacing;
          } else {
            newTop = s.topSpacing;
          }
          if (s.currentTop != newTop) {
            s.stickyElement
              .css('position', 'fixed')
              .css('top', newTop);

            if (typeof s.getWidthFrom !== 'undefined') {
              s.stickyElement.css('width', $(s.getWidthFrom).width());
            }

            s.stickyElement.parent().addClass(s.className);
            s.currentTop = newTop;
          }
        }
      }
    },
    resizer = function() {
      windowHeight = $window.height();
    },
    methods = {
      init: function(options) {
        var o = $.extend(defaults, options);
        return this.each(function() {
          var stickyElement = $(this);

          var stickyId = stickyElement.attr('id');
          var wrapper = $('<div></div>')
            .attr('id', stickyId + '-sticky-wrapper')
            .addClass(o.wrapperClassName);
          stickyElement.wrapAll(wrapper);

          if (o.center) {
            stickyElement.parent().css({width:stickyElement.outerWidth(),marginLeft:"auto",marginRight:"auto"});
          }

          if (stickyElement.css("float") == "right") {
            stickyElement.css({"float":"none"}).parent().css({"float":"right"});
          }

          var stickyWrapper = stickyElement.parent();
          stickyWrapper.css('height', stickyElement.outerHeight());
          sticked.push({
            topSpacing: o.topSpacing,
            bottomSpacing: o.bottomSpacing,
            stickyElement: stickyElement,
            currentTop: null,
            stickyWrapper: stickyWrapper,
            className: o.className,
            getWidthFrom: o.getWidthFrom
          });
        });
      },
      update: scroller
    };

  // should be more efficient than using $window.scroll(scroller) and $window.resize(resizer):
  if (window.addEventListener) {
    window.addEventListener('scroll', scroller, false);
    window.addEventListener('resize', resizer, false);
  } else if (window.attachEvent) {
    window.attachEvent('onscroll', scroller);
    window.attachEvent('onresize', resizer);
  }

  $.fn.sticky = function(method) {
    if (methods[method]) {
      return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));


    } else if (typeof method === 'object' || !method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error('Method ' + method + ' does not exist on jQuery.sticky');
    }
  };
  $(function() {
    setTimeout(scroller, 0);
  });
})(jQuery);




/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		
		//get the starting position of each element to have parallax applied to it	
		function update (){
			
			$this.each(function(){
								
				firstTop = $this.offset().top;
			});
	
			if (outerHeight) {
				getHeight = function(jqo) {
					return jqo.outerHeight(true);
				};
			} else {
				getHeight = function(jqo) {
					return jqo.height();
				};
			}
				
			// setup defaults if arguments aren't specified
			if (arguments.length < 1 || xpos === null) xpos = "50%";
			if (arguments.length < 2 || speedFactor === null) speedFactor = 0.5;
			if (arguments.length < 3 || outerHeight === null) outerHeight = true;
			
			// function to be called whenever the window is scrolled or resized
			
				var pos = $window.scrollTop();				
	
				$this.each(function(){
					var $element = $(this);
					var top = $element.offset().top;
					var height = getHeight($element);
	
					// Check if totally above or totally below viewport
					if (top + height < pos || top > pos + windowHeight) {
						return;
					}
					
					$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
					
				});
		}		

		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);




/*!
 * jQuery Tools dev - The missing UI library for the Web
 * 
 * dateinput/dateinput.js
 * overlay/overlay.js
 * overlay/overlay.apple.js
 * rangeinput/rangeinput.js
 * scrollable/scrollable.js
 * scrollable/scrollable.autoscroll.js
 * scrollable/scrollable.navigator.js
 * tabs/tabs.js
 * validator/validator.js
 * 
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 * 
 * http://flowplayer.org/tools/
 * 
 */
(function(a,b){a.tools=a.tools||{version:"dev"};var c=[],d={},e,f=[75,76,38,39,74,72,40,37],g={};e=a.tools.dateinput={conf:{format:"mm/dd/yy",formatter:"default",selectors:!1,yearRange:[-5,5],lang:"en",offset:[0,0],speed:0,firstDay:0,min:b,max:b,trigger:0,toggle:0,editable:0,css:{prefix:"cal",input:"date",root:0,head:0,title:0,prev:0,next:0,month:0,year:0,days:0,body:0,weeks:0,today:0,current:0,week:0,off:0,sunday:0,focus:0,disabled:0,trigger:0}},addFormatter:function(a,b){d[a]=b},localize:function(b,c){a.each(c,function(a,b){c[a]=b.split(",")}),g[b]=c}},e.localize("en",{months:"January,February,March,April,May,June,July,August,September,October,November,December",shortMonths:"Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec",days:"Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday",shortDays:"Sun,Mon,Tue,Wed,Thu,Fri,Sat"});function h(a,b){return(new Date(a,b+1,0)).getDate()}function i(a,b){a=""+a,b=b||2;while(a.length<b)a="0"+a;return a}var j=a("<a/>");function k(a,b,c,e){var f=b.getDate(),h=b.getDay(),k=b.getMonth(),l=b.getFullYear(),m={d:f,dd:i(f),ddd:g[e].shortDays[h],dddd:g[e].days[h],m:k+1,mm:i(k+1),mmm:g[e].shortMonths[k],mmmm:g[e].months[k],yy:String(l).slice(2),yyyy:l},n=d[a](c,b,m,e);return j.html(n).html()}e.addFormatter("default",function(a,b,c,d){return a.replace(/d{1,4}|m{1,4}|yy(?:yy)?|"[^"]*"|'[^']*'/g,function(a){return a in c?c[a]:a})}),e.addFormatter("prefixed",function(a,b,c,d){return a.replace(/%(d{1,4}|m{1,4}|yy(?:yy)?|"[^"]*"|'[^']*')/g,function(a,b){return b in c?c[b]:a})});function l(a){return parseInt(a,10)}function m(a,b){return a.getFullYear()===b.getFullYear()&&a.getMonth()==b.getMonth()&&a.getDate()==b.getDate()}function n(a){if(a!==b){if(a.constructor==Date)return a;if(typeof a=="string"){var c=a.split("-");if(c.length==3)return new Date(l(c[0]),l(c[1])-1,l(c[2]));if(!/^-?\d+$/.test(a))return;a=l(a)}var d=new Date;d.setDate(d.getDate()+a);return d}}function o(d,e){var i=this,j=new Date,o=j.getFullYear(),p=e.css,q=g[e.lang],r=a("#"+p.root),s=r.find("#"+p.title),t,u,v,w,x,y,z=d.attr("data-value")||e.value||d.val(),A=d.attr("min")||e.min,B=d.attr("max")||e.max,C,D;A===0&&(A="0"),z=n(z)||j,A=n(A||new Date(o+e.yearRange[0],1,1)),B=n(B||new Date(o+e.yearRange[1]+1,1,-1));if(!q)throw"Dateinput: invalid language: "+e.lang;if(d.attr("type")=="date"){var D=d.clone(),E=D.wrap("<div/>").parent().html(),F=a(E.replace(/type/i,"type=text data-orig-type"));e.value&&F.val(e.value),d.replaceWith(F),d=F}d.addClass(p.input);var G=d.add(i);if(!r.length){r=a("<div><div><a/><div/><a/></div><div><div/><div/></div></div>").hide().css({position:"absolute"}).attr("id",p.root),r.children().eq(0).attr("id",p.head).end().eq(1).attr("id",p.body).children().eq(0).attr("id",p.days).end().eq(1).attr("id",p.weeks).end().end().end().find("a").eq(0).attr("id",p.prev).end().eq(1).attr("id",p.next),s=r.find("#"+p.head).find("div").attr("id",p.title);if(e.selectors){var H=a("<select/>").attr("id",p.month),I=a("<select/>").attr("id",p.year);s.html(H.add(I))}var J=r.find("#"+p.days);for(var K=0;K<7;K++)J.append(a("<span/>").text(q.shortDays[(K+e.firstDay)%7]));a("body").append(r)}e.trigger&&(t=a("<a/>").attr("href","#").addClass(p.trigger).click(function(a){e.toggle?i.toggle():i.show();return a.preventDefault()}).insertAfter(d));var L=r.find("#"+p.weeks);I=r.find("#"+p.year),H=r.find("#"+p.month);function M(b,c,e){if(d.attr("readonly"))i.hide(e);else{z=b,w=b.getFullYear(),x=b.getMonth(),y=b.getDate(),e||(e=a.Event("api")),e.type=="click"&&!a.browser.msie&&d.focus(),e.type="beforeChange",G.trigger(e,[b]);if(e.isDefaultPrevented())return;d.val(k(c.formatter,b,c.format,c.lang)),e.type="change",G.trigger(e),d.data("date",b),i.hide(e)}}function N(b){b.type="onShow",G.trigger(b),a(document).on("keydown.d",function(b){if(b.ctrlKey)return!0;var c=b.keyCode;if(c==8||c==46){d.val("");return i.hide(b)}if(c==27||c==9)return i.hide(b);if(a(f).index(c)>=0){if(!C){i.show(b);return b.preventDefault()}var e=a("#"+p.weeks+" a"),g=a("."+p.focus),h=e.index(g);g.removeClass(p.focus);if(c==74||c==40)h+=7;else if(c==75||c==38)h-=7;else if(c==76||c==39)h+=1;else if(c==72||c==37)h-=1;h>41?(i.addMonth(),g=a("#"+p.weeks+" a:eq("+(h-42)+")")):h<0?(i.addMonth(-1),g=a("#"+p.weeks+" a:eq("+(h+42)+")")):g=e.eq(h),g.addClass(p.focus);return b.preventDefault()}if(c==34)return i.addMonth();if(c==33)return i.addMonth(-1);if(c==36)return i.today();c==13&&(a(b.target).is("select")||a("."+p.focus).click());return a([16,17,18,9]).index(c)>=0}),a(document).on("click.d",function(b){var c=b.target;c.id!=p.root&&!a(c).parents("#"+p.root).length&&c!=d[0]&&(!t||c!=t[0])&&i.hide(b)})}a.extend(i,{show:function(b){if(!d.attr("disabled")&&!C){b=b||a.Event(),b.type="onBeforeShow",G.trigger(b);if(b.isDefaultPrevented())return;a.each(c,function(){this.hide()}),C=!0,H.off("change").change(function(){i.setValue(l(I.val()),l(a(this).val()))}),I.off("change").change(function(){i.setValue(l(a(this).val()),l(H.val()))}),u=r.find("#"+p.prev).off("click").click(function(a){u.hasClass(p.disabled)||i.addMonth(-1);return!1}),v=r.find("#"+p.next).off("click").click(function(a){v.hasClass(p.disabled)||i.addMonth();return!1}),i.setValue(z);var f=d.offset();/iPad/i.test(navigator.userAgent)&&(f.top-=a(window).scrollTop()),r.css({top:f.top+d.outerHeight({margins:!0})+e.offset[0],left:f.left+e.offset[1]}),e.speed?r.show(e.speed,function(){N(b)}):(r.show(),N(b));return i}},setValue:function(c,d,f){var g=l(d)>=-1?new Date(l(c),l(d),l(f==b||isNaN(f)?1:f)):c||z;g<A?g=A:g>B&&(g=B),typeof c=="string"&&(g=n(c)),c=g.getFullYear(),d=g.getMonth(),f=g.getDate(),d==-1?(d=11,c--):d==12&&(d=0,c++);if(!C){M(g,e);return i}x=d,w=c,y=f;var k=new Date(c,d,1-e.firstDay),o=k.getDay(),r=h(c,d),t=h(c,d-1),D;if(e.selectors){H.empty(),a.each(q.months,function(b,d){A<new Date(c,b+1,1)&&B>new Date(c,b,0)&&H.append(a("<option/>").html(d).attr("value",b))}),I.empty();var E=j.getFullYear();for(var F=E+e.yearRange[0];F<E+e.yearRange[1];F++)A<new Date(F+1,0,1)&&B>new Date(F,0,0)&&I.append(a("<option/>").text(F));H.val(d),I.val(c)}else s.html(q.months[d]+" "+c);L.empty(),u.add(v).removeClass(p.disabled);for(var G=o?0:-7,J,K;G<(o?42:35);G++)J=a("<a/>"),G%7===0&&(D=a("<div/>").addClass(p.week),L.append(D)),G<o?(J.addClass(p.off),K=t-o+G+1,g=new Date(c,d-1,K)):G<o+r?(K=G-o+1,g=new Date(c,d,K),m(z,g)?J.attr("id",p.current).addClass(p.focus):m(j,g)&&J.attr("id",p.today)):(J.addClass(p.off),K=G-r-o+1,g=new Date(c,d+1,K)),A&&g<A&&J.add(u).addClass(p.disabled),B&&g>B&&J.add(v).addClass(p.disabled),J.attr("href","#"+K).text(K).data("date",g),D.append(J);L.find("a").click(function(b){var c=a(this);c.hasClass(p.disabled)||(a("#"+p.current).removeAttr("id"),c.attr("id",p.current),M(c.data("date"),e,b));return!1}),p.sunday&&L.find("."+p.week).each(function(){var b=e.firstDay?7-e.firstDay:0;a(this).children().slice(b,b+1).addClass(p.sunday)});return i},setMin:function(a,b){A=n(a),b&&z<A&&i.setValue(A);return i},setMax:function(a,b){B=n(a),b&&z>B&&i.setValue(B);return i},today:function(){return i.setValue(j)},addDay:function(a){return this.setValue(w,x,y+(a||1))},addMonth:function(a){var b=x+(a||1),c=h(w,b),d=y<=c?y:c;return this.setValue(w,b,d)},addYear:function(a){return this.setValue(w+(a||1),x,y)},destroy:function(){d.add(document).off("click.d keydown.d"),r.add(t).remove(),d.removeData("dateinput").removeClass(p.input),D&&d.replaceWith(D)},hide:function(b){if(C){b=a.Event(),b.type="onHide",G.trigger(b);if(b.isDefaultPrevented())return;a(document).off("click.d keydown.d"),r.hide(),C=!1}return i},toggle:function(){return i.isOpen()?i.hide():i.show()},getConf:function(){return e},getInput:function(){return d},getCalendar:function(){return r},getValue:function(a){return a?k(e.formatter,z,a,e.lang):z},isOpen:function(){return C}}),a.each(["onBeforeShow","onShow","change","onHide"],function(b,c){a.isFunction(e[c])&&a(i).on(c,e[c]),i[c]=function(b){b&&a(i).on(c,b);return i}}),e.editable||d.on("focus.d click.d",i.show).keydown(function(b){var c=b.keyCode;if(C||a(f).index(c)<0)(c==8||c==46)&&d.val("");else{i.show(b);return b.preventDefault()}return b.shiftKey||b.ctrlKey||b.altKey||c==9?!0:b.preventDefault()}),n(d.val())&&M(z,e)}a.expr[":"].date=function(b){var c=b.getAttribute("type");return c&&c=="date"||a(b).data("dateinput")},a.fn.dateinput=function(b){if(this.data("dateinput"))return this;b=a.extend(!0,{},e.conf,b),a.each(b.css,function(a,c){!c&&a!="prefix"&&(b.css[a]=(b.css.prefix||"")+(c||a))});var d;this.each(function(){var e=new o(a(this),b);c.push(e);var f=e.getInput().data("dateinput",e);d=d?d.add(f):f});return d?d:this}})(jQuery);
(function(a){a.tools=a.tools||{version:"dev"},a.tools.overlay={addEffect:function(a,b,d){c[a]=[b,d]},conf:{close:null,closeOnClick:!0,closeOnEsc:!0,closeSpeed:"fast",effect:"default",fixed:!a.browser.msie||a.browser.version>6,left:"center",load:!1,mask:null,oneInstance:!0,speed:"normal",target:null,top:"10%"}};var b=[],c={};a.tools.overlay.addEffect("default",function(b,c){var d=this.getConf(),e=a(window);d.fixed||(b.top+=e.scrollTop(),b.left+=e.scrollLeft()),b.position=d.fixed?"fixed":"absolute",this.getOverlay().css(b).fadeIn(d.speed,c)},function(a){this.getOverlay().fadeOut(this.getConf().closeSpeed,a)});function d(d,e){var f=this,g=d.add(f),h=a(window),i,j,k,l=a.tools.expose&&(e.mask||e.expose),m=Math.random().toString().slice(10);l&&(typeof l=="string"&&(l={color:l}),l.closeOnClick=l.closeOnEsc=!1);var n=e.target||d.attr("rel");j=n?a(n):null||d;if(!j.length)throw"Could not find Overlay: "+n;d&&d.index(j)==-1&&d.click(function(a){f.load(a);return a.preventDefault()}),a.extend(f,{load:function(d){if(f.isOpened())return f;var i=c[e.effect];if(!i)throw"Overlay: cannot find effect : \""+e.effect+"\"";e.oneInstance&&a.each(b,function(){this.close(d)}),d=d||a.Event(),d.type="onBeforeLoad",g.trigger(d);if(d.isDefaultPrevented())return f;k=!0,l&&a(j).expose(l);var n=e.top,o=e.left,p=j.outerWidth({margin:!0}),q=j.outerHeight({margin:!0});typeof n=="string"&&(n=n=="center"?Math.max((h.height()-q)/2,0):parseInt(n,10)/100*h.height()),o=="center"&&(o=Math.max((h.width()-p)/2,0)),i[0].call(f,{top:n,left:o},function(){k&&(d.type="onLoad",g.trigger(d))}),l&&e.closeOnClick&&a.mask.getMask().one("click",f.close),e.closeOnClick&&a(document).on("click."+m,function(b){a(b.target).parents(j).length||f.close(b)}),e.closeOnEsc&&a(document).on("keydown."+m,function(a){a.keyCode==27&&f.close(a)});return f},close:function(b){if(!f.isOpened())return f;b=b||a.Event(),b.type="onBeforeClose",g.trigger(b);if(!b.isDefaultPrevented()){k=!1,c[e.effect][1].call(f,function(){b.type="onClose",g.trigger(b)}),a(document).off("click."+m+" keydown."+m),l&&a.mask.close();return f}},getOverlay:function(){return j},getTrigger:function(){return d},getClosers:function(){return i},isOpened:function(){return k},getConf:function(){return e}}),a.each("onBeforeLoad,onStart,onLoad,onBeforeClose,onClose".split(","),function(b,c){a.isFunction(e[c])&&a(f).on(c,e[c]),f[c]=function(b){b&&a(f).on(c,b);return f}}),i=j.find(e.close||".close"),!i.length&&!e.close&&(i=a("<a class=\"close\"></a>"),j.prepend(i)),i.click(function(a){f.close(a)}),e.load&&f.load()}a.fn.overlay=function(c){var e=this.data("overlay");if(e)return e;a.isFunction(c)&&(c={onBeforeLoad:c}),c=a.extend(!0,{},a.tools.overlay.conf,c),this.each(function(){e=new d(a(this),c),b.push(e),a(this).data("overlay",e)});return c.api?e:this}})(jQuery);
(function(a){var b=a.tools.overlay,c=a(window);a.extend(b.conf,{start:{top:null,left:null},fadeInSpeed:"fast",zIndex:9999});function d(a){var b=a.offset();return{top:b.top+a.height()/2,left:b.left+a.width()/2}}var e=function(b,e){var f=this.getOverlay(),g=this.getConf(),h=this.getTrigger(),i=this,j=f.outerWidth({margin:!0}),k=f.data("img"),l=g.fixed?"fixed":"absolute";if(!k){var m=f.css("backgroundImage");if(!m)throw"background-image CSS property not set for overlay";m=m.slice(m.indexOf("(")+1,m.indexOf(")")).replace(/\"/g,""),f.css("backgroundImage","none"),k=a("<img src=\""+m+"\"/>"),k.css({border:0,display:"none"}).width(j),a("body").append(k),f.data("img",k)}var n=g.start.top||Math.round(c.height()/2),o=g.start.left||Math.round(c.width()/2);if(h){var p=d(h);n=p.top,o=p.left}g.fixed?(n-=c.scrollTop(),o-=c.scrollLeft()):(b.top+=c.scrollTop(),b.left+=c.scrollLeft()),k.css({position:"absolute",top:n,left:o,width:0,zIndex:g.zIndex}).show(),b.position=l,f.css(b),k.animate({top:b.top,left:b.left,width:j},g.speed,function(){f.css("zIndex",g.zIndex+1).fadeIn(g.fadeInSpeed,function(){i.isOpened()&&!a(this).index(f)?e.call():f.hide()})}).css("position",l)},f=function(b){var e=this.getOverlay().hide(),f=this.getConf(),g=this.getTrigger(),h=e.data("img"),i={top:f.start.top,left:f.start.left,width:0};g&&a.extend(i,d(g)),f.fixed&&h.css({position:"absolute"}).animate({top:"+="+c.scrollTop(),left:"+="+c.scrollLeft()},0),h.animate(i,f.closeSpeed,b)};b.addEffect("apple",e,f)})(jQuery);
(function(a){a.tools=a.tools||{version:"dev"};var b;b=a.tools.rangeinput={conf:{min:0,max:100,step:"any",steps:0,value:0,precision:undefined,vertical:0,keyboard:!0,progress:!1,speed:100,css:{input:"range",slider:"slider",progress:"progress",handle:"handle"}}};var c,d;a.fn.drag=function(b){document.ondragstart=function(){return!1},b=a.extend({x:!0,y:!0,drag:!0},b),c=c||a(document).on("mousedown mouseup",function(e){var f=a(e.target);if(e.type=="mousedown"&&f.data("drag")){var g=f.position(),h=e.pageX-g.left,i=e.pageY-g.top,j=!0;c.on("mousemove.drag",function(a){var c=a.pageX-h,e=a.pageY-i,g={};b.x&&(g.left=c),b.y&&(g.top=e),j&&(f.trigger("dragStart"),j=!1),b.drag&&f.css(g),f.trigger("drag",[e,c]),d=f}),e.preventDefault()}else try{d&&d.trigger("dragEnd")}finally{c.off("mousemove.drag"),d=null}});return this.data("drag",!0)};function e(a,b){var c=Math.pow(10,b);return Math.round(a*c)/c}function f(a,b){var c=parseInt(a.css(b),10);if(c)return c;var d=a[0].currentStyle;return d&&d.width&&parseInt(d.width,10)}function g(a){var b=a.data("events");return b&&b.onSlide}function h(b,c){var d=this,h=c.css,i=a("<div><div/><a href='#'/></div>").data("rangeinput",d),j,k,l,m,n;b.before(i);var o=i.addClass(h.slider).find("a").addClass(h.handle),p=i.find("div").addClass(h.progress);a.each("min,max,step,value".split(","),function(a,d){var e=b.attr(d);parseFloat(e)&&(c[d]=parseFloat(e,10))});var q=c.max-c.min,r=c.step=="any"?0:c.step,s=c.precision;s===undefined&&(s=r.toString().split("."),s=s.length===2?s[1].length:0);if(b.attr("type")=="range"){var t=b.clone().wrap("<div/>").parent().html(),u=a(t.replace(/type/i,"type=text data-orig-type"));u.val(c.value),b.replaceWith(u),b=u}b.addClass(h.input);var v=a(d).add(b),w=!0;function x(a,f,g,h){g===undefined?g=f/m*q:h&&(g-=c.min),r&&(g=Math.round(g/r)*r);if(f===undefined||r)f=g*m/q;if(isNaN(g))return d;f=Math.max(0,Math.min(f,m)),g=f/m*q;if(h||!j)g+=c.min;j&&(h?f=m-f:g=c.max-g),g=e(g,s);var i=a.type=="click";if(w&&k!==undefined&&!i){a.type="onSlide",v.trigger(a,[g,f]);if(a.isDefaultPrevented())return d}var l=i?c.speed:0,t=i?function(){a.type="change",v.trigger(a,[g])}:null;j?(o.animate({top:f},l,t),c.progress&&p.animate({height:m-f+o.height()/2},l)):(o.animate({left:f},l,t),c.progress&&p.animate({width:f+o.width()/2},l)),k=g,n=f,b.val(g);return d}a.extend(d,{getValue:function(){return k},setValue:function(b,c){y();return x(c||a.Event("api"),undefined,b,!0)},getConf:function(){return c},getProgress:function(){return p},getHandle:function(){return o},getInput:function(){return b},step:function(b,e){e=e||a.Event();var f=c.step=="any"?1:c.step;d.setValue(k+f*(b||1),e)},stepUp:function(a){return d.step(a||1)},stepDown:function(a){return d.step(-a||-1)}}),a.each("onSlide,change".split(","),function(b,e){a.isFunction(c[e])&&a(d).on(e,c[e]),d[e]=function(b){b&&a(d).on(e,b);return d}}),o.drag({drag:!1}).on("dragStart",function(){y(),w=g(a(d))||g(b)}).on("drag",function(a,c,d){if(b.is(":disabled"))return!1;x(a,j?c:d)}).on("dragEnd",function(a){a.isDefaultPrevented()||(a.type="change",v.trigger(a,[k]))}).click(function(a){return a.preventDefault()}),i.click(function(a){if(b.is(":disabled")||a.target==o[0])return a.preventDefault();y();var c=j?o.height()/2:o.width()/2;x(a,j?m-l-c+a.pageY:a.pageX-l-c)}),c.keyboard&&b.keydown(function(c){if(!b.attr("readonly")){var e=c.keyCode,f=a([75,76,38,33,39]).index(e)!=-1,g=a([74,72,40,34,37]).index(e)!=-1;if((f||g)&&!(c.shiftKey||c.altKey||c.ctrlKey)){f?d.step(e==33?10:1,c):g&&d.step(e==34?-10:-1,c);return c.preventDefault()}}}),b.blur(function(b){var c=a(this).val();c!==k&&d.setValue(c,b)}),a.extend(b[0],{stepUp:d.stepUp,stepDown:d.stepDown});function y(){j=c.vertical||f(i,"height")>f(i,"width"),j?(m=f(i,"height")-f(o,"height"),l=i.offset().top+m):(m=f(i,"width")-f(o,"width"),l=i.offset().left)}function z(){y(),d.setValue(c.value!==undefined?c.value:c.min)}z(),m||a(window).load(z)}a.expr[":"].range=function(b){var c=b.getAttribute("type");return c&&c=="range"||a(b).filter("input").data("rangeinput")},a.fn.rangeinput=function(c){if(this.data("rangeinput"))return this;c=a.extend(!0,{},b.conf,c);var d;this.each(function(){var b=new h(a(this),a.extend(!0,{},c)),e=b.getInput().data("rangeinput",b);d=d?d.add(e):e});return d?d:this}})(jQuery);
(function(a){a.tools=a.tools||{version:"dev"},a.tools.scrollable={conf:{activeClass:"active",circular:!1,clonedClass:"cloned",disabledClass:"disabled",easing:"swing",initialIndex:0,item:"> *",items:".items",keyboard:!0,mousewheel:!1,next:".next",prev:".prev",size:1,speed:400,vertical:!1,touch:!0,wheelSpeed:0}};function b(a,b){var c=parseInt(a.css(b),10);if(c)return c;var d=a[0].currentStyle;return d&&d.width&&parseInt(d.width,10)}function c(b,c){var d=a(c);return d.length<2?d:b.parent().find(c)}var d;function e(b,e){var f=this,g=b.add(f),h=b.children(),i=0,j=e.vertical;d||(d=f),h.length>1&&(h=a(e.items,b)),e.size>1&&(e.circular=!1),a.extend(f,{getConf:function(){return e},getIndex:function(){return i},getSize:function(){return f.getItems().size()},getNaviButtons:function(){return n.add(o)},getRoot:function(){return b},getItemWrap:function(){return h},getItems:function(){return h.find(e.item).not("."+e.clonedClass)},move:function(a,b){return f.seekTo(i+a,b)},next:function(a){return f.move(e.size,a)},prev:function(a){return f.move(-e.size,a)},begin:function(a){return f.seekTo(0,a)},end:function(a){return f.seekTo(f.getSize()-1,a)},focus:function(){d=f;return f},addItem:function(b){b=a(b),e.circular?(h.children().last().before(b),h.children().first().replaceWith(b.clone().addClass(e.clonedClass))):(h.append(b),o.removeClass("disabled")),g.trigger("onAddItem",[b]);return f},seekTo:function(b,c,k){b.jquery||(b*=1);if(e.circular&&b===0&&i==-1&&c!==0)return f;if(!e.circular&&b<0||b>f.getSize()||b<-1)return f;var l=b;b.jquery?b=f.getItems().index(b):l=f.getItems().eq(b);var m=a.Event("onBeforeSeek");if(!k){g.trigger(m,[b,c]);if(m.isDefaultPrevented()||!l.length)return f}var n=j?{top:-l.position().top}:{left:-l.position().left};i=b,d=f,c===undefined&&(c=e.speed),h.animate(n,c,e.easing,k||function(){g.trigger("onSeek",[b])});return f}}),a.each(["onBeforeSeek","onSeek","onAddItem"],function(b,c){a.isFunction(e[c])&&a(f).on(c,e[c]),f[c]=function(b){b&&a(f).on(c,b);return f}});if(e.circular){var k=f.getItems().slice(-1).clone().prependTo(h),l=f.getItems().eq(1).clone().appendTo(h);k.add(l).addClass(e.clonedClass),f.onBeforeSeek(function(a,b,c){if(!a.isDefaultPrevented()){if(b==-1){f.seekTo(k,c,function(){f.end(0)});return a.preventDefault()}b==f.getSize()&&f.seekTo(l,c,function(){f.begin(0)})}});var m=b.parents().add(b).filter(function(){if(a(this).css("display")==="none")return!0});m.length?(m.show(),f.seekTo(0,0,function(){}),m.hide()):f.seekTo(0,0,function(){})}var n=c(b,e.prev).click(function(a){a.stopPropagation(),f.prev()}),o=c(b,e.next).click(function(a){a.stopPropagation(),f.next()});e.circular||(f.onBeforeSeek(function(a,b){setTimeout(function(){a.isDefaultPrevented()||(n.toggleClass(e.disabledClass,b<=0),o.toggleClass(e.disabledClass,b>=f.getSize()-1))},1)}),e.initialIndex||n.addClass(e.disabledClass)),f.getSize()<2&&n.add(o).addClass(e.disabledClass),e.mousewheel&&a.fn.mousewheel&&b.mousewheel(function(a,b){if(e.mousewheel){f.move(b<0?1:-1,e.wheelSpeed||50);return!1}});if(e.touch){var p={};h[0].ontouchstart=function(a){var b=a.touches[0];p.x=b.clientX,p.y=b.clientY},h[0].ontouchmove=function(a){if(a.touches.length==1&&!h.is(":animated")){var b=a.touches[0],c=p.x-b.clientX,d=p.y-b.clientY;f[j&&d>0||!j&&c>0?"next":"prev"](),a.preventDefault()}}}e.keyboard&&a(document).on("keydown.scrollable",function(b){if(!(!e.keyboard||b.altKey||b.ctrlKey||b.metaKey||a(b.target).is(":input"))){if(e.keyboard!="static"&&d!=f)return;var c=b.keyCode;if(j&&(c==38||c==40)){f.move(c==38?-1:1);return b.preventDefault()}if(!j&&(c==37||c==39)){f.move(c==37?-1:1);return b.preventDefault()}}}),e.initialIndex&&f.seekTo(e.initialIndex,0,function(){})}a.fn.scrollable=function(b){var c=this.data("scrollable");if(c)return c;b=a.extend({},a.tools.scrollable.conf,b),this.each(function(){c=new e(a(this),b),a(this).data("scrollable",c)});return b.api?c:this}})(jQuery);
(function(a){var b=a.tools.scrollable;b.autoscroll={conf:{autoplay:!0,interval:3e3,autopause:!0}},a.fn.autoscroll=function(c){typeof c=="number"&&(c={interval:c});var d=a.extend({},b.autoscroll.conf,c),e;this.each(function(){var b=a(this).data("scrollable"),c=b.getRoot(),f,g=!1;function h(){f&&clearTimeout(f),f=setTimeout(function(){b.next()},d.interval)}b&&(e=b),b.play=function(){f||(g=!1,c.on("onSeek",h),h())},b.pause=function(){f=clearTimeout(f),c.off("onSeek",h)},b.resume=function(){g||b.play()},b.stop=function(){g=!0,b.pause()},d.autopause&&c.add(b.getNaviButtons()).hover(b.pause,b.resume),d.autoplay&&b.play()});return d.api?e:this}})(jQuery);
(function(a){var b=a.tools.scrollable;b.navigator={conf:{navi:".navi",naviItem:null,activeClass:"active",indexed:!1,idPrefix:null,history:!1}};function c(b,c){var d=a(c);return d.length<2?d:b.parent().find(c)}a.fn.navigator=function(d){typeof d=="string"&&(d={navi:d}),d=a.extend({},b.navigator.conf,d);var e;this.each(function(){var b=a(this).data("scrollable"),f=d.navi.jquery?d.navi:c(b.getRoot(),d.navi),g=b.getNaviButtons(),h=d.activeClass,i=d.history&&history.pushState,j=b.getConf().size;b&&(e=b),b.getNaviButtons=function(){return g.add(f)},i&&(history.pushState({i:0},""),a(window).on("popstate",function(a){var c=a.originalEvent.state;c&&b.seekTo(c.i)}));function k(a,c,d){b.seekTo(c),d.preventDefault(),i&&history.pushState({i:c},"")}function l(){return f.find(d.naviItem||"> *")}function m(b){var c=a("<"+(d.naviItem||"a")+"/>").click(function(c){k(a(this),b,c)});b===0&&c.addClass(h),d.indexed&&c.text(b+1),d.idPrefix&&c.attr("id",d.idPrefix+b);return c.appendTo(f)}l().length?l().each(function(b){a(this).click(function(c){k(a(this),b,c)})}):a.each(b.getItems(),function(a){a%j==0&&m(a)}),b.onBeforeSeek(function(a,b){setTimeout(function(){if(!a.isDefaultPrevented()){var c=b/j,d=l().eq(c);d.length&&l().removeClass(h).eq(c).addClass(h)}},1)}),b.onAddItem(function(a,c){var d=b.getItems().index(c);d%j==0&&m(d)})});return d.api?e:this}})(jQuery);
(function(a){a.tools=a.tools||{version:"dev"},a.tools.tabs={conf:{tabs:"a",current:"current",onBeforeClick:null,onClick:null,effect:"default",initialEffect:!1,initialIndex:0,event:"click",rotate:!1,slideUpSpeed:400,slideDownSpeed:400,history:!1},addEffect:function(a,c){b[a]=c}};var b={"default":function(a,b){this.getPanes().hide().eq(a).show(),b.call()},fade:function(a,b){var c=this.getConf(),d=c.fadeOutSpeed,e=this.getPanes();d?e.fadeOut(d):e.hide(),e.eq(a).fadeIn(c.fadeInSpeed,b)},slide:function(a,b){var c=this.getConf();this.getPanes().slideUp(c.slideUpSpeed),this.getPanes().eq(a).slideDown(c.slideDownSpeed,b)},ajax:function(a,b){this.getPanes().eq(0).load(this.getTabs().eq(a).attr("href"),b)}},c,d;a.tools.tabs.addEffect("horizontal",function(b,e){if(!c){var f=this.getPanes().eq(b),g=this.getCurrentPane();d||(d=this.getPanes().eq(0).width()),c=!0,f.show(),g.animate({width:0},{step:function(a){f.css("width",d-a)},complete:function(){a(this).hide(),e.call(),c=!1}}),g.length||(e.call(),c=!1)}});function e(c,d,e){var f=this,g=c.add(this),h=c.find(e.tabs),i=d.jquery?d:c.children(d),j;h.length||(h=c.children()),i.length||(i=c.parent().find(d)),i.length||(i=a(d)),a.extend(this,{click:function(d,i){var k=h.eq(d),l=!c.data("tabs");typeof d=="string"&&d.replace("#","")&&(k=h.filter("[href*=\""+d.replace("#","")+"\"]"),d=Math.max(h.index(k),0));if(e.rotate){var m=h.length-1;if(d<0)return f.click(m,i);if(d>m)return f.click(0,i)}if(!k.length){if(j>=0)return f;d=e.initialIndex,k=h.eq(d)}if(d===j)return f;i=i||a.Event(),i.type="onBeforeClick",g.trigger(i,[d]);if(!i.isDefaultPrevented()){var n=l?e.initialEffect&&e.effect||"default":e.effect;b[n].call(f,d,function(){j=d,i.type="onClick",g.trigger(i,[d])}),h.removeClass(e.current),k.addClass(e.current);return f}},getConf:function(){return e},getTabs:function(){return h},getPanes:function(){return i},getCurrentPane:function(){return i.eq(j)},getCurrentTab:function(){return h.eq(j)},getIndex:function(){return j},next:function(){return f.click(j+1)},prev:function(){return f.click(j-1)},destroy:function(){h.off(e.event).removeClass(e.current),i.find("a[href^=\"#\"]").off("click.T");return f}}),a.each("onBeforeClick,onClick".split(","),function(b,c){a.isFunction(e[c])&&a(f).on(c,e[c]),f[c]=function(b){b&&a(f).on(c,b);return f}}),e.history&&a.fn.history&&(a.tools.history.init(h),e.event="history"),h.each(function(b){a(this).on(e.event,function(a){f.click(b,a);return a.preventDefault()})}),i.find("a[href^=\"#\"]").on("click.T",function(b){f.click(a(this).attr("href"),b)}),location.hash&&e.tabs=="a"&&c.find("[href=\""+location.hash+"\"]").length?f.click(location.hash):(e.initialIndex===0||e.initialIndex>0)&&f.click(e.initialIndex)}a.fn.tabs=function(b,c){var d=this.data("tabs");d&&(d.destroy(),this.removeData("tabs")),a.isFunction(c)&&(c={onBeforeClick:c}),c=a.extend({},a.tools.tabs.conf,c),this.each(function(){d=new e(a(this),b,c),a(this).data("tabs",d)});return c.api?d:this}})(jQuery);
(function(a){a.tools=a.tools||{version:"dev"};var b=/\[type=([a-z]+)\]/,c=/^-?[0-9]*(\.[0-9]+)?$/,d=a.tools.dateinput,e=/^([a-z0-9_\.\-\+]+)@([\da-z\.\-]+)\.([a-z\.]{2,6})$/i,f=/^(https?:\/\/)?[\da-z\.\-]+\.[a-z\.]{2,6}[#&+_\?\/\w \.\-=]*$/i,g;g=a.tools.validator={conf:{grouped:!1,effect:"default",errorClass:"invalid",inputEvent:null,errorInputEvent:"keyup",formEvent:"submit",lang:"en",message:"<div/>",messageAttr:"data-message",messageClass:"error",offset:[0,0],position:"center right",singleError:!1,speed:"normal"},messages:{"*":{en:"Please correct this value"}},localize:function(b,c){a.each(c,function(a,c){g.messages[a]=g.messages[a]||{},g.messages[a][b]=c})},localizeFn:function(b,c){g.messages[b]=g.messages[b]||{},a.extend(g.messages[b],c)},fn:function(c,d,e){a.isFunction(d)?e=d:(typeof d=="string"&&(d={en:d}),this.messages[c.key||c]=d);var f=b.exec(c);f&&(c=i(f[1])),j.push([c,e])},addEffect:function(a,b,c){k[a]=[b,c]}};function h(b,c,d){c=a(c).first()||c;var e=b.offset().top,f=b.offset().left,g=d.position.split(/,?\s+/),h=g[0],i=g[1];e-=c.outerHeight()-d.offset[0],f+=b.outerWidth()+d.offset[1],/iPad/i.test(navigator.userAgent)&&(e-=a(window).scrollTop());var j=c.outerHeight()+b.outerHeight();h=="center"&&(e+=j/2),h=="bottom"&&(e+=j);var k=b.outerWidth();i=="center"&&(f-=(k+c.outerWidth())/2),i=="left"&&(f-=k);return{top:e,left:f}}function i(a){function b(){return this.getAttribute("type")==a}b.key="[type=\""+a+"\"]";return b}var j=[],k={"default":[function(b){var c=this.getConf();a.each(b,function(b,d){var e=d.input;e.addClass(c.errorClass);var f=e.data("msg.el");f||(f=a(c.message).addClass(c.messageClass).appendTo(document.body),e.data("msg.el",f)),f.css({visibility:"hidden"}).find("p").remove(),a.each(d.messages,function(b,c){a("<p/>").html(c).appendTo(f)}),f.outerWidth()==f.parent().width()&&f.add(f.find("p")).css({display:"inline"});var g=h(e,f,c);f.css({visibility:"visible",position:"absolute",top:g.top,left:g.left}).fadeIn(c.speed)})},function(b){var c=this.getConf();b.removeClass(c.errorClass).each(function(){var b=a(this).data("msg.el");b&&b.css({visibility:"hidden"})})}]};a.each("email,url,number".split(","),function(b,c){a.expr[":"][c]=function(a){return a.getAttribute("type")===c}}),a.fn.oninvalid=function(a){return this[a?"on":"trigger"]("OI",a)},g.fn(":email","Please enter a valid email address",function(a,b){return!b||e.test(b)}),g.fn(":url","Please enter a valid URL",function(a,b){return!b||f.test(b)}),g.fn(":number","Please enter a numeric value.",function(a,b){return c.test(b)}),g.fn("[max]","Please enter a value no larger than $1",function(a,b){if(b===""||d&&a.is(":date"))return!0;var c=a.attr("max");return parseFloat(b)<=parseFloat(c)?!0:[c]}),g.fn("[min]","Please enter a value of at least $1",function(a,b){if(b===""||d&&a.is(":date"))return!0;var c=a.attr("min");return parseFloat(b)>=parseFloat(c)?!0:[c]}),g.fn("[required]","Please complete this mandatory field.",function(a,b){if(a.is(":checkbox"))return a.is(":checked");return b}),g.fn("[pattern]",function(a,b){return b===""||(new RegExp("^"+a.attr("pattern")+"$")).test(b)}),g.fn(":radio","Please select an option.",function(b){var c=!1,d=a("[name='"+b.attr("name")+"']").each(function(b,d){a(d).is(":checked")&&(c=!0)});return c?!0:!1});function l(b,c,e){var f=this,i=c.add(f);b=b.not(":button, :image, :reset, :submit"),c.attr("novalidate","novalidate");function l(b,c,d){if(e.grouped||!b.length){var f;if(d===!1||a.isArray(d)){f=g.messages[c.key||c]||g.messages["*"],f=f[e.lang]||g.messages["*"].en;var h=f.match(/\$\d/g);h&&a.isArray(d)&&a.each(h,function(a){f=f.replace(this,d[a])})}else f=d[e.lang]||d;b.push(f)}}a.extend(f,{getConf:function(){return e},getForm:function(){return c},getInputs:function(){return b},reflow:function(){b.each(function(){var b=a(this),c=b.data("msg.el");if(c){var d=h(b,c,e);c.css({top:d.top,left:d.left})}});return f},invalidate:function(c,d){if(!d){var g=[];a.each(c,function(a,c){var d=b.filter("[name='"+a+"']");d.length&&(d.trigger("OI",[c]),g.push({input:d,messages:[c]}))}),c=g,d=a.Event()}d.type="onFail",i.trigger(d,[c]),d.isDefaultPrevented()||k[e.effect][0].call(f,c,d);return f},reset:function(c){c=c||b,c.removeClass(e.errorClass).each(function(){var b=a(this).data("msg.el");b&&(b.remove(),a(this).data("msg.el",null))}).off(e.errorInputEvent+".v");return f},destroy:function(){c.off(e.formEvent+".V reset.V"),b.off(e.inputEvent+".V change.V");return f.reset()},checkValidity:function(c,g){c=c||b,c=c.not(":disabled");var h={};c=c.filter(function(){var b=a(this).attr("name");if(!h[b]){h[b]=!0;return a(this)}});if(!c.length)return!0;g=g||a.Event(),g.type="onBeforeValidate",i.trigger(g,[c]);if(g.isDefaultPrevented())return g.result;var m=[];c.each(function(){var b=[],c=a(this).data("messages",b),h=d&&c.is(":date")?"onHide.v":e.errorInputEvent+".v";c.off(h),a.each(j,function(){var a=this,d=a[0];if(c.filter(d).length){var h=a[1].call(f,c,c.val());if(h!==!0){g.type="onBeforeFail",i.trigger(g,[c,d]);if(g.isDefaultPrevented())return!1;var j=c.attr(e.messageAttr);if(j){b=[j];return!1}l(b,d,h)}}}),b.length&&(m.push({input:c,messages:b}),c.trigger("OI",[b]),e.errorInputEvent&&c.on(h,function(a){f.checkValidity(c,a)}));if(e.singleError&&m.length)return!1});var n=k[e.effect];if(!n)throw"Validator: cannot find effect \""+e.effect+"\"";if(m.length){f.invalidate(m,g);return!1}n[1].call(f,c,g),g.type="onSuccess",i.trigger(g,[c]),c.off(e.errorInputEvent+".v");return!0}}),a.each("onBeforeValidate,onBeforeFail,onFail,onSuccess".split(","),function(b,c){a.isFunction(e[c])&&a(f).on(c,e[c]),f[c]=function(b){b&&a(f).on(c,b);return f}}),e.formEvent&&c.on(e.formEvent+".V",function(a){if(!f.checkValidity(null,a))return a.preventDefault();a.target=c,a.type=e.formEvent}),c.on("reset.V",function(){f.reset()}),b[0]&&b[0].validity&&b.each(function(){this.oninvalid=function(){return!1}}),c[0]&&(c[0].checkValidity=f.checkValidity),e.inputEvent&&b.on(e.inputEvent+".V",function(b){f.checkValidity(a(this),b)}),b.filter(":checkbox, select").filter("[required]").on("change.V",function(b){var c=a(this);(this.checked||c.is("select")&&a(this).val())&&k[e.effect][1].call(f,c,b)}),b.filter(":radio[required]").on("change.V",function(b){var c=a("[name='"+a(b.srcElement).attr("name")+"']");c!=null&&c.length!=0&&f.checkValidity(c,b)}),a(window).resize(function(){f.reflow()})}a.fn.validator=function(b){var c=this.data("validator");c&&(c.destroy(),this.removeData("validator")),b=a.extend(!0,{},g.conf,b);if(this.is("form"))return this.each(function(){var d=a(this);c=new l(d.find(":input"),d,b),d.data("validator",c)});c=new l(this,this.eq(0).closest("form"),b);return this.data("validator",c)}})(jQuery);




/* ------------------------------------------------------------------------
	Class: prettyPhoto
	Use: Lightbox clone for jQuery
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Version: 3.1.5
------------------------------------------------------------------------- */

(function(e){function t(){var e=location.href;hashtag=e.indexOf("#prettyPhoto")!==-1?decodeURI(e.substring(e.indexOf("#prettyPhoto")+1,e.length)):false;return hashtag}function n(){if(typeof theRel=="undefined")return;location.hash=theRel+"/"+rel_index+"/"}function r(){if(location.href.indexOf("#prettyPhoto")!==-1)location.hash="prettyPhoto"}function i(e,t){e=e.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var n="[\\?&]"+e+"=([^&#]*)";var r=new RegExp(n);var i=r.exec(t);return i==null?"":i[1]}e.prettyPhoto={version:"3.1.5"};e.fn.prettyPhoto=function(s){function g(){e(".pp_loaderIcon").hide();projectedTop=scroll_pos["scrollTop"]+(d/2-a["containerHeight"]/2);if(projectedTop<0)projectedTop=0;$ppt.fadeTo(settings.animation_speed,1);$pp_pic_holder.find(".pp_content").animate({height:a["contentHeight"],width:a["contentWidth"]},settings.animation_speed);$pp_pic_holder.animate({top:projectedTop,left:v/2-a["containerWidth"]/2<0?0:v/2-a["containerWidth"]/2,width:a["containerWidth"]},settings.animation_speed,function(){$pp_pic_holder.find(".pp_hoverContainer,#fullResImage").height(a["height"]).width(a["width"]);$pp_pic_holder.find(".pp_fade").fadeIn(settings.animation_speed);if(isSet&&S(pp_images[set_position])=="image"){$pp_pic_holder.find(".pp_hoverContainer").show()}else{$pp_pic_holder.find(".pp_hoverContainer").hide()}if(settings.allow_expand){if(a["resized"]){e("a.pp_expand,a.pp_contract").show()}else{e("a.pp_expand").hide()}}if(settings.autoplay_slideshow&&!m&&!f)e.prettyPhoto.startSlideshow();settings.changepicturecallback();f=true});C();s.ajaxcallback()}function y(t){$pp_pic_holder.find("#pp_full_res object,#pp_full_res embed").css("visibility","hidden");$pp_pic_holder.find(".pp_fade").fadeOut(settings.animation_speed,function(){e(".pp_loaderIcon").show();t()})}function b(t){t>1?e(".pp_nav").show():e(".pp_nav").hide()}function w(e,t){resized=false;E(e,t);imageWidth=e,imageHeight=t;if((p>v||h>d)&&doresize&&settings.allow_resize&&!u){resized=true,fitting=false;while(!fitting){if(p>v){imageWidth=v-200;imageHeight=t/e*imageWidth}else if(h>d){imageHeight=d-200;imageWidth=e/t*imageHeight}else{fitting=true}h=imageHeight,p=imageWidth}if(p>v||h>d){w(p,h)}E(imageWidth,imageHeight)}return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(h),containerWidth:Math.floor(p)+settings.horizontal_padding*2,contentHeight:Math.floor(l),contentWidth:Math.floor(c),resized:resized}}function E(t,n){t=parseFloat(t);n=parseFloat(n);$pp_details=$pp_pic_holder.find(".pp_details");$pp_details.width(t);detailsHeight=parseFloat($pp_details.css("marginTop"))+parseFloat($pp_details.css("marginBottom"));$pp_details=$pp_details.clone().addClass(settings.theme).width(t).appendTo(e("body")).css({position:"absolute",top:-1e4});detailsHeight+=$pp_details.height();detailsHeight=detailsHeight<=34?36:detailsHeight;$pp_details.remove();$pp_title=$pp_pic_holder.find(".ppt");$pp_title.width(t);titleHeight=parseFloat($pp_title.css("marginTop"))+parseFloat($pp_title.css("marginBottom"));$pp_title=$pp_title.clone().appendTo(e("body")).css({position:"absolute",top:-1e4});titleHeight+=$pp_title.height();$pp_title.remove();l=n+detailsHeight;c=t;h=l+titleHeight+$pp_pic_holder.find(".pp_top").height()+$pp_pic_holder.find(".pp_bottom").height();p=t}function S(e){if(e.match(/youtube\.com\/watch/i)||e.match(/youtu\.be/i)){return"youtube"}else if(e.match(/vimeo\.com/i)){return"vimeo"}else if(e.match(/dailymotion\.com\/video/i)){return"dailymotion"}else if(e.match(/metacafe\.com\/watch/i)){return"metacafe"}else if(e.match(/cnn\.com\/video/i)){return"cnn"}else if(e.match(/facebook\.com/i)){return"facebook"}else if(e.match(/\b.mov\b/i)){return"quicktime"}else if(e.match(/\b.swf\b/i)){return"flash"}else if(e.match(/\biframe=true\b/i)){return"iframe"}else if(e.match(/\bajax=true\b/i)){return"ajax"}else if(e.match(/\bcustom=true\b/i)){return"custom"}else if(e.substr(0,1)=="#"){return"inline"}else{return"image"}}function x(){if(doresize&&typeof $pp_pic_holder!="undefined"){scroll_pos=T();contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width();projectedTop=d/2+scroll_pos["scrollTop"]-contentHeight/2;if(projectedTop<0)projectedTop=0;if(contentHeight>d)return;$pp_pic_holder.css({top:projectedTop,left:v/2+scroll_pos["scrollLeft"]-contentwidth/2})}}function T(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset}}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft}}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft}}}function N(){d=e(window).height(),v=e(window).width();if(typeof $pp_overlay!="undefined")$pp_overlay.height(e(document).height()).width(v)}function C(){if(isSet&&settings.overlay_gallery&&S(pp_images[set_position])=="image"){itemWidth=52+5;navWidth=settings.theme=="facebook"||settings.theme=="pp_default"?50:30;itemsPerPage=Math.floor((a["containerWidth"]-100-navWidth)/itemWidth);itemsPerPage=itemsPerPage<pp_images.length?itemsPerPage:pp_images.length;totalPage=Math.ceil(pp_images.length/itemsPerPage)-1;if(totalPage==0){navWidth=0;$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").hide()}else{$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").show()}galleryWidth=itemsPerPage*itemWidth;fullGalleryWidth=pp_images.length*itemWidth;$pp_gallery.css("margin-left",-(galleryWidth/2+navWidth/2)).find("div:first").width(galleryWidth+5).find("ul").width(fullGalleryWidth).find("li.selected").removeClass("selected");goToPage=Math.floor(set_position/itemsPerPage)<totalPage?Math.floor(set_position/itemsPerPage):totalPage;e.prettyPhoto.changeGalleryPage(goToPage);$pp_gallery_li.filter(":eq("+set_position+")").addClass("selected")}else{$pp_pic_holder.find(".pp_content").unbind("mouseenter mouseleave")}}function k(t){if(settings.social_tools)facebook_like_link=settings.social_tools.replace("{location_href}",encodeURIComponent(location.href));settings.markup=settings.markup.replace("{pp_social}","");e("body").append(settings.markup);$pp_pic_holder=e(".pp_pic_holder"),$ppt=e(".ppt"),$pp_overlay=e("div.pp_overlay");if(isSet&&settings.overlay_gallery){currentGalleryPage=0;toInject="";for(var n=0;n<pp_images.length;n++){if(!pp_images[n].match(/\b(jpg|jpeg|png|gif)\b/gi)){classname="default";img_src=""}else{classname="";img_src=pp_images[n]}toInject+="<li class='"+classname+"'><a href='#'><img src='"+img_src+"' width='50' alt='' /></a></li>"}toInject=settings.gallery_markup.replace(/{gallery}/g,toInject);$pp_pic_holder.find("#pp_full_res").after(toInject);$pp_gallery=e(".pp_pic_holder .pp_gallery"),$pp_gallery_li=$pp_gallery.find("li");$pp_gallery.find(".pp_arrow_next").click(function(){e.prettyPhoto.changeGalleryPage("next");e.prettyPhoto.stopSlideshow();return false});$pp_gallery.find(".pp_arrow_previous").click(function(){e.prettyPhoto.changeGalleryPage("previous");e.prettyPhoto.stopSlideshow();return false});$pp_pic_holder.find(".pp_content").hover(function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeIn()},function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeOut()});itemWidth=52+5;$pp_gallery_li.each(function(t){e(this).find("a").click(function(){e.prettyPhoto.changePage(t);e.prettyPhoto.stopSlideshow();return false})})}if(settings.slideshow){$pp_pic_holder.find(".pp_nav").prepend('<a href="#" class="pp_play">Play</a>');$pp_pic_holder.find(".pp_nav .pp_play").click(function(){e.prettyPhoto.startSlideshow();return false})}$pp_pic_holder.attr("class","pp_pic_holder "+settings.theme);$pp_overlay.css({opacity:0,height:e(document).height(),width:e(window).width()}).bind("click",function(){if(!settings.modal)e.prettyPhoto.close()});e("a.pp_close").bind("click",function(){e.prettyPhoto.close();return false});if(settings.allow_expand){e("a.pp_expand").bind("click",function(t){if(e(this).hasClass("pp_expand")){e(this).removeClass("pp_expand").addClass("pp_contract");doresize=false}else{e(this).removeClass("pp_contract").addClass("pp_expand");doresize=true}y(function(){e.prettyPhoto.open()});return false})}$pp_pic_holder.find(".pp_previous, .pp_nav .pp_arrow_previous").bind("click",function(){e.prettyPhoto.changePage("previous");e.prettyPhoto.stopSlideshow();return false});$pp_pic_holder.find(".pp_next, .pp_nav .pp_arrow_next").bind("click",function(){e.prettyPhoto.changePage("next");e.prettyPhoto.stopSlideshow();return false});x()}s=jQuery.extend({hook:"rel",animation_speed:"fast",ajaxcallback:function(){},slideshow:5e3,autoplay_slideshow:false,opacity:.8,show_title:true,allow_resize:true,allow_expand:true,default_width:500,default_height:344,counter_separator_label:"/",theme:"pp_default",horizontal_padding:20,hideflash:false,wmode:"opaque",autoplay:true,modal:false,deeplinking:true,overlay_gallery:true,overlay_gallery_max:30,keyboard_shortcuts:true,changepicturecallback:function(){},callback:function(){},ie6_fallback:true,markup:'<div class="pp_pic_holder"> 						<div class="ppt"> </div> 						<div class="pp_top"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 						<div class="pp_content_container"> 							<div class="pp_left"> 							<div class="pp_right"> 								<div class="pp_content"> 									<div class="pp_loaderIcon"></div> 									<div class="pp_fade"> 										<a href="#" class="pp_expand" title="Expand the image">Expand</a> 										<div class="pp_hoverContainer"> 											<a class="pp_next" href="#">next</a> 											<a class="pp_previous" href="#">previous</a> 										</div> 										<div id="pp_full_res"></div> 										<div class="pp_details"> 											<div class="pp_nav"> 												<a href="#" class="pp_arrow_previous">Previous</a> 												<p class="currentTextHolder">0/0</p> 												<a href="#" class="pp_arrow_next">Next</a> 											</div> 											<p class="pp_description"></p> 											<div class="pp_social">{pp_social}</div> 											<a class="pp_close" href="#">Close</a> 										</div> 									</div> 								</div> 							</div> 							</div> 						</div> 						<div class="pp_bottom"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 					</div> 					<div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"> 								<a href="#" class="pp_arrow_previous">Previous</a> 								<div> 									<ul> 										{gallery} 									</ul> 								</div> 								<a href="#" class="pp_arrow_next">Next</a> 							</div>',image_markup:'<img id="fullResImage" src="{path}" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',other_markup:'<embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}" flashVars="{flashvars}"></embed>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline">{content}</div>',custom_markup:"",social_tools:'<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&layout=button_count&show_faces=true&width=500&action=like&font&colorscheme=light&height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'},s);var o=this,u=false,a,f,l,c,h,p,d=e(window).height(),v=e(window).width(),m;doresize=true,scroll_pos=T();e(window).unbind("resize.prettyphoto").bind("resize.prettyphoto",function(){x();N()});if(s.keyboard_shortcuts){e(document).unbind("keydown.prettyphoto").bind("keydown.prettyphoto",function(t){if(typeof $pp_pic_holder!="undefined"){if($pp_pic_holder.is(":visible")){switch(t.keyCode){case 37:e.prettyPhoto.changePage("previous");t.preventDefault();break;case 39:e.prettyPhoto.changePage("next");t.preventDefault();break;case 27:if(!settings.modal)e.prettyPhoto.close();t.preventDefault();break}}}})}e.prettyPhoto.initialize=function(){settings=s;if(settings.theme=="pp_default")settings.horizontal_padding=16;theRel=e(this).attr(settings.hook);galleryRegExp=/\[(?:.*)\]/;isSet=galleryRegExp.exec(theRel)?true:false;pp_images=isSet?jQuery.map(o,function(t,n){if(e(t).attr(settings.hook).indexOf(theRel)!=-1)return e(t).attr("href")}):e.makeArray(e(this).attr("href"));pp_titles=isSet?jQuery.map(o,function(t,n){if(e(t).attr(settings.hook).indexOf(theRel)!=-1)return e(t).find("img").attr("alt")?e(t).find("img").attr("alt"):""}):e.makeArray(e(this).find("img").attr("alt"));pp_descriptions=isSet?jQuery.map(o,function(t,n){if(e(t).attr(settings.hook).indexOf(theRel)!=-1)return e(t).attr("title")?e(t).attr("title"):""}):e.makeArray(e(this).attr("title"));if(pp_images.length>settings.overlay_gallery_max)settings.overlay_gallery=false;set_position=jQuery.inArray(e(this).attr("href"),pp_images);rel_index=isSet?set_position:e("a["+settings.hook+"^='"+theRel+"']").index(e(this));k(this);if(settings.allow_resize)e(window).bind("scroll.prettyphoto",function(){x()});e.prettyPhoto.open();return false};e.prettyPhoto.open=function(t){if(typeof settings=="undefined"){settings=s;pp_images=e.makeArray(arguments[0]);pp_titles=arguments[1]?e.makeArray(arguments[1]):e.makeArray("");pp_descriptions=arguments[2]?e.makeArray(arguments[2]):e.makeArray("");isSet=pp_images.length>1?true:false;set_position=arguments[3]?arguments[3]:0;k(t.target)}if(settings.hideflash)e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","hidden");b(e(pp_images).size());e(".pp_loaderIcon").show();if(settings.deeplinking)n();if(settings.social_tools){facebook_like_link=settings.social_tools.replace("{location_href}",encodeURIComponent(location.href));$pp_pic_holder.find(".pp_social").html(facebook_like_link)}if($ppt.is(":hidden"))$ppt.css("opacity",0).show();$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity);$pp_pic_holder.find(".currentTextHolder").text(set_position+1+settings.counter_separator_label+e(pp_images).size());if(typeof pp_descriptions[set_position]!="undefined"&&pp_descriptions[set_position]!=""){$pp_pic_holder.find(".pp_description").show().html(unescape(pp_descriptions[set_position]))}else{$pp_pic_holder.find(".pp_description").hide()}movie_width=parseFloat(i("width",pp_images[set_position]))?i("width",pp_images[set_position]):settings.default_width.toString();movie_height=parseFloat(i("height",pp_images[set_position]))?i("height",pp_images[set_position]):settings.default_height.toString();u=false;if(movie_height.indexOf("%")!=-1){movie_height=parseFloat(e(window).height()*parseFloat(movie_height)/100-150);u=true}if(movie_width.indexOf("%")!=-1){movie_width=parseFloat(e(window).width()*parseFloat(movie_width)/100-150);u=true}$pp_pic_holder.fadeIn(function(){settings.show_title&&pp_titles[set_position]!=""&&typeof pp_titles[set_position]!="undefined"?$ppt.html(unescape(pp_titles[set_position])):$ppt.html(" ");imgPreloader="";skipInjection=false;switch(S(pp_images[set_position])){case"image":imgPreloader=new Image;nextImage=new Image;if(isSet&&set_position<e(pp_images).size()-1)nextImage.src=pp_images[set_position+1];prevImage=new Image;if(isSet&&pp_images[set_position-1])prevImage.src=pp_images[set_position-1];$pp_pic_holder.find("#pp_full_res")[0].innerHTML=settings.image_markup.replace(/{path}/g,pp_images[set_position]);imgPreloader.onload=function(){a=w(imgPreloader.width,imgPreloader.height);g()};imgPreloader.onerror=function(){alert("Image cannot be loaded. Make sure the path is correct and image exist.");e.prettyPhoto.close()};imgPreloader.src=pp_images[set_position];break;case"youtube":a=w(movie_width,movie_height);o=i("v",pp_images[set_position]);if(o==""){o=pp_images[set_position].split("youtu.be/");o=o[1];if(o.indexOf("?")>0)o=o.substr(0,o.indexOf("?"));if(o.indexOf("&")>0)o=o.substr(0,o.indexOf("&"))}movie="http://www.youtube.com/embed/"+o;i("rel",pp_images[set_position])?movie+="?rel="+i("rel",pp_images[set_position]):movie+="?rel=1";if(settings.autoplay)movie+="&autoplay=1";toInject=settings.iframe_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case"vimeo":a=w(movie_width,movie_height);o=pp_images[set_position];var t=/http(s?):\/\/(www\.)?vimeo.com\/(\d+)/;var n=o.match(t);movie="http://player.vimeo.com/video/"+n[3]+"?title=0&byline=0&portrait=0";if(settings.autoplay)movie+="&autoplay=1;";vimeo_width=a["width"]+"/embed/?moog_width="+a["width"];toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,a["height"]).replace(/{path}/g,movie);break;case"dailymotion":a=w(movie_width,movie_height);var r=pp_images[set_position].replace(/http:\/\/(www\.)?dailymotion\.com\/video/i,"");var s=r.split("_");movie="http://www.dailymotion.com/swf"+s[0]+"?width=&theme=none&iframe=0&additionalInfos=0&autoPlay=1&hideInfos=0";toInject=settings.other_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{path}/g,movie);break;case"metacafe":a=w(movie_width,movie_height);var o=pp_images[set_position];videoId=o.replace("http://www.metacafe.com/watch/","");movie="http://www.metacafe.com/fplayer/"+videoId+".swf";if(settings.autoplay)autoplay="autoPlay=yes";toInject=settings.other_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie).replace(/{flashvars}/g,"playerVars="+autoplay);break;case"cnn":a=w(movie_width,movie_height);o=pp_images[set_position];movie="http://i.cdn.turner.com/cnn/.element/apps/cvp/3.0/swf/cnn_416x234_embed.swf?context=embed_edition&videoId="+o.replace("http://www.cnn.com/video/#/video/","");if(settings.autoplay)movie+="&autoplay=1";toInject=settings.other_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case"facebook":a=w(movie_width,movie_height);movie="http://facebook.com/v/"+i("v",pp_images[set_position]);if(settings.autoplay)movie+="&autoplay=1";toInject=settings.flash_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case"quicktime":a=w(movie_width,movie_height);a["height"]+=15;a["contentHeight"]+=15;a["containerHeight"]+=15;toInject=settings.quicktime_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case"flash":a=w(movie_width,movie_height);flash_vars=pp_images[set_position];flash_vars=flash_vars.substring(pp_images[set_position].indexOf("flashvars")+10,pp_images[set_position].length);filename=pp_images[set_position];filename=filename.substring(0,filename.indexOf("?"));toInject=settings.flash_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+"?"+flash_vars);break;case"iframe":a=w(movie_width,movie_height);frame_url=pp_images[set_position];frame_url=frame_url.substr(0,frame_url.indexOf("iframe")-1);toInject=settings.iframe_markup.replace(/{width}/g,a["width"]).replace(/{height}/g,a["height"]).replace(/{path}/g,frame_url);break;case"ajax":doresize=false;a=w(movie_width,movie_height);doresize=true;skipInjection=true;e.get(pp_images[set_position],function(e){toInject=settings.inline_markup.replace(/{content}/g,e);$pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject;g()});break;case"custom":a=w(movie_width,movie_height);toInject=settings.custom_markup;break;case"inline":myClone=e(pp_images[set_position]).clone().append('<br clear="all" />').css({width:settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo(e("body")).show();doresize=false;a=w(e(myClone).width(),e(myClone).height());doresize=true;e(myClone).remove();toInject=settings.inline_markup.replace(/{content}/g,e(pp_images[set_position]).html());break}if(!imgPreloader&&!skipInjection){$pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject;g()}});return false};e.prettyPhoto.changePage=function(t){currentGalleryPage=0;if(t=="previous"){set_position--;if(set_position<0)set_position=e(pp_images).size()-1}else if(t=="next"){set_position++;if(set_position>e(pp_images).size()-1)set_position=0}else{set_position=t}rel_index=set_position;if(!doresize)doresize=true;if(settings.allow_expand){e(".pp_contract").removeClass("pp_contract").addClass("pp_expand")}y(function(){e.prettyPhoto.open()})};e.prettyPhoto.changeGalleryPage=function(e){if(e=="next"){currentGalleryPage++;if(currentGalleryPage>totalPage)currentGalleryPage=0}else if(e=="previous"){currentGalleryPage--;if(currentGalleryPage<0)currentGalleryPage=totalPage}else{currentGalleryPage=e}slide_speed=e=="next"||e=="previous"?settings.animation_speed:0;slide_to=currentGalleryPage*itemsPerPage*itemWidth;$pp_gallery.find("ul").animate({left:-slide_to},slide_speed)};e.prettyPhoto.startSlideshow=function(){if(typeof m=="undefined"){$pp_pic_holder.find(".pp_play").unbind("click").removeClass("pp_play").addClass("pp_pause").click(function(){e.prettyPhoto.stopSlideshow();return false});m=setInterval(e.prettyPhoto.startSlideshow,settings.slideshow)}else{e.prettyPhoto.changePage("next")}};e.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find(".pp_pause").unbind("click").removeClass("pp_pause").addClass("pp_play").click(function(){e.prettyPhoto.startSlideshow();return false});clearInterval(m);m=undefined};e.prettyPhoto.close=function(){if($pp_overlay.is(":animated"))return;e.prettyPhoto.stopSlideshow();$pp_pic_holder.stop().find("object,embed").css("visibility","hidden");e("div.pp_pic_holder,div.ppt,.pp_fade").fadeOut(settings.animation_speed,function(){e(this).remove()});$pp_overlay.fadeOut(settings.animation_speed,function(){if(settings.hideflash)e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","visible");e(this).remove();e(window).unbind("scroll.prettyphoto");r();settings.callback();doresize=true;f=false;delete settings})};if(!pp_alreadyInitialized&&t()){pp_alreadyInitialized=true;hashIndex=t();hashRel=hashIndex;hashIndex=hashIndex.substring(hashIndex.indexOf("/")+1,hashIndex.length-1);hashRel=hashRel.substring(0,hashRel.indexOf("/"));setTimeout(function(){e("a["+s.hook+"^='"+hashRel+"']:eq("+hashIndex+")").trigger("click")},50)}return this.unbind("click.prettyphoto").bind("click.prettyphoto",e.prettyPhoto.initialize)};})(jQuery);var pp_alreadyInitialized=false;




/**
*	@name							Elastic
*	@descripton						Elastic is jQuery plugin that grow and shrink your textareas automatically
*	@version						1.6.11
*	@requires						jQuery 1.2.6+
*
*	@author							Jan Jarfalk
*	@author-email					jan.jarfalk@unwrongest.com
*	@author-website					http://www.unwrongest.com
*
*	@licence						MIT License - http://www.opensource.org/licenses/mit-license.php
*/
(function(jQuery){jQuery.fn.extend({elastic:function(){var mimics=['paddingTop','paddingRight','paddingBottom','paddingLeft','fontSize','lineHeight','fontFamily','width','fontWeight'];return this.each(function(){if(this.type!='textarea'){return false;}
var $textarea=jQuery(this),$twin=jQuery('<div />').css({'position':'absolute','display':'none','word-wrap':'break-word'}),lineHeight=parseInt($textarea.css('line-height'),10)||parseInt($textarea.css('font-size'),'10'),minheight=parseInt($textarea.css('height'),10)||lineHeight*3,maxheight=parseInt($textarea.css('max-height'),10)||Number.MAX_VALUE,goalheight=0,i=0;if(maxheight<0){maxheight=Number.MAX_VALUE;}
$twin.appendTo($textarea.parent());var i=mimics.length;while(i--){$twin.css(mimics[i].toString(),$textarea.css(mimics[i].toString()));}
function setHeightAndOverflow(height,overflow){curratedHeight=Math.floor(parseInt(height,10));if($textarea.height()!=curratedHeight){$textarea.css({'height':curratedHeight+'px','overflow':overflow});}}
function update(){var textareaContent=$textarea.val().replace(/&/g,'&amp;').replace(/  /g,'&nbsp;').replace(/<|>/g,'&gt;').replace(/\n/g,'<br />');var twinContent=$twin.html();if(textareaContent+'&nbsp;'!=twinContent){$twin.html(textareaContent+'&nbsp;');if(Math.abs($twin.height()+lineHeight-$textarea.height())>3){var goalheight=$twin.height()+lineHeight;if(goalheight>=maxheight){setHeightAndOverflow(maxheight,'auto');}else if(goalheight<=minheight){setHeightAndOverflow(minheight,'hidden');}else{setHeightAndOverflow(goalheight,'hidden');}}}}
$textarea.css({'overflow':'hidden'});$textarea.keyup(function(){update();});$textarea.live('input paste',function(e){setTimeout(update,250);});update();});}});})(jQuery);




/*!
 * hoverIntent r7 // 2013.03.11 // jQuery 1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license.
 * Copyright 2007, 2013 Brian Cherne
 */
(function(e){e.fn.hoverIntent=function(t,n,r){var i={interval:100,sensitivity:7,timeout:0};if(typeof t==="object"){i=e.extend(i,t)}else if(e.isFunction(n)){i=e.extend(i,{over:t,out:n,selector:r})}else{i=e.extend(i,{over:t,out:t,selector:n})}var s,o,u,a;var f=function(e){s=e.pageX;o=e.pageY};var l=function(t,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);if(Math.abs(u-s)+Math.abs(a-o)<i.sensitivity){e(n).off("mousemove.hoverIntent",f);n.hoverIntent_s=1;return i.over.apply(n,[t])}else{u=s;a=o;n.hoverIntent_t=setTimeout(function(){l(t,n)},i.interval)}};var c=function(e,t){t.hoverIntent_t=clearTimeout(t.hoverIntent_t);t.hoverIntent_s=0;return i.out.apply(t,[e])};var h=function(t){var n=jQuery.extend({},t);var r=this;if(r.hoverIntent_t){r.hoverIntent_t=clearTimeout(r.hoverIntent_t)}if(t.type=="mouseenter"){u=n.pageX;a=n.pageY;e(r).on("mousemove.hoverIntent",f);if(r.hoverIntent_s!=1){r.hoverIntent_t=setTimeout(function(){l(n,r)},i.interval)}}else{e(r).off("mousemove.hoverIntent",f);if(r.hoverIntent_s==1){r.hoverIntent_t=setTimeout(function(){c(n,r)},i.timeout)}}};return this.on({"mouseenter.hoverIntent":h,"mouseleave.hoverIntent":h},i.selector)}})(jQuery);




/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});




/*!
* jQuery Cookie Plugin
* https://github.com/carhartl/jquery-cookie
*
* Copyright 2011, Klaus Hartl
* Dual licensed under the MIT or GPL Version 2 licenses.
* http://www.opensource.org/licenses/mit-license.php
* http://www.opensource.org/licenses/GPL-2.0
*/
(function(a){a.cookie=function(b,c,d){if(arguments.length>1&&(!/Object/.test(Object.prototype.toString.call(c))||c===null||c===undefined)){d=a.extend({},d);if(c===null||c===undefined){d.expires=-1}if(typeof d.expires==="number"){var e=d.expires,f=d.expires=new Date;f.setDate(f.getDate()+e)}c=String(c);return document.cookie=[encodeURIComponent(b),"=",d.raw?c:encodeURIComponent(c),d.expires?"; expires="+d.expires.toUTCString():"",d.path?"; path="+d.path:"",d.domain?"; domain="+d.domain:"",d.secure?"; secure":""].join("")}d=c||{};var g=d.raw?function(a){return a}:decodeURIComponent;var h=document.cookie.split("; ");for(var i=0,j;j=h[i]&&h[i].split("=");i++){if(g(j[0])===b)return g(j[1]||"")}return null}})(jQuery);




// Images Loaded
(function(c,q){var m="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";c.fn.imagesLoaded=function(f){function n(){var b=c(j),a=c(h);d&&(h.length?d.reject(e,b,a):d.resolve(e));c.isFunction(f)&&f.call(g,e,b,a)}function p(b){k(b.target,"error"===b.type)}function k(b,a){b.src===m||-1!==c.inArray(b,l)||(l.push(b),a?h.push(b):j.push(b),c.data(b,"imagesLoaded",{isBroken:a,src:b.src}),r&&d.notifyWith(c(b),[a,e,c(j),c(h)]),e.length===l.length&&(setTimeout(n),e.unbind(".imagesLoaded",
p)))}var g=this,d=c.isFunction(c.Deferred)?c.Deferred():0,r=c.isFunction(d.notify),e=g.find("img").add(g.filter("img")),l=[],j=[],h=[];c.isPlainObject(f)&&c.each(f,function(b,a){if("callback"===b)f=a;else if(d)d[b](a)});e.length?e.bind("load.imagesLoaded error.imagesLoaded",p).each(function(b,a){var d=a.src,e=c.data(a,"imagesLoaded");if(e&&e.src===d)k(a,e.isBroken);else if(a.complete&&a.naturalWidth!==q)k(a,0===a.naturalWidth||0===a.naturalHeight);else if(a.readyState||a.complete)a.src=m,a.src=d}):
n();return d?d.promise(g):g}})(jQuery);




/* Preload images
================================================== */
	
(function($){
	"use strict";	
	
	$.fn.preloader = function(options){
	
	    // variables declaration and precaching images and parent container
		var options = $.extend($.fn.preloader.defaults, options),
		root = $(this) , images = root.find(options.select_image).css({"visibility":"hidden",opacity:0}) ,  timer ,  counter = 0, i=0 , checkFlag = [] , delaySum = options.delay ,			
		 
		init = function(){
			timer = setInterval(function(){
				
				if(counter>=checkFlag.length){
					clearInterval(timer);
					options.onDone();
					return;
				}
			
				for(i=0;i<images.length;i++){
					if ($(images[i]).closest('.jcarousel')) {
						if ($(images[i]).closest('article[id^="post-"]').data('order') > 4) {
							$(images[i]).css({"visibility":"visible",opacity:1}).parent().removeClass("preloader");	
						} else {							
							if(images[i].complete==true){
								if(checkFlag[i]==false)	{
									checkFlag[i] = true;
									options.onEachLoad(images[i]);
									counter++;						
									delaySum = delaySum + options.delay;
								}
								
								$(images[i]).css("visibility","visible").delay(delaySum).animate({opacity:1},options.fadein,
								function(){ $(this).parent().removeClass("preloader");   });	
							}
						}
					} else {
						if(images[i].complete==true){
							if(checkFlag[i]==false)	{
								checkFlag[i] = true;
								options.onEachLoad(images[i]);
								counter++;						
								delaySum = delaySum + options.delay;
							}
							
							$(images[i]).css("visibility","visible").delay(delaySum).animate({opacity:1},options.fadein,
							function(){ $(this).parent().removeClass("preloader");   });	
						}
					}
					
				}	
					
			},options.check_timer)  
		};
		
		images.each(function(){
			
		    if($(this).parent(options.preload_parent).length==0)
				$(this).wrap("<a class='no_link preloader' />");
			else
				$(this).parent().addClass("preloader");		
				checkFlag[i++] = false;		
		}); 
		images = $.makeArray(images); 	
		
		var icon = $("<img />",{		
			id : 'loadingicon' ,
			src : theme_uri + '/img/loading.gif' /* absolute path */		
			}).hide().appendTo("body");	
		
		timer = setInterval(function(){		
			if(icon[0].complete==true){
				clearInterval(timer);
				init();
				icon.remove();
				return;
			}		
		},100);	
	};
	
	// Default options
	$.fn.preloader.defaults = {		
		 delay:200,
		 preload_parent:"a",
		 select_image:'img',
		 check_timer:300,
		 fadein:500,
		 onEachLoad:function(image){ },
		 onDone:function(){ }
	};
		
}(jQuery));




// ========================= smartresize ===============================
		
/*
* smartresize: special jQuery event that happens once after a window resize
*
* latest version and complete README available on Github:
* https://github.com/louisremi/jquery-smartresize
*
* Copyright 2012 @louis_remi
* Licensed under the MIT license.
*
* This saved you an hour of work? 
* Send me music http://www.amazon.co.uk/wishlist/HNTU0468LQON
*/
	
(function($){
	"use strict";
			
	if(!jQuery.fn.smartresize)
	  {
		  var $event = $.event,
		      resizeTimeout;
		
		  $event.special.smartresize = {
		    setup: function() {
		      $(this).bind( "resize", $event.special.smartresize.handler );
		    },
		    teardown: function() {
		      $(this).unbind( "resize", $event.special.smartresize.handler );
		    },
		    handler: function( event, execAsap ) {
		      // Save the context
		      var context = this,
		          args = arguments;
		
		      // set correct event type
		      event.type = "smartresize";
		
		      if ( resizeTimeout ) { clearTimeout( resizeTimeout ); }
		      resizeTimeout = setTimeout(function() {
		        jQuery.event.handle.apply( context, args );
		      }, execAsap === "execAsap"? 0 : 100 );
		    }
		  };
		
		  $.fn.smartresize = function( fn ) {
		    return fn ? this.bind( "smartresize", fn ) : this.trigger( "smartresize", ["execAsap"] );
		  };
	  }	
}(jQuery));



/** jquery.touchSwipe.min.js ****************/
/**
 * TouchSwipe-Jquery-Plugin
 *
 * http://labs.skinkers.com/content/touchSwipe/
 *
 */
 
(function(a){a.fn.swipe=function(c){if(!this){return false}var k={fingers:1,threshold:75,timeThreshold:500,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,click:null,triggerOnTouchEnd:true,allowPageScroll:"auto"};var m="left";var l="right";var d="up";var s="down";var j="none";var v="horizontal";var q="vertical";var o="auto";var f="start";var i="move";var h="end";var n="cancel";var t="ontouchstart" in window,b=t?"touchstart":"mousedown",p=t?"touchmove":"mousemove",g=t?"touchend":"mouseup",r="touchcancel";var e="start";var u;if(c.allowPageScroll==undefined&&(c.swipe!=undefined||c.swipeStatus!=undefined)){c.allowPageScroll=j}if(c){a.extend(k,c)}return this.each(function(){var E=this;var I=a(this);var F=null;var J=0;var y={x:0,y:0};var B={x:0,y:0};var L={x:0,y:0};function A(P){var O=t?P.touches[0]:P;e=f;if(t){J=P.touches.length}distance=0;direction=null;if(J==k.fingers||!t){y.x=B.x=O.pageX;y.y=B.y=O.pageY;if(k.swipeStatus){z(P,e)}var N=new Date();u=N.getTime()}else{D(P)}E.addEventListener(p,K,false);E.addEventListener(g,M,false)}function K(Q){if(e==h||e==n){return}var P=t?Q.touches[0]:Q;B.x=P.pageX;B.y=P.pageY;direction=w();if(t){J=Q.touches.length}e=i;H(Q,direction);if(J==k.fingers||!t){distance=C();if(k.swipeStatus){z(Q,e,direction,distance)}if(!k.triggerOnTouchEnd){var O=new Date();var R=O.getTime();var N=R-u;if(distance>=k.threshold&&N<=k.timeThreshold){e=h;z(Q,e);D(Q)}}}else{e=n;z(Q,e);D(Q)}}function M(P){P.preventDefault();distance=C();direction=w();if(k.triggerOnTouchEnd){e=h;if((J==k.fingers||!t)&&B.x!=0){var O=new Date();var Q=O.getTime();var N=Q-u;if(distance>=k.threshold&&N<=k.timeThreshold){z(P,e);D(P)}else{e=n;z(P,e);D(P)}}else{e=n;z(P,e);D(P)}}else{if(e==i){e=n;z(P,e);D(P)}}E.removeEventListener(p,K,false);E.removeEventListener(g,M,false)}function D(N){J=0;y.x=0;y.y=0;B.x=0;B.y=0;L.x=0;L.y=0}function z(O,N){if(k.swipeStatus){k.swipeStatus.call(I,O,N,direction||null,distance||0)}if(N==n){if(k.click&&(J==1||!t)&&(isNaN(distance)||distance==0)){k.click.call(I,O,O.target)}}if(N==h){if(k.swipe){k.swipe.call(I,O,direction,distance)}switch(direction){case m:if(k.swipeLeft){k.swipeLeft.call(I,O,direction,distance)}break;case l:if(k.swipeRight){k.swipeRight.call(I,O,direction,distance)}break;case d:if(k.swipeUp){k.swipeUp.call(I,O,direction,distance)}break;case s:if(k.swipeDown){k.swipeDown.call(I,O,direction,distance)}break}}}function H(N,O){if(k.allowPageScroll==j){N.preventDefault()}else{var P=k.allowPageScroll==o;switch(O){case m:if((k.swipeLeft&&P)||(!P&&k.allowPageScroll!=v)){N.preventDefault()}break;case l:if((k.swipeRight&&P)||(!P&&k.allowPageScroll!=v)){N.preventDefault()}break;case d:if((k.swipeUp&&P)||(!P&&k.allowPageScroll!=q)){N.preventDefault()}break;case s:if((k.swipeDown&&P)||(!P&&k.allowPageScroll!=q)){N.preventDefault()}break}}}function C(){return Math.round(Math.sqrt(Math.pow(B.x-y.x,2)+Math.pow(B.y-y.y,2)))}function x(){var Q=y.x-B.x;var P=B.y-y.y;var N=Math.atan2(P,Q);var O=Math.round(N*180/Math.PI);if(O<0){O=360-Math.abs(O)}return O}function w(){var N=x();if((N<=45)&&(N>=0)){return m}else{if((N<=360)&&(N>=315)){return m}else{if((N>=135)&&(N<=225)){return l}else{if((N>45)&&(N<135)){return s}else{return d}}}}}try{this.addEventListener(b,A,false);this.addEventListener(r,D)}catch(G){}})}})(jQuery);

/* ========================================================================
 * Bootstrap: affix.js v3.0.0
 * http://getbootstrap.com/javascript/#affix
 * ========================================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ======================================================================== */


+function ($) { "use strict";

  // AFFIX CLASS DEFINITION
  // ======================

  var Affix = function (element, options) {
    this.options = $.extend({}, Affix.DEFAULTS, options)
    this.$window = $(window)
      .on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this))
      .on('click.bs.affix.data-api',  $.proxy(this.checkPositionWithEventLoop, this))

    this.$element = $(element)
    this.affixed  =
    this.unpin    = null

    this.checkPosition()
  }

  Affix.RESET = 'affix affix-top affix-bottom'

  Affix.DEFAULTS = {
    offset: 0
  }

  Affix.prototype.checkPositionWithEventLoop = function () {
    setTimeout($.proxy(this.checkPosition, this), 1)
  }

  Affix.prototype.checkPosition = function () {
    if (!this.$element.is(':visible')) return

    var scrollHeight = $(document).height()
    var scrollTop    = this.$window.scrollTop()
    var position     = this.$element.offset()
    var offset       = this.options.offset
    var offsetTop    = offset.top
    var offsetBottom = offset.bottom

    if (typeof offset != 'object')         offsetBottom = offsetTop = offset
    if (typeof offsetTop == 'function')    offsetTop    = offset.top()
    if (typeof offsetBottom == 'function') offsetBottom = offset.bottom()

    var affix = this.unpin   != null && (scrollTop + this.unpin <= position.top) ? false :
                offsetBottom != null && (position.top + this.$element.height() >= scrollHeight - offsetBottom) ? 'bottom' :
                offsetTop    != null && (scrollTop <= offsetTop) ? 'top' : false

    if (this.affixed === affix) return
    if (this.unpin) this.$element.css('top', '')

    this.affixed = affix
    this.unpin   = affix == 'bottom' ? position.top - scrollTop : null

    this.$element.removeClass(Affix.RESET).addClass('affix' + (affix ? '-' + affix : ''))

    if (affix == 'bottom') {
      this.$element.offset({ top: document.body.offsetHeight - offsetBottom - this.$element.height() })
    }
  }


  // AFFIX PLUGIN DEFINITION
  // =======================

  var old = $.fn.affix

  $.fn.affix = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.affix')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.affix', (data = new Affix(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.affix.Constructor = Affix


  // AFFIX NO CONFLICT
  // =================

  $.fn.affix.noConflict = function () {
    $.fn.affix = old
    return this
  }


  // AFFIX DATA-API
  // ==============

  $(window).on('load', function () {
    $('[data-spy="affix"]').each(function () {
      var $spy = $(this)
      var data = $spy.data()

      data.offset = data.offset || {}

      if (data.offsetBottom) data.offset.bottom = data.offsetBottom
      if (data.offsetTop)    data.offset.top    = data.offsetTop

      $spy.affix(data)
    })
  })

}(window.jQuery);
