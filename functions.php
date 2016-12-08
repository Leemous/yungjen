<?php 

	$p = "milk_";
	$textdomain = 'milk';

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Theme Directories
	/*
	/*-----------------------------------------------------------------------------------*/

    define('DIRECTORY', get_template_directory() );
    define('URI', get_template_directory_uri() );


    /*-----------------------------------------------------------------------------------*/
	/*
	/*  Theme
	/*
	/*-----------------------------------------------------------------------------------*/

    require ( DIRECTORY . '/customizer/theme-customize.php');
    require_once ( DIRECTORY . '/framework/custom-widgets.php');
    require_once ( DIRECTORY . '/framework/post-like.php');
    require ( DIRECTORY . '/framework/theme-fonts.php');
    require_once ( DIRECTORY . '/framework/class-tgm-plugin-activation.php');

    add_theme_support( 'post-formats', array('image','gallery','quote','video','audio','link','status','chat'));
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' ); 
	//add_theme_support( 'custom-header');
	//add_theme_support( 'custom-background');
	if ( ! isset( $content_width ) ) $content_width = 900;
    add_action('after_setup_theme', 'milk_theme_setup');
    if ( ! function_exists( 'milk_theme_setup' ) ) :
		function milk_theme_setup(){
		     load_theme_textdomain('milk', get_template_directory() . '/lang');
		}
	endif;
	if ( ! function_exists( 'milk_init_custom_mods' ) ) :
		function milk_init_custom_mods(){
			$mods = get_theme_mods();

		    $old_value = isset( $mods[ 'select_logo_type' ] ) ? $mods[ 'select_logo_type' ] : set_theme_mod( 'select_logo_type', 'text' );
		    $old_value = isset( $mods[ 'logo_position' ] ) ? $mods[ 'logo_position' ] : set_theme_mod( 'logo_position', 'center' );
		    $old_value = isset( $mods[ 'logo_font_family' ] ) ? $mods[ 'logo_font_family' ] : set_theme_mod( 'logo_font_family', 'arial' );
		    $old_value = isset( $mods[ 'show_tagline' ] ) ? $mods[ 'show_tagline' ] : set_theme_mod( 'show_tagline', 'false' );
		    $old_value = isset( $mods[ 'show_welcome' ] ) ? $mods[ 'show_welcome' ] : set_theme_mod( 'show_welcome', 'true' );
		    $old_value = isset( $mods[ 'welcome_text' ] ) ? $mods[ 'welcome_text' ] : set_theme_mod( 'welcome_text', 'Welcome to Milk! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eos aspernatur ratione error nihil accusamus, dolorum architecto consequatur, eveniet in corporis quidem esse eum corrupti explicabo natus, possimus iure qui! ' );
		    $old_value = isset( $mods[ 'select_menu' ] ) ? $mods[ 'select_menu' ] : set_theme_mod( 'select_menu', 'main' );
		    $old_value = isset( $mods[ 'add_filters' ] ) ? $mods[ 'add_filters' ] : set_theme_mod( 'add_filters', 'true' );
		    $old_value = isset( $mods[ 'always_filters' ] ) ? $mods[ 'always_filters' ] : set_theme_mod( 'always_filters', 'false' );
		    $old_value = isset( $mods[ 'works_animation' ] ) ? $mods[ 'works_animation' ] : set_theme_mod( 'works_animation', 'type2' );
		    $old_value = isset( $mods[ 'work_button_text' ] ) ? $mods[ 'work_button_text' ] : set_theme_mod( 'work_button_text', 'View' );
		    $old_value = isset( $mods[ 'num_of_works' ] ) ? $mods[ 'num_of_works' ] : set_theme_mod( 'num_of_works', 8 );
		    $old_value = isset( $mods[ 'home_col_num' ] ) ? $mods[ 'home_col_num' ] : set_theme_mod( 'home_col_num', 4 );
		    $old_value = isset( $mods[ 'home_cat' ] ) ? $mods[ 'home_cat' ] : set_theme_mod( 'home_cat', 'true' );
		    $old_value = isset( $mods[ 'blog_col_num' ] ) ? $mods[ 'blog_col_num' ] : set_theme_mod( 'blog_col_num', 3 );
		    $old_value = isset( $mods[ 'blog_sidebar' ] ) ? $mods[ 'blog_sidebar' ] : set_theme_mod( 'blog_sidebar', 'blog_sidebar' );
		    $old_value = isset( $mods[ 'blog_layout' ] ) ? $mods[ 'blog_layout' ] : set_theme_mod( 'blog_layout', 'right' );
		    $old_value = isset( $mods[ 'blog_pagination' ] ) ? $mods[ 'blog_pagination' ] : set_theme_mod( 'blog_pagination', 'default' );
		    $old_value = isset( $mods[ 'search_col_num' ] ) ? $mods[ 'search_col_num' ] : set_theme_mod( 'search_col_num', 3 );
		    $old_value = isset( $mods[ 'search_sidebar' ] ) ? $mods[ 'search_sidebar' ] : set_theme_mod( 'search_sidebar', 'blog_sidebar' );
		    $old_value = isset( $mods[ 'search_layout' ] ) ? $mods[ 'search_layout' ] : set_theme_mod( 'search_layout', 'right' );
		    $old_value = isset( $mods[ 'single_layout' ] ) ? $mods[ 'single_layout' ] : set_theme_mod( 'single_layout', 'right' );
		    $old_value = isset( $mods[ 'single_sidebar' ] ) ? $mods[ 'single_sidebar' ] : set_theme_mod( 'single_sidebar', 'post_sidebar' );
		    $old_value = isset( $mods[ 'footer_theme' ] ) ? $mods[ 'footer_theme' ] : set_theme_mod( 'footer_theme', 'dark' );

		    $categories = get_terms('work-categorie');

		    if ($categories) {
		    	foreach ($categories as $category) {
					$t_id = $category->term_id;
					$term_meta = array('featured_img' => '' , 'work_color' => '#49b4ff' );
					add_option( "taxonomy_$t_id",$term_meta );
				}
		    }

		}
	endif;
    
    add_action('init', 'milk_init_custom_mods');

    /*-----------------------------------------------------------------------------------*/
	/*
	/*  Theme Plugins
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_register_plugins' ) ) :
	    function milk_register_plugins() {
	        
	        if( file_exists( WP_CONTENT_DIR.'/plugins/pryanik-shortcodes-plugin' ) ) { $plug_shortcode = 'pryanik-shortcodes-plugin'; } else { $plug_shortcode = 'shortcodes-plugin'; }

	        $plugins = array(
	            array(
	                'name'                  => 'Pryanik - Shortcodes',
	                'slug'                  => $plug_shortcode,
	                'source'                => DIRECTORY . '/plugins/shortcodes-plugin.zip',
	                'required'              => true,
	                'version'               => '1.0',
	                'force_activation'      => false,
	                'force_deactivation'    => false,
	                'external_url'          => '',
	            )
	        );

	        $textdomain = 'milk';

	        $config = array(
	            'domain'            => $textdomain,                 // Text domain - likely want to be the same as your theme.
	            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
	            'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
	            'parent_url_slug'   => 'themes.php',                // Default parent URL slug
	            'menu'              => 'install-required-plugins',  // Menu slug
	            'has_notices'       => true,                        // Show admin notices or not
	            'is_automatic'      => true,                        // Automatically activate plugins after installation or not
	            'message'           => '',                          // Message to output right before the plugins table
	            'strings'           => array(
	                'page_title'                                => __( 'Install Required Plugins', $textdomain ),
	                'menu_title'                                => __( 'Install Plugins', $textdomain ),
	                'installing'                                => __( 'Installing Plugin: %s', $textdomain ), // %1$s = plugin name
	                'oops'                                      => __( 'Something went wrong with the plugin API.', $textdomain ),
	                'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
	                'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
	                'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
	                'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
	                'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
	                'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
	                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to it\'s latest version to ensure maximum compatibility with this theme:<br><br> %1$s. <br><br>To update the plugin you will need to deactivate and then delete the plugin. After which you will be asked to install the latest version packaged with the theme.','The following plugins need to be updated to their latest versions to ensure maximum compatibility with this theme:<br><br> %1$s. <br><br><b>To update the plugins you will need to deactivate and then delete the plugins. After which you will be asked to install the latest versions packaged with the theme.</b>'), // %1$s = plugin name(s)
	                'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
	                'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
	                'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
	                'return'                                    => __( 'Return to Required Plugins Installer', $textdomain ),
	                'plugin_activated'                          => __( 'Plugin activated successfully.', $textdomain ),
	                'complete'                                  => __( 'All plugins installed and activated successfully. %s', $textdomain ), // %1$s = dashboard link
	                'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
	            )
	        );

	        tgmpa($plugins, $config);

	    }
	endif;
    add_action('tgmpa_register', 'milk_register_plugins');

    /*-----------------------------------------------------------------------------------*/
	/*
	/*  Define CSS
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_theme_styles' ) ) :
		function milk_theme_styles(){	
			wp_register_style( 'normalize', URI . '/css/normalize.css');
			wp_register_style( 'bootstrap', URI . '/css/bootstrap.css');
			wp_register_style( 'animate', URI . '/css/animate.css');
			wp_register_style( 'themestyle', URI . '/css/theme-style.css');
			wp_register_style( 'style', URI . '/style.css');
			wp_register_style( 'font-awesome', URI . '/fonts/font-awesome/css/font-awesome.css');
			wp_register_style( 'spongebob', URI . '/css/spongebob.css');
			wp_register_style( 'custom', URI . '/css/custom.css');

			wp_enqueue_style( 'normalize');
			wp_enqueue_style( 'bootstrap');
			wp_enqueue_style( 'animate');
			wp_enqueue_style( 'themestyle');
			wp_enqueue_style( 'style');
			wp_enqueue_style( 'font-awesome');
			wp_enqueue_style( 'spongebob');
			wp_enqueue_style( 'custom');
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'milk_theme_styles' );

	// theme customizer ui styles
	if ( ! function_exists( 'milk_theme_customize_ui_styles' ) ) :
	    function milk_theme_customize_ui_styles() {
	        wp_register_style('customize-ui', URI . '/customizer/theme-customize.css', 'all');
	        wp_enqueue_style('customize-ui');
	    }
	endif;
    add_action( 'customize_controls_print_scripts', 'milk_theme_customize_ui_styles' );
    
	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define jQuery
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_theme_js' ) ) :
		function milk_theme_js(){
			wp_enqueue_script( 'bootstrap-js', URI . '/js/bootstrap.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'modernizr-js', URI . '/js/modernizr.custom.js', array('jquery'), '', true );
			wp_enqueue_script( 'classie-js', URI . '/js/classie.js', array('jquery'), '', true );
			wp_enqueue_script( 'fluidvids-js', URI . '/js/fluidvids.js', array('jquery'), '', true );
			wp_enqueue_script( 'double-tap-to-go-js', URI . '/js/doubletaptogo.js', array('jquery'), '', true );
			wp_enqueue_script( 'bxslider-js', URI . '/js/jquery.bxslider.js', array('jquery'), '', true );
			//wp_enqueue_script( 'retina-js', URI . '/js/retina.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'smoothscroll-js', URI . '/js/smoothscroll.js', array('jquery'), '', true );
			wp_enqueue_script( 'resize-stop-js', URI . '/js/jquery.resizestop.min.js', array('jquery'), '', true );

			if (is_page_template( 'work-page.php' ) || is_page_template( 'categories-page.php' ) || is_archive() || is_search() || is_home() || is_singular( 'work' ) || is_singular( 'post' )  ) {
				wp_enqueue_script( 'grid-gallery-js', URI . '/js/cbpGridGallery.js', array('jquery'), '', true );
				wp_enqueue_script( 'image-loaded-js', URI . '/js/imagesloaded.pkgd.min.js', array('jquery'), '', true );
				wp_enqueue_script( 'masonry-js', URI . '/js/masonry.pkgd.min.js', array('jquery'), '', true );
				wp_enqueue_script( 'waitForImages', URI . '/js/waitForImages.min.js', array('jquery'), '', true );
				wp_enqueue_script( 'snap-svg-js', URI . '/js/snap.svg-min.js', array('jquery'), '', true );	
			}

			wp_enqueue_script( 'player-js', URI . '/js/pryanik.player.js', array('jquery'), '', true );

			if (is_page_template( 'contact-page.php' ) || (is_singular() && comments_open()) ) {

				wp_enqueue_script( 'form-js', URI . '/js/jquery.form.js', array('jquery'), '', true );
				wp_enqueue_script( 'validate-contact-form-js', URI . '/js/validate-contact-form.js', array('jquery'), '', true );
				wp_enqueue_script( 'validate-js', URI . '/js/jquery.validate.js', array('jquery'), '', true );
			}
			
			if (is_page_template( 'contact-page.php' )){
				//wp_enqueue_script( 'google-maps-js', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en', array('jquery'), '', true );
				wp_enqueue_script( 'gmap3-js', URI . '/js/gmap3.min.js', array('jquery','google-maps-js'), '', true );
			}

	    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
	        	wp_enqueue_script( 'comment-reply' ); 
	    	}

			wp_enqueue_script( 'theme-js', URI . '/js/theme.js', array('jquery'), '', true );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'milk_theme_js' );
	if ( ! function_exists( 'milk_like_scripts' ) ) :
		function milk_like_scripts() {
			wp_enqueue_script( 'jm_like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '1.0', 1 );
			wp_localize_script( 'jm_like_post', 'ajax_var', array(
				'url' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce( 'ajax-nonce' )
				)
			);
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'milk_like_scripts' );

	// theme customizer scripts
	if ( ! function_exists( 'milk_theme_customize_ui' ) ) :
	    function milk_theme_customize_ui() {
	        wp_register_script('theme-customize-ui', URI . '/customizer/theme-customize-ui.js', 'jquery');
	        wp_enqueue_script('theme-customize-ui');
	    }
    endif;
    add_action( 'customize_controls_print_scripts', 'milk_theme_customize_ui' );



    /*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Work PostType
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_works_init' ) ) :
		function milk_works_init() {
			$textdomain = 'milk';
		    $args = array(
		      'labels' => array(
		      	'name' =>  __( "Work", $textdomain ),
		      	'menu_name' => __( "Works", $textdomain ),
				'singular_name' => __( "Work", $textdomain ),
				'add_new_item' => __( "Add New Work", $textdomain ),
				'new_item' => __( "New Work", $textdomain ),
				'view_item' => __( "View Work", $textdomain ),
				'not_found' => __( "No works found", $textdomain ),
				'edit_item' => __( "Edit Work", $textdomain ),
				'search_items' => __( 'Search Works', $textdomain ),
		      	),
		      'public' => true,
		      'show_ui' => true,
		      'capability_type' => 'post',
		      'hierarchical' => false,
		      'rewrite' => array('slug' => 'works'),
		      'query_var' => true,
		      'menu_icon' => 'dashicons-format-image',
		      'menu_position' => 5,
		      'taxonomies' => array('post_tag'),
		      'supports' => array(
	            'title',
	            'editor',
	            'excerpt',
	            'trackbacks',
	            'custom-fields',
	            'comments',
	            'revisions',
	            'thumbnail',
	            'author',
	            'page-attributes',
	            'post-formats')
		       );
		    register_post_type( 'work', $args );
		}
	endif;
	add_action( 'init', 'milk_works_init' );

	if ( ! function_exists( 'milk_custom_posts_per_page' ) ) :
		function milk_custom_posts_per_page($query){
			if (is_tax('work-categorie')) {
				 $query->query_vars['posts_per_page'] = get_theme_mod( 'num_of_works' );
			}
			if( isset($query->query_vars['post_type']) ) {
			    switch ( $query->query_vars['post_type'] )
			    {
			        case 'work': 
			            $query->query_vars['posts_per_page'] = get_theme_mod( 'num_of_works' );
			            break;
			        default:
			            break;
			    }
			}
		    return $query;
		}
	endif;
	add_filter( 'pre_get_posts', 'milk_custom_posts_per_page' );

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Media Uploader, Color Picker
	/*
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'milk_enqueue_admin' ) ) :
	    function milk_enqueue_admin() {
			wp_enqueue_media();
			wp_register_script('upload-media', URI . '/framework/upload-media.js', 'jquery');
	        wp_enqueue_script('upload-media');

	        wp_register_script('admin', URI . '/framework/admin.js', 'jquery');
	        wp_enqueue_script('admin');

	        wp_enqueue_script('wp-color-picker');
	    	wp_enqueue_style( 'wp-color-picker' );
		}
	endif;
	add_action( 'admin_enqueue_scripts', 'milk_enqueue_admin' );

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Title Filter
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_theme_name_wp_title' ) ) :
		function milk_theme_name_wp_title( $title, $sep ) {
			if ( is_feed() ) {
				return $title;
			}
			
			global $page, $paged;

			$title .= get_bloginfo( 'name', 'display' );

			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_front_page() ) ) {
				$title .= " $sep $site_description";
			}

			return $title;
		}
	endif;
	add_filter( 'wp_title', 'milk_theme_name_wp_title', 10, 2 );

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Menus
	/*
	/*-----------------------------------------------------------------------------------*/
	
	// Enable custom menus
	
	add_action( 'after_setup_theme', 'milk_register_menu' );
	if ( ! function_exists( 'milk_register_menu' ) ) :
		function milk_register_menu() {
		  	register_nav_menu( 'header', __('Header Menu','milk') );
		}
	endif;

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Pagination
	/*
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'milk_blog_pagination' ) ) :
		function milk_blog_pagination() {
			global $wp_query;
			$textdomain = 'milk';

			$big = 999999999; // need an unlikely integer
			
			echo paginate_links( array(
				//'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'mid_size' => 1,
				'prev_text'    => __('<', $textdomain),
				'next_text'    => __('>', $textdomain),
			) );
		}
	endif;

	if ( ! function_exists( 'milk_wp_infinitepaginate' ) ) :
		function milk_wp_infinitepaginate(){ 
		    $loopFile        = $_POST['loop_file'];
		    $paged           = $_POST['page_no'];
		    $type           = $_POST['post_type'];
		    $term           = $_POST['term'];
		    $posts_per_page  = get_option('posts_per_page');
		 
		    # Load the posts
		    if ($type=="work") {
		    	if ($term=='undefined') {
		    		query_posts(array('paged' => $paged,'post_type'=> $type,'post_status' => 'publish')); 
		    	}else{
		    		query_posts(array('paged' => $paged,'post_type'=> $type,'post_status' => 'publish','tax_query' => array(
																																									array(
																																										'taxonomy' => 'work-categorie',
																																										'field'    => 'slug',
																																										'terms'    => $term,
																																									)
																																								))); 
		    	}
		    	
		    }else{
		    	query_posts(array('paged' => $paged,'post_type'=> $type,'post_status' => 'publish')); 
		    }
		   
		    get_template_part( $loopFile );
		 
		    exit;
		}
	endif;

	add_action('wp_ajax_infinite_scroll', 'milk_wp_infinitepaginate');           
	add_action('wp_ajax_nopriv_infinite_scroll', 'milk_wp_infinitepaginate');

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Widget Areas
	/*
	/*-----------------------------------------------------------------------------------*/

	// Register custom widgets

	if (!function_exists('milk_register_widgets')) {
	    function milk_register_widgets() { 
	        register_widget("Milk_Widget_Social_Links");
	        register_widget("Milk_Widget_Recent_Posts");
	        register_widget("Milk_Widget_Recent_Comments");
	        register_widget("Milk_Widget_Flickr");
	        register_widget("Milk_Widget_Slider");
	        register_widget("Milk_Widget_Banner");
	        register_widget("Milk_Widget_Twitter");
	        

	    }
	    add_action('widgets_init', 'milk_register_widgets', 1);
	}

	if ( ! function_exists( 'milk_widgets_init' ) ) :
		function milk_widgets_init() {
			$textdomain = 'milk';

			register_sidebar( array(
				'name' => __('Footer Widget Area', $textdomain ),
				'id' => 'footer_widget_area',
				'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3 col-sm-6">',
				'after_widget' => '</div>',
				'before_title' => '<h6>',
				'after_title' => '</h6>',
			) );

			register_sidebar( array(
				'name' => __('Footer Social Links Area', $textdomain ),
				'id' => 'footer_social_links_area',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h6>',
				'after_title' => '</h6>',
			) );

			register_sidebar( array(
				'name' => __('Blog Sidebar', $textdomain ),
				'id' => 'blog_sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h6>',
				'after_title' => '</h6>',
			) );

			register_sidebar( array(
				'name' => __('Post Sidebar', $textdomain ),
				'id' => 'post_sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h6>',
				'after_title' => '</h6>',
			) );
		}
	endif;

	add_action( 'widgets_init', 'milk_widgets_init' );


	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Edit Post Page
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_post_meta_boxes_setup' ) ) :
		function milk_post_meta_boxes_setup() {
		  	add_action( 'add_meta_boxes', 'milk_add_post_meta_boxes' );
	  		add_action( 'save_post', 'milk_save_audio_post_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_audio_work_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_video_post_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_video_work_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_gallery_post_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_gallery_work_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_image_post_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_image_work_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_quote_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_link_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_chat_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_status_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_default_post_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_default_work_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_contact_page_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_default_page_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_categories_page_settings', 10, 2 );
	  		add_action( 'save_post', 'milk_save_slider_page_settings', 10, 2 );		
	  		add_action( 'save_post', 'milk_save_work_page_settings', 10, 2 );	
		}
	endif;

	if ( ! function_exists( 'milk_add_post_meta_boxes' ) ) :
		function milk_add_post_meta_boxes() {
			$textdomain = 'milk';
		  	add_meta_box(
		    	'image-url',
			    __( 'Image Post Settings', $textdomain ),
			    'milk_post_image_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'work-image-url',
			    __( 'Image Settings', $textdomain ),
			    'milk_work_image_meta_box',
			    'work',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'gallery-images',
			    __( 'Gallery Post Settings', $textdomain ),
			    'milk_post_gallery_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'work-gallery-images',
			    __( 'Gallery Settings', $textdomain ),
			    'milk_work_gallery_meta_box',
			    'work',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'audio-settings',
			    __( 'Audio Post Settings', $textdomain ),
			    'milk_post_audio_embed_code_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'work-audio-settings',
			    __( 'Audio Settings', $textdomain ),
			    'milk_work_audio_embed_code_meta_box',
			    'work',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'video-settings',
			    __( 'Video Post Settings', $textdomain ),
			    'milk_post_video_embed_code_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'work-video-settings',
			    __( 'Video Settings', $textdomain ),
			    'milk_work_video_embed_code_meta_box',
			    'work',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'quote-settings',
			    __( 'Quote Post Settings', $textdomain ),
			    'milk_quote_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'link-settings',
			    __( 'Link Post Settings', $textdomain ),
			    'milk_link_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'chat-settings',
			    __( 'Chat Post Settings', $textdomain ),
			    'milk_chat_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'status-settings',
			    __( 'Status Post Settings', $textdomain ),
			    'milk_status_embed_code_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'default-settings',
			    __( 'Defaut Post Settings', $textdomain ),
			    'milk_post_default_meta_box',
			    'post',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'work-default-settings',
			    __( 'Defaut Settings', $textdomain ),
			    'milk_work_default_meta_box',
			    'work',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'contact-page-settings',
			    __( 'Contact Page Settings', $textdomain ),
			    'milk_contact_page_meta_box',
			    'page',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'default-page-settings',
			    __( 'Default Page Settings', $textdomain ),
			    'milk_default_page_meta_box',
			    'page',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'categories-page-settings',
			    __( 'Categories Page Settings', $textdomain ),
			    'milk_categories_page_meta_box',
			    'page',
			    'normal',
			    'default'
		  	);
		  	add_meta_box(
		    	'slider-page-settings',
			    __( 'Slider Settings', $textdomain ),
			    'milk_slider_page_meta_box',
			    'page',
			    'normal',
			    'default'
		  	); 	
		  	add_meta_box(
		    	'work-page-settings',
			    __( 'Work Page Settings', $textdomain ),
			    'milk_work_page_meta_box',
			    'page',
			    'normal',
			    'default'
		  	); 	
		}
	endif;

	function milk_post_default_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>
	  	<?php wp_nonce_field( basename( __FILE__ ), 'default_settings_nonce' ); ?>
	  		<div class="container">
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-title"><?php _e( "Title Visability", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-title"><?php _e( "Select when the post title is displayed.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="show-title" name="show-title">
							<option value="always"<?php echo (get_post_meta( $object->ID, 'show_title', true )=='always')?'selected':''; ?>><?php _e( "Always show", $textdomain ); ?></option>
							<option value="post"<?php echo (get_post_meta( $object->ID, 'show_title', true )=='post')?'selected':''; ?>><?php _e( "Only on post page", $textdomain ); ?></option>
					    	<option value="never"<?php echo (get_post_meta( $object->ID, 'show_title', true )=='never')?'selected':''; ?>><?php _e( "Never show", $textdomain ); ?></option>	
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-content"><?php _e( "Content Visability", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-content"><?php _e( "Select when the post content is displayed.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="show-content" name="show-content">
					    	<option value="always"<?php echo (get_post_meta( $object->ID, 'show_content', true )=='always')?'selected':''; ?>><?php _e( "Always show", $textdomain ); ?></option>
					    	<option value="post"<?php echo (get_post_meta( $object->ID, 'show_content', true )=='post')?'selected':''; ?>><?php _e( "Only on post page", $textdomain ); ?></option>
					    	<option value="never"<?php echo (get_post_meta( $object->ID, 'show_content', true )=='never')?'selected':''; ?>><?php _e( "Never show", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-meta"><?php _e( "Meta Visability", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-meta"><?php _e( "Select when the post meta is displayed.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="show-meta" name="show-meta">
					    	<option value="always"<?php echo (get_post_meta( $object->ID, 'show_meta', true )=='always')?'selected':''; ?>><?php _e( "Always show", $textdomain ); ?></option>
					    	<option value="post"<?php echo (get_post_meta( $object->ID, 'show_meta', true )=='post')?'selected':''; ?>><?php _e( "Only on post page", $textdomain ); ?></option>
					    	<option value="never"<?php echo (get_post_meta( $object->ID, 'show_meta', true )=='never')?'selected':''; ?>><?php _e( "Never show", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-share"><?php _e( "Display Post Sharing Buttons", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-share"><?php _e( "Check this if you want the social sharing buttons to be visible.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'show_share', true ))?'checked':''; ?> id="show-share" name="show-share" />
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-pagination"><?php _e( "Display Post Pagination", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-pagination"><?php _e( "Check this if you want the post pagination links to be visible.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'show_pagination', true ))?'checked':''; ?> id="show-pagination" name="show-pagination" />
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="hide-comments"><?php _e( "Hide Comments", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="hide-comments"><?php _e( "Choose to hide the comment form and comments. This does not close comments, it just hides them.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'hide_comments', true ))?'checked':''; ?> id="hide-comments" name="hide-comments" />
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-related"><?php _e( "Display Similar Posts", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-related"><?php _e( "Choose to display similar posts to this one. Similar posts are based on tags.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'show_related', true ))?'checked':''; ?> id="show-related" name="show-related" />
				   </div>
				</div>
				<br><br>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="work-style"><?php _e( "Work Card Style", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="work-style"><?php _e( "Choose to display blog post with work card style.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'work_style', true ))?'checked':''; ?> id="work-style" name="work-style" />
				   </div>
				</div>
				<div class="row">
				  	<p class="col-md-4 desc" >
		  				<label  for="work-style-color"><?php _e( "Acent Color", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="work-style-color"><?php _e( "Accent color for post preview", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
			  			<input  name="work-style-color" 
					    		type="text" 
					    		id="work-style-color" 
					    		value="<?php echo  esc_attr(get_post_meta( $object->ID, 'work_style_color', true )); ?>"
					    		data-default-color="#49b4ff">
					</div>
				</div>
			</div>
	<?php }

	function milk_save_default_post_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['default_settings_nonce'] ) || !wp_verify_nonce( $_POST['default_settings_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['show-title'] ) ?  $_POST['show-title']  : '' );
	  	$meta_key = 'show_title';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['show-content'] ) ?  $_POST['show-content']  : '' );
	  	$meta_key = 'show_content';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['show-meta'] ) ?  $_POST['show-meta']  : '' );
	  	$meta_key = 'show_meta';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['show-share'] ) ?  $_POST['show-share']  : '' );
	  	$meta_key = 'show_share';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['show-pagination'] ) ?  $_POST['show-pagination']  : '' );
	  	$meta_key = 'show_pagination';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['hide-comments'] ) ?  $_POST['hide-comments']  : '' );
	  	$meta_key = 'hide_comments';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['show-related'] ) ?  $_POST['show-related']  : '' );
	  	$meta_key = 'show_related';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['work-style'] ) ?  $_POST['work-style']  : '' );
	  	$meta_key = 'work_style';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['work-style-color'] ) ?  $_POST['work-style-color']  : '' );
	  	$meta_key = 'work_style_color';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_post_image_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>
	  	<?php wp_nonce_field( basename( __FILE__ ), 'image_url_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="image_btn"><?php _e( "Post Image", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="image_btn"><?php _e( "Uploaded image will be shown on post page and on blog page.", $textdomain ); ?></label>
		  			</p>
				    
					<div class="col-md-8">
						<input 	class="post_meta_image_upload button button-primary" 
							name="image_btn" 
							type="button" 
							data-uploader_title=<?php _e("Choose image", $textdomain ); ?>
							data-uploader_button_text=<?php _e("Select" , $textdomain ); ?>
							value=<?php _e("Select images", $textdomain ); ?> />
						<input id="image-url"
							name="image-url"
							class="img_url" 
							type="text"
							style="display:none"
							value="<?php echo  esc_url(get_post_meta( $object->ID, 'image_url', true )); ?>"/>
					</div>
				</div>
			</div>
	<?php }

	function milk_save_image_post_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['image_url_nonce'] ) || !wp_verify_nonce( $_POST['image_url_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['image-url'] ) ?  $_POST['image-url']  : '' );
	  	$meta_key = 'image_url';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_post_gallery_meta_box( $object, $box ) {
		$textdomain = 'milk';
	 	?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'gallery_images_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="gallery_btn"><?php _e( "Gallery Images", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="gallery_btn"><?php _e( "Select images for slider gallery.", $textdomain ); ?></label>
		  			</p>
				    
					<div class="col-md-8">
						<input 	class="post_meta_gallery_upload button button-primary" 
							name="gallery_btn" 
							type="button" 
							data-uploader_title=<?php _e( "You can choose multiple images for slider by holding Ctrl (Cmd) button", $textdomain ); ?>
							data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
							value=<?php _e( "Select images", $textdomain ); ?>/>
						<input id="gallery-images"
							name="gallery-images"
							class="img_urls" 
							type="text"
							style="display:none"
							value="<?php echo  esc_url(get_post_meta( $object->ID, 'gallery_images', true )); ?>"/>

					</div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-mode"><?php _e( "Slider Mode", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-mode"><?php _e( "Type of transition between slides.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="slider-mode" name="slider-mode">
					    	<option value="horizontal"<?php echo (get_post_meta( $object->ID, 'slider_mode', true )=='horizontal')?'selected':''; ?>><?php _e( "Horizontal", $textdomain ); ?></option>
					    	<option value="vertical"<?php echo (get_post_meta( $object->ID, 'slider_mode', true )=='vertical')?'selected':''; ?>><?php _e( "Vertical", $textdomain ); ?></option>
					    	<option value="fade"<?php echo (get_post_meta( $object->ID, 'slider_mode', true )=='fade')?'selected':''; ?>><?php _e( "Fade", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-auto"><?php _e( "Auto Slideshow", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-auto"><?php _e( "Slides will automatically transition.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'slider_auto', true ))?'checked':''; ?> id="slider-auto" name="slider-auto" />
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-pause"><?php _e( "Pause", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-pause"><?php _e( "The amount of time (in ms) between each auto transition", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="slider-pause" name="slider-pause" type="text" value="<?php echo  intval(get_post_meta( $object->ID, 'slider_pause', true )); ?>" size="5" /></p>
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_gallery_post_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['gallery_images_nonce'] ) || !wp_verify_nonce( $_POST['gallery_images_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['gallery-images'] ) ?  $_POST['gallery-images']  : '' );
	  	$meta_key = 'gallery_images';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['slider-mode'] ) ?  $_POST['slider-mode']  : '' );
	  	$meta_key = 'slider_mode';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['slider-auto'] ) ?  $_POST['slider-auto']  : '' );
	  	$meta_key = 'slider_auto';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['slider-pause'] ) ?  $_POST['slider-pause']  : '' );
	  	$meta_key = 'slider_pause';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_post_audio_embed_code_meta_box( $object, $box ) {
		$textdomain = 'milk';
	 	?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'audio_embed_code_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<div class="col-md-4 desc" >
		  				<label  for="audio-embed-code"><?php _e( "Audio File URL or Embed Code", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="audio-embed-code"><?php _e( "Insert a URL to an audio file (.mp3 for best compatibility) OR paste your 3rd party (eg: soundcloud, spotify) embed code here.", $textdomain ); ?></label>
		  				<div>
							<input 	class="post_meta_audio_upload button button-primary" 
								name="audio_btn" 
								type="button" 
								data-uploader_title=<?php _e( "Choose audio file", $textdomain ); ?>
								data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
								value=<?php _e( "Select audio file", $textdomain ); ?>/>
		  				</div>
		  			</div>
				    
<textarea 	class="col-md-8" 
							    		type="text"
							    		name="audio-embed-code" 
							    		id="audio-embed-code" 
							    		rows="8">
		<?php echo  balanceTags(get_post_meta( $object->ID, 'audio_embed_code', true )); ?>
		</textarea>
				</div>
			</div>
	<?php }

	function milk_save_audio_post_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['audio_embed_code_nonce'] ) || !wp_verify_nonce( $_POST['audio_embed_code_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['audio-embed-code'] ) ?  $_POST['audio-embed-code']  : '' );

	  	$meta_key = 'audio_embed_code';

	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_post_video_embed_code_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

  		<?php wp_nonce_field( basename( __FILE__ ), 'video_embed_code_nonce' ); ?>
  		<div class="container">
	  		<div class="row">
	  			<p class="col-md-4 desc" >
	  				<label  for="video-embed-code"><?php _e( "Embed Code", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="video-embed-code"><?php _e( "If you want to use a 3rd party embedded video (eg: youtube, vimeo), paste your embed code here. Otherwise leave this field blank.", $textdomain ); ?></label>
	  			</p>
			    
<textarea 	class="col-md-8" 
				    		type="text"
				    		name="video-embed-code" 
				    		id="video-embed-code" 
				    		rows="8">
		<?php echo  balanceTags(get_post_meta( $object->ID, 'video_embed_code', true )); ?>
				</textarea>
			</div>
		</div>
	<?php }

	function milk_save_video_post_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['video_embed_code_nonce'] ) || !wp_verify_nonce( $_POST['video_embed_code_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['video-embed-code'] ) ?  balanceTags($_POST['video-embed-code'])  : '' );

	  	$meta_key = 'video_embed_code';

	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_quote_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'quote_settings_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="quote-text"><?php _e( "The Quote", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="quote-text"><?php _e( "The actual quote for this post.", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
						<input class="widefat" id="quote-text" name="quote-text" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'quote_text', true )); ?>"/></p>
				  	</div>
				</div>
				<div class="row">
				  	<p class="col-md-4 desc" >
		  				<label  for="quote-ref"><?php _e( "Optional Quote Reference", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="quote-ref"><?php _e( "A persons name or the quotes source.", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
						<input class="widefat" id="quote-ref" name="quote-ref" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'quote_ref', true )); ?>"/></p>
				  	</div>
				</div>
				<div class="row">
				  	<p class="col-md-4 desc" >
		  				<label  for="quote-color"><?php _e( "Background Color", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="quote-color"><?php _e( "The background color of blockquote", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
			  			<input  name="quote-color" 
					    		type="text" 
					    		id="quote-color" 
					    		value="<?php echo  esc_attr(get_post_meta( $object->ID, 'quote_color', true )); ?>"
					    		data-default-color="#49b4ff">
					</div>
				</div>
				</div>
			</div>
	<?php }
	function milk_save_quote_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['quote_settings_nonce'] ) || !wp_verify_nonce( $_POST['quote_settings_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['quote-text'] ) ?  $_POST['quote-text']  : '' );
	  	$meta_key = 'quote_text';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['quote-ref'] ) ?  $_POST['quote-ref']  : '' );
	  	$meta_key = 'quote_ref';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['quote-color'] ) ?  $_POST['quote-color']  : '' );
	  	$meta_key = 'quote_color';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_link_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>
	  	<?php wp_nonce_field( basename( __FILE__ ), 'link_settings_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="link-ref"><?php _e( "Link URL", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="link-ref"><?php _e( "The hyperlink displayed in the post.", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
						<input class="widefat" id="link-ref" name="link-ref" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'link_ref', true )); ?>"/></p>
				  	</div>
				</div>
				<div class="row">
				  	<p class="col-md-4 desc" >
		  				<label  for="link-text"><?php _e( "Optional Link Description", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="link-text"><?php _e( "An optional short description about the link.", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
						<input class="widefat" id="link-text" name="link-text" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'link_text', true )); ?>"/></p>
				  	</div>
				</div>
				<div class="row">
				  	<p class="col-md-4 desc" >
		  				<label  for="link-color"><?php _e( "Background Color", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="link-color"><?php _e( "The background color of link", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
			  			<input  name="link-color" 
					    		type="text" 
					    		id="link-color" 
					    		value="<?php echo  esc_attr(get_post_meta( $object->ID, 'link_color', true )); ?>"
					    		data-default-color="#49b4ff">
					</div>
				</div>
				</div>
			</div>
	<?php }

	function milk_save_link_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['link_settings_nonce'] ) || !wp_verify_nonce( $_POST['link_settings_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['link-text'] ) ?  $_POST['link-text']  : '' );
	  	$meta_key = 'link_text';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['link-ref'] ) ?  $_POST['link-ref']  : '' );
	  	$meta_key = 'link_ref';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['link-color'] ) ?  $_POST['link-color']  : '' );
	  	$meta_key = 'link_color';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_chat_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'chat_settings_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<div class="col-md-4 desc" >
		  				<label  for="chat-list"><?php _e( "Chat Dialog", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="chat-list"><?php _e( "The chat dialog needs to be formated like this:", $textdomain ); ?></label>
		  				<br/>
		  				<pre>
		  				<?php _e( "
John: Hello
Mary: Hi John
Jim: Bye.", 
						$textdomain ); ?>
		  				</pre>
		  			</div>
				    
		<textarea 	class="col-md-8" 
							    		type="text"
							    		name="chat-list" 
							    		id="chat-list" 
							    		rows="8">
		<?php echo  esc_textarea(get_post_meta( $object->ID, 'chat_list', true )); ?>
		</textarea>
				</div>
			</div>
	<?php }

	function milk_save_chat_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['chat_settings_nonce'] ) || !wp_verify_nonce( $_POST['chat_settings_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['chat-list'] ) ?  $_POST['chat-list']  : '' );
	  	$meta_key = 'chat_list';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_status_embed_code_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'status_embed_code_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="status-embed-code"><?php _e( "Embedded Twitter Code", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="status-embed-code"><?php _e( "If you would rather embed a tweet you can do so here. Code here will overide any content above and all post settings. Posts will still require a title.", $textdomain ); ?></label>
		  			</p>
				    
		<textarea 	class="col-md-8" 
							    		type="text"
							    		name="status-embed-code" 
							    		id="status-embed-code" 
							    		rows="8">
		<?php echo  esc_textarea(get_post_meta( $object->ID, 'status_embed_code', true )); ?>
		</textarea>
				</div>
				<div class="row">
				  	<p class="col-md-4 desc" >
		  				<label  for="status-color"><?php _e( "Background Color", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="status-color"><?php _e( "The background color of status", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
			  			<input  name="status-color" 
					    		type="text" 
					    		id="status-color" 
					    		value="<?php echo  esc_attr(get_post_meta( $object->ID, 'status_color', true )); ?>"
					    		data-default-color="#49b4ff">
					</div>
				</div>
			</div>
	<?php }

	function milk_save_status_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['status_embed_code_nonce'] ) || !wp_verify_nonce( $_POST['status_embed_code_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['status-embed-code'] ) ?  $_POST['status-embed-code']  : '' );
	  	$meta_key = 'status_embed_code';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['status-color'] ) ?  $_POST['status-color']  : '' );

	  	$meta_key = 'status_color';

	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_work_image_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'work_image_url_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="image_btn"><?php _e( "Image", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="image_btn"><?php _e( "Upload an image for this post", $textdomain ); ?></label>
		  			</p>
				    
					<div class="col-md-8">
						<input 	class="post_meta_image_upload button button-primary" 
							name="image_btn" 
							type="button" 
							data-uploader_title=<?php _e( "Choose image", $textdomain ); ?>
							data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
							value=<?php _e(  "Select images", $textdomain ); ?>/>
						<input id="image-url"
							name="image-url"
							class="img_url" 
							type="text"
							style="display:none"
							value="<?php echo  esc_url(get_post_meta( $object->ID, 'work_image_url', true )); ?>"/>
					</div>
				</div>
			</div>
	<?php }

	function milk_save_image_work_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['work_image_url_nonce'] ) || !wp_verify_nonce( $_POST['work_image_url_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['image-url'] ) ?  $_POST['image-url']  : '' );
	  	$meta_key = 'work_image_url';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_work_gallery_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'work_gallery_images_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="gallery_btn"><?php _e( "Gallery Images", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="gallery_btn"><?php _e( "Select images for slider gallery.", $textdomain ); ?></label>
		  			</p>
				    
					<div class="col-md-8">
						<input 	class="post_meta_gallery_upload button button-primary" 
							name="gallery_btn" 
							type="button" 
							data-uploader_title=<?php _e( "You can choose multiple images for slider by holding Ctrl (Cmd) button", $textdomain ); ?>
							data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
							value=<?php _e( "Select images", $textdomain ); ?>/>
						<input id="gallery-images"
							name="gallery-images"
							class="img_urls" 
							type="text"
							style="display:none"
							value="<?php echo  esc_url(get_post_meta( $object->ID, 'work_gallery_images', true )); ?>"/>

					</div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-mode"><?php _e( "Slider Mode", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-mode"><?php _e( "Type of transition between slides.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="slider-mode" name="slider-mode">
					    	<option value="horizontal"<?php echo (get_post_meta( $object->ID, 'work_slider_mode', true )=='horizontal')?'selected':''; ?>><?php _e( "Horizontal", $textdomain ); ?></option>
					    	<option value="vertical"<?php echo (get_post_meta( $object->ID, 'work_slider_mode', true )=='vertical')?'selected':''; ?>><?php _e( "Vertical", $textdomain ); ?></option>
					    	<option value="fade"<?php echo (get_post_meta( $object->ID, 'work_slider_mode', true )=='fade')?'selected':''; ?>><?php _e( "Fade", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-auto"><?php _e( "Auto Slideshow", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-auto"><?php _e( "Slides will automatically transition.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'work_slider_auto', true ))?'checked':''; ?> id="slider-auto" name="slider-auto" />
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-pause"><?php _e( "Pause", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-pause"><?php _e( "The amount of time (in ms) between each auto transition", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="slider-pause" name="slider-pause" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'work_slider_pause', true )); ?>" size="5" /></p>
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_gallery_work_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['work_gallery_images_nonce'] ) || !wp_verify_nonce( $_POST['work_gallery_images_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['gallery-images'] ) ?  $_POST['gallery-images']  : '' );
	  	$meta_key = 'work_gallery_images';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['slider-mode'] ) ?  $_POST['slider-mode']  : '' );
	  	$meta_key = 'work_slider_mode';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['slider-auto'] ) ?  $_POST['slider-auto']  : '' );
	  	$meta_key = 'work_slider_auto';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['slider-pause'] ) ?  $_POST['slider-pause']  : '' );
	  	$meta_key = 'work_slider_pause';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_work_audio_embed_code_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'work_audio_embed_code_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<div class="col-md-4 desc" >
		  				<label  for="audio-embed-code"><?php _e( "Audio File URL or Embed Code", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="audio-embed-code"><?php _e( "Insert a URL to an audio file (.mp3 for best compatibility) OR paste your 3rd party (eg: soundcloud, spotify) embed code here.", $textdomain ); ?></label>
		  				<div>
							<input 	class="post_meta_audio_upload button button-primary" 
								name="audio_btn" 
								type="button" 
								data-uploader_title=<?php _e( "Choose audio file", $textdomain ); ?>
								data-uploader_button_text=<?php _e( "Select", $textdomain ); ?>
								value=<?php _e( "Select audio file", $textdomain ); ?>/>
		  				</div>
		  			</div>
				    
<textarea 	class="col-md-8" 
							    		type="text"
							    		name="audio-embed-code" 
							    		id="audio-embed-code" 
							    		rows="8">
		<?php echo  esc_textarea(get_post_meta( $object->ID, 'work_audio_embed_code', true )); ?>
		</textarea>
				</div>
			</div>
	<?php }

	function milk_save_audio_work_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['work_audio_embed_code_nonce'] ) || !wp_verify_nonce( $_POST['work_audio_embed_code_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['audio-embed-code'] ) ?  $_POST['audio-embed-code']  : '' );

	  	$meta_key = 'work_audio_embed_code';

	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_work_video_embed_code_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

  		<?php wp_nonce_field( basename( __FILE__ ), 'work_video_embed_code_nonce' ); ?>
  		<div class="container">
	  		<div class="row">
	  			<p class="col-md-4 desc" >
	  				<label  for="video-embed-code"><?php _e( "Embed Code", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="video-embed-code"><?php _e( "If you want to use a 3rd party embedded video (eg: youtube, vimeo), paste your embed code here. Otherwise leave this field blank.", $textdomain ); ?></label>
	  			</p>
			    
 <textarea 	class="col-md-8" 
				    		type="text"
				    		name="video-embed-code" 
				    		id="video-embed-code" 
				    		rows="8">
		<?php echo  esc_textarea(get_post_meta( $object->ID, 'work_video_embed_code', true )); ?>
				</textarea>
			</div>
		</div>
	<?php }

	function milk_save_video_work_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['work_video_embed_code_nonce'] ) || !wp_verify_nonce( $_POST['work_video_embed_code_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['video-embed-code'] ) ?  balanceTags($_POST['video-embed-code'])  : '' );

	  	$meta_key = 'work_video_embed_code';

	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_work_default_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'work_default_settings_nonce' ); ?>
	  		<div class="container">
				<!--<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="work-description"><?php _e( "Short Description", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="work-description"><?php _e( "This description will be shown at work preview", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="work-description" name="work-description" type="text" value="<?php echo  get_post_meta( $object->ID, 'work_description', true ); ?>" /></p>
				   </div>
				</div>-->
				<div class="row">
				  	<p class="col-md-4 desc" >
		  				<label  for="work-color"><?php _e( "Acent Color", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="work-color"><?php _e( "Accent color for work preview", $textdomain ); ?></label>
		  			</p>
		  			<div class="col-md-8">
			  			<input  name="work-color" 
					    		type="text" 
					    		id="work-color" 
					    		value="<?php echo  esc_attr(get_post_meta( $object->ID, 'work_color', true )); ?>"
					    		data-default-color="#49b4ff">
					</div>
				</div>

				<!--<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="image_btn"><?php _e( "Preview Image", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="image_btn"><?php _e( "Upload an image for work preview", $textdomain ); ?></label>
		  			</p>
				    
					<div class="col-md-8">
						<input 	class="post_meta_image_upload button button-primary" 
							name="image_btn" 
							type="button" 
							data-uploader_title=<?php _e( "Choose image", $textdomain ); ?>
							data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
							value=<?php _e( "Select images", $textdomain ); ?>/>
						<input id="preview-image-url"
							name="preview-image-url"
							class="img_url" 
							type="text"
							style="display:none"
							value="<?php echo  get_post_meta( $object->ID, 'preview_image_url', true ); ?>"/>
					</div>
				</div>-->
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="work-client"><?php _e( "Client", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="work-client"><?php _e( "You can add client for this work", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="work-client" name="work-client" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'work_client', true )); ?>" /></p>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="work-client-url"><?php _e( "Client URL", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="work-client-url"><?php _e( "You can add client url for this work", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="work-client-url" name="work-client-url" type="text" value="<?php echo  esc_url(get_post_meta( $object->ID, 'work_client_url', true )); ?>" /></p>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-related-works"><?php _e( "Display Similar Posts", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-related-works"><?php _e( "Choose to display similar posts to this one. Similar posts are based on tags.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'show_related_works', true ))?'checked':''; ?> id="show-related-works" name="show-related-works" />
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_default_work_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['work_default_settings_nonce'] ) || !wp_verify_nonce( $_POST['work_default_settings_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['work-description'] ) ?  $_POST['work-description']  : '' );
	  	$meta_key = 'work_description';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['work-client'] ) ?  $_POST['work-client']  : '' );
	  	$meta_key = 'work_client';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['work-client-url'] ) ?  $_POST['work-client-url']  : '' );
	  	$meta_key = 'work_client_url';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['work-color'] ) ?  $_POST['work-color']  : '' );
	  	$meta_key = 'work_color';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	/*$new_meta_value = ( isset( $_POST['preview-image-url'] ) ?  $_POST['preview-image-url']  : '' );
	  	$meta_key = 'preview_image_url';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}*/
	  	$new_meta_value = ( isset( $_POST['show-related-works'] ) ?  $_POST['show-related-works']  : '' );
	  	$meta_key = 'show_related_works';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_contact_page_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'contact_page_nonce' ); ?>
	  		<div class="container">
				<!--<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="contact-form-header"><?php _e( "Contact Form Header", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="contact-form-header"><?php _e( "The text placed above the contact form (eg: Get in touch).", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="contact-form-header" name="contact-form-header" type="text" value="<?php echo  get_post_meta( $object->ID, 'contact_form_header', true ); ?>" /></p>
				   </div>
				</div>-->
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="contact-form-email"><?php _e( "Contact Form Email Address", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="contact-form-email"><?php _e( "Where will the contact form be sent? Leaving this blank will default to the admin email address.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="contact-form-email" name="contact-form-email" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'contact_form_email', true )); ?>" /></p>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="contact-form-map"><?php _e( "Google Maps Address", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="contact-form-map"><?php _e( "The address used to retrive your google map. Leaving this blank result in no map.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="contact-form-map" name="contact-form-map" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'contact_form_map', true )); ?>" /></p>
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_contact_page_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['contact_page_nonce'] ) || !wp_verify_nonce( $_POST['contact_page_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['contact-form-header'] ) ?  $_POST['contact-form-header']  : '' );
	  	$meta_key = 'contact_form_header';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['contact-form-email'] ) ?  $_POST['contact-form-email']  : '' );
	  	$meta_key = 'contact_form_email';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['contact-form-map'] ) ?  $_POST['contact-form-map']  : '' );
	  	$meta_key = 'contact_form_map';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_default_page_meta_box( $object, $box ) {
		$textdomain = 'milk';
	 	?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'default_page_nonce' ); ?>
	  		<div class="container">
	  			<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="show-sidebar"><?php _e( "Show sidebar", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="show-sidebar"><?php _e( "Choose to add sidebar to this page.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'show_sidebar', true ))?'checked':''; ?> id="show-sidebar" name="show-sidebar" />
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="select-sidebar"><?php _e( "Select sidebar", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="select-sidebar"><?php _e( "Select sidebar from list. You can create and add new sidebar at widget page.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="select-sidebar" name="select-sidebar">
						<?php 
							foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { 
								$id = ucwords( $sidebar['id']);
								$name = ucwords( $sidebar['name'] );
								?>
								<option 
									value="<?php echo esc_attr($id); ?>"
									<?php echo (get_post_meta( $object->ID, 'select_sidebar', true )==$id)?'selected':'' ?> >
									<?php echo esc_attr($name); ?>
									</option>
						<?php } ?>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="sidebar-position"><?php _e( "Sidebar position", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="sidebar-position"><?php _e( "Select the position of sidebar on this page.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="sidebar-position" name="sidebar-position">
							<option value="right"<?php echo (get_post_meta( $object->ID, 'sidebar_position', true )=='right')?'selected':''; ?>><?php _e( "Right", $textdomain ); ?></option>
					    	<option value="left"<?php echo (get_post_meta( $object->ID, 'sidebar_position', true )=='left')?'selected':''; ?>><?php _e( "Left", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="page-width"><?php _e( "Page width", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="page-width"><?php _e( "You can select page width in columns(12 by default is max width). Page container would be centered.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="page-width" name="page-width">
							<option value="12"<?php echo (get_post_meta( $object->ID, 'page_width', true )=='12')?'selected':''; ?>><?php _e( "12 Columns", $textdomain ); ?></option>
					    	<option value="10"<?php echo (get_post_meta( $object->ID, 'page_width', true )=='10')?'selected':''; ?>><?php _e( "10 Columns - 5/6", $textdomain ); ?></option>
					    	<option value="8"<?php echo (get_post_meta( $object->ID, 'page_width', true )=='8')?'selected':''; ?>><?php _e( "8 Columns - 2/3", $textdomain ); ?></option>
					    	<option value="6"<?php echo (get_post_meta( $object->ID, 'page_width', true )=='6')?'selected':''; ?>><?php _e( "6 Columns - 1/2", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_default_page_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['default_page_nonce'] ) || !wp_verify_nonce( $_POST['default_page_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['show-sidebar'] ) ?  $_POST['show-sidebar']  : '' );
	  	$meta_key = 'show_sidebar';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['select-sidebar'] ) ?  $_POST['select-sidebar']  : '' );
	  	$meta_key = 'select_sidebar';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['page-width'] ) ?  $_POST['page-width']  : '' );
	  	$meta_key = 'page_width';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['sidebar-position'] ) ?  $_POST['sidebar-position']  : '' );
	  	$meta_key = 'sidebar_position';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_slider_page_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'slider_page_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="add-slider"><?php _e( "Add Slider", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="add-slider"><?php _e( "Adds slider under the header.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'add_slider', true ))?'checked':''; ?> id="add-slider" name="add-slider" />
				   </div>
				</div>
	  			<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="gallery_btn"><?php _e( "Gallery Images", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="gallery_btn"><?php _e( "Select images for slider gallery.", $textdomain ); ?></label>
		  			</p>
				    
					<div class="col-md-8">
						<input 	class="post_meta_gallery_upload button button-primary" 
							name="gallery_btn" 
							type="button" 
							data-uploader_title=<?php _e( "You can choose multiple images for slider by holding Ctrl (Cmd) button", $textdomain ); ?>
							data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
							value=<?php _e( "Select images" , $textdomain ); ?>>
						<input id="gallery-images"
							name="gallery-images"
							class="img_urls" 
							type="text"
							style="display:none"
							value="<?php echo  esc_url(get_post_meta( $object->ID, 'gallery_images', true )); ?>">
					</div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-mode"><?php _e( "Slider Mode", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-mode"><?php _e( "Type of transition between slides.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="slider-mode" name="slider-mode">
					    	<option value="horizontal"<?php echo (get_post_meta( $object->ID, 'slider_mode', true )=='horizontal')?'selected':''; ?>><?php _e( "Horizontal", $textdomain ); ?></option>
					    	<option value="vertical"<?php echo (get_post_meta( $object->ID, 'slider_mode', true )=='vertical')?'selected':''; ?>><?php _e( "Vertical", $textdomain ); ?></option>
					    	<option value="fade"<?php echo (get_post_meta( $object->ID, 'slider_mode', true )=='fade')?'selected':''; ?>><?php _e( "Fade", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-auto"><?php _e( "Auto Slideshow", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-auto"><?php _e( "Slides will automatically transition.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'slider_auto', true ))?'checked':''; ?> id="slider-auto" name="slider-auto" />
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="slider-pause"><?php _e( "Pause", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="slider-pause"><?php _e( "The amount of time (in ms) between each auto transition", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="widefat" id="slider-pause" name="slider-pause" type="text" value="<?php echo  esc_attr(get_post_meta( $object->ID, 'slider_pause', true )); ?>" size="5" /></p>
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_slider_page_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['slider_page_nonce'] ) || !wp_verify_nonce( $_POST['slider_page_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	    $new_meta_value = ( isset( $_POST['add-slider'] ) ?  $_POST['add-slider']  : '' );
	  	$meta_key = 'add_slider';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}

	  	$new_meta_value = ( isset( $_POST['gallery-images'] ) ?  $_POST['gallery-images']  : '' );
	  	$meta_key = 'gallery_images';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['slider-mode'] ) ?  $_POST['slider-mode']  : '' );
	  	$meta_key = 'slider_mode';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['slider-auto'] ) ?  $_POST['slider-auto']  : '' );
	  	$meta_key = 'slider_auto';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['slider-pause'] ) ?  $_POST['slider-pause']  : '' );
	  	$meta_key = 'slider_pause';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_work_page_meta_box( $object, $box ) { 
		$textdomain = 'milk';
		?>

	  	<?php wp_nonce_field( basename( __FILE__ ), 'work_page_nonce' ); ?>
	  		<div class="container">
		  		<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="work-categories"><?php _e( "Work Categories Cards", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="work-categories"><?php _e( "Show work categories cards instead of works cards on this page.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<input class="checkbox" type="checkbox" <?php echo (get_post_meta( $object->ID, 'work_categories', true ))?'checked':''; ?> id="work-categories" name="work-categories" />
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_work_page_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['work_page_nonce'] ) || !wp_verify_nonce( $_POST['work_page_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	    $new_meta_value = ( isset( $_POST['work-categories'] ) ?  $_POST['work-categories']  : '' );
	  	$meta_key = 'work_categories';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	function milk_categories_page_meta_box( $object, $box ) {
		$textdomain = 'milk';
	 	?>
	  	<?php wp_nonce_field( basename( __FILE__ ), 'categories_page_nonce' ); ?>
	  		<div class="container">
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="columns"><?php _e( "Number of columns", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="columns"><?php _e( "Select number of columns for this categories page.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="columns" name="columns">
					    	<option value="2"<?php echo (get_post_meta( $object->ID, 'columns', true )=='2')?'selected':''; ?>><?php _e( "2", $textdomain ); ?></option>
					    	<option value="3"<?php echo (get_post_meta( $object->ID, 'columns', true )=='3')?'selected':''; ?>><?php _e( "3", $textdomain ); ?></option>
					    	<option value="4"<?php echo (get_post_meta( $object->ID, 'columns', true )=='4')?'selected':''; ?>><?php _e( "4", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
				<div class="row">
		  			<p class="col-md-4 desc" >
		  				<label  for="animation"><?php _e( "Hover animation type", $textdomain ); ?></label>
		  				<br/>
		  				<label  for="animation"><?php _e( "Select hover animation type for category cards.", $textdomain ); ?></label>
		  			</p>
				    <div class="col-md-8">
						<select class="widefat" id="animation" name="animation">
					    	<option value="type1"<?php echo (get_post_meta( $object->ID, 'animation', true )=='type1')?'selected':''; ?>><?php _e( "Type 1", $textdomain ); ?></option>
					    	<option value="type2"<?php echo (get_post_meta( $object->ID, 'animation', true )=='type2')?'selected':''; ?>><?php _e( "Type 2", $textdomain ); ?></option>
					    	<option value="type3"<?php echo (get_post_meta( $object->ID, 'animation', true )=='type3')?'selected':''; ?>><?php _e( "Type 3", $textdomain ); ?></option>
					   	</select>
				   </div>
				</div>
			</div>
	<?php }

	function milk_save_categories_page_settings( $post_id, $post ) {
	  	if ( !isset( $_POST['categories_page_nonce'] ) || !wp_verify_nonce( $_POST['categories_page_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;
	  	$post_type = get_post_type_object( $post->post_type );

	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	$new_meta_value = ( isset( $_POST['columns'] ) ?  $_POST['columns']  : '' );
	  	$meta_key = 'columns';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	  	$new_meta_value = ( isset( $_POST['animation'] ) ?  $_POST['animation']  : '' );
	  	$meta_key = 'animation';
	  	$meta_value = get_post_meta( $post_id, $meta_key, true );
	  	
	  	if ( $new_meta_value && '' == $meta_value ){
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	    }
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value ){
	    	update_post_meta( $post_id, $meta_key, $new_meta_value );
	  	}elseif ( '' == $new_meta_value && $meta_value ){
	   		delete_post_meta( $post_id, $meta_key, $meta_value );
	  	}
	}

	add_action( 'load-post.php', 'milk_post_meta_boxes_setup' );
	add_action( 'load-post-new.php', 'milk_post_meta_boxes_setup' );

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Edit Post Page
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_admin_styles' ) ) :
		function milk_admin_styles(){
			wp_register_style( 'admin_style', URI . '/framework/admin.css');
		   	wp_enqueue_style('admin_style');
		}
	endif;
	add_action('admin_enqueue_scripts', 'milk_admin_styles');

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Edit Post Page
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_new_excerpt_length' ) ) :
		function milk_new_excerpt_length($length) {
			return 15;
		}
	endif;
	if ( ! function_exists( 'milk_new_excerpt_more' ) ) :
		function milk_new_excerpt_more($more) {
	       	global $post;
	       	$textdomain = 'milk';
			return '... <a class="moretag" href="'. get_permalink($post->ID) . '">' . __("Read more", $textdomain) .' <i class="fa fa-caret-right"></i></a>';
		}
	endif;
	add_filter('excerpt_more', 'milk_new_excerpt_more');
	add_filter('excerpt_length', 'milk_new_excerpt_length');

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Comments
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_comment_callback' ) ) :
		function milk_comment_callback($comment, $args, $depth) {
			$textdomain = 'milk';
			$GLOBALS['comment'] = $comment;?>
		
			<li class="comment" id="comment-<?php echo esc_attr($comment->comment_ID); ?>">
				<?php echo get_avatar( $comment, 60 );?>
				<div class="info">
					<h5><?php comment_author(); ?></h5>	
					<p class="date"><?php comment_date(); ?><?php comment_time(); ?>
						<span>
						<?php comment_reply_link( array_merge( $args, array( 
							 'reply_text' => __( 'Reply', $textdomain ),
							 'depth' => $depth,
							 'max_depth' => $args['max_depth'] 
							 ) ) ); ?></span>
					</p>
					<div class="comment_content">
						<p><?php comment_text(); ?></p>
					</div>
				</div>
	 	<?php 
		}
	endif;
	if ( ! function_exists( 'milk_add_comment_author_to_reply_link' ) ) :
		function milk_add_comment_author_to_reply_link($link, $args, $comment){
			$textdomain = 'milk';
		    $comment = get_comment( $comment );

		    if ( empty($comment->comment_author) ) {
		        if (!empty($comment->user_id)){
		            $user=get_userdata($comment->user_id);
		            $author=$user->user_login;
		        } else {
		            $author = __('Anonymous', $textdomain);
		        }
		    } else {
		        $author = $comment->comment_author;
		    }
		 
		    if(strpos($author, ' ')){
		        $author = substr($author, 0, strpos($author, ' '));
		    }
		 
		    $reply_link_text = $args['reply_text'];
		    $link = str_replace($reply_link_text, __('Reply to ',$textdomain) . $author, $link);
		 
		    return $link;
		}
	endif;
	add_filter('comment_reply_link', 'milk_add_comment_author_to_reply_link', 10, 3);

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Comment Form
	/*
	/*-----------------------------------------------------------------------------------*/

	add_filter( 'comment_form_default_fields', 'milk_comment_form_fields' );
	if ( ! function_exists( 'milk_comment_form_fields' ) ) :
		function milk_comment_form_fields( $fields ) {
			$textdomain = 'milk';
		    $commenter = wp_get_current_commenter();
		    
		    $req      = get_option( 'require_name_email' );
		    $aria_req = ( $req ? " aria-required='true'" : '' );
		    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
		    
		    $fields   =  array(
		        'author' => '<div class="row"><div class="col-md-7 col-sm-12">
						    		<input type="text" id="author" name="author" class="form-control" placeholder="' . __( 'Name', $textdomain ) . ( $req ? '*' : '' ) . '"value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
						    	</div></div>',
				'email' => '<div class="row"><div class="col-md-7 col-sm-12">
						    		<input type="text" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' class="form-control" placeholder="' . __( 'Email', $textdomain ) . ( $req ? '*' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
						    	</div></div>',
				'url'    => ''
		        //'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
		        //            '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',

			);
		    return $fields;
		}
	endif;

	add_filter( 'comment_form_defaults', 'milk_comment_form_textarea' );
	if ( ! function_exists( 'milk_comment_form_textarea' ) ) :
		function milk_comment_form_textarea( $args ) {
			$textdomain = 'milk';
		    $args['comment_field'] = '<textarea class="form-control" id="comment" name="comment" placeholder="' . _x( 'Comment', 'noun', $textdomain ) . '*" rows="10" aria-required="true"></textarea>';
		    return $args;
		}
	endif;
	add_action('comment_form', 'milk_comment_button' );
	if ( ! function_exists( 'milk_comment_button' ) ) :
		function milk_comment_button() {
			$textdomain = 'milk';
		    echo '<button type="submit" class="btn btn-default">' . __( 'Submit', $textdomain ) . '</button>';
		}
	endif;

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Favicon Settings
	/*
	/*-----------------------------------------------------------------------------------*/

	$milk_add_favicon_general_setting = new milk_add_favicon_general_setting();

	class milk_add_favicon_general_setting {
		
	    function milk_add_favicon_general_setting( ) {
	        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
	    }
	    function register_fields() {
	    	$textdomain = 'milk';
	        register_setting( 'general', 'favicon', 'esc_attr' );
	        register_setting( 'general', 'loader', 'esc_attr' );
	        add_settings_field('fav', '<label>'.__('Upload favicon' , $textdomain ).'</label>' , array(&$this, 'fields_html') , 'general' );
	        add_settings_field('loader', '<label>'.__('Show loader on all pages' , $textdomain ).'</label>' , array(&$this, 'milk_loader_fields_html') , 'general' );
	    }
	    function fields_html() {
	    	$textdomain = 'milk';
	        $value = get_option( 'favicon', '' );

	        echo '<input class="post_meta_image_upload button button-primary" 
						type="button" 
						data-uploader_button_text="' . __("Select", $textdomain) . '"'. 
						'value="' . __("Select image", $textdomain) . '"">';
			echo '<input id="favicon"
						name="favicon"
						class="img_urls" 
						type="text"
						style="display:none"
						value="' . $value . '">';
						
			echo '<img class="favicon" src="' . $value . '" alt="favicon">';
	    }

	    function milk_loader_fields_html() {
	    	$textdomain = 'milk';
	        $value = get_option( 'loader', '' );
	        if ($value == true) {
	        	echo '<input class="checkbox" type="checkbox" checked id="loader" name="loader" />';
	        }else{
	        	echo '<input class="checkbox" type="checkbox" id="loader" name="loader" />';
	        }
			
					
	    }
	}

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Custom Taxonomies
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_add_custom_taxonomies' ) ) :
		function milk_add_custom_taxonomies() {
		  register_taxonomy('work-categorie', 'work', array(
		    'hierarchical' => true,
		    'labels' => array(
		      'name' => _x( 'Work Categories', 'taxonomy general name', 'milk' ),
		      'singular_name' => _x( 'Work Category', 'taxonomy singular name', 'milk' ),
		      'search_items' =>  __( 'Search Work Categories', 'milk' ),
		      'all_items' => __( 'All Work Categories', 'milk' ),
		      'parent_item' => __( 'Parent Work Category', 'milk' ),
		      'parent_item_colon' => __( 'Parent Work Category:', 'milk' ),
		      'edit_item' => __( 'Edit Work Category', 'milk' ),
		      'update_item' => __( 'Update Work Category', 'milk' ),
		      'add_new_item' => __( 'Add New Work Category', 'milk' ),
		      'new_item_name' => __( 'New Work Category Name', 'milk' ),
		      'menu_name' => __( 'Work Categories', 'milk' ),
		    ),
		    'rewrite' => array(
		      'slug' => 'work-categorie', 
		      'with_front' => false, 
		      'hierarchical' => true 
		    ),
		  ));
		}
	endif;
	add_action( 'init', 'milk_add_custom_taxonomies', 0 );

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Tag Request
	/*
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'milk_any_ptype_on_tag' ) ) :
		function milk_any_ptype_on_tag($request) {
			if ( isset($request['tag']) )
				$request['post_type'] = 'any';

			return $request;
		}
	endif;
	add_filter('request', 'milk_any_ptype_on_tag');

	/*-----------------------------------------------------------------------------------*/
	/*
	/*  Define Work Categorie Meta
	/*
	/*-----------------------------------------------------------------------------------*/


	function work_category_add_new_meta_field() {
		$textdomain = 'milk';
		?>
	  		<div class="row">
	  			<p class="col-md-6 desc" >
	  				<label  for="term_meta[featured_img]"><?php _e( "Featured Image", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[featured_img]"><?php _e( "If you choose to show work categories on work page instead of works, you need to upload featured image for category", $textdomain ); ?></label>
	  			</p>
			    
				<div class="col-md-6">
					<input 	class="post_meta_image_upload button button-primary" 
						name="image_btn" 
						type="button" 
						data-uploader_title=<?php _e( "Choose image", $textdomain ); ?>
						data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
						value=<?php _e(  "Select images", $textdomain ); ?>/>
					<input id="term_meta[featured_img]"
						name="term_meta[featured_img]"
						class="img_url" 
						type="text"
						style="display:none"
						value=""/>
				</div>
			</div>
			<div class="row">
			  	<p class="col-md-6 desc" >
	  				<label  for="term_meta[work_color]"><?php _e( "Acent Color", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[work_color]"><?php _e( "If you choose to show work categories on work page instead of works, you need to select accent color for work categorie preview", $textdomain ); ?></label>
	  			</p>
	  			<div class="col-md-6">
		  			<input  name="term_meta[work_color]" 
				    		type="text" 
				    		class="colorPicker"
				    		id="term_meta[work_color]" 
				    		value=""
				    		data-default-color="#49b4ff">
				</div>
			</div>
	<?php }
	add_action( 'work-categorie_add_form_fields', 'work_category_add_new_meta_field', 10, 2 );


	function work_category_edit_meta_field($term) {
		$textdomain = 'milk';
		$t_id = $term->term_id;
	 
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<?php $l = $term_meta['featured_img']; ?>
		<div class="row">
	  			<p class="col-md-6 desc" >
	  				<label  for="term_meta[featured_img]"><?php _e( "Featured Image", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[featured_img]"><?php _e( "If you choose to show work categories on work page instead of works, you need to upload featured image for category", $textdomain ); ?></label>
	  			</p>
			    
				<div class="col-md-6">
					<input 	class="post_meta_image_upload button button-primary" 
						name="image_btn" 
						type="button" 
						data-uploader_title=<?php _e( "Choose image", $textdomain ); ?>
						data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
						value=<?php _e(  "Select images", $textdomain ); ?>/>
					<input id="term_meta[featured_img]"
						name="term_meta[featured_img]"
						class="img_url" 
						type="text"
						style="display:none"
						value="<?php echo esc_attr( $term_meta['featured_img'] ) ? esc_attr( $term_meta['featured_img'] ) : ''; ?>"/>
				</div>
			</div>
			<div class="row">
			  	<p class="col-md-6 desc" >
	  				<label  for="term_meta[work_color]"><?php _e( "Acent Color", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[work_color]"><?php _e( "If you choose to show work categories on work page instead of works, you need to select accent color for work categorie preview", $textdomain ); ?></label>
	  			</p>
	  			<div class="col-md-6">
		  			<input  name="term_meta[work_color]" 
		  					class="colorPicker"
				    		type="text" 
				    		id="term_meta[work_color]" 
				    		value="<?php echo esc_attr( $term_meta['work_color'] ) ? esc_attr( $term_meta['work_color'] ) : ''; ?>"
				    		data-default-color="#49b4ff">
				</div>
			</div>
	<?php
	}
	add_action( 'work-categorie_edit_form_fields', 'work_category_edit_meta_field', 10, 2 );

	function save_taxonomy_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
					
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );

		}
	}  
	add_action( 'edited_work-categorie', 'save_taxonomy_custom_meta', 10, 2 );  
	add_action( 'create_work-categorie', 'save_taxonomy_custom_meta', 10, 2 );

	function post_category_add_new_meta_field() {
		$textdomain = 'milk';
		?>
	  		<div class="row">
	  			<p class="col-md-6 desc" >
	  				<label  for="term_meta[featured_img]"><?php _e( "Featured Image", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[featured_img]"><?php _e( "You need to upload featured image for category if you want to create categories page with card style.", $textdomain ); ?></label>
	  			</p>
			    
				<div class="col-md-6">
					<input 	class="post_meta_image_upload button button-primary" 
						name="image_btn" 
						type="button" 
						data-uploader_title=<?php _e( "Choose image", $textdomain ); ?>
						data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
						value=<?php _e(  "Select images", $textdomain ); ?>/>
					<input id="term_meta[featured_img]"
						name="term_meta[featured_img]"
						class="img_url" 
						type="text"
						style="display:none"
						value=""/>
				</div>
			</div>
			<div class="row">
			  	<p class="col-md-6 desc" >
	  				<label  for="term_meta[work_color]"><?php _e( "Acent Color", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[work_color]"><?php _e( "You need to select accent color for work categorie preview if you want to create categories page with card style.", $textdomain ); ?></label>
	  			</p>
	  			<div class="col-md-6">
		  			<input  name="term_meta[work_color]" 
				    		type="text" 
				    		class="colorPicker"
				    		id="term_meta[work_color]" 
				    		value=""
				    		data-default-color="#49b4ff">
				</div>
			</div>
	<?php }
	add_action( 'category_add_form_fields', 'post_category_add_new_meta_field', 10, 2 );


	function post_category_edit_meta_field($term) {
		$textdomain = 'milk';
		$t_id = $term->term_id;
	 
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<?php $l = $term_meta['featured_img']; ?>
		<div class="row">
	  			<p class="col-md-6 desc" >
	  				<label  for="term_meta[featured_img]"><?php _e( "Featured Image", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[featured_img]"><?php _e( "You need to upload featured image for category if you want to create categories page with card style.", $textdomain ); ?></label>
	  			</p>
			    
				<div class="col-md-6">
					<input 	class="post_meta_image_upload button button-primary" 
						name="image_btn" 
						type="button" 
						data-uploader_title=<?php _e( "Choose image", $textdomain ); ?>
						data-uploader_button_text=<?php _e( "Select" , $textdomain ); ?>
						value=<?php _e(  "Select images", $textdomain ); ?>/>
					<input id="term_meta[featured_img]"
						name="term_meta[featured_img]"
						class="img_url" 
						type="text"
						style="display:none"
						value="<?php echo esc_attr( $term_meta['featured_img'] ) ? esc_attr( $term_meta['featured_img'] ) : ''; ?>"/>
				</div>
			</div>
			<div class="row">
			  	<p class="col-md-6 desc" >
	  				<label  for="term_meta[work_color]"><?php _e( "Acent Color", $textdomain ); ?></label>
	  				<br/>
	  				<label  for="term_meta[work_color]"><?php _e( "You need to select accent color for work categorie preview if you want to create categories page with card style.", $textdomain ); ?></label>
	  			</p>
	  			<div class="col-md-6">
		  			<input  name="term_meta[work_color]" 
		  					class="colorPicker"
				    		type="text" 
				    		id="term_meta[work_color]" 
				    		value="<?php echo esc_attr( $term_meta['work_color'] ) ? esc_attr( $term_meta['work_color'] ) : ''; ?>"
				    		data-default-color="#49b4ff">
				</div>
			</div>
	<?php
	}
	add_action( 'category_edit_form_fields', 'post_category_edit_meta_field', 10, 2 );

	function save_category_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
					
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );

		}
	}  
	add_action( 'edited_category', 'save_category_custom_meta', 10, 2 );  
	add_action( 'create_category', 'save_category_custom_meta', 10, 2 );

	/*后台-设置-讨论中可以为评论用户指定默认头像*/
	add_filter('avatar_defaults', 'newgravatar');

	function newgravatar($defaults) {
		$myavatar = get_bloginfo('template_directory') . "/img/default-avatar.jpg";
		$avatar_defaults[$myavatar] = "avatar";
		return $avatar_defaults;
	}

	function get_ssl_avatar($avatar) {
		//$avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2&d=mm" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
		$avatar = '<img src="' . URI . '/img/default-avatar.jpg" alt="avatar" />';
		return $avatar;
	}
	add_filter('get_avatar', 'get_ssl_avatar');

	/*解决上传文件名包含中文的问题*/
	function yungjen_handle_upload_files($file) {
		$time = date('Y-m-d');
		$file['name'] = $time . "_" . time() . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
		return $file;
	}
	add_filter('wp_handle_upload_prefilter', 'yungjen_handle_upload_files');
?>