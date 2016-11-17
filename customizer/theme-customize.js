/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {
	
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( 'header .container h1' ).html( newval );
		} );
	} );
	
	
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	//Customize Logo

	wp.customize( 'select_logo_type', function( value ) {
		value.bind( function( newval ) {
			if(newval=='image'){
				$(".logo img").css('display','inline-block');
				$(".logo h1").css('display','none');
			}else{
				$(".logo img").css('display','none');
				$(".logo h1").css('display','inline-block');
			}
		} );
	} );

	wp.customize( 'logo_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$(".logo h1").css('font-family',newval);
		} );
	} );

	wp.customize( 'logo_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval==true) {
				$(".logo h1").css('font-weight','bold');
			}else{
				$(".logo h1").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'logo_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval==true) {
				$(".logo h1").css('text-transform','uppercase');
			}else{
				$(".logo h1").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'logo_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval==true) {
				$(".logo h1").css('font-style','italic');
			}else{
				$(".logo h1").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'logo_font_size', function( value ) {
		value.bind( function( newval ) {
			$(".logo h1").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'logo_line_height', function( value ) {
		value.bind( function( newval ) {
			$(".logo h1").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'logo_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$(".logo h1").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'logo_color', function( value ) {
		value.bind( function( newval ) {
			$(".logo h1").css('color',newval);
		} );
	} );

	wp.customize( 'logo_background_color', function( value ) {
		value.bind( function( newval ) {
			$(".logo h1").css('background-color',newval);
		} );
	} );

	wp.customize( 'logo_position', function( value ) {
		value.bind( function( newval ) {
			if (newval=='center') {
				$('.logo').css('float','none');
				$('.menu').css('float','none');
			}else{
				$('.logo').css('float','left');
				$('.menu').css('float','right');
			}
		} );
	} );

	wp.customize( 'logo_margin_top', function( value ) {
		value.bind( function( newval ) {
			$(".logo").css('margin-top',newval+'px');
		} );
	} );

	wp.customize( 'logo_margin_bottom', function( value ) {
		value.bind( function( newval ) {
			$(".logo").css('margin-bottom',newval+'px');
		} );
	} );

	wp.customize( 'upload_logo', function( value ) {
		value.bind( function( newval ) {
			$( '.logo img' ).attr('src', newval);
		} );
	} );

	//Customize Tagline

	wp.customize( 'show_tagline', function( value ) {
		value.bind( function( newval ) {
			if(newval){
				$(".logo .tagline").css('display','block');
			}else{
				$(".logo .tagline").css('display','none');
			}
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.logo .tagline' ).html( newval );
		} );
	} );

	wp.customize( 'tagline_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$(".logo .tagline").css('font-family',newval);
		} );
	} );

	wp.customize( 'tagline_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".logo .tagline").css('font-weight','bold');
			}else{
				$(".logo .tagline").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'tagline_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".logo .tagline").css('text-transform','uppercase');
			}else{
				$(".logo .tagline").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'tagline_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".logo .tagline").css('font-style','italic');
			}else{
				$(".logo .tagline").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'tagline_font_size', function( value ) {
		value.bind( function( newval ) {
			$(".logo .tagline").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'tagline_line_height', function( value ) {
		value.bind( function( newval ) {
			$(".logo .tagline").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'tagline_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$(".logo .tagline").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'tagline_color', function( value ) {
		value.bind( function( newval ) {
			$(".logo .tagline").css('color',newval);
		} );
	} );

	wp.customize( 'tagline_margin_top', function( value ) {
		value.bind( function( newval ) {
			$(".logo .tagline").css('margin-top',newval+'px');
		} );
	} );

	//Customize Colors
	wp.customize( 'header_color', function( value ) {
		value.bind( function( newval ) {
			$("header").css('background-color',newval);
		} );
	} );

	wp.customize( 'footer_color', function( value ) {
		value.bind( function( newval ) {
			$("footer").css('background-color',newval);
		} );
	} );

	wp.customize( 'accent_color', function( value ) {
		value.bind( function( newval ) {
			$("a:not(.menu a, #menu-button, a.btn, .tagcloud a, h3 a,.details li a,.widget_categories li a, .panel-title a,.nav-tabs li a,.archive li a)").css('color',newval);
			
			var last = $("head style").last().html();
			if (last.indexOf("background") >= 0){
				$("head style").last().remove();
				$('head').append('<style>.filters:before{background-color:' + newval + ' !important;}</style>');
			}else{
				$('head').append('<style>.filters:before{background-color:' + newval + ' !important;}</style>');
			}
        	$(".audio .controls .current").css('background-color',newval);
        	$(".audio .controls .volume .currentvolume").css('background-color',newval);
        	$("footer.light .widget .input-group-addon button").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#fff");
        	});
			$("footer.light .widget .input-group-btn button").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#fff");
        	});
			$("footer.dark .widget .input-group-addon button").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#ddd");
        	});
			$("footer.dark .widget .input-group-btn button").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#ddd");
        	});
			$("aside .widget .input-group-addon button").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#ddd");
        	});
			$("aside .widget .input-group-btn button").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#ddd");
        	});
			$(".widget_slider .bx-pager-link").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#ddd");
        	});
			$(".widget_slider .bx-pager-link.active").css('background-color',newval);
			$(".page-numbers.current").css('background-color',newval);
			$("footer.dark .widget_slider .bx-pager-link").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#444");
        	});
			$("footer.dark .widget_slider .bx-pager-link.active").css('background-color',newval);
			$(".tagcloud a").hover(function(){
        		$(this).css('background-color',newval);
        		$(this).css('color','#fff');
        	},
        	function(){
        		$(this).css('background-color',"transparent");
        		$(this).css('color','#555');
        	});
			$("footer.dark .tagcloud a").hover(function(){
        		$(this).css('background-color',newval);
        		$(this).css('color','#fff');
        	},
        	function(){
        		$(this).css('background-color',"transparent");
        		$(this).css('color','#aaa');
        	});
			$("footer.light .tagcloud a").hover(function(){
        		$(this).css('background-color',newval);
        		$(this).css('color','#fff');
        	},
        	function(){
        		$(this).css('background-color',"transparent");
        		$(this).css('color','#888');
        	});
			$("footer.light .row > .widget_social  li a").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#eee");
        	});
			$("aside .widget_social  li a").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color',"#eee");
        	});
        	$(".btn-default").css('background-color',newval);
        	$(".btn-default").hover(function(){
        		$(this).css('background-color','#444');
        	},
        	function(){
        		$(this).css('background-color',newval);
        	});
        	$(".nav-tabs > li.active > a").css('background-color',newval);
        	$(".nav-tabs > li.active > a").hover(function(){
        		$(this).css('background-color',newval);
        	},
        	function(){
        		$(this).css('background-color', newval);
        	});
        	$(".panel-title > a:not(.panel-title > a.collapsed)").css('background-color',newval);
        	$(".sticky-label").css('background-color',newval);

			
			$(".tagcloud a").hover(function(){
        		$(this).css('border-color',newval);
        	},
        	function(){
        		$(this).css('border-color',"#aaa");
        	});
        	$("footer.dark .tagcloud a").hover(function(){
        		$(this).css('border-color',newval);
        	},
        	function(){
        		$(this).css('border-color',"#888");
        	});
        	$("footer.light .tagcloud a").hover(function(){
        		$(this).css('border-color',newval);
        	},
        	function(){
        		$(this).css('border-color',"#aaa");
        	});
        	$(".btn-default").css('border-color',newval);
        	$(".btn-default").hover(function(){
        		$(this).css('border-color','#444');
        	},
        	function(){
        		$(this).css('border-color',newval);
        	});
        	$("ul.archive li").hover(function(){
        		$(this).children("i").css('color',newval);
        	},
        	function(){
        		$(this).children("i").css('color',"#888");
        	});			
        	$(".content h3 a").hover(function(){
        		$(this).css('color',newval);
        	},
        	function(){
        		$(this).css('color',"inherit");
        	});
        	$(".post .details i:not(.fa-heart-o)").css('color',newval);
        	$(".widget_categories a:before").css('color',newval);
			$(".widget_pages a:before").css('color',newval);
			$(".widget_archive a:before").css('color',newval);
			$(".widget_nav_menu a:before").css('color',newval);
			$(".widget_meta a:before").css('color',newval);
			$("#wp-calendar tbody td a").css('color',newval);
			$(".post-page .content ul:not(.list-inline) li:before").css('color',newval);
			$(".comment .date a").css('color',newval);
			$(".client i").css('color',newval);
			
			$("span:not(.small-post span)").css('color',newval);
		} );
	} );

	wp.customize( 'accent_color_text', function( value ) {
		value.bind( function( newval ) {
        	$("footer.light .widget .input-group-addon button").hover(function(){
        		$(this).find("i").css('color',newval);
        	},
        	function(){
        		$(this).find("i").css('color',"#aaa");
        	});
			$("footer.light .widget .input-group-btn button").hover(function(){
        		$(this).find("i").css('color',newval);
        	},
        	function(){
        		$(this).find("i").css('color',"#aaa");
        	});
			$("footer.dark .widget .input-group-addon button").hover(function(){
        		$(this).find("i").css('color',newval);
        	},
        	function(){
        		$(this).find("i").css('color',"#aaa");
        	});
			$("footer.dark .widget .input-group-btn button").hover(function(){
        		$(this).find("i").css('color',newval);
        	},
        	function(){
        		$(this).find("i").css('color',"#aaa");
        	});
			$("aside .widget .input-group-addon button").hover(function(){
        		$(this).find("i").css('color',newval);
        	},
        	function(){
        		$(this).find("i").css('color',"#aaa");
        	});
			$("aside .widget .input-group-btn button").hover(function(){
        		$(this).find("i").css('color',newval);
        	},
        	function(){
        		$(this).find("i").css('color',"#aaa");
        	});
			
			$(".page-numbers.current").css('color',newval);
			
			$(".tagcloud a").hover(function(){
        		$(this).css('color',newval);
        	},
        	function(){
        		$(this).css('color','#555');
        	});
			$("footer.dark .tagcloud a").hover(function(){
        		$(this).css('color',newval);
        	},
        	function(){
        		$(this).css('color','#aaa');
        	});
			$("footer.light .tagcloud a").hover(function(){
        		$(this).css('color',newval);
        	},
        	function(){
        		$(this).css('color','#888');
        	});
			$("footer.light .row > .widget_social  li a").hover(function(){
        		$(this).css('color',newval);
        	},
        	function(){
        		$(this).css('color',"#888");
        	});
			$("aside .widget_social  li a").hover(function(){
        		$(this).css('color',newval);
        	},
        	function(){
        		$(this).css('color',"#888");
        	});
        	$(".btn-default").css('color',newval);
        	$(".btn-default").hover(function(){
        		$(this).css('color','#fff');
        	},
        	function(){
        		$(this).css('color',newval);
        	});
        	$(".nav-tabs > li.active > a").css('color',newval);
        	$(".nav-tabs > li.active > a").hover(function(){
        		$(this).css('color',newval);
        	},
        	function(){
        		$(this).css('color', newval);
        	});
        	$(".panel-title > a").css('color',newval);
        	$(".sticky-label").css('color',newval);
        	$(".sticky-label p").css('color',newval);
		} );
	} );


	//works

	wp.customize( 'works_animation', function( value ) {
		value.bind( function( newval ) {
			var pathTo,pathD;
			switch (newval) {
			    case 'type1': {
			    	pathTo = "m 180,64 -180,0 L 0,0 180,0 z";
					pathD = "M 180,160 0,218 0,0 180,0 z";
			    	break;
			    }
			    case 'type2': {
			    	pathTo = "m 0,0 0,87.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z";
					pathD = "m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z";
			    	break;
			    }
			    case 'type3': {
			    	pathTo = "M 0,0 0,60 90,80 180.5,60 180,0 z";
					pathD = "M 0 0 L 0 200 L 90 160 L 180 200 L 180 0 L 0 0 z ";
			    	break;
			    }
			}
			$('.gallery .grid a.work').attr('data-path-to',pathTo);
			$('.gallery .grid a.work').attr('data-type',newval);
	    	$('.gallery .grid .work figure svg path').attr('d',pathD);
	    	reload_masonry();
		} );
	} );

	wp.customize( 'work_button_color', function( value ) {
		value.bind( function( newval ) {
			var color = hexToRgb(newval);
			$(".work figure .button").css('background','rgba('+color.r+','+color.g+','+color.b+',0.8)');
			$(".work figure .button").hover(function(){
        		$(this).css('background','rgba('+color.r+','+color.g+','+color.b+',1)');
        	},
        	function(){
        		$(this).css('background','rgba('+color.r+','+color.g+','+color.b+',0.8)');
        	});
		} );
	} );

	wp.customize( 'work_button_text_color', function( value ) {
		value.bind( function( newval ) {
			$(".work figure .button").css('color',newval);
			$(".work figure .button i").css('color',newval);
		} );
	} );

	wp.customize( 'work_button_text', function( value ) {
		value.bind( function( newval ) {
			$(".work figure .button").html('<i class="fa fa-eye"></i>'+newval);
		} );
	} );

	//Background

	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$(".main").css('background-color',newval);
			$(".gallery").css('background-color',newval);
		} );
	} );

	wp.customize( 'background_stretch', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".main").css('background-size','cover');
				$(".gallery").css('background-size','cover');
			}else{
				$(".main").css('background-size','auto');
				$(".gallery").css('background-size','auto');
			}
		} );
	} );

	wp.customize( 'background_image', function( value ) {
		value.bind( function( newval ) {
			$(".main").css('background-image','url('+newval+')');
			$(".gallery").css('background-image','url('+newval+')');
		} );
	} );

	wp.customize( 'background_repeat', function( value ) {
		value.bind( function( newval ) {
			$(".main").css('background-repeat',newval);
			$(".gallery").css('background-repeat',newval);
		} );
	} );

	wp.customize( 'background_position', function( value ) {
		value.bind( function( newval ) {
			$(".main").css('background-position',newval);
			$(".gallery").css('background-position',newval);
		} );
	} );

	wp.customize( 'background_attachment', function( value ) {
		value.bind( function( newval ) {
			$(".main").css('background-attachment',newval);
			$(".gallery").css('background-attachment',newval);
		} );
	} );


	//Customize Welcome Msg

	wp.customize( 'show_welcome', function( value ) {
		value.bind( function( newval ) {
			if(newval){
				$(".welcome").css('display','block');
			}else{
				$(".welcome").css('display','none');
			}
		} );
	} );

	wp.customize( 'welcome_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$(".welcome").css('font-family',newval);
		} );
	} );

	wp.customize( 'welcome_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".welcome").css('font-weight','bold');
			}else{
				$(".welcome").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'welcome_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".welcome").css('text-transform','uppercase');
			}else{
				$(".welcome").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'welcome_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".welcome").css('font-style','italic');
			}else{
				$(".welcome").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'welcome_font_size', function( value ) {
		value.bind( function( newval ) {
			$(".welcome").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'welcome_line_height', function( value ) {
		value.bind( function( newval ) {
			$(".welcome").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'welcome_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$(".welcome").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'welcome_color', function( value ) {
		value.bind( function( newval ) {
			$(".welcome").css('color',newval);
		} );
	} );

	wp.customize( 'welcome_margin_top', function( value ) {
		value.bind( function( newval ) {
			$(".welcome").css('margin-top',newval+'px');
		} );
	} );

	wp.customize( 'welcome_margin_bottom', function( value ) {
		value.bind( function( newval ) {
			$(".welcome").css('margin-bottom',newval+'px');
		} );
	} );

	wp.customize( 'welcome_text', function( value ) {
		value.bind( function( newval ) {
			$( '.welcome' ).html( newval );
		} );
	} );

	//Customize Menu



	wp.customize( 'menu_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$(".menu ul:not(.dropdown-menu)>li>a").css('font-family',newval);
		} );
	} );

	wp.customize( 'menu_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".menu ul:not(.dropdown-menu)>li>a").css('font-weight','bold');
			}else{
				$(".menu ul:not(.dropdown-menu)>li>a").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'menu_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".menu ul:not(.dropdown-menu)>li>a").css('text-transform','uppercase');
			}else{
				$(".menu ul:not(.dropdown-menu)>li>a").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'menu_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".menu ul:not(.dropdown-menu)>li>a").css('font-style','italic');
			}else{
				$(".menu ul:not(.dropdown-menu)>li>a").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'menu_font_size', function( value ) {
		value.bind( function( newval ) {
			$(".menu ul:not(.dropdown-menu)>li>a").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'menu_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$(".menu ul:not(.dropdown-menu)>li>a").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'menu_color', function( value ) {
		value.bind( function( newval ) {
			$(".menu ul:not(.dropdown-menu)>li>a").css('color',newval);
			$(".menu ul:not(.dropdown-menu)>li").hover(function(){},
			function(){
				$(this).find('> a').css('color',newval);
			});
		} );
	} );

	wp.customize( 'menu_hover', function( value ) {
		value.bind( function( newval ) {
			$(".menu ul>li").hover(function(){
				$(this).find('> a').css('background-color',newval);
			},
			function(){
				$(this).find('> a').css('background-color','transparent');
			});
		} );
	} );

	wp.customize( 'menu_hover_text', function( value ) {
		value.bind( function( newval ) {
			var color = $(".menu ul>li>a").css('color');
			$(".menu ul>li").hover(function(){
				$(this).find('> a').css('color',newval);
			},
			function(){
				$(this).find('> a').css('color',color);
			});
		} );
	} );

	wp.customize( 'menu_margin_top', function( value ) {
		value.bind( function( newval ) {
			$(".menu").css('margin-top',newval+'px');
		} );
	} );

	wp.customize( 'menu_margin_bottom', function( value ) {
		value.bind( function( newval ) {
			$(".menu").css('margin-bottom',newval+'px');
		} );
	} );

	//Customize Filters

	wp.customize( 'always_filters', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$( "#menu-button" ).css("display","none");
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
			}else{
				$( "#menu-button" ).css("display","block");
				var opacity, height, ul_width, width, x;
				opacity = parseInt($( ".filters ul" ).css("opacity"));
	  			if( opacity != 0){
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
				
			}
		} );
	} );

	wp.customize( 'filters_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$(".filters li").css('font-family',newval);
		} );
	} );

	wp.customize( 'filters_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".filters li").css('font-weight','bold');
			}else{
				$(".filters li").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'filters_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".filters li").css('text-transform','uppercase');
			}else{
				$(".filters li").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'filters_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".filters li").css('font-style','italic');
			}else{
				$(".filters li").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'filters_font_size', function( value ) {
		value.bind( function( newval ) {
			$(".filters li").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'filters_line_height', function( value ) {
		value.bind( function( newval ) {
			$(".filters li").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'filters_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$(".filters li").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'filters_color', function( value ) {
		value.bind( function( newval ) {
			$(".filters li").css('color',newval);
		} );
	} );

	//Customize Buttons

	wp.customize( 'button_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$(".btn").css('font-family',newval);
		} );
	} );

	wp.customize( 'button_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".btn").css('font-weight','bold');
			}else{
				$(".btn").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'button_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".btn").css('text-transform','uppercase');
			}else{
				$(".btn").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'button_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".btn").css('font-style','italic');
			}else{
				$(".btn").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'button_font_size', function( value ) {
		value.bind( function( newval ) {
			$(".btn:not(.btn-lg,.btn-sm,.btn-xs)").css('font-size',newval+'px');
			$(".btn:not(.btn-lg,.btn-sm,.btn-xs) i").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'button_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$(".btn").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'button_radius', function( value ) {
		value.bind( function( newval ) {
			$(".btn").css('border-radius',newval+'px');
		} );
	} );

	//Customize Typography

	wp.customize( 'p_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$("p:not(.welcome),.panel-body,.tab-pane,.list li, .tagcloud a,.post .details li a,blockquote footer cite,.dropdown-menu li a,.widget li a,.widget,ul.archive li a").css('font-family',newval);
		} );
	} );

	wp.customize( 'p_font_size', function( value ) {
		value.bind( function( newval ) {
			$("p:not(.welcome),.panel-body,.tab-pane,.list li").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'sidebar_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$(".widget h6").css('font-family',newval);
		} );
	} );

	wp.customize( 'sidebar_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".widget h6").css('font-weight','bold');
			}else{
				$(".widget h6").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'sidebar_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".widget h6").css('text-transform','uppercase');
			}else{
				$(".widget h6").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'sidebar_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$(".widget h6").css('font-style','italic');
			}else{
				$(".widget h6").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'sidebar_font_size', function( value ) {
		value.bind( function( newval ) {
			$(".widget h6").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'sidebar_line_height', function( value ) {
		value.bind( function( newval ) {
			$(".widget h6").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'sidebar_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$(".widget h6").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'sidebar_color', function( value ) {
		value.bind( function( newval ) {
			$(".widget h6").css('color',newval);
		} );
	} );

	wp.customize( 'h1_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$("h1").css('font-family',newval);
		} );
	} );

	wp.customize( 'h1_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h1").css('font-weight','bold');
			}else{
				$("h1").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'h1_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h1").css('text-transform','uppercase');
			}else{
				$("h1").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'h1_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h1").css('font-style','italic');
			}else{
				$("h1").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'h1_font_size', function( value ) {
		value.bind( function( newval ) {
			$("h1").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'h1_line_height', function( value ) {
		value.bind( function( newval ) {
			$("h1").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'h1_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$("h1").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'h1_color', function( value ) {
		value.bind( function( newval ) {
			$("h1").css('color',newval);
		} );
	} );

	wp.customize( 'h2_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$("h2").css('font-family',newval);
		} );
	} );

	wp.customize( 'h2_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h2").css('font-weight','bold');
			}else{
				$("h2").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'h2_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h2").css('text-transform','uppercase');
			}else{
				$("h2").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'h2_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h2").css('font-style','italic');
			}else{
				$("h2").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'h2_font_size', function( value ) {
		value.bind( function( newval ) {
			$("h2").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'h2_line_height', function( value ) {
		value.bind( function( newval ) {
			$("h2").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'h2_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$("h2").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'h2_color', function( value ) {
		value.bind( function( newval ) {
			$("h2").css('color',newval);
		} );
	} );

	wp.customize( 'h3_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$("h3").css('font-family',newval);
			$("blockquote").css('font-family',newval);
			$("blockquote p").css('font-family',newval);
		} );
	} );

	wp.customize( 'h3_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h3").css('font-weight','bold');
				$("blockquote").css('font-weight','bold');
				$("blockquote p").css('font-weight','bold');
			}else{
				$("h3").css('font-weight','normal');
				$("blockquote").css('font-weight','normal');
				$("blockquote p").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'h3_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h3").css('text-transform','uppercase');
				$("blockquote").css('text-transform','uppercase');
				$("blockquote p").css('text-transform','uppercase');
			}else{
				$("h3").css('text-transform','none');
				$("blockquote").css('text-transform','none');
				$("blockquote p").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'h3_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h3").css('font-style','italic');
				$("blockquote").css('font-style','italic');
				$("blockquote p").css('font-style','italic');
			}else{
				$("h3").css('font-style','normal');
				$("blockquote").css('font-style','normal');
				$("blockquote p").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'h3_font_size', function( value ) {
		value.bind( function( newval ) {
			$("h3").css('font-size',newval+'px');
			$("blockquote").css('font-size',newval+'px');
			$("blockquote p").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'h3_line_height', function( value ) {
		value.bind( function( newval ) {
			$("h3").css('line-height',newval+'em');
			$("blockquote").css('line-height',newval+'em');
			$("blockquote p").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'h3_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$("h3").css('letter-spacing',newval+'px');
			$("blockquote").css('letter-spacing',newval+'px');
			$("blockquote p").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'h3_color', function( value ) {
		value.bind( function( newval ) {
			$("h3").css('color',newval);
		} );
	} );

	wp.customize( 'h4_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$("h4").css('font-family',newval);
		} );
	} );

	wp.customize( 'h4_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h4").css('font-weight','bold');
			}else{
				$("h4").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'h4_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h4").css('text-transform','uppercase');
			}else{
				$("h4").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'h4_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h4").css('font-style','italic');
			}else{
				$("h4").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'h4_font_size', function( value ) {
		value.bind( function( newval ) {
			$("h4").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'h4_line_height', function( value ) {
		value.bind( function( newval ) {
			$("h4").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'h4_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$("h4").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'h4_color', function( value ) {
		value.bind( function( newval ) {
			$("h4").css('color',newval);
		} );
	} );

	wp.customize( 'h5_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$("h5").css('font-family',newval);
			$("blockquote").css('font-family',newval);
			$("blockquote p").css('font-family',newval);
		} );
	} );

	wp.customize( 'h5_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h5").css('font-weight','bold');
				$("blockquote").css('font-weight','bold');
				$("blockquote p").css('font-weight','bold');
			}else{
				$("h5").css('font-weight','normal');
				$("blockquote").css('font-weight','normal');
				$("blockquote p").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'h5_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h5").css('text-transform','uppercase');
				$("blockquote").css('text-transform','uppercase');
				$("blockquote p").css('text-transform','uppercase');
			}else{
				$("h5").css('text-transform','none');
				$("blockquote").css('text-transform','none');
				$("blockquote p").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'h5_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h5").css('font-style','italic');
				$("blockquote").css('font-style','italic');
				$("blockquote p").css('font-style','italic');
			}else{
				$("h5").css('font-style','normal');
				$("blockquote").css('font-style','normal');
				$("blockquote p").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'h5_font_size', function( value ) {
		value.bind( function( newval ) {
			$("h5").css('font-size',newval+'px');
			$("blockquote").css('font-size',newval+'px');
			$("blockquote p").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'h5_line_height', function( value ) {
		value.bind( function( newval ) {
			$("h5").css('line-height',newval+'em');
			$("blockquote").css('line-height',newval+'em');
			$("blockquote p").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'h5_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$("h5").css('letter-spacing',newval+'px');
			$("blockquote").css('letter-spacing',newval+'px');
			$("blockquote p").css('letter-spacing',newval+'px');
		} );
	} );

	wp.customize( 'h5_color', function( value ) {
		value.bind( function( newval ) {
			$("h5").css('color',newval);
		} );
	} );

	wp.customize( 'h6_font_family', function( value ) {
		value.bind( function( newval ) {
			$('head').append('<link href="http://fonts.googleapis.com/css?family='+newval+'" rel="stylesheet" type="text/css">');
			$("h6:not(.widget h6)").css('font-family',newval);
		} );
	} );

	wp.customize( 'h6_font_weight', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h6:not(.widget h6)").css('font-weight','bold');
			}else{
				$("h6:not(.widget h6)").css('font-weight','normal');
			}
		} );
	} );

	wp.customize( 'h6_text_transform', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h6:not(.widget h6)").css('text-transform','uppercase');
			}else{
				$("h6:not(.widget h6)").css('text-transform','none');
			}
		} );
	} );

	wp.customize( 'h6_italic', function( value ) {
		value.bind( function( newval ) {
			if (newval) {
				$("h6:not(.widget h6)").css('font-style','italic');
			}else{
				$("h6:not(.widget h6)").css('font-style','normal');
			}
		} );
	} );

	wp.customize( 'h6_font_size', function( value ) {
		value.bind( function( newval ) {
			$("h6:not(.widget h6)").css('font-size',newval+'px');
		} );
	} );

	wp.customize( 'h6_line_height', function( value ) {
		value.bind( function( newval ) {
			$("h6:not(.widget h6)").css('line-height',newval+'em');
		} );
	} );

	wp.customize( 'h6_letterspacing', function( value ) {
		value.bind( function( newval ) {
			$("h6:not(.widget h6)").css('letter-spacing',newval+'px');
		} );
	} );


	wp.customize( 'h6_color', function( value ) {
		value.bind( function( newval ) {
			$("h6").css('color',newval);
		} );
	} );

	//Customize Content

	wp.customize( 'content_padding', function( value ) {
		value.bind( function( newval ) {
			
			$(".main h3, .post-page .content h3:first-child").css('padding',newval+'px');
			$(".main h3, .post-page .content h3:first-child").css('margin','0 -'+newval+'px');
			$(".post .details").css('padding-top',newval+'px');
			$(".post .content .details:last-child").css('padding-bottom',newval+'px');
			$(".content p, .post p").css('padding-top',newval+'px');
			$("blockquote").css('padding',newval+'px');
			$(".content, .comments").css('padding','0 '+newval+'px '+newval+'px');
			$(".content, .comments").css('margin-bottom',newval+'px');
			$(".comments>ul").css('margin','0 -'+newval+'px');
			$(".comments>ul").css('padding',newval+'px '+newval+'px 0');
			$(".comments .btn").css('margin-bottom',newval+'px');
			$(".post .content").css('padding','0 '+newval+'px');
			$(".post-page .post .content").css('padding','0 '+newval+'px '+newval+'px');
			$(".post-page .related .post .content").css('padding','0 '+newval+'px 0');
			$("aside").css('padding',newval+'px');
			$("aside .widget:first-child .input-group").css('padding-bottom',newval+'px');
			$(".widget .input-group").css('margin','0 -'+newval+'px');
			$(".widget .input-group").css('padding','0 '+newval+'px');

			reload_masonry();

		} );
	} );

	//Customize Footer

	wp.customize( 'footer_theme', function( value ) {
		value.bind( function( newval ) {
			$("footer").removeClass('dark').removeClass('light').addClass(newval);
		} );
	} );

	wp.customize( 'upload_footer_logo', function( value ) {
		value.bind( function( newval ) {
			$( '.footer_bottom img' ).attr('src', newval);
		} );
	} );

	//Layout

	wp.customize( 'blog_col_num', function( value ) {
		value.bind( function( newval ) {
			switch (parseInt(newval)) {
				case 1: {
			    	$('.blog-page .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-12');
			    	reload_masonry();
			    	break;
			    }
			    case 2: {
			    	$('.blog-page .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-6');
			    	reload_masonry();
			    	break;
			    }
			    case 3: {
			    	$('.blog-page .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-4');
			    	reload_masonry();
			    	break;
			    }
			    case 4: {
			    	$('.blog-page .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-3');
					reload_masonry();
			    	break;
			    }
			}
		} );
	} );

	wp.customize( 'search_col_num', function( value ) {
		value.bind( function( newval ) {
			switch (parseInt(newval)) {
				case 1: {
			    	$('.archive-result .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-12');
			    	reload_masonry();
			    	break;
			    }
			    case 2: {
			    	$('.archive-result .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-6');
			    	reload_masonry();
			    	break;
			    }
			    case 3: {
			    	$('.archive-result .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-4');
			    	reload_masonry();
			    	break;
			    }
			    case 4: {
			    	$('.archive-result .grid>li').removeClass('col-md-3').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-3');
					reload_masonry();
			    	break;
			    }
			}
		} );
	} );

	wp.customize( 'blog_layout', function( value ) {
		value.bind( function( newval ) {
			switch (newval) {
				case 'left': {

					$('.blog-page .col-md-3').css("display","block");
					$('.blog-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
											.removeClass("col-sm-10").removeClass("col-sm-offset-1")
			    							.removeClass("col-md-8").removeClass("col-md-offset-2")
			    							.removeClass("col-md-6").removeClass("col-md-offset-3")
			    							.removeClass("col-md-12").addClass("col-md-9");
			    	$('.blog-page .col-md-3').insertBefore('.blog-page .posts');
			    	reload_masonry();
			    	break;
			    }
			    case 'right': {
			    	$('.blog-page .col-md-3').css("display","block");
			    	$('.blog-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
			    							.removeClass("col-sm-10").removeClass("col-sm-offset-1")
			    							.removeClass("col-md-8").removeClass("col-md-offset-2")
			    							.removeClass("col-md-6").removeClass("col-md-offset-3")
			    							.removeClass("col-md-12").addClass("col-md-9");
					$('.blog-page .posts').insertBefore('.blog-page .col-md-3');
			    	reload_masonry();
			    	break;
			    }
			    case '12': {
			    	$('.blog-page .col-md-3').css("display","none");
			    	$('.blog-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
			    							.removeClass("col-sm-10").removeClass("col-sm-offset-1")
			    							.removeClass("col-md-8").removeClass("col-md-offset-2")
			    							.removeClass("col-md-6").removeClass("col-md-offset-3")
			    							.removeClass("col-md-9").addClass("col-md-12");
			    	reload_masonry();
			    	break;
			    }
			    case '10': {
			    	$('.blog-page .col-md-3').css("display","none");
			    	$('.blog-page .posts').removeClass("col-md-8").removeClass("col-md-offset-2")
			    							.removeClass("col-md-6").removeClass("col-md-offset-3")
			    							.removeClass("col-md-9").removeClass("col-md-12")
			    							.addClass("col-sm-10").addClass("col-sm-offset-1")
			    							.addClass("col-md-10").addClass("col-md-offset-1");
			    	reload_masonry();
			    	break;
			    }
			    case '8': {
			    	$('.blog-page .col-md-3').css("display","none");
			    	$('.blog-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
			    							.removeClass("col-md-6").removeClass("col-md-offset-3")
			    							.removeClass("col-md-9").removeClass("col-md-12")
			    							.addClass("col-sm-10").addClass("col-sm-offset-1")
			    							.addClass("col-md-8").addClass("col-md-offset-2");
			    	reload_masonry();
			    	break;
			    }
			    case '6': {
			    	$('.blog-page .col-md-3').css("display","none");
			    	$('.blog-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
			    							.removeClass("col-md-8").removeClass("col-md-offset-2")
			    							.removeClass("col-md-9").removeClass("col-md-12")
			    							.addClass("col-sm-10").addClass("col-sm-offset-1")
			    							.addClass("col-md-6").addClass("col-md-offset-3");
			    	reload_masonry();
			    	break;
			    }
			}
		} );
	} );

	wp.customize( 'search_layout', function( value ) {
			value.bind( function( newval ) {
				switch (newval) {
					case 'left': {

						$('.archive-result .col-md-3').css("display","block");
						$('.archive-result .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
												.removeClass("col-sm-10").removeClass("col-sm-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-12").addClass("col-md-9");
				    	$('.archive-result .col-md-3').insertBefore('.archive-result .posts');
				    	reload_masonry();
				    	break;
				    }
				    case 'right': {
				    	$('.archive-result .col-md-3').css("display","block");
				    	$('.archive-result .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-sm-10").removeClass("col-sm-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-12").addClass("col-md-9");
						$('.archive-result .posts').insertBefore('.archive-result .col-md-3');
				    	reload_masonry();
				    	break;
				    }
				    case '12': {
				    	$('.archive-result .col-md-3').css("display","none");
				    	$('.archive-result .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-sm-10").removeClass("col-sm-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-9").addClass("col-md-12");
				    	reload_masonry();
				    	break;
				    }
				    case '10': {
				    	$('.archive-result .col-md-3').css("display","none");
				    	$('.archive-result .posts').removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-9").removeClass("col-md-12")
				    							.addClass("col-sm-10").addClass("col-sm-offset-1")
				    							.addClass("col-md-10").addClass("col-md-offset-1");
				    	reload_masonry();
				    	break;
				    }
				    case '8': {
				    	$('.archive-result .col-md-3').css("display","none");
				    	$('.archive-result .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-9").removeClass("col-md-12")
				    							.addClass("col-sm-10").addClass("col-sm-offset-1")
				    							.addClass("col-md-8").addClass("col-md-offset-2");
				    	reload_masonry();
				    	break;
				    }
				    case '6': {
				    	$('.archive-result .col-md-3').css("display","none");
				    	$('.archive-result .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-9").removeClass("col-md-12")
				    							.addClass("col-sm-10").addClass("col-sm-offset-1")
				    							.addClass("col-md-6").addClass("col-md-offset-3");
				    	reload_masonry();
				    	break;
				    }
				}
			} );
	} );

	wp.customize( 'single_layout', function( value ) {
			value.bind( function( newval ) {
				switch (newval) {
					case 'left': {

						$('.post-page .col-md-3').css("display","block");
						$('.post-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
												.removeClass("col-sm-10").removeClass("col-sm-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-12").addClass("col-md-9");
				    	$('.post-page .col-md-3').insertBefore('.post-page .posts');
				    	reload_masonry();
				    	break;
				    }
				    case 'right': {
				    	$('.post-page .col-md-3').css("display","block");
				    	$('.post-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-sm-10").removeClass("col-sm-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-12").addClass("col-md-9");
						$('.post-page .posts').insertBefore('.post-page .col-md-3');
				    	reload_masonry();
				    	break;
				    }
				    case '12': {
				    	$('.post-page .col-md-3').css("display","none");
				    	$('.post-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-sm-10").removeClass("col-sm-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-9").addClass("col-md-12");
				    	reload_masonry();
				    	break;
				    }
				    case '10': {
				    	$('.post-page .col-md-3').css("display","none");
				    	$('.post-page .posts').removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-9").removeClass("col-md-12")
				    							.addClass("col-sm-10").addClass("col-sm-offset-1")
				    							.addClass("col-md-10").addClass("col-md-offset-1");
				    	reload_masonry();
				    	break;
				    }
				    case '8': {
				    	$('.post-page .col-md-3').css("display","none");
				    	$('.post-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-md-6").removeClass("col-md-offset-3")
				    							.removeClass("col-md-9").removeClass("col-md-12")
				    							.addClass("col-sm-10").addClass("col-sm-offset-1")
				    							.addClass("col-md-8").addClass("col-md-offset-2");
				    	reload_masonry();
				    	break;
				    }
				    case '6': {
				    	$('.post-page .col-md-3').css("display","none");
				    	$('.post-page .posts').removeClass("col-md-10").removeClass("col-md-offset-1")
				    							.removeClass("col-md-8").removeClass("col-md-offset-2")
				    							.removeClass("col-md-9").removeClass("col-md-12")
				    							.addClass("col-sm-10").addClass("col-sm-offset-1")
				    							.addClass("col-md-6").addClass("col-md-offset-3");
				    	reload_masonry();
				    	break;
				    }
				}
			} );
	} );




	var reload_masonry = function(){
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

					[].slice.call ( document.querySelectorAll( ' .gallery .grid li > a.work ,  .related .grid li > a.work' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-to' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseover', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );

						el.addEventListener( 'mouseout', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		}
	}

	function hexToRgb(hex) {
	    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	    return result ? {
	        r: parseInt(result[1], 16),
	        g: parseInt(result[2], 16),
	        b: parseInt(result[3], 16)
	    } : null;
	}
	
	
} )( jQuery );