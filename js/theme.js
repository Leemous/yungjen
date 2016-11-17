jQuery(document).ready(function( $ ){
	"use strict";
	/////////// Home Page SVG resize//////////////

	if ($('html').hasClass('touch')) {
		$('head').append('<style>.work:hover figcaption h3, .work:hover figcaption p, .work:hover figcaption .divider {-webkit-transform: translateY(0px);transform: translateY(0px);}</style>');
		$('head').append('<style>.work:hover figcaption p, .work:hover figcaption .divider {opacity: 1;}</style>');
	};

	$(window).load(function(){
		$(".work figure").each(function(){
			var svg, height;
			svg = $(this).find("svg")[0];
			height = parseInt($(this).css("height"));
			svg.setAttribute('viewBox', '0 0 175 ' + height);
		});
	});

	jQuery(window).on('resizestop', function () {
		if ($('#masonry').length) {
			new CBPGridGallery( document.getElementById( 'masonry' ) );
		}
	   	$(".work figure").each(function(){
	   		var svg, height;
			svg = $(this).find("svg")[0];
			height = parseInt($(this).css("height"));
			svg.setAttribute('viewBox', '0 0 175 ' + height);
		});
	});

	$(window).load(function(){
		$('#loader').delay(300).fadeOut(200);
	});

	///////////Mobile Menu Button Toggle//////////////

	$( "#responsive-menu-button" ).click(function(e) {
	  	e.preventDefault();  
        $('.menu').slideToggle(200);  
	});

	jQuery(window).on('resizestop', function () {
	    width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		if(width>=768){
			if($('.menu').css("display") == 'none'){
	    		$('.menu').css("display","block");
	    	}
	    }else{
	    	if($('.menu').css("display") == 'block'){
	    		$('.menu').css("display","none");
	    	}
	    }
	});

	/////////// Smooth Scroll //////////////

	$(function() {
	  	$('a[href*=#]:not([href=#],[data-toggle="collapse"],[data-toggle="tab"])').click(function() {
	    	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      		var target = $(this.hash);
	      		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      		if (target.length) {
	        		$('html,body').animate({
	          			scrollTop: target.offset().top
	       			}, 400);
	        		return false;
	      		}
	    	}
	  	});
	});

	$(".widget_nav_menu ul").removeClass("menu");

	/////////// Home Page Filters //////////////
	var width;
	width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
	if(width>=992){
	  	$('head').append('<style>.filters:before{width:0% !important;}</style>');
	}

	var startWidth, endWidth;

	jQuery(window).on('resizestop', function () {
	    width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		if(width>=992){
	    	$('head:last-child',this).remove();
	    	$('head').append('<style>.filters:before{width:0% !important;}</style>');
	    }else{
    		$('head:last-child',this).remove();
    		$('head').append('<style>.filters:before{width:100% !important;}</style>');
	    }
	});

	/////////// Countdown //////////////

	if ($('#countdown').length) {
		var countdownDate = new Date(); 
		countdownDate = new Date(2014,6,1); 
		$('#countdown').countdown({until: countdownDate}); 
	}

	/////////// Show/Hide Filters //////////////

	$( "#menu-button" ).click(function(e) {
	  	e.preventDefault();  
	  	var opacity, height, ul_width, width, x;
	  	opacity = parseInt($( ".filters ul" ).css("opacity"));
	  	if( opacity == 0){
	  		$('head:last-child',this).remove();
	  		$( ".filters ul li" ).css("display","inline-block");
	  		width = 0;
	  		ul_width = $( ".filters ul" ).width();
	  		$( ".filters ul li" ).each(function(){
	  			width = width + $(this).outerWidth();
	  		});
	  		x = Math.ceil(width/ul_width);

	  		height = $( ".filters ul li" ).outerHeight();
	  		height = height * x;
	  		$( ".filters ul" ).css("max-height",height+'px');
	  		
	  		
		  	$( ".filters ul" ).delay(100).queue(function() {
		  				$('head').append('<style>.filters:before{width:100% !important;}</style>');
				      	$( ".filters ul" ).css("opacity","1").dequeue();
			});
		  	
		}else{
			$('head:last-child',this).remove();
			$('head').append('<style>.filters:before{width:0% !important;}</style>');
			$( ".filters ul" ).css("opacity","0");
			$( ".filters ul" ).delay(100).queue(function() {
				
					$( ".filters ul li" ).delay(200).queue(function(){
						$( ".filters ul li" ).css("display","none").dequeue();
					});
				$( ".filters ul" ).css("max-height","0").dequeue();
			});
			$( ".filters" ).find(".active").removeClass("active");
			$( ".work" ).each(function() {	
		  		$(this).find("figure").css({
		  			'transform': 'scale(1,1)' ,
				    '-moz-transform': 'scale(1,1)',
				    '-webkit-transform': 'scale(1,1)',
				    'opacity':'1'
				});
		  	});
		}
	});

	if ($('.filters.always_show').length) {
	  	
	  	var opacity, height, ul_width, width, x;
	  	opacity = parseInt($( ".filters ul" ).css("opacity"));
	  	if( opacity == 0){
	  		$('head:last-child',this).remove();
	  		$( ".filters ul li" ).css("display","inline-block");
	  		width = 0;
	  		ul_width = $( ".filters ul" ).width();
	  		$( ".filters ul li" ).each(function(){
	  			width = width + $(this).outerWidth();
	  		});
	  		x = Math.ceil(width/ul_width);

	  		height = $( ".filters ul li" ).outerHeight();
	  		height = height * x;
	  		$( ".filters ul" ).css("max-height",height+'px');
	  		
	  		
		  	$( ".filters ul" ).delay(100).queue(function() {
		  				$('head').append('<style>.filters:before{width:100% !important;}</style>');
				      	$( ".filters ul" ).css("opacity","1").dequeue();
			});
		  	
		}
	};

	///////////Gallery Filter Effect//////////////

	$( ".filters li" ).click(function() {
	  if(!$(this).hasClass("active")){
	  	$( ".filters" ).find(".active").removeClass("active");
	  	$(this).addClass("active");
	  	var filter = $(this).attr("data-filter");
	  	$( ".work" ).each(function() {	
	  		$(this).find("figure").css({
	  			'transform': 'scale(1,1)' ,
			    '-moz-transform': 'scale(1,1)',
			    '-webkit-transform': 'scale(1,1)',
			    'opacity':'1'
			});
	  		if(filter != 'all' && !$(this).hasClass(filter)){
	  			$(this).find("figure").css({
		  			'transform': 'scale(0.8,0.8)' ,
				    '-moz-transform': 'scale(0.8,0.8)',
				    '-webkit-transform': 'scale(0.8,0.8)',
				    'opacity':'0.5'
				});
	  		}
	  	});
	  }
	});

	/////////// Footer Widgets Wrap //////////////

	if ($("footer > .container").children().length > 0 ) {
		$("footer").css("padding-top","30px");
	};

	width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
	if(width>=992){
		var divs = $(".grid .item");
		for(var i = 0; i < divs.length; i+=4) {
		  divs.slice(i, i+3).wrapAll("<div class='row'></div>");
		}
    }else{
		var divs = $(".grid .item");
		for(var i = 0; i < divs.length; i+=2) {
		  divs.slice(i, i+2).wrapAll("<div class='row'></div>");
		}
    }
    jQuery(window).on('resizestop', function () {
    	$(".grid .item").unwrap();
    	width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		if(width>=992){
			var divs = $(".grid .item");
			for(var i = 0; i < divs.length; i+=4) {
			  divs.slice(i, i+3).wrapAll("<div class='row'></div>");
			}
	    }else{
			var divs = $(".grid .item");
			for(var i = 0; i < divs.length; i+=2) {
			  divs.slice(i, i+2).wrapAll("<div class='row'></div>");
			}
	    }
	});
	

	/* Tabs */
	$(".content .nav.nav-tabs li:first-child").addClass("active");
	$(".content .tab-content .tab-pane:first-child").addClass("active");
	$(".content #accordion .panel:first-child .collapsed").removeClass("collapsed");
	$(".content #accordion .panel:first-child .panel-collapse").addClass("in");

	/////////// Responsive Video Frames //////////////

	Fluidvids.init({
	    selector: 'iframe',
	    players: ['www.youtube.com', 'player.vimeo.com']
	});


	/////////// Responsive Video Frames //////////////

	$( 'nav.menu li:has(ul)' ).doubleTapToGo();

	if ($('.page-template-work-page #load-more, .tax-work-categorie #load-more').length) {
      	var count = 1;
	  	var total = $('#load-more').data('pages');
	  	var url = $('#load-more').data('url');
	  	var term = $('#load-more').data('term');
      	homeLoadArticle(count,url,term);
      	count++;
      	if (count > total){
  			$('#load-more').fadeOut();
  			setTimeout(function() {
  				$('#to-top').fadeIn();
  			}, 400);
  		}
      	$("#load-more").click(function(){
      		$('#load-more i').removeClass('fa-cloud-download').addClass('fa-spinner').addClass('fa-spin');
      		if (count > total){
            	return false;
        	}else{
            	homeLoadArticle(count,url,term);
        	}
        	count++;
        	if (count > total){
      			$('#load-more').fadeOut();
      			setTimeout(function() {
      				$('#to-top').fadeIn();
      			}, 400);
      		}
      	}); 
    }else{
    	if ($('#load-more').length) {
		  	var count = 1;
		  	var total = $('#load-more').data('pages');
		  	var url = $('#load-more').data('url');

		  	loadArticle(count,url);
		  	count++;
		  	$("#load-more").click(function(){
		      	$('#load-more i').removeClass('fa-cloud-download').addClass('fa-spinner').addClass('fa-spin');
		      	if (count > total){
		            return false;
		        }else{
		            loadArticle(count,url);
		        }
		        count++;
		        if (count > total){
		      		$('#load-more').fadeOut();
		      		setTimeout(function() {
		      			$('#to-top').fadeIn();
		      		}, 400);
		      	}
		    }); 
		}else{
			$(window).load(function(){
				$(".post .slider").each(function(){
					var slider_auto, slider_pause, slider_mode;
					slider_auto = $(this).data('auto');
					slider_pause = $(this).data('pause');
					slider_mode = $(this).data('mode');
					if (!($(this).find('.bx-wrapper').length)) {
						var slider = $(this).find('ul').bxSlider({
							auto: slider_auto,
						  	infiniteLoop: true,
						  	touchEnabled: true,
						  	pause: slider_pause,
						  	mode: slider_mode,
						  	adaptiveHeight: true,
						  	nextSelector: $(this).find('.controls .next'),
							prevSelector: $(this).find('.controls .prev'),
							nextText: "",
						  	prevText: ""
						  	
						});
						jQuery(window).on('resizestop', function () {
							if ($(this).find('ul').length) {
								slider.reloadSlider();
							}
						});
					}
				});
				$(".post .audio").each(function(){
					if ($(this).find('audio').length) {
						if (!($(this).find('.controls').length)){
							var id = $(this).attr('id');
							$(this).pryanikPlayer('#'+id);
						}
					}
				});
				if ($('#masonry').length) {
					new CBPGridGallery( document.getElementById( 'masonry' ) );
				}
			});

			$(window).load(function(){
				setTimeout(function() { 
					$("#masonry .grid>li").each(function(index) {
			   		 		var that = this;
				       		var t = setTimeout(function() { 
				         		$(that).addClass('animated fadeInUp'); 
				         		reload_masonry();
				      		}, 50 * index); 
				    });
				},200);
			});
		}
    }
    function homeLoadArticle(pageNumber, pageURL, term){    
      	$.ajax({
          	url: pageURL+"/wp-admin/admin-ajax.php",
          	type:'POST',
          	data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=workloop&post_type=work&term=' + term, 
          	success: function(html){
          		$('#load-more i').removeClass('fa-spinner').removeClass('fa-spin').addClass('fa-cloud-download');
              	$("#masonry .grid").append(html);
              	home_reload_masonry();
              	$("#masonry .grid").waitForImages(function() {
              		$('#loader').delay(500).fadeOut(300);
              		setTimeout(function() {
                   		$("#masonry .grid>li").each(function(index) {
				   		 		var that = this;
					       		var t = setTimeout(function() { 
					         		$(that).addClass('animated fadeInUp'); 
					         		home_reload_masonry();
					      		}, 50 * index); 
					    });
					},500);
               	});	   
          	}
      	});
        return false;
    }
    function home_reload_masonry(){
		if ($('#masonry').length) {
			new CBPGridGallery( document.getElementById( 'masonry' ) );
		};
		$(".work figure").each(function(){
			var svg, height;
			svg = $(this).find("svg")[0];
			height = parseInt($(this).css("height"));
			svg.setAttribute('viewBox', '0 0 175 ' + height);
		});
		if ($('.work figure').length) {
			(function() {
				"use strict";
				function init() {
					var speed = 330,
						easing = mina.backout;
					var svgFrom = 0;

					[].slice.call ( document.querySelectorAll( ' .gallery .grid li > a.work ,  .related .grid li > a.work, .posts .grid li > a.work ' ) ).reverse().forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-to' )
							};
							if (svgFrom == 0 ) {
								svgFrom = path.attr( 'd' );
							};
							
						if ($('html').hasClass('touch')) {
							el.addEventListener( 'mouseenter', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseover', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseleave', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseout', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

						}else{
							el.addEventListener( 'mouseenter', function() {
								path.animate( { 'path' : pathConfig.to }, speed, easing );
							} );

							el.addEventListener( 'mouseover', function() {
								path.animate( { 'path' : pathConfig.to }, speed, easing );
							} );

							el.addEventListener( 'mouseleave', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseout', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );
						}
					} );
				}

				init();

			})();
		}
	}
	function loadArticle(pageNumber,pageURL){    
     	$.ajax({
              url: pageURL+"/wp-admin/admin-ajax.php",
              type:'POST',
              data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop&post_type=post&term=undefined', 
              success: function(html){
              		$('#load-more i').removeClass('fa-spinner').removeClass('fa-spin').addClass('fa-cloud-download');
                  	$("#masonry .grid").append(html);
                  	blogInit();
                  	reload_masonry();
                  	$("#masonry .grid").waitForImages(function() {
                       	$("#masonry .grid>li").animate({opacity:1},300);
					});    	   
              }
        });
        return false;
    }
	function reload_masonry(){
		if ($('#masonry').length) {
			new CBPGridGallery( document.getElementById( 'masonry' ) );
		};
		$(".work figure").each(function(){
			var svg, height;
			svg = $(this).find("svg")[0];
			height = parseInt($(this).css("height"));
			svg.setAttribute('viewBox', '0 0 175 ' + height);
		});
		if ($('.work figure').length) {
			(function() {
				"use strict";
				function init() {
					var speed = 330,
						easing = mina.backout;
					var svgFrom = 0;

					[].slice.call ( document.querySelectorAll( ' .gallery .grid li > a.work ,  .related .grid li > a.work, .posts .grid li > a.work ' ) ).reverse().forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-to' )
							};
							if (svgFrom == 0 ) {
								svgFrom = path.attr( 'd' );
							};
							
						if ($('html').hasClass('touch')) {
							el.addEventListener( 'mouseenter', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseover', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseleave', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseout', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

						}else{
							el.addEventListener( 'mouseenter', function() {
								path.animate( { 'path' : pathConfig.to }, speed, easing );
							} );

							el.addEventListener( 'mouseover', function() {
								path.animate( { 'path' : pathConfig.to }, speed, easing );
							} );

							el.addEventListener( 'mouseleave', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseout', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );
						}
					} );
				}

				init();

			})();
		}
		Fluidvids.init({
		    selector: 'iframe',
		    players: ['www.youtube.com', 'player.vimeo.com']
		});
	}

	function blogInit(){
		$(".post .slider").each(function(){
			var slider_auto, slider_pause, slider_mode;
			slider_auto = $(this).data('auto');
			slider_pause = $(this).data('pause');
			slider_mode = $(this).data('mode');
			if (!($(this).find('.bx-wrapper').length)) {
				var slider = $(this).find('ul').bxSlider({
					auto: slider_auto,
				  	infiniteLoop: true,
				  	touchEnabled: true,
				  	pause: slider_pause,
				  	mode: slider_mode,
				  	adaptiveHeight: true,
				  	nextSelector: $(this).find('.controls .next'),
					prevSelector: $(this).find('.controls .prev'),
					nextText: "",
				  	prevText: ""
				  	
				});
				jQuery(window).on('resizestop', function () {
					if ($(this).find('ul').length) {
						slider.reloadSlider();
					}
				});
			};
		});
		$(".post .audio").each(function(){
			if ($(this).find('audio').length) {
				if (!($(this).find('.controls').length)){
					var id = $(this).attr('id');
					$(this).pryanikPlayer('#'+id);
				}
			}
		});
	}

	$(window).load(function(){
		if ($('.widget_slider').length) {
			$('.widget_slider').each(function(){
				var loop = $(this).find('.slider').data('loop');
				var auto = $(this).find('.slider').data('auto');
				var speed = $(this).find('.slider').data('speed');
				var pause = $(this).find('.slider').data('pause');
				var mode = $(this).find('.slider').data('mode');
				var height = $(this).find('.slider').data('height');
				var captions = $(this).find('.slider').data('captions');
				$(this).find('ul').bxSlider({
				  	infiniteLoop: loop ,
				  	auto : auto,
				  	speed : speed,
				  	pause : pause,
				  	mode : mode,
				  	controls: false	,
				  	touchEnabled: true,
				  	adaptiveHeight: height,
				  	captions: captions,
				});
				if (captions == true) {
					$(this).find('ul li').css({
						"-webkit-box-shadow" : "inset 0px -40px 40px -20px rgba(0,0,0,0.4)",
						"-moz-box-shadow" : "inset 0px -40px 40px -20px rgba(0,0,0,0.4)" ,
						"box-shadow" : "inset 0px -40px 40px -20px rgba(0,0,0,0.4)"
					});
				}
			});
		}
	});

	!function(d,s,id){
		var js, fjs=d.getElementsByTagName(s)[0], p=/^http:/.test(d.location)?'http':'https';
		if(!d.getElementById(id)){ 
			js=d.createElement(s);
			js.id=id;
			js.src=p+"://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
		}
	}
	(document,"script","twitter-wjs");

	$(".flickr").each(function(){
		var id = $(this).data('flickrid');
		var limit = $(this).data('limit');
		var random = $(this).data('random');
		$(this).flickrush({
			limit:limit,
			id:id,
			random:random
		});
	});

	$(".home-slider").each(function(){
		var slider_auto, slider_pause, slider_mode;
		slider_auto = $(this).data('auto');
		slider_pause = $(this).data('pause');
		slider_mode = $(this).data('mode');
		if (!($(this).find('.bx-wrapper').length)) {
			var slider = $(this).find('ul').bxSlider({
				auto: slider_auto,
			  	infiniteLoop: true,
			  	touchEnabled: true,
			  	pause: slider_pause,
			  	mode: slider_mode,
			  	adaptiveHeight: true,
			  	nextSelector: ".home-slider .controls .next",
				prevSelector: ".home-slider .controls .prev",
				nextText: "",
			  	prevText: "",
			  	pager: false  
			});
			jQuery(window).on('resizestop', function () {
				if ($(this).find('ul').length) {
					slider.reloadSlider();
				}
			});
		};
	});

	$(".post-page .slider, .work-page .slider").each(function(){
		var slider_auto, slider_pause, slider_mode;
		slider_auto = $(this).data('auto');
		slider_pause = $(this).data('pause');
		slider_mode = $(this).data('mode');
		if (!($(this).find('.bx-wrapper').length)) {
			var slider = $(this).find('ul').bxSlider({
				auto: slider_auto,
			  	infiniteLoop: true,
			  	touchEnabled: true,
			  	pause: slider_pause,
			  	mode: slider_mode,
			  	adaptiveHeight: true,
			  	captions: true,
			  	nextSelector: $(this).find('.controls .next'),
				prevSelector: $(this).find('.controls .prev'),
				nextText: "",
			  	prevText: ""
			  	
			});
			jQuery(window).on('resizestop', function () {
				if ($(this).find('ul').length) {
					slider.reloadSlider();
				}
			});
		};
	});
	$(".post-page .audio,.work-page .audio").each(function(){
		if ($(this).find('audio').length) {
			if (!($(this).find('.controls').length)){
				var id = $(this).attr('id');
				$(this).pryanikPlayer('#'+id);
			}
		}
	});

	if ($('#commentform').length) {
		$('#commentform').validate({
	        rules: {
	            author: {
	                required: true,
	                minlength: 2
	            },
	            email: {
	                required: true,
	                email: true
	            },
	            comment: {
	                required: true,
	                minlength: 2
	            }
	        },
	        messages: {
	            author: {
	                required: "Name is required",
	                minlength: "At least 2 characters"
	            },
	            email: {
	                required: "Email is required"
	            },
	            comment: {
	                required: "Message is required",
	                minlength: "At least 2 characters"
	            }
	        }
	    });
	}
	$(".map").each(function(){
		var adr = $(this).data('address');
		var id = $(this).attr('id');
		$('#'+id).gmap3({
		    marker:{
		      	address: adr
		    },
		    map:{
		      	options:{
		        	zoom: 14
		      	}
		    }
		});
	});

	

	/////////// Home Page SVG Animation //////////////

	if ($('#masonry').length) {
		new CBPGridGallery( document.getElementById( 'masonry' ) );
	}

	if ($('.work figure').length) {
		(function() {
				"use strict";
				function init() {
					var speed = 330,
						easing = mina.backout;
					var svgFrom = 0;

					[].slice.call ( document.querySelectorAll( ' .gallery .grid li > a.work ,  .related .grid li > a.work, .posts .grid li > a.work' ) ).reverse().forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-to' )
							};
							if (svgFrom == 0 ) {
								svgFrom = path.attr( 'd' );
							};
							

						if ($('html').hasClass('touch')) {
							el.addEventListener( 'mouseenter', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseover', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseleave', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseout', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );
						}else{
							el.addEventListener( 'mouseenter', function() {
								path.animate( { 'path' : pathConfig.to }, speed, easing );
							} );

							el.addEventListener( 'mouseover', function() {
								path.animate( { 'path' : pathConfig.to }, speed, easing );
							} );

							el.addEventListener( 'mouseleave', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );

							el.addEventListener( 'mouseout', function() {
								path.animate( { 'path' : svgFrom }, speed, easing );
							} );
						}
					} );
				}

				init();

			})();
	}
});
