<?php 
	function milk_customize_register( $wp_customize ){

		$textdomain = "milk";

		// require custom control classes
        require_once ( DIRECTORY . '/framework/custom-controls.php');
        require_once ( DIRECTORY . '/framework/create-lists.php');




		/*-----------------------------------------------------------------------------------*/
        /*
        /*  Global Select & Slider Arrays
        /*
        /*-----------------------------------------------------------------------------------*/

        // landing opacity
        $range_opacity = array(
            'min' => '0.0',
            'max' => '1.0',
            'step' => '0.1',
        );

        // Radius
        $range_radius = array(
            'min' => '0',
            'max' => '100',
            'step' => '1',
        );

        // padding & margins
        $range_padding = array(
            'min' => '0',
            'max' => '100',
            'step' => '5',
        );

        // fonts
        //$fonts = milk_list_fonts();

        // font size
        $range_font_size = array(
            'min' => '10',
            'max' => '80',
            'step' => '1',
        );

        // font line height
        $range_font_line = array(
            'min' => '0',
            'max' => '3',
            'step' => '.1',
        );

        // font letter spacing
        $range_font_spacing = array(
            'min' => '-10',
            'max' => '10',
            'step' => '1',
        );

        // remove unnecessary core sections & controls
        $wp_customize->remove_section( 'title_tagline');
        $wp_customize->remove_section( 'colors');
        $wp_customize->remove_section( 'background_image');
        $wp_customize->remove_section( 'static_front_page');

        $wp_customize->add_panel( 'header', array(
			'priority' => 1,
			'capability' => 'edit_theme_options',
			'title' => __( 'Header Settings', 'pryaniktheme' ),
			'description' => __( 'Select logo for your site. You can also change logo, tagline, welcome message, filters and menu settings.', $textdomain ),
		) );
		$wp_customize->add_panel( 'layout', array(
			'priority' => 8,
			'capability' => 'edit_theme_options',
			'title' => __( 'Layout Settings', 'pryaniktheme' ),
			'description' => __( 'Select blog type, layout and sidebar.', $textdomain ),
		) );

		//Add Sections

		$wp_customize->add_section( 'logo' , array('title'=> __( 'Logo', $textdomain ),'priority'   => 1, 'panel' => 'header') );
		$wp_customize->add_section( 'tagline' , array('title'=> __( 'Tagline', $textdomain ),'priority'   => 2, 'panel' => 'header') );
		$wp_customize->add_section( 'menu' , array('title'=> __( 'Menu', $textdomain ),'priority'   => 3, 'panel' => 'header') );
		$wp_customize->add_section( 'welcome_msg' , array('title'=> __( 'Welcome Message', $textdomain ),'priority'   => 4, 'panel' => 'header') );
		$wp_customize->add_section( 'filters' , array('title'=> __( 'Filters', $textdomain ),'priority'   => 5, 'panel' => 'header') );
		$wp_customize->add_section( 'colors' , array('title'=> __( 'Colors', $textdomain ),'priority'   => 2) );
		$wp_customize->add_section( 'works' , array('title'=> __( 'Works', $textdomain ),'priority'   => 3) );
		$wp_customize->add_section( 'background' , array('title'=> __( 'Background', $textdomain ),'priority'   => 4) );
		$wp_customize->add_section( 'buttons' , array('title'=> __( 'Buttons', $textdomain ),'priority'   => 5) );
		$wp_customize->add_section( 'typography' , array('title'=> __( 'Typography', $textdomain ),'priority'   => 6) );
		$wp_customize->add_section( 'content' , array('title'=> __( 'Content', $textdomain ),'priority'   => 7) );

		$wp_customize->add_section( 'workpage_layout' , array('title'=> __( 'Work Page Layout', $textdomain ),'priority'   => 1, 'panel' => 'layout') );
		$wp_customize->add_section( 'blog_layout' , array('title'=> __( 'Blog Layout', $textdomain ),'priority'   => 2, 'panel' => 'layout') );
		$wp_customize->add_section( 'archive_layout' , array('title'=> __( 'Archive and Search Layout', $textdomain ),'priority'   => 3, 'panel' => 'layout') );
		$wp_customize->add_section( 'singlepage_layout' , array('title'=> __( 'Single Post Layout', $textdomain ),'priority'   => 4, 'panel' => 'layout') );
		$wp_customize->add_section( 'singlework_layout' , array('title'=> __( 'Single Work Layout', $textdomain ),'priority'   => 5, 'panel' => 'layout') );

		$wp_customize->add_section( 'footer' , array('title'=> __( 'Footer', $textdomain ),'priority'   => 9) );

        // move remaining controls that are still needed
        $wp_customize->get_control( 'blogname' )->section='logo';
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_control( 'blogname' )->priority=1;
        $wp_customize->get_control( 'blogdescription' )->section='tagline';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
        $wp_customize->get_control( 'blogdescription' )->priority=1;

        //Logo Section
        $wp_customize->add_setting( 'select_logo_type' , array('default'     => 'image','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'upload_logo' , array('transport'   => 'postMessage','sanitize_callback' => 'esc_url_raw') );
        $wp_customize->add_setting( 'upload_logo2x' , array('transport'   => 'postMessage','sanitize_callback' => 'esc_url_raw') );
        $wp_customize->add_setting( 'logo_position' , array('default'     => 'center','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_margin_top' , array('default'     => 40,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_margin_bottom' , array('default'     => 20,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
	    
	    $wp_customize->add_setting( 'logo_font_family' , array('default'     => 'arial','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_font_weight' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_text_transform' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_font_size' , array('default'     => 30,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_line_height' , array('default'     => 1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'logo_letterspacing' , array('default'     => -1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html'));
        $wp_customize->add_setting( 'logo_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
        $wp_customize->add_setting( 'logo_background_color' , array('default'     => '#ffffff','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

	    $wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'select_logo_type',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Logo type', $textdomain ),
		            'section'        => 'logo',
		            'settings'       => 'select_logo_type',
		            'type'           => 'select',
		            'choices'        => array(
		                'image'   => __( 'Image', $textdomain ),
		                'text'  => __( 'Text', $textdomain )
		            )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'logo_position',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Logo position', $textdomain ),
		            'section'        => 'logo',
		            'settings'       => 'logo_position',
		            'type'           => 'select',
		            'choices'        => array(
		                'left'   => __( 'Left', $textdomain ),
		                'center'  => __( 'Center', $textdomain )
		            )
		        )
		    )
		);

		$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'logo_margin_top',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Margin top', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_margin_top',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_padding

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'logo_margin_bottom',
	           array(
	           	   'priority' => 4,
	               'label'      => __( 'Margin bottom', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_margin_bottom',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_padding

	           )
	       )
	   	);

		$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'upload_logo',
	           array(
	           	   'priority' => 6,
	               'label'      => __( 'Upload a logo', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'upload_logo'
	           )
	       )
	   	);

		$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'upload_logo2x',
	           array(
	           	   'priority' => 7,
	               'label'      => __( 'Upload a logo @2x', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'upload_logo2x'
	           )
	       )
	   	);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'logo_font_family',
		        array(
		        	'priority' => 8,
		            'label'          => __( 'Font family', $textdomain ),
		            'section'        => 'logo',
		            'settings'       => 'logo_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'logo_font_weight',
	           array(
	           	   'priority' => 9,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'logo_text_transform',
	           array(
	           	   'priority' => 10,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'logo_italic',
	           array(
	           	   'priority' => 11,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'logo_font_size',
	           array(
	           	   'priority' => 12,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'logo_line_height',
	           array(
	           	   'priority' => 13,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'logo_letterspacing',
	           array(
	           	   'priority' => 14,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'logo',
	               'settings'   => 'logo_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'logo_color', 
			array(
				'priority' => 15,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'logo',
				'settings'   => 'logo_color',
			) ) 
		);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'logo_background_color', 
			array(
				'priority' => 16,
				'label'      => __( 'Background color', $textdomain ),
				'section'    => 'logo',
				'settings'   => 'logo_background_color',
			) ) 
		);

		//Tagline

		$wp_customize->add_setting( 'show_tagline' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_margin_top' , array('default'     => 10,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
	    
	    $wp_customize->add_setting( 'tagline_font_family' , array('default'     => 'Open Sans','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_text_transform' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_font_size' , array('default'     => 16,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_line_height' , array('default'     => 0.6,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_letterspacing' , array('default'     => -1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'tagline_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'show_tagline',
	           array(
	           	   'priority' => 2,
	               'label'      => __( 'Show tagline under the logo', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'show_tagline',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'tagline_margin_top',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Distance from logo', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'tagline_margin_top',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_padding

	           )
	       )
	   	);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'tagline_font_family',
		        array(
		        	'priority' => 4,
		            'label'          => __( 'Font family', $textdomain ),
		            'section'        => 'tagline',
		            'settings'       => 'tagline_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'tagline_font_weight',
	           array(
	           	   'priority' => 5,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'tagline_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'tagline_text_transform',
	           array(
	           	   'priority' => 6,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'tagline_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'tagline_italic',
	           array(
	           	   'priority' => 7,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'tagline_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'tagline_font_size',
	           array(
	           	   'priority' => 8,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'tagline_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'tagline_line_height',
	           array(
	           	   'priority' => 9,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'tagline_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'tagline_letterspacing',
	           array(
	           	   'priority' => 10,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'tagline',
	               'settings'   => 'tagline_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'tagline_color', 
			array(
				'priority' => 11,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'tagline',
				'settings'   => 'tagline_color',
			) ) 
		);

		//Welcome Message
	   	$wp_customize->add_setting( 'show_welcome' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'welcome_text' , array('default'     => 'Welcome to Milk! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eos aspernatur ratione error nihil accusamus, dolorum architecto consequatur, eveniet in corporis quidem esse eum corrupti explicabo natus, possimus iure qui! ',  'transport'   => 'postMessage','sanitize_callback' => 'esc_textarea') );
        $wp_customize->add_setting( 'welcome_margin_top' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_margin_bottom' , array('default'     => 10,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
	    
	    $wp_customize->add_setting( 'welcome_font_family' , array('default'     => 'Open Sans','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_text_transform' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_font_size' , array('default'     => 14,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_line_height' , array('default'     => 1.5,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'welcome_color' , array('default'     => '#666','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );


		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'show_welcome',
	           array(
	           	   'priority' => 1,
	               'label'      => __( 'Show welcome message', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'show_welcome',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

		$wp_customize->add_control(
	       new Milk_Customize_Textarea_Control(
	           $wp_customize,
	           'welcome_text',
	           array(
	           	   'priority' => 2,
	               'label'      => __( 'Type welcome message', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_text'
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'welcome_margin_top',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Distance from menu', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_margin_top',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_padding

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'welcome_margin_bottom',
	           array(
	           	   'priority' => 4,
	               'label'      => __( 'Distance to content', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_margin_bottom',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_padding

	           )
	       )
	   	);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'welcome_font_family',
		        array(
		        	'priority' => 5,
		            'label'          => __( 'Font family', $textdomain ),
		            'section'        => 'welcome_msg',
		            'settings'       => 'welcome_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'welcome_font_weight',
	           array(
	           	   'priority' => 6,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'welcome_text_transform',
	           array(
	           	   'priority' => 7,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'welcome_italic',
	           array(
	           	   'priority' => 8,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'welcome_font_size',
	           array(
	           	   'priority' => 9,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'welcome_line_height',
	           array(
	           	   'priority' => 10,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'welcome_letterspacing',
	           array(
	           	   'priority' => 11,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'welcome_msg',
	               'settings'   => 'welcome_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'welcome_color', 
			array(
				'priority' => 12,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'welcome_msg',
				'settings'   => 'welcome_color',
			) ) 
		);

	   	//Menu

		//$wp_customize->add_setting( 'select_menu' , array('default'     => '','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	
        $wp_customize->add_setting( 'menu_margin_top' , array('default'     => 15,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'menu_margin_bottom' , array('default'     => 20,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
	    
	    $wp_customize->add_setting( 'menu_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'menu_font_weight' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'menu_text_transform' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'menu_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'menu_font_size' , array('default'     => 14,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'menu_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'menu_color' , array('default'     => '#444','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
        $wp_customize->add_setting( 'menu_hover' , array('default'     => '#eee','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
        $wp_customize->add_setting( 'menu_hover_text' , array('default'     => '#222','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        /*$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );

        foreach ( $menus as $menu ) {
			$menu_list[$menu->term_id] = $menu->name;
		}
		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'select_menu',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Select Menu', $textdomain ),
		            'section'        => 'menu',
		            'settings'       => 'select_menu',
		            'type'           => 'select',
		            'choices'        => $menu_list
		        )
		    )
		);*/

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'menu_margin_top',
	           array(
	           	   'priority' => 2,
	               'label'      => __( 'Distance from logo', $textdomain ),
	               'section'    => 'menu',
	               'settings'   => 'menu_margin_top',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_padding

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'menu_margin_bottom',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Distance to content', $textdomain ),
	               'section'    => 'menu',
	               'settings'   => 'menu_margin_bottom',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_padding

	           )
	       )
	   	);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'menu_font_family',
		        array(
		        	'priority' => 4,
		            'label'          => __( 'Font family', $textdomain ),
		            'section'        => 'menu',
		            'settings'       => 'menu_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'menu_font_weight',
	           array(
	           	   'priority' => 5,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'menu',
	               'settings'   => 'menu_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'menu_text_transform',
	           array(
	           	   'priority' => 6,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'menu',
	               'settings'   => 'menu_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'menu_italic',
	           array(
	           	   'priority' => 7,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'menu',
	               'settings'   => 'menu_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'menu_font_size',
	           array(
	           	   'priority' => 8,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'menu',
	               'settings'   => 'menu_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'menu_letterspacing',
	           array(
	           	   'priority' => 9,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'menu',
	               'settings'   => 'menu_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'menu_color', 
			array(
				'priority' => 10,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'menu',
				'settings'   => 'menu_color',
			) ) 
		);

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'menu_hover', 
			array(
				'priority' => 11,
				'label'      => __( 'Hover color', $textdomain ),
				'section'    => 'menu',
				'settings'   => 'menu_hover',
			) ) 
		);

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'menu_hover_text', 
			array(
				'priority' => 12,
				'label'      => __( 'Hover text color', $textdomain ),
				'section'    => 'menu',
				'settings'   => 'menu_hover_text',
			) ) 
		);

		//Filter Section

		$wp_customize->add_setting( 'add_filters' , array('default'     => 'false','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'always_filters' , array('default'     => 'false','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
		//$wp_customize->add_setting( 'filters_type' , array('default'     => 'tags','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'filters_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'filters_font_weight' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'filters_text_transform' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'filters_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'filters_font_size' , array('default'     => 11,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'filters_line_height' , array('default'     => 1.1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'filters_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'filters_color' , array('default'     => '#fff','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'add_filters',
	           array(
	           	   'priority' => 1,
	               'label'      => __( 'Add filters for works', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'add_filters',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'always_filters',
	           array(
	           	   'priority' => 2,
	               'label'      => __( 'Always show filters on works page', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'always_filters',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

		/*$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'filters_type',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Filter by:', $textdomain ),
		            'section'        => 'filters',
		            'settings'       => 'filters_type',
		            'type'           => 'select',
		            'choices'        => array('tags' => __("Tags", $textdomain),
		            							'cat' => __("Categories", $textdomain ))
		        )
		    )
		);*/

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'filters_font_family',
		        array(
		        	'priority' => 4,
		            'label'          => __( 'Font family', $textdomain ),
		            'section'        => 'filters',
		            'settings'       => 'filters_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'filters_font_weight',
	           array(
	           	   'priority' => 5,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'filters_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'filters_text_transform',
	           array(
	           	   'priority' => 6,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'filters_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'filters_italic',
	           array(
	           	   'priority' => 7,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'filters_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'filters_font_size',
	           array(
	           	   'priority' => 8,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'filters_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'filters_line_height',
	           array(
	           	   'priority' => 9,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'filters_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'filters_letterspacing',
	           array(
	           	   'priority' => 10,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'filters',
	               'settings'   => 'filters_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'filters_color', 
			array(
				'priority' => 11,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'filters',
				'settings'   => 'filters_color',
			) ) 
		);



	   	//Colors Section
        $wp_customize->add_setting( 'header_color' , array('default'     => '#fff','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
        $wp_customize->add_setting( 'accent_color' , array('default'     => '#49b4ff','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
        $wp_customize->add_setting( 'accent_color_text' , array('default'     => '#fff','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
        


        $wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'header_color', 
			array(
				'priority' => 1,
				'label'      => __( 'Header Background Color', $textdomain ),
				'section'    => 'colors',
				'settings'   => 'header_color',
			) ) 
		);

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'accent_color', 
			array(
				'priority' => 2,
				'label'      => __( 'Accent theme color', $textdomain ),
				'section'    => 'colors',
				'settings'   => 'accent_color',
			) ) 
		);

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'accent_color_text', 
			array(
				'priority' => 3,
				'label'      => __( 'Accent theme fonts color', $textdomain ),
				'section'    => 'colors',
				'settings'   => 'accent_color_text',
			) ) 
		);

		
		//Works

		$wp_customize->add_setting( 'works_animation' , array('default'     => 'type2','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'work_button_color' , array('default'     => '#49b4ff','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
		$wp_customize->add_setting( 'work_button_text_color' , array('default'     => '#fff','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );
		$wp_customize->add_setting( 'work_button_text' , array('default'     => 'View','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'works_animation',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Works Hover Animation', $textdomain ),
		            'section'        => 'works',
		            'settings'       => 'works_animation',
		            'type'           => 'select',
		            'choices'        => array('type1' => __("Animation 1", $textdomain ),
		            							'type2' => __("Animation 2", $textdomain ),
		            							'type3' => __("Animation 3", $textdomain ))
		        )
		    )
		);

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'work_button_color', 
			array(
				'priority' => 2,
				'label'      => __( 'Portfolio work button color', $textdomain ),
				'section'    => 'works',
				'settings'   => 'work_button_color',
			) ) 
		);

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'work_button_text_color', 
			array(
				'priority' => 3,
				'label'      => __( 'Portfolio work button text color', $textdomain ),
				'section'    => 'works',
				'settings'   => 'work_button_text_color',
			) ) 
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'work_button_text',
	           array(
	           	   'priority' => 4,
	               'label'      => __( 'Portfolio work button text', $textdomain ),
	               'section'    => 'works',
	               'settings'   => 'work_button_text'
	           )
	       )
	   	);

		//Background

		$wp_customize->add_setting( 'background_color' , array('default'     => '#eee','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'background_stretch' , array('default'     => 'true','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'background_image' , array('transport'   => 'postMessage','sanitize_callback' => 'esc_url_raw') );
		$wp_customize->add_setting( 'background_repeat' , array('default'     => 'repeat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'background_position' , array('default'     => 'center','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'background_attachment' , array('default'     => 'fixed','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'priority' => 1,
				'label'      => __( 'Background color', $textdomain ),
				'section'    => 'background',
				'settings'   => 'background_color',
			) ) 
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'background_stretch',
	           array(
	           	   'priority' => 2,
	               'label'      => __( 'Background Image Stretch', $textdomain ),
	               'section'    => 'background',
	               'settings'   => 'background_stretch',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'background_image',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Upload background image', $textdomain ),
	               'section'    => 'background',
	               'settings'   => 'background_image'
	           )
	       )
	   	);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'background_repeat1',
		        array(
		        	'priority' => 4,
		            'label'          => __( 'Background Repeat', $textdomain ),
		            'section'        => 'background',
		            'settings'       => 'background_repeat',
		            'type'           => 'radio',
		            'choices'        => array('no-repeat' => __("No Repeat", $textdomain ),
		            							'repeat' => __("Tile", $textdomain ),
		            							'repeat-x' => __("Tile Horizontally", $textdomain ),
		            							'repeat-y' => __("Tile Vertically", $textdomain ))
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'background_position',
		        array(
		        	'priority' => 5,
		            'label'          => __( 'Background Position', $textdomain ),
		            'section'        => 'background',
		            'settings'       => 'background_position',
		            'type'           => 'radio',
		            'choices'        => array('left' => __("Left", $textdomain ),
		            							'center' => __("Center", $textdomain ),
		            							'right' => __("Right", $textdomain ))
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'background_attachment1',
		        array(
		        	'priority' => 6,
		            'label'          => __( 'Background Attachment', $textdomain ),
		            'section'        => 'background',
		            'settings'       => 'background_attachment',
		            'type'           => 'radio',
		            'choices'        => array('fixed' => __("Fixed", $textdomain ),
		            							'scroll' => __("Scroll", $textdomain ))
		        )
		    )
		);

		//Buttons

	    $wp_customize->add_setting( 'button_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'button_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'button_text_transform' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'button_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'button_font_size' , array('default'     => 11,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'button_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'button_radius' , array('default'     =>  3,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'button_font_family',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Font family', $textdomain ),
		            'section'        => 'buttons',
		            'settings'       => 'button_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'button_font_weight',
	           array(
	           	   'priority' => 2,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'buttons',
	               'settings'   => 'button_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'button_text_transform',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'buttons',
	               'settings'   => 'button_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'button_italic',
	           array(
	           	   'priority' => 4,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'buttons',
	               'settings'   => 'button_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'button_font_size',
	           array(
	           	   'priority' => 5,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'buttons',
	               'settings'   => 'button_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'button_letterspacing',
	           array(
	           	   'priority' => 6,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'buttons',
	               'settings'   => 'button_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			 new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'button_radius',
	           array(
	           	   'priority' => 7,
	               'label'      => __( 'Rounded Corners ', $textdomain ),
	               'section'    => 'buttons',
	               'settings'   => 'button_radius',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_radius
	           )
	       )
		);

	   	//Typography
	   	$wp_customize->add_setting( 'p_font_family' , array('default'     => 'Open Sans','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'p_font_size' , array('default'     => 13,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );

	   	$wp_customize->add_setting( 'sidebar_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'sidebar_font_weight' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'sidebar_text_transform' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'sidebar_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'sidebar_font_size' , array('default'     => 12,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'sidebar_line_height' , array('default'     => 1.1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'sidebar_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'sidebar_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

	   	$wp_customize->add_setting( 'h1_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h1_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h1_text_transform' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h1_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h1_font_size' , array('default'     => 36,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h1_line_height' , array('default'     => 1.1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h1_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h1_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_setting( 'h2_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h2_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h2_text_transform' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h2_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h2_font_size' , array('default'     => 30,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h2_line_height' , array('default'     => 1.1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h2_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h2_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_setting( 'h3_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h3_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h3_text_transform' , array('default'     => true,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h3_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h3_font_size' , array('default'     => 24,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h3_line_height' , array('default'     => 1.1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h3_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h3_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_setting( 'h4_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h4_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h4_text_transform' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h4_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h4_font_size' , array('default'     => 18,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h4_line_height' , array('default'     => 1.1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h4_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h4_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_setting( 'h5_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h5_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h5_text_transform' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h5_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h5_font_size' , array('default'     => 14,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h5_line_height' , array('default'     => 1.5,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h5_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h5_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_setting( 'h6_font_family' , array('default'     => 'Montserrat','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h6_font_weight' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h6_text_transform' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h6_italic' , array('default'     => false,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h6_font_size' , array('default'     => 12,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h6_line_height' , array('default'     => 1.1,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h6_letterspacing' , array('default'     => 0,'transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
        $wp_customize->add_setting( 'h6_color' , array('default'     => '#333','transport'   => 'postMessage','sanitize_callback' => 'sanitize_hex_color') );

        $wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'p_font_family',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Paragraph Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'p_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'p_font_size',
	           array(
	           	   'priority' => 2,
	               'label'      => __( 'Paragraph Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'p_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'sidebar_font_family',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Sidebar Headings Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'sidebar_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'sidebar_font_weight',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'sidebar_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'sidebar_text_transform',
	           array(
	           	   'priority' => 4,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'sidebar_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'sidebar_italic',
	           array(
	           	   'priority' => 5,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'sidebar_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'sidebar_font_size',
	           array(
	           	   'priority' => 6,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'sidebar_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'sidebar_line_height',
	           array(
	           	   'priority' => 7,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'sidebar_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'sidebar_letterspacing',
	           array(
	           	   'priority' => 8,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'sidebar_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'sidebar_color', 
			array(
				'priority' => 9,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'typography',
				'settings'   => 'sidebar_color',
			) ) 
		);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'h1_font_family',
		        array(
		        	'priority' => 10,
		            'label'          => __( 'H1 Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'h1_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h1_font_weight',
	           array(
	           	   'priority' => 11,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h1_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h1_text_transform',
	           array(
	           	   'priority' => 12,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h1_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h1_italic',
	           array(
	           	   'priority' => 13,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h1_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h1_font_size',
	           array(
	           	   'priority' => 14,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h1_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h1_line_height',
	           array(
	           	   'priority' => 15,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h1_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h1_letterspacing',
	           array(
	           	   'priority' => 16,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h1_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);

	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'h1_color', 
			array(
				'priority' => 17,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'typography',
				'settings'   => 'h1_color',
			) ) 
		);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'h2_font_family',
		        array(
		        	'priority' => 18,
		            'label'          => __( 'H2 Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'h2_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h2_font_weight',
	           array(
	           	   'priority' => 19,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h2_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h2_text_transform',
	           array(
	           	   'priority' => 20,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h2_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h2_italic',
	           array(
	           	   'priority' => 21,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h2_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h2_font_size',
	           array(
	           	   'priority' => 22,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h2_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h2_line_height',
	           array(
	           	   'priority' => 23,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h2_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h2_letterspacing',
	           array(
	           	   'priority' => 24,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h2_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);
	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'h2_color', 
			array(
				'priority' => 25,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'typography',
				'settings'   => 'h2_color',
			) ) 
		);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'h3_font_family',
		        array(
		        	'priority' => 26,
		            'label'          => __( 'H3 Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'h3_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h3_font_weight',
	           array(
	           	   'priority' => 27,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h3_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h3_text_transform',
	           array(
	           	   'priority' => 28,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h3_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h3_italic',
	           array(
	           	   'priority' => 29,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h3_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h3_font_size',
	           array(
	           	   'priority' => 30,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h3_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h3_line_height',
	           array(
	           	   'priority' => 31,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h3_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h3_letterspacing',
	           array(
	           	   'priority' => 32,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h3_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);
	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'h3_color', 
			array(
				'priority' => 33,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'typography',
				'settings'   => 'h3_color',
			) ) 
		);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'h4_font_family',
		        array(
		        	'priority' => 34,
		            'label'          => __( 'H4 Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'h4_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h4_font_weight',
	           array(
	           	   'priority' => 35,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h4_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h4_text_transform',
	           array(
	           	   'priority' => 36,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h4_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h4_italic',
	           array(
	           	   'priority' => 37,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h4_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h4_font_size',
	           array(
	           	   'priority' => 38,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h4_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h4_line_height',
	           array(
	           	   'priority' => 39,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h4_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h4_letterspacing',
	           array(
	           	   'priority' => 40,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h4_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);
	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'h4_color', 
			array(
				'priority' => 41,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'typography',
				'settings'   => 'h4_color',
			) ) 
		);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'h5_font_family',
		        array(
		        	'priority' => 42,
		            'label'          => __( 'H5 Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'h5_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h5_font_weight',
	           array(
	           	   'priority' => 43,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h5_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h5_text_transform',
	           array(
	           	   'priority' => 44,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h5_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h5_italic',
	           array(
	           	   'priority' => 45,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h5_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h5_font_size',
	           array(
	           	   'priority' => 46,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h5_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h5_line_height',
	           array(
	           	   'priority' => 47,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h5_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h5_letterspacing',
	           array(
	           	   'priority' => 48,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h5_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);
	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'h5_color', 
			array(
				'priority' => 49,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'typography',
				'settings'   => 'h5_color',
			) ) 
		);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'h6_font_family',
		        array(
		        	'priority' => 50,
		            'label'          => __( 'H6 Font family', $textdomain ),
		            'section'        => 'typography',
		            'settings'       => 'h6_font_family',
		            'type'           => 'select',
		            'choices'        => milk_list_fonts()
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h6_font_weight',
	           array(
	           	   'priority' => 51,
	               'label'      => __( 'Bold', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h6_font_weight',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h6_text_transform',
	           array(
	           	   'priority' => 52,
	               'label'      => __( 'Uppercase', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h6_text_transform',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'h6_italic',
	           array(
	           	   'priority' => 53,
	               'label'      => __( 'Italic', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h6_italic',
	               'type'    => 'checkbox' 
	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h6_font_size',
	           array(
	           	   'priority' => 54,
	               'label'      => __( 'Font size', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h6_font_size',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_size

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h6_line_height',
	           array(
	           	   'priority' => 55,
	               'label'      => __( 'Line height', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h6_line_height',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_line

	           )
	       )
	   	);

	   	$wp_customize->add_control(
	       new Milk_Customize_Slider_Control(
	           $wp_customize,
	           'h6_letterspacing',
	           array(
	           	   'priority' => 56,
	               'label'      => __( 'Letterspacing', $textdomain ),
	               'section'    => 'typography',
	               'settings'   => 'h6_letterspacing',
	               'type'    	=> 'slider',
	               'choices'    =>  $range_font_spacing

	           )
	       )
	   	);
	   	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'h6_color', 
			array(
				'priority' => 57,
				'label'      => __( 'Font color', $textdomain ),
				'section'    => 'typography',
				'settings'   => 'h6_color',
			) ) 
		);


	   	//Content
	   	$wp_customize->add_setting( 'content_padding' , array('default'     => '30','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );

	   	$wp_customize->add_control( 
			new Milk_Customize_Slider_Control( 
			$wp_customize, 
			'content_padding', 
			array(
				'priority' => 1,
				'label'      => __( 'Content padding', $textdomain ),
				'section'    => 'content',
				'settings'   => 'content_padding',
				'type'    	=> 'slider',
	            'choices'    =>  $range_padding
			) ) 
		);

	   	//Layout

		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { 
		    $sidebar_options[$sidebar['id']] = $sidebar['name'];
		}

	   	$wp_customize->add_setting( 'num_of_works' , array('default'     => 8,'transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'home_col_num' , array('default'     => 4,'transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'blog_col_num' , array('default'     => 3,'transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'blog_sidebar' , array('default'     => 'blog_sidebar','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'blog_layout' , array('default'     => 'right','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'blog_pagination' , array('default'     => 'default','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'search_col_num' , array('default'     => 3,'transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'search_sidebar' , array('default'     => 'blog_sidebar','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'search_layout' , array('default'     => 'right','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'single_layout' , array('default'     => 'right','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'single_sidebar' , array('default'     => 'post_sidebar','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'single_work_layout' , array('default'     => '12','transport'   => 'refresh','sanitize_callback' => 'esc_html') );
	   	$wp_customize->add_setting( 'single_work_sidebar' , array('default'     => 'post_sidebar','transport'   => 'refresh','sanitize_callback' => 'esc_html') );

	   	$wp_customize->add_control(
	       new WP_Customize_Control(
	           $wp_customize,
	           'num_of_works',
	           array(
	           	   'priority' => 1,
	               'label'      => __( "Number of works to show(this option does't work in live preview, please save settings)", $textdomain ),
	               'section'    => 'workpage_layout',
	               'settings'   => 'num_of_works'
	           )
	       )
	   	);

	   	$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'home_col_num',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Number of colomns for home page', $textdomain ),
		            'section'        => 'workpage_layout',
		            'settings'       => 'home_col_num',
		            'type'           => 'select',
		            'choices'        => array(
		                2   => __( 'Two', $textdomain  ),
		                3  => __( 'Three', $textdomain  ),
		                4 => __('Four', $textdomain )
		            )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'blog_col_num',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Number of colomns for blog page', $textdomain ),
		            'section'        => 'blog_layout',
		            'settings'       => 'blog_col_num',
		            'type'           => 'select',
		            'choices'        => array(
		            	1   => __( 'One (List View)', $textdomain  ),
		                2   => __( 'Two', $textdomain  ),
		                3  => __( 'Three', $textdomain  ),
		                4 => __('Four', $textdomain )
		            )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'blog_sidebar',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Select sidebar for blog page', $textdomain ),
		            'section'        => 'blog_layout',
		            'settings'       => 'blog_sidebar',
		            'type'           => 'select',
		            'choices'        => $sidebar_options
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'blog_layout',
		        array(
		        	'priority' => 3,
		            'label'          => __( 'Layout for blog page', $textdomain ),
		            'section'        => 'blog_layout',
		            'settings'       => 'blog_layout',
		            'type'           => 'select',
		            'choices'        => array('left' => __('Left Sidebar', $textdomain ),
		            							'right' => __('Right Sidebar', $textdomain ),
		            							'12' => __('No Sidebar, 12 columns width', $textdomain ),
		            							'10' => __('No Sidebar, 10 columns width -5/6', $textdomain ),
		            							'8' => __('No Sidebar, 8 columns width - 2/3', $textdomain ),
		            							'6' => __('No Sidebar, 6 columns width - 1/2', $textdomain )
		             )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'blog_pagination',
		        array(
		        	'priority' => 4,
		            'label'          => __( 'Blog page Pagination Type', $textdomain ),
		            'section'        => 'blog_layout',
		            'settings'       => 'blog_pagination',
		            'type'           => 'select',
		            'choices'        => array('default' => __('Standart Pagination', $textdomain ),
		            							'load' => __('Load More Button', $textdomain )
		             )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'search_col_num',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Number of colomns for search, archive results pages', $textdomain ),
		            'section'        => 'archive_layout',
		            'settings'       => 'search_col_num',
		            'type'           => 'select',
		            'choices'        => array(
		            	1   => __( 'One (List View)', $textdomain  ),
		                2   => __( 'Two', $textdomain  ),
		                3  => __( 'Three', $textdomain  ),
		                4 => __('Four', $textdomain )
		            )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'search_sidebar',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Select sidebar for search, archive results pages', $textdomain ),
		            'section'        => 'archive_layout',
		            'settings'       => 'search_sidebar',
		            'type'           => 'select',
		            'choices'        => $sidebar_options
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'search_layout',
		        array(
		        	'priority' => 3,
		            'label'          => __( 'Layout for search, archive results pages', $textdomain ),
		            'section'        => 'archive_layout',
		            'settings'       => 'search_layout',
		            'type'           => 'select',
		            'choices'        => array('left' => __('Left Sidebar', $textdomain ),
		            							'right' => __('Right Sidebar', $textdomain ),
		            							'12' => __('No Sidebar, 12 columns width', $textdomain ),
		            							'10' => __('No Sidebar, 10 columns width -5/6', $textdomain ),
		            							'8' => __('No Sidebar, 8 columns width - 2/3', $textdomain ),
		            							'6' => __('No Sidebar, 6 columns width - 1/2', $textdomain ),
		             )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'single_sidebar',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Select sidebar for single post page', $textdomain ),
		            'section'        => 'singlepage_layout',
		            'settings'       => 'single_sidebar',
		            'type'           => 'select',
		            'choices'        => $sidebar_options
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'single_layout',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Layout for single post page', $textdomain ),
		            'section'        => 'singlepage_layout',
		            'settings'       => 'single_layout',
		            'type'           => 'select',
		            'choices'        => array('left' => __('Left Sidebar', $textdomain ),
		            							'right' => __('Right Sidebar', $textdomain ),
		            							'12' => __('No Sidebar, 12 columns width', $textdomain ),
		            							'10' => __('No Sidebar, 10 columns width -5/6', $textdomain ),
		            							'8' => __('No Sidebar, 8 columns width - 2/3', $textdomain ),
		            							'6' => __('No Sidebar, 6 columns width - 1/2', $textdomain ),
		             )
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'single_work_sidebar',
		        array(
		        	'priority' => 2,
		            'label'          => __( 'Select sidebar for single work page', $textdomain ),
		            'section'        => 'singlework_layout',
		            'settings'       => 'single_work_sidebar',
		            'type'           => 'select',
		            'choices'        => $sidebar_options
		        )
		    )
		);

		$wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'single_work_layout',
		        array(
		        	'priority' => 1,
		            'label'          => __( 'Layout for single work results page', $textdomain ),
		            'section'        => 'singlework_layout',
		            'settings'       => 'single_work_layout',
		            'type'           => 'select',
		            'choices'        => array('left' => __('Left Sidebar', $textdomain ),
		            							'right' => __('Right Sidebar', $textdomain ),
		            							'12' => __('No Sidebar, 12 columns width', $textdomain ),
		            							'10' => __('No Sidebar, 10 columns width -5/6', $textdomain ),
		            							'8' => __('No Sidebar, 8 columns width - 2/3', $textdomain ),
		            							'6' => __('No Sidebar, 6 columns width - 1/2', $textdomain ),
		             )
		        )
		    )
		);

		//Footer
		$wp_customize->add_setting( 'footer_color' , array('default'     => '#444','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'footer_theme' , array('default'     => 'dark','transport'   => 'postMessage','sanitize_callback' => 'esc_html') );
		$wp_customize->add_setting( 'upload_footer_logo' , array('transport'   => 'postMessage','sanitize_callback' => 'esc_url_raw') );
        $wp_customize->add_setting( 'upload_footer_logo2x' , array('transport'   => 'postMessage','sanitize_callback' => 'esc_url_raw') );

        $wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'footer_color', 
			array(
				'priority' => 1,
				'label'      => __( 'Footer color', $textdomain ),
				'section'    => 'footer',
				'settings'   => 'footer_color',
			) ) 
		);

        $wp_customize->add_control(
		    new WP_Customize_Control(
		        $wp_customize,
		        'footer_theme',
		        array(
		        	'priority' =>2,
		            'label'          => __( 'Footer widgets color theme', $textdomain ),
		            'section'        => 'footer',
		            'settings'       => 'footer_theme',
		            'type'           => 'select',
		            'choices'        => array('light' => __("Light", $textdomain ) , 
		            							'dark' => __("Dark", $textdomain ))
		        )
		    )
		);

		$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'upload_footer_logo',
	           array(
	           	   'priority' => 3,
	               'label'      => __( 'Upload footer logo', $textdomain ),
	               'section'    => 'footer',
	               'settings'   => 'upload_footer_logo'
	           )
	       )
	   	);

		$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'upload_footer_logo2x',
	           array(
	           	   'priority' => 4,
	               'label'      => __( 'Upload footer logo @2x', $textdomain ),
	               'section'    => 'footer',
	               'settings'   => 'upload_footer_logo2x'
	           )
	       )
	   	);
	}

	function milk_custom_css(){

		//Logo

		$logo_type = get_theme_mod( 'select_logo_type' );
		$logo_position = get_theme_mod( 'logo_position' );
		$logo_margin_top = get_theme_mod( 'logo_margin_top' );
		$logo_margin_bottom = get_theme_mod( 'logo_margin_bottom' );
		$logo_font_family = get_theme_mod( 'logo_font_family' );
		$logo_font_weight = get_theme_mod( 'logo_font_weight' );
		$logo_text_transform = get_theme_mod( 'logo_text_transform' );
		$logo_italic = get_theme_mod( 'logo_italic' );
		$logo_font_size = get_theme_mod( 'logo_font_size' );
		$logo_line_height = get_theme_mod( 'logo_line_height' );
		$logo_letterspacing = get_theme_mod( 'logo_letterspacing' );
		$logo_color = get_theme_mod( 'logo_color' );
		$logo_background_color = get_theme_mod( 'logo_background_color' );

		//Tagline

		$show_tagline = get_theme_mod( 'show_tagline' );
		$tagline_margin_top = get_theme_mod( 'tagline_margin_top' );
		$tagline_font_family = get_theme_mod( 'tagline_font_family' );
		$tagline_font_weight = get_theme_mod( 'tagline_font_weight' );
		$tagline_text_transform = get_theme_mod( 'tagline_text_transform' );
		$tagline_italic = get_theme_mod( 'tagline_italic' );
		$tagline_font_size = get_theme_mod( 'tagline_font_size' );
		$tagline_line_height = get_theme_mod( 'tagline_line_height' );
		$tagline_letterspacing = get_theme_mod( 'tagline_letterspacing' );
		$tagline_color = get_theme_mod( 'tagline_color' );

		//Welcome Msg

		$show_welcome = get_theme_mod( 'show_welcome' );
		$welcome_margin_top = get_theme_mod( 'welcome_margin_top' );
		$welcome_margin_bottom = get_theme_mod( 'welcome_margin_bottom' );
		$welcome_font_family = get_theme_mod( 'welcome_font_family' );
		$welcome_font_weight = get_theme_mod( 'welcome_font_weight' );
		$welcome_text_transform = get_theme_mod( 'welcome_text_transform' );
		$welcome_italic = get_theme_mod( 'welcome_italic' );
		$welcome_font_size = get_theme_mod( 'welcome_font_size' );
		$welcome_line_height = get_theme_mod( 'welcome_line_height' );
		$welcome_letterspacing = get_theme_mod( 'welcome_letterspacing' );
		$welcome_color = get_theme_mod( 'welcome_color' );

		//Menu

		$menu_margin_top = get_theme_mod( 'menu_margin_top' );
		$menu_margin_bottom = get_theme_mod( 'menu_margin_bottom' );
		$menu_font_family = get_theme_mod( 'menu_font_family' );
		$menu_font_weight = get_theme_mod( 'menu_font_weight' );
		$menu_text_transform = get_theme_mod( 'menu_text_transform' );
		$menu_italic = get_theme_mod( 'menu_italic' );
		$menu_font_size = get_theme_mod( 'menu_font_size' );
		$menu_letterspacing = get_theme_mod( 'menu_letterspacing' );
		$menu_color = get_theme_mod( 'menu_color' );
		$menu_hover = get_theme_mod( 'menu_hover' );
		$menu_hover_text = get_theme_mod( 'menu_hover_text' );

		//Filters

		//$filters_type = get_theme_mod( 'filters_type' );
		$always_filters = get_theme_mod( 'always_filters' );
		$filters_font_family = get_theme_mod( 'filters_font_family' );
		$filters_font_weight = get_theme_mod( 'filters_font_weight' );
		$filters_text_transform = get_theme_mod( 'filters_text_transform' );
		$filters_italic = get_theme_mod( 'filters_italic' );
		$filters_font_size = get_theme_mod( 'filters_font_size' );
		$filters_line_height = get_theme_mod( 'filters_line_height' );
		$filters_letterspacing = get_theme_mod( 'filters_letterspacing' );
		$filters_color = get_theme_mod( 'filters_color' );

		//Colors

		$header_color = get_theme_mod( 'header_color' );
		$accent_color = get_theme_mod( 'accent_color' );
		$accent_color_text = get_theme_mod( 'accent_color_text' );
		
		//Works
		$work_button_color = get_theme_mod( 'work_button_color' );
		$work_button_text_color = get_theme_mod( 'work_button_text_color' );

		$rgb_work_button_color = milk_hex2rgb($work_button_color);


		//Footer

		$footer_color = get_theme_mod( 'footer_color' );

		//Background

		$background_color = get_theme_mod( 'background_color' );
		$background_stretch = get_theme_mod( 'background_stretch' );
		$background_image = get_theme_mod( 'background_image' );
		$background_repeat = get_theme_mod( 'background_repeat' );
		$background_position = get_theme_mod( 'background_position' );
		$background_attachment = get_theme_mod( 'background_attachment' );

		//Buttons

		$button_font_family = get_theme_mod( 'button_font_family' );
		$button_font_weight = get_theme_mod( 'button_font_weight' );
		$button_text_transform = get_theme_mod( 'button_text_transform' );
		$button_italic = get_theme_mod( 'button_italic' );
		$button_font_size = get_theme_mod( 'button_font_size' );
		$button_letterspacing = get_theme_mod( 'button_letterspacing' );
		$button_radius = get_theme_mod( 'button_radius' );

		//Typography

		$p_font_family = get_theme_mod( 'p_font_family' );
		$p_font_size = get_theme_mod( 'p_font_size' );

		$sidebar_font_family = get_theme_mod( 'sidebar_font_family' );
		$sidebar_font_weight = get_theme_mod( 'sidebar_font_weight' );
		$sidebar_text_transform = get_theme_mod( 'sidebar_text_transform' );
		$sidebar_italic = get_theme_mod( 'sidebar_italic' );
		$sidebar_font_size = get_theme_mod( 'sidebar_font_size' );
		$sidebar_line_height = get_theme_mod( 'sidebar_line_height' );
		$sidebar_letterspacing = get_theme_mod( 'sidebar_letterspacing' );
		$sidebar_color = get_theme_mod( 'sidebar_color' );

		$h1_font_family = get_theme_mod( 'h1_font_family' );
		$h1_font_weight = get_theme_mod( 'h1_font_weight' );
		$h1_text_transform = get_theme_mod( 'h1_text_transform' );
		$h1_italic = get_theme_mod( 'h1_italic' );
		$h1_font_size = get_theme_mod( 'h1_font_size' );
		$h1_line_height = get_theme_mod( 'h1_line_height' );
		$h1_letterspacing = get_theme_mod( 'h1_letterspacing' );
		$h1_color = get_theme_mod( 'h1_color' );

		$h2_font_family = get_theme_mod( 'h2_font_family' );
		$h2_font_weight = get_theme_mod( 'h2_font_weight' );
		$h2_text_transform = get_theme_mod( 'h2_text_transform' );
		$h2_italic = get_theme_mod( 'h2_italic' );
		$h2_font_size = get_theme_mod( 'h2_font_size' );
		$h2_line_height = get_theme_mod( 'h2_line_height' );
		$h2_letterspacing = get_theme_mod( 'h2_letterspacing' );
		$h2_color = get_theme_mod( 'h2_color' );

		$h3_font_family = get_theme_mod( 'h3_font_family' );
		$h3_font_weight = get_theme_mod( 'h3_font_weight' );
		$h3_text_transform = get_theme_mod( 'h3_text_transform' );
		$h3_italic = get_theme_mod( 'h3_italic' );
		$h3_font_size = get_theme_mod( 'h3_font_size' );
		$h3_line_height = get_theme_mod( 'h3_line_height' );
		$h3_letterspacing = get_theme_mod( 'h3_letterspacing' );
		$h3_color = get_theme_mod( 'h3_color' );

		$h4_font_family = get_theme_mod( 'h4_font_family' );
		$h4_font_weight = get_theme_mod( 'h4_font_weight' );
		$h4_text_transform = get_theme_mod( 'h4_text_transform' );
		$h4_italic = get_theme_mod( 'h4_italic' );
		$h4_font_size = get_theme_mod( 'h4_font_size' );
		$h4_line_height = get_theme_mod( 'h4_line_height' );
		$h4_letterspacing = get_theme_mod( 'h4_letterspacing' );
		$h4_color = get_theme_mod( 'h4_color' );

		$h5_font_family = get_theme_mod( 'h5_font_family' );
		$h5_font_weight = get_theme_mod( 'h5_font_weight' );
		$h5_text_transform = get_theme_mod( 'h5_text_transform' );
		$h5_italic = get_theme_mod( 'h5_italic' );
		$h5_font_size = get_theme_mod( 'h5_font_size' );
		$h5_line_height = get_theme_mod( 'h5_line_height' );
		$h5_letterspacing = get_theme_mod( 'h5_letterspacing' );
		$h5_color = get_theme_mod( 'h5_color' );

		$h6_font_family = get_theme_mod( 'h6_font_family' );
		$h6_font_weight = get_theme_mod( 'h6_font_weight' );
		$h6_text_transform = get_theme_mod( 'h6_text_transform' );
		$h6_italic = get_theme_mod( 'h6_italic' );
		$h6_font_size = get_theme_mod( 'h6_font_size' );
		$h6_line_height = get_theme_mod( 'h6_line_height' );
		$h6_letterspacing = get_theme_mod( 'h6_letterspacing' );
		$h6_color = get_theme_mod( 'h6_color' );


		//Content

		$content_padding = get_theme_mod( 'content_padding' );



		ob_start(); ?>

        <style type="text/css">

			<?php if($always_filters){ ?>
				.filters:before{
					width:100%;

				-webkit-transition: all 0s;
			   	-moz-transition: all 0s;
			    -ms-transition: all 0s;
			     -o-transition: all 0s;
			        transition: all 0s;
			    }
			    .filters ul{
			    	-webkit-transition: all 0s;
			   		-moz-transition: all 0s;
			    	-ms-transition: all 0s;
			     	-o-transition: all 0s;
			        transition: all 0s;
			    }
			<?php } ?>

			p:not(.welcome),
        	.list li,
	    	 .tagcloud a,
	    	 .post .details li a,
	    	 blockquote footer,
	    	 .sub-menu li a,
	    	 .widget li a,
	    	 .widget,
	    	 ul.archive li a,
	    	 .panel-body,
	    	 .tab-pane,
	    	 .content table,
	    	 dl{
        		font-family:  <?php echo esc_attr($p_font_family) ; ?>;
        	}

        	p:not(.welcome),
        	.list li,
	    	.panel-body,
	    	.tab-pane,
	    	.content table,
	    	dl{
        		font-size:  <?php echo esc_attr($p_font_size) . 'px'; ?>;
        	}


        	<?php if($sidebar_font_weight){ ?> .widget h6 { font-weight: bold; } <?php }else{ ?>
													.widget h6 { font-weight: normal; }<?php } ?>
	
			<?php if($sidebar_text_transform){ ?> .widget h6 { text-transform: uppercase; } <?php }else{ ?>
											   		.widget h6 { text-transform: none; }<?php } ?>
			<?php if($sidebar_italic){ ?> .widget h6 { font-style: italic; } <?php }else{ ?>
								   			.widget h6 { font-style: normal ; }<?php } ?>

        	.widget h6{ 
        		font-family: <?php echo esc_attr($sidebar_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($sidebar_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($sidebar_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($sidebar_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($sidebar_color); ?>;
        	}

        	<?php if($h1_font_weight){ ?> h1 { font-weight: bold; } <?php }else{ ?>
											h1 { font-weight: normal; }<?php } ?>
			<?php if($h1_text_transform){ ?> h1 { text-transform: uppercase; } <?php }else{ ?>
											   h1 { text-transform: none; }<?php } ?>
			<?php if($h1_italic){ ?> h1 { font-style: italic; } <?php }else{ ?>
									   h1 { font-style: normal ; }<?php } ?>

        	h1{ 
        		font-family: <?php echo esc_attr($h1_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($h1_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($h1_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($h1_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($h1_color); ?>;
        	}
			
        	<?php if($h2_font_weight){ ?> h2 { font-weight: bold; } <?php }else{ ?>
											h2 { font-weight: normal; }<?php } ?>
			<?php if($h2_text_transform){ ?> h2 { text-transform: uppercase; } <?php }else{ ?>
											   h2 { text-transform: none; }<?php } ?>
			<?php if($h2_italic){ ?> h2 { font-style: italic; } <?php }else{ ?>
									   h2 { font-style: normal ; }<?php } ?>

        	h2{ 
        		font-family: <?php echo esc_attr($h2_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($h2_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($h2_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($h2_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($h2_color); ?>;
        	}

        	<?php if($h3_font_weight){ ?> h3 { font-weight: bold; } <?php }else{ ?>
											h3 { font-weight: normal; }<?php } ?>
			<?php if($h3_text_transform){ ?> h3 { text-transform: uppercase; } <?php }else{ ?>
											   h3 { text-transform: none; }<?php } ?>
			<?php if($h3_italic){ ?> h3 { font-style: italic; } <?php }else{ ?>
									   h3 { font-style: normal ; }<?php } ?>

        	h3{ 
        		font-family: <?php echo esc_attr($h3_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($h3_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($h3_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($h3_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($h3_color); ?>;
        	}
			
        	<?php if($h4_font_weight){ ?> h4 { font-weight: bold; } <?php }else{ ?>
											h4 { font-weight: normal; }<?php } ?>
			<?php if($h4_text_transform){ ?> h4 { text-transform: uppercase; } <?php }else{ ?>
											   h4 { text-transform: none; }<?php } ?>
			<?php if($h4_italic){ ?> h4 { font-style: italic; } <?php }else{ ?>
									   h4 { font-style: normal ; }<?php } ?>

        	h4{ 
        		font-family: <?php echo esc_attr($h4_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($h4_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($h4_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($h4_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($h4_color); ?>;
        	}

        	<?php if($h5_font_weight){ ?> h5,blockquote,blockquote p { font-weight: bold; } <?php }else{ ?>
											h5,blockquote,blockquote p { font-weight: normal; }<?php } ?>
			<?php if($h5_text_transform){ ?> h5,blockquote,blockquote p { text-transform: uppercase; } <?php }else{ ?>
											   h5,blockquote,blockquote p { text-transform: none; }<?php } ?>
			<?php if($h5_italic){ ?> h5,blockquote,blockquote p { font-style: italic; } <?php }else{ ?>
									   h5,blockquote,blockquote p { font-style: normal ; }<?php } ?>

        	h5,blockquote,blockquote p{ 
        		font-family: <?php echo esc_attr($h5_font_family) ; ?> !important; 
        		font-size: <?php echo esc_attr($h5_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($h5_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($h5_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($h5_color); ?>;
        	}

        	<?php if($h6_font_weight){ ?> h6 { font-weight: bold; } <?php }else{ ?>
											h6 { font-weight: normal; }<?php } ?>
			<?php if($h6_text_transform){ ?> h6 { text-transform: uppercase; } <?php }else{ ?>
											   h6 { text-transform: none; }<?php } ?>
			<?php if($h6_italic){ ?> h6 { font-style: italic; } <?php }else{ ?>
									   h6 { font-style: normal ; }<?php } ?>

        	h6{ 
        		font-family: <?php echo esc_attr($h6_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($h6_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($h6_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($h6_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($h6_color); ?>;
        	}
		
        	.post .content{
        		padding: 0 <?php echo esc_attr($content_padding) . 'px'; ?>;
        	}
        	.main h3, .post-page .content h3:first-child{
        		margin: 0 <?php echo '-'.esc_attr($content_padding).'px'; ?>;
				padding: <?php echo esc_attr($content_padding).'px'; ?>;
        	}
        	.post .details{
        		padding-top: <?php echo esc_attr($content_padding) . 'px'; ?>;
        	}
        	.post .content .details:last-child{
        		padding-bottom: <?php echo esc_attr($content_padding) . 'px'; ?>;
        	}
        	.content p, .post p {
				padding-top: <?php echo esc_attr($content_padding) . 'px'; ?>;
			}
			blockquote{
				padding: <?php echo esc_attr($content_padding) . 'px'; ?>;
			}
			.content, .comments{
				padding: 0 <?php echo esc_attr($content_padding) . 'px ' . esc_attr($content_padding) . 'px'; ?>;
				margin-bottom: <?php echo esc_attr($content_padding) . 'px'; ?>;
			}
			.comments{
				padding-bottom: 0;
			}
			.comments>ul {
				margin: 0 <?php echo '-'.esc_attr($content_padding).'px'; ?>;
				padding: <?php echo esc_attr($content_padding) . 'px ' . esc_attr($content_padding) . 'px 0' ; ?>;
			}
			.comments .btn {
				margin-bottom: <?php echo esc_attr($content_padding) . 'px'; ?>;
			}
			.post-page .post .content{
				padding: 0 <?php echo esc_attr($content_padding) . 'px ' . esc_attr($content_padding) . 'px'; ?>;
			}
			.post-page .related .post .content{
				padding: <?php echo '0 ' . esc_attr($content_padding) . 'px 0' ; ?>;
			}
			aside{
				padding: <?php echo esc_attr($content_padding) . 'px'; ?>;
			}
			aside .widget:first-child .input-group{
				padding-bottom: <?php echo esc_attr($content_padding) . 'px'; ?>;
			}
			.widget .input-group{
				margin: 0 <?php echo '-'.esc_attr($content_padding).'px'; ?>;
				padding: 0 <?php echo esc_attr($content_padding) . 'px'; ?>;
			}
			
        	.filters:before,
        	.audio .controls .current,
        	.audio .controls .volume .currentvolume,
        	footer.light .widget .input-group-addon button:hover, 
			footer.light .widget .input-group-btn button:hover,
			footer.dark .widget .input-group-addon button:hover, 
			footer.dark .widget .input-group-btn button:hover,
			aside .widget .input-group-addon button:hover, 
			aside .widget .input-group-btn button:hover,
			.widget_slider .bx-pager-link:hover,
			.widget_slider .bx-pager-link.active,
			footer.dark .widget_slider .bx-pager-link:hover,
			footer.dark .widget_slider .bx-pager-link.active,
			.tagcloud a:hover,
			footer.dark .tagcloud a:hover,
			footer.light .tagcloud a:hover,
			footer.light .row > .widget_social  li a:hover,
			aside .widget_social  li a:hover,
			.btn-default,
			.nav-tabs > li.active > a,
			.nav-tabs > li.active > a:hover,
			.nav-tabs > li.active > a:focus,
			.panel-title > a,
			.page-numbers.current,
			.sticky-label {
        		background-color: <?php echo esc_attr($accent_color); ?>;
        	}
			.tagcloud a:hover,
			footer.dark .tagcloud a:hover,
			footer.light .tagcloud a:hover,
			footer.light .row > .widget_social  li a:hover,
			aside .widget_social  li a:hover,
			.btn-default,
			.nav-tabs > li.active > a,
			.nav-tabs > li.active > a:hover,
			.nav-tabs > li.active > a:focus,
			.panel-title > a,
			.page-numbers.current,
			.sticky-label,
			.sticky-label p {
        		color: <?php echo esc_attr($accent_color_text); ?>;
        	}
        	.tagcloud a:hover,
        	footer.dark .tagcloud a:hover,
        	footer.light .tagcloud a:hover,
        	.btn-default{
        		border-color: <?php echo esc_attr($accent_color); ?>;
        	}
        	a,
        	.content h3 a:hover,
        	.post .details i,
        	.widget_categories a:before,
			.widget_pages a:before,
			.widget_archive a:before,
			.widget_nav_menu a:before,
			.widget_meta a:before,
			#wp-calendar tbody td a,
			.post-page .content ul:not(.list-inline) li:before,
			.comment .date a,
			.client i,
			ul.archive li:hover a i,
			span,
			.post-categories a:hover{
        		color:<?php echo esc_attr($accent_color); ?>;
        	}
			
			.work figure .button{
        		background: <?php echo "rgba(" . $rgb_work_button_color[0] . "," 
        											. $rgb_work_button_color[1] . ","
        											. $rgb_work_button_color[2] . ", 0.8)";?>;
				color: <?php echo esc_attr($work_button_text_color); ?>;
        	}
        	.work figure .button i{
        		color: <?php echo esc_attr($work_button_text_color); ?>;
        	}
        	.work figure .button:hover{
        		background: <?php echo "rgba(" . $rgb_work_button_color[0] . "," 
        											. $rgb_work_button_color[1] . ","
        											. $rgb_work_button_color[2] . ", 1)";?>
        	}
        	
        	.gallery,
        	.main{
        		background-color: <?php echo "#".esc_attr($background_color); ?>;
        		background-image: <?php echo "url(" . esc_attr($background_image) . ")"; ?>;
        		background-repeat: <?php echo esc_attr($background_repeat); ?>;
        		background-position: <?php echo esc_attr($background_position); ?>;
        		background-attachment: <?php echo esc_attr($background_attachment); ?>;
        	}

        	<?php if($background_stretch){ ?> .gallery,.main{ background-size: cover; } <?php }else{ ?>
											.gallery,.main{ background-size: auto; } <?php } ?>

        	
        	<?php if($logo_type!='text'){ ?> .logo h1{ display: none; } .logo img{ display: inline-block; } <?php } ?>
        	<?php if($logo_type!='image'){ ?> .logo h1{ display: inline-block; } .logo img{ display: none; } <?php } ?>
        	<?php if($logo_position=='center'){ ?> .logo { float: none} .menu { float: none; }<?php }else{ ?>
        								.logo { float: left} .menu { float: right; } <?php } ?>

        	.logo{
        		margin-top: <?php echo esc_attr($logo_margin_top) . 'px' ; ?>;
        		margin-bottom: <?php echo esc_attr($logo_margin_bottom) . 'px'; ?>;
        	}
			<?php if($logo_font_weight){ ?> .logo h1{ font-weight: bold; } <?php }else{ ?>
											.logo h1{ font-weight: normal; }<?php } ?>
			<?php if($logo_text_transform){ ?> .logo h1{ text-transform: uppercase; } <?php }else{ ?>
											   .logo h1{ text-transform: none; }<?php } ?>
			<?php if($logo_italic){ ?> .logo h1{ font-style: italic; } <?php }else{ ?>
									   .logo h1{ font-style: normal ; }<?php } ?>

        	.logo h1{ 
        		font-family: <?php echo esc_attr($logo_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($logo_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($logo_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($logo_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($logo_color) ; ?>;
        		background-color: <?php echo esc_attr($logo_background_color) ; ?>;
        	}
			

			<?php if($show_tagline){ ?> .logo .tagline{ display: block; } <?php }else{ ?>
									.logo .tagline{ display: none; } <?php } ?>

			<?php if($tagline_font_weight){ ?> 	.logo .tagline{ font-weight: bold; } <?php }else{ ?>
											.logo .tagline{ font-weight: normal; }<?php } ?>

			<?php if($tagline_text_transform){ ?> 	.logo .tagline{ text-transform: uppercase; } <?php }else{ ?>
											   		.logo .tagline{ text-transform: none; }<?php } ?>

			<?php if($tagline_italic){ ?> 	.logo .tagline{ font-style: italic; } <?php }else{ ?>
									   		.logo .tagline{ font-style: normal ; }<?php } ?>

			.logo .tagline{
				margin-top: <?php echo esc_attr($tagline_margin_top) . 'px' ; ?>;
				font-family: <?php echo esc_attr($tagline_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($tagline_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($tagline_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($tagline_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($tagline_color) ; ?>;
			}
			
			<?php if($show_welcome){ ?> .welcome{ display: block; } <?php }else{ ?>
										.welcome{ display: none; } <?php } ?>
			<?php if($welcome_font_weight){ ?> 	.welcome{ font-weight: bold; } <?php }else{ ?>
												.welcome{ font-weight: normal; }<?php } ?>
			<?php if($welcome_text_transform){ ?> 	.welcome{ text-transform: uppercase; } <?php }else{ ?>
											   		.welcome{ text-transform: none; }<?php } ?>
			<?php if($welcome_italic){ ?> 	.welcome{ font-style: italic; } <?php }else{ ?>
									   		.welcome{ font-style: normal ; }<?php } ?>
			.welcome{
				margin-top: <?php echo esc_attr($welcome_margin_top) . 'px' ; ?>;
				margin-bottom: <?php echo esc_attr($welcome_margin_bottom) . 'px' ; ?>;
				font-family: <?php echo esc_attr($welcome_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($welcome_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($welcome_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($welcome_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($welcome_color) ; ?>;
			}
			<?php if($menu_font_weight){ ?> 	.menu ul:not(.sub-menu) > li > a{ font-weight: bold; } <?php }else{ ?>
												.menu ul:not(.sub-menu) > li > a{ font-weight: normal; }<?php } ?>
			<?php if($menu_text_transform){ ?> 	.menu ul:not(.sub-menu) > li > a{ text-transform: uppercase; } <?php }else{ ?>
											   		.menu ul:not(.sub-menu) > li > a{ text-transform: none; }<?php } ?>
			<?php if($menu_italic){ ?> 	.menu ul:not(.sub-menu) > li > a{ font-style: italic; } <?php }else{ ?>
									   		.menu ul:not(.sub-menu) > li > a{ font-style: normal ; }<?php } ?>
			.menu ul:not(.sub-menu) > li > a{
				font-family: <?php echo esc_attr($menu_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($menu_font_size) . 'px'; ?>;
        		letter-spacing: <?php echo esc_attr($menu_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($menu_color) ; ?>;
			}

			.menu{
				margin-top: <?php echo esc_attr($menu_margin_top) . 'px' ; ?>;
				margin-bottom: <?php echo esc_attr($menu_margin_bottom) . 'px' ; ?>;
			}

			.menu ul > li:hover > a{
				background-color: <?php echo esc_attr($menu_hover) ; ?>;
				color: <?php echo esc_attr($menu_hover_text) ; ?>;
			}
			<?php if($filters_font_weight){ ?> 	.filters li{ font-weight: bold; } <?php }else{ ?>
												.filters li{ font-weight: normal; }<?php } ?>
			<?php if($filters_text_transform){ ?> 	.filters li{ text-transform: uppercase; } <?php }else{ ?>
											   		.filters li{ text-transform: none; }<?php } ?>
			<?php if($filters_italic){ ?> 	.filters li{ font-style: italic; } <?php }else{ ?>
									   		.filters li{ font-style: normal ; }<?php } ?>
			.filters li{
				font-family: <?php echo esc_attr($filters_font_family) ; ?>; 
        		font-size: <?php echo esc_attr($filters_font_size) . 'px'; ?>;
        		line-height: <?php echo esc_attr($filters_line_height) . 'em'; ?>;
        		letter-spacing: <?php echo esc_attr($filters_letterspacing) . 'px' ; ?>;
        		color: <?php echo esc_attr($filters_color) ; ?>;
			}
			<?php if($button_font_weight){ ?> 	.btn{ font-weight: bold; } <?php }else{ ?>
												.btn{ font-weight: normal; }<?php } ?>
			<?php if($button_text_transform){ ?> 	.btn{ text-transform: uppercase; } <?php }else{ ?>
											   		.btn{ text-transform: none; }<?php } ?>
			<?php if($button_italic){ ?> 	.btn{ font-style: italic; } <?php }else{ ?>
									   		.btn{ font-style: normal ; }<?php } ?>

			.btn{
				font-family: <?php echo esc_attr($button_font_family) ; ?>; 
        		border-radius: <?php echo esc_attr($button_radius) . 'px'; ?>;
        		letter-spacing: <?php echo esc_attr($button_letterspacing) . 'px' ; ?>;
			}
			.btn:not(.btn-lg):not(.btn-sm):not(.btn-xs){
				font-size: <?php echo esc_attr($button_font_size) . 'px'; ?>;
			}
			.btn:not(.btn-lg):not(.btn-sm):not(.btn-xs) i{
        		font-size: <?php echo esc_attr($button_font_size) . 'px'; ?>;
			}

			header{
				background-color: <?php echo esc_attr($header_color) ; ?>;
			}

			footer{
				background-color: <?php echo esc_attr($footer_color) ; ?>;
			}

		 </style><?php
	}

	function milk_customizer_live_preview(){
		wp_enqueue_script( 
			  'themecustomizer',			//Give the script an ID
			  URI .'/customizer/theme-customize.js',//Point to file
			  array( 'jquery','customize-preview' ),	//Define dependencies
			  '',						//Define a version (optional) 
			  true						//Put script in footer?
		);
	}

	function milk_hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return $rgb;
	}


	add_action( 'customize_register', 'milk_customize_register' );
	add_action( 'wp_head', 'milk_custom_css');
	add_action( 'customize_preview_init', 'milk_customizer_live_preview' );
 ?>
