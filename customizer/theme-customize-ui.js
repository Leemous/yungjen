jQuery(document).ready(function( $ ) {

	var select_logo_type = function(selector){
		var val = $(selector).children('option:selected').val();
	  	if(val=='image'){
			$("#customize-control-upload_logo").css('display','block');
			$("#customize-control-upload_logo2x").css('display','block');

			$('#customize-control-logo_font_family').css('display','none');
			$('#customize-control-logo_font_weight').css('display','none');
			$('#customize-control-logo_text_transform').css('display','none');
			$('#customize-control-logo_italic').css('display','none');
			$('#customize-control-logo_font_size').css('display','none');
			$('#customize-control-logo_line_height').css('display','none');
			$('#customize-control-logo_letterspacing').css('display','none');
			$('#customize-control-logo_color').css('display','none');
			$('#customize-control-logo_background_color').css('display','none');
		}else{
			$("#customize-control-upload_logo").css('display','none');
			$("#customize-control-upload_logo2x").css('display','none');

			$('#customize-control-logo_font_family').css('display','block');
			$('#customize-control-logo_font_weight').css('display','inline-block');
			$('#customize-control-logo_text_transform').css('display','inline-block');
			$('#customize-control-logo_italic').css('display','inline-block');
			$('#customize-control-logo_font_size').css('display','block');
			$('#customize-control-logo_line_height').css('display','block');
			$('#customize-control-logo_letterspacing').css('display','block');
			$('#customize-control-logo_color').css('display','block');
			$('#customize-control-logo_background_color').css('display','block');
		}
	}

	var show_tagline = function(selector){
		var val = $(selector).prop('checked');
		if (val) {
			$('#customize-control-tagline_margin_top').css('display','block');
			$('#customize-control-tagline_font_family').css('display','block');
			$('#customize-control-tagline_font_weight').css('display','inline-block');
			$('#customize-control-tagline_text_transform').css('display','inline-block');
			$('#customize-control-tagline_italic').css('display','inline-block');
			$('#customize-control-tagline_font_size').css('display','block');
			$('#customize-control-tagline_line_height').css('display','block');
			$('#customize-control-tagline_color').css('display','block');
			$('#customize-control-tagline_letterspacing').css('display','block');
		}else{
			$('#customize-control-tagline_margin_top').css('display','none');
			$('#customize-control-tagline_font_family').css('display','none');
			$('#customize-control-tagline_font_weight').css('display','none');
			$('#customize-control-tagline_text_transform').css('display','none');
			$('#customize-control-tagline_italic').css('display','none');
			$('#customize-control-tagline_font_size').css('display','none');
			$('#customize-control-tagline_line_height').css('display','none');
			$('#customize-control-tagline_color').css('display','none');
			$('#customize-control-tagline_letterspacing').css('display','none');
		}
	}

	var show_welcome = function(selector){
		var val = $(selector).prop('checked');
		if (val) {
			$('#customize-control-welcome_text').css('display','block');
			$('#customize-control-welcome_margin_top').css('display','block');
			$('#customize-control-welcome_margin_bottom').css('display','block');
			$('#customize-control-welcome_font_family').css('display','block');
			$('#customize-control-welcome_font_weight').css('display','inline-block');
			$('#customize-control-welcome_text_transform').css('display','inline-block');
			$('#customize-control-welcome_italic').css('display','inline-block');
			$('#customize-control-welcome_font_size').css('display','block');
			$('#customize-control-welcome_line_height').css('display','block');
			$('#customize-control-welcome_color').css('display','block');
			$('#customize-control-welcome_letterspacing').css('display','block');
		}else{
			$('#customize-control-welcome_text').css('display','none');
			$('#customize-control-welcome_margin_top').css('display','none');
			$('#customize-control-welcome_margin_bottom').css('display','none');
			$('#customize-control-welcome_font_family').css('display','none');
			$('#customize-control-welcome_font_weight').css('display','none');
			$('#customize-control-welcome_text_transform').css('display','none');
			$('#customize-control-welcome_italic').css('display','none');
			$('#customize-control-welcome_font_size').css('display','none');
			$('#customize-control-welcome_line_height').css('display','none');
			$('#customize-control-welcome_color').css('display','none');
			$('#customize-control-welcome_letterspacing').css('display','none');
		}
	}

	var show_filters = function(selector){
		var val = $(selector).prop('checked');
		if (val) {
			$('#customize-control-always_filters').css('display','block');
			$('#customize-control-filters_background').css('display','block');
			$('#customize-control-filters_font_family').css('display','block');
			$('#customize-control-filters_font_weight').css('display','inline-block');
			$('#customize-control-filters_text_transform').css('display','inline-block');
			$('#customize-control-filters_italic').css('display','inline-block');
			$('#customize-control-filters_font_size').css('display','block');
			$('#customize-control-filters_line_height').css('display','block');
			$('#customize-control-filters_color').css('display','block');
			$('#customize-control-filters_letterspacing').css('display','block');
		}else{
			$('#customize-control-always_filters').css('display','none');
			$('#customize-control-filters_background').css('display','none');
			$('#customize-control-filters_font_family').css('display','none');
			$('#customize-control-filters_font_weight').css('display','none');
			$('#customize-control-filters_text_transform').css('display','none');
			$('#customize-control-filters_italic').css('display','none');
			$('#customize-control-filters_font_size').css('display','none');
			$('#customize-control-filters_line_height').css('display','none');
			$('#customize-control-filters_color').css('display','none');
			$('#customize-control-filters_letterspacing').css('display','none');
		}
	}

	$(window).load(function() {

		select_logo_type("#customize-control-select_logo_type select");
		show_tagline("#customize-control-show_tagline input");
		show_welcome("#customize-control-show_welcome input");
		show_filters("#customize-control-add_filters input");

		$( "#customize-control-select_logo_type select" ).change(function() {
			select_logo_type(this);
		});

		$("#customize-control-show_tagline input").change(function(){
			show_tagline(this);
		});

		$("#customize-control-show_welcome input").change(function(){
			show_welcome(this);
		});

		$("#customize-control-add_filters input").change(function(){
			show_filters(this);
		});

	});	
});

	


