// 
jQuery(document).ready(function( $ ){

	$('.twitter-color').wpColorPicker();
	 var Options = {
	    defaultColor: '#49b4ff',
	    change: function(event, ui){},
	    clear: function() {},
	    hide: true,
	    palettes: true
	}; 
    $('#quote-color').wpColorPicker(Options);
    var Options = {
	    defaultColor: '#49b4ff',
	    change: function(event, ui){},
	    clear: function() {},
	    hide: true,
	    palettes: true
	}; 
    $('#link-color').wpColorPicker(Options);
    var Options = {
	    defaultColor: '#49b4ff',
	    change: function(event, ui){},
	    clear: function() {},
	    hide: true,
	    palettes: true
	}; 
    $('#status-color').wpColorPicker(Options);
    var Options = {
	    defaultColor: '#49b4ff',
	    change: function(event, ui){},
	    clear: function() {},
	    hide: true,
	    palettes: true
	}; 
    $('#work-color').wpColorPicker(Options);
    $('#work-style-color').wpColorPicker(Options);
    $('.colorPicker').wpColorPicker(Options);

	if ( $("#post_type").val() != "work") {

		var val = $('#slider-auto').prop('checked');
		if (val) {
			$("#slider-pause").parent().parent().show();
		}else{
			$("#slider-pause").parent().parent().hide();
		}

		$("#slider-auto").change(function() {
			var val = $(this).prop('checked');
			if (val) {
				$("#slider-pause").parent().parent().show();
			}else{
				$("#slider-pause").parent().parent().hide();
			}

		});

		$("#image-url").detach().appendTo("#normal-sortables");
		$("#gallery-images").detach().appendTo("#normal-sortables");
		$("#quote-settings").detach().appendTo("#normal-sortables");
		$("#video-settings").detach().appendTo("#normal-sortables");
		$("#audio-settings").detach().appendTo("#normal-sortables");
		$("#link-settings").detach().appendTo("#normal-sortables");
		$("#status-settings").detach().appendTo("#normal-sortables");
		$("#chat-settings").detach().appendTo("#normal-sortables");
		$("#default-settings").detach().appendTo("#normal-sortables");

		$( "#formatdiv #post-formats-select .post-format" ).each(function( index ) {
		  	if ($(this).is(':checked')){
		  		type = $(this).val();
				switch (type){
					case "image"	: $("#image-url").css("display","block");		break;
					case "gallery"	: $("#gallery-images").css("display","block");	break;
					case "quote"	: $("#quote-settings").css("display","block");	break;
					case "video"	: $("#video-settings").css("display","block");	break;
					case "audio"	: $("#audio-settings").css("display","block");	break;
					case "link"		: $("#link-settings").css("display","block");	break;
					case "status"	: $("#status-settings").css("display","block");	break;
					case "chat"		: $("#chat-settings").css("display","block");	break;
				}
		  	}
		});

		$('#formatdiv #post-formats-select .post-format').live('change', function( event ){
			if ($(this).is(':checked')){
				type = $(this).val();
				switch (type){
					case "image"	: hideAll(); $("#image-url").css("display","block");		break;
					case "gallery"	: hideAll(); $("#gallery-images").css("display","block");	break;
					case "quote"	: hideAll(); $("#quote-settings").css("display","block");	break;
					case "video"	: hideAll(); $("#video-settings").css("display","block");	break;
					case "audio"	: hideAll(); $("#audio-settings").css("display","block");	break;
					case "link"		: hideAll(); $("#link-settings").css("display","block");	break;
					case "status"	: hideAll(); $("#status-settings").css("display","block");	break;
					case "chat"		: hideAll(); $("#chat-settings").css("display","block");	break;
					case "0"		: hideAll(); break;
				}
				
			}

		});
	}

	if ( $("#post_type").val() == "work") {
		//$( ".media-modal .media-button-insert" ).html()
		var val = $('#slider-auto').prop('checked');
		if (val) {
			$("#slider-pause").parent().parent().show();
		}else{
			$("#slider-pause").parent().parent().hide();
		}

		$("#slider-auto").change(function() {
			var val = $(this).prop('checked');
			if (val) {
				$("#slider-pause").parent().parent().show();
			}else{
				$("#slider-pause").parent().parent().hide();
			}

		});

		$( "#formatdiv #post-formats-select .post-format" ).each(function( index ) {
	  		type = $(this).val();
			switch (type){
				case "quote"	: $(this).hide().next().hide().next().hide();	break;
				case "0" 		: $(this).hide().next().hide().next().hide();	break;
				case "link"		: $(this).hide().next().hide().next().hide();	break;
				case "status"	: $(this).hide().next().hide().next().hide();	break;
				case "chat"		: $(this).hide().next().hide().next().hide();	break;
			}
		});

		$( "#formatdiv #post-formats-select .post-format" ).each(function( index ) {
		  	if ($(this).is(':checked')){
		  		type = $(this).val();
				switch (type){
					case "image"	: $("#work-image-url").css("display","block");		break;
					case "gallery"	: $("#work-gallery-images").css("display","block");	break;
					case "video"	: $("#work-video-settings").css("display","block");	break;
					case "audio"	: $("#work-audio-settings").css("display","block");	break;
				}
		  	}
		});

		$('#formatdiv #post-formats-select .post-format').live('change', function( event ){
			if ($(this).is(':checked')){
				type = $(this).val();
				switch (type){
					case "image"	: hideAll(); $("#work-image-url").css("display","block");		break;
					case "gallery"	: hideAll(); $("#work-gallery-images").css("display","block");	break;
					case "video"	: hideAll(); $("#work-video-settings").css("display","block");	break;
					case "audio"	: hideAll(); $("#work-audio-settings").css("display","block");	break;
				}
				
			}

		});

	};

	if ( $("#post_type").val() == "page") {

		var urls = $('#gallery-images').detach();
		var row = $('.post_meta_gallery_upload ').parent();
		urls.appendTo(row);

		var val = $('#add-slider').prop('checked');
		if (val) {
			$('.post_meta_gallery_upload').parent().parent().show();
			$('#slider-mode').parent().parent().show();
			$('#slider-auto').parent().parent().show();
			var val = $('#slider-auto').prop('checked');
			if (val) {
				$("#slider-pause").parent().parent().show();
			}

		}else{
			$('.post_meta_gallery_upload').parent().parent().hide();
			$('#slider-mode').parent().parent().hide();
			$('#slider-auto').parent().parent().hide();
			$('#slider-pause').parent().parent().hide();
		}

		$("#add-slider").change(function() {
			var val = $(this).prop('checked');
			if (val) {
			$('.post_meta_gallery_upload').parent().parent().show();
			$('#slider-mode').parent().parent().show();
			$('#slider-auto').parent().parent().show();
			var val = $('#slider-auto').prop('checked');
			if (val) {
				$("#slider-pause").parent().parent().show();
			}

		}else{
			$('.post_meta_gallery_upload').parent().parent().hide();
			$('#slider-mode').parent().parent().hide();
			$('#slider-auto').parent().parent().hide();
			$('#slider-pause').parent().parent().hide();
		}

		});
		$( "#page_template option" ).each(function( index ) {
		  	if ($(this).attr('selected')){
		  		type = $(this).val();
				switch (type){
					case "contact-page.php"		: $("#contact-page-settings").css("display","block");$("#work-page-settings").css("display","none");$("#categories-page-settings").css("display","none");		break;
					case "categories-page.php"	: $("#categories-page-settings").css("display","block");$("#work-page-settings").css("display","none");$("#contact-page-settings").css("display","none");$("#default-page-settings").css("display","block");		break;
					case "work-page.php"		: $("#default-page-settings").css("display","none"); $("#work-page-settings").css("display","block");$("#categories-page-settings").css("display","none");		break;
					default 					: $("#default-page-settings").css("display","block");$("#work-page-settings").css("display","none");$("#categories-page-settings").css("display","none");		break;
				}
		  	}
		});

		$( "#page_template" ).live('change', function( event ){
			$( "#page_template option" ).each(function( index ) {
			  	if ($(this).attr('selected')){
			  		type = $(this).val();
					switch (type){
						case "contact-page.php"		: $("#contact-page-settings").css("display","block");$("#work-page-settings").css("display","none");$("#categories-page-settings").css("display","none");		break;
					case "categories-page.php"	: $("#categories-page-settings").css("display","block");$("#work-page-settings").css("display","none");$("#contact-page-settings").css("display","none");$("#default-page-settings").css("display","block");		break;
					case "work-page.php"		: $("#default-page-settings").css("display","none"); $("#work-page-settings").css("display","block");$("#categories-page-settings").css("display","none");		break;
					default 					: $("#default-page-settings").css("display","block");$("#work-page-settings").css("display","none");$("#categories-page-settings").css("display","none");		break;
					}
			  	}
			});
		});

		if ($( "#show-sidebar" ).prop("checked")) {
			$("#page-width").parent().parent().css("display","none");
			$("#select-sidebar").parent().parent().css("display","block");
			$("#sidebar-position").parent().parent().css("display","block");
		}else{
			$("#page-width").parent().parent().css("display","block");
			$("#select-sidebar").parent().parent().css("display","none");
			$("#sidebar-position").parent().parent().css("display","none");
		}

		$( "#show-sidebar" ).live('change', function( event ){
			if ($(this).prop("checked")) {
				$("#page-width").parent().parent().css("display","none");
				$("#select-sidebar").parent().parent().css("display","block");
				$("#sidebar-position").parent().parent().css("display","block");
			}else{
				$("#page-width").parent().parent().css("display","block");
				$("#select-sidebar").parent().parent().css("display","none");
				$("#sidebar-position").parent().parent().css("display","none");
			}

		});

		
	}

	var hideAll = function() {
	    $("#image-url").hide();
	    $("#work-image-url").hide();
		$("#gallery-images").hide();
		$("#work-gallery-images").hide();
		$("#quote-settings").hide();
		$("#video-settings").hide();
		$("#work-video-settings").hide();
		$("#audio-settings").hide();
		$("#work-audio-settings").hide();
		$("#link-settings").hide();
		$("#status-settings").hide();
		$("#chat-settings").hide();
		$("#contact-page-settings").hide();
		$("#work-page-settings").css("display","none");
	};

});