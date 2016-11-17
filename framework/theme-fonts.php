<?php
/*-----------------------------------------------------------------------------------*/
/*
/*  Generate Font Name (current not needed)
/*
/*-----------------------------------------------------------------------------------*/

// Generate Name
function font_family($font) {

	$family = str_replace(" ", "+", $font);
	return $family;
}

/*-----------------------------------------------------------------------------------*/
/*
/*  Enqueue Standard & Create Array Of Custom
/*
/*-----------------------------------------------------------------------------------*/

// Enqueue Normal Fonts
function milk_enqueue_fonts() {

	// Create array of system fonts
	$default = array(
				'default',
				'Default',
				'arial',
				'Arial',
				'verdana',
				'Verdana',
				'trebuchet',
				'Trebuchet',
				'georgia',
				'Georgia',
				'times',
				'Times',
				'tahoma',
				'Tahoma',
				'helvetica',
				'Helvetica'
				);

	$fonts = array();

	$logo = get_theme_mod('logo_font_family');
	if($logo!='') { $fonts[] = $logo; }

	$tagline_font_family = get_theme_mod( 'tagline_font_family' );
	if($tagline_font_family!='') { $fonts[] = $tagline_font_family; }

	$welcome_font_family = get_theme_mod( 'welcome_font_family' );
	if($welcome_font_family!='') { $fonts[] = $welcome_font_family; }

	$filters_font_family = get_theme_mod( 'filters_font_family' );
	if($filters_font_family!='') { $fonts[] = $filters_font_family; }

	$button_font_family = get_theme_mod( 'button_font_family' );
	if($button_font_family!='') { $fonts[] = $button_font_family; }

	$menu_font_family = get_theme_mod( 'menu_font_family' );
	if($menu_font_family!='') { $fonts[] = $menu_font_family; }

	$p_font_family = get_theme_mod( 'p_font_family' );
	if($p_font_family!='') { $fonts[] = $p_font_family; }

	$sidebar_font_family = get_theme_mod( 'sidebar_font_family' );
	if($sidebar_font_family!='') { $fonts[] = $sidebar_font_family; }

	$h1_font_family = get_theme_mod( 'h1_font_family' );
	if($h1_font_family!='') { $fonts[] = $h1_font_family; }
	$h2_font_family = get_theme_mod( 'h2_font_family' );
	if($h2_font_family!='') { $fonts[] = $h2_font_family; }
	$h3_font_family = get_theme_mod( 'h3_font_family' );
	if($h3_font_family!='') { $fonts[] = $h3_font_family; }
	$h4_font_family = get_theme_mod( 'h4_font_family' );
	if($h4_font_family!='') { $fonts[] = $h4_font_family; }
	$h5_font_family = get_theme_mod( 'h5_font_family' );
	if($h5_font_family!='') { $fonts[] = $h5_font_family; }
	$h6_font_family = get_theme_mod( 'h6_font_family' );
	if($h6_font_family!='') { $fonts[] = $h6_font_family; }

	
	$fonts = array_unique($fonts);

	foreach($fonts as $font) {
		if(!in_array($font, $default)) {
			milk_enqueue_google_fonts($font);

		}
	}

}
add_action( 'wp_enqueue_scripts', 'milk_enqueue_fonts' );


/*-----------------------------------------------------------------------------------*/
/*
/*  Enqueue Custom Google Fonts
/*
/*-----------------------------------------------------------------------------------*/

function milk_enqueue_google_fonts($font) {

	$font = explode(',', $font);
	$font = $font[0];

	if ( $font == 'Open Sans' ){
		$font = 'Open Sans:400,600';
	} else {
		$font = $font . ':400,700';
	}

	$font = str_replace(" ", "+", $font);

	wp_enqueue_style( "google_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );

} ?>