<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title>The Blog Of Yungjen</title>
	<link href="<?php echo esc_url(get_option( 'favicon', '' )) ?>" rel="icon" type="image/png" />
	<link rel="shortcut icon" href="<?php echo esc_url(get_option( 'favicon', '' )) ?>" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="sidenav">
		<div class="logo">
			<p class="yj-photo">
				<span class="photo-wrap">
					<a href="<?php echo esc_url( home_url() ); ?>">
						<img class="photo"
							src="<?php echo esc_url(get_theme_mod( 'upload_logo' )) ?>"
							srcset="<?php echo esc_url(get_theme_mod( 'upload_logo' )) . ' 1x ,' . esc_url(get_theme_mod( 'upload_logo2x' )) . ' 2x' ?>"
							alt="<?php echo bloginfo('name') ?>">	
					</a>
				</span>
			</p>
			<h1><?php bloginfo('blogname') ?></h1>
			<p class="tagline"><?php bloginfo('description') ?></p>
		</div>
		<!--MENU-->
		<a href="" id="responsive-menu-button"><i class="fa fa-bars"></i></a>
		<nav class="menu">
			<?php 					
				$args = array(
					'theme_location' => 'header',
					'menu_class' => 'list-inline'
				);
				wp_nav_menu( $args );
			?>
		</nav>
		<!--END MENU-->
		<?php if (get_theme_mod( 'show_welcome' )) { ?>
			<p class='welcome'><?php echo esc_attr(get_theme_mod('welcome_text')) ?></p>				
		<?php } ?>
		<?php 
			global $wp_query;
			$page_id = $wp_query->get_queried_object_id();
			$add_slider = get_post_meta( $page_id, 'add_slider', true );
		?>
		<?php if (get_theme_mod( 'add_filters' )==true && get_theme_mod( 'always_filters' )==false &&
					((get_page_template_slug( $page_id )=="work-page.php" && !$add_slider) || is_tax('work-categorie') ))  { ?>
			<a href="" id="menu-button"><i class="fa fa-bars"></i></a>	
		<?php } ?>
		
		<div class="yj-custom-link">
			<ul class="yj-custom-link">
				<li>
					<a href="https://dribbble.com/yungjen" title="dribbble" target="_blank">
						<i class="fa fa-dribbble"></i>
						<span>Dribble</span>
					</a>
				</li>
				<li>
					<a href="mailto:hi@yungjen.com" title="email">
						<i class="fa fa-envelope-o"></i>
						<span>Email</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<?php if (get_option( 'loader', '' ) || get_page_template_slug( $page_id )=="work-page.php") {?>
		<div id="loader">
			<img src="<?php echo esc_url(URI) ?>/img/Preloader.gif" alt="">
		</div>
	<?php } ?>




