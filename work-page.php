<?php get_header();
/*
	Template Name: Works Page
*/
?>
<?php 
	global $wp_query;
	$page_id = $wp_query->get_queried_object_id();

	$add_slider = get_post_meta( $page_id, 'add_slider', true );
	$work_categories = get_post_meta( $page_id, 'work_categories', true );
	$always_filters = get_theme_mod('always_filters');
	get_template_part( 'slider', 'template' );
?>

<?php 
	$args = array(
		'post_type' => 'work',
		'post_status' => 'publish'
	);
	$wp_query = new WP_Query( $args );
	
?>
<div class="gallery"  id="masonry">
	<?php if ($work_categories == true) { 
		$categories = get_terms('work-categorie');
		if ($categories) {
			$view_text = get_theme_mod('work_button_text');
			$home_cols = get_theme_mod( 'home_col_num' );
		?>
		<?php 
			$animation = get_theme_mod( 'works_animation' ); 
			switch ($animation) {
				case 'type1':
					$pathTo = "m 180,64 -180,0 L 0,0 180,0 z";
					$pathD = "M 180,160 0,218 0,0 180,0 z";
					break;
				case 'type2':			
					$pathTo = "m 0,0 0,87.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z";
					$pathD = "m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z";
					break;
				case 'type3':
					$pathTo = "M 0,0 0,60 90,80 180.5,60 180,0 z";
					$pathD = "M 0 0 L 0 200 L 90 160 L 180 200 L 180 0 L 0 0 z ";
					break;	
				default:	
					$pathTo = "m 0,0 0,87.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z";
					$pathD = "m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z";
			}
		?>
		<div class="container">
			<div class="row">
				<ul class="grid">
				<?php foreach ($categories as $category) { ?>
					<?php 
						$t_id = $category->term_id;
						$term_meta = get_option( "taxonomy_$t_id" );
						$img = $term_meta['featured_img'];
						$color = $term_meta['work_color'];
					 ?>
					<?php 
						switch ($home_cols) {
						    case 4: ?>
						       	<li class="col-md-3 col-sm-6">
						        <?php break;
						    case 3: ?>
						       	<li class="col-md-4 col-sm-6">
						        <?php break;
						    case 2: ?>
						       	<li class="col-md-6 col-sm-6">
						        <?php break;
						} 
					 ?>
						<a class="work" data-type="<?php echo esc_attr($animation); ?>" href="<?php echo get_term_link( $category ); ?>" data-path-to="<?php echo $pathTo; ?>">
							<figure>
								<?php 
									if ( $img ) { ?>
										<img src="<?php echo esc_url($img); ?> " alt="<?php echo esc_attr($category->name); ?> ">
									<?php }else{ ?>
										<div class="no-thumbnail"></div>
									<?php } ?>
								<svg preserveAspectRatio="none"><path d="<?php echo $pathD; ?>"/></svg>
								<figcaption>
									<h3><?php echo esc_attr($category->name); ?></h3>
									<div class="divider" style="background-color: <?php echo esc_attr($color); ?>"></div>
									<p><?php echo wp_kses_post($category->description); ?></p>
									<div class="button"><i class="fa fa-eye"></i><?php echo esc_attr($view_text); ?></div>
								</figcaption>
							</figure>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<?php }
	}else{
		if ( get_theme_mod('add_filters') == true) { ?>
			<div class="filter-section">
				<?php if ($add_slider && !$always_filters) { ?>
					<a href="" id="menu-button"><i class="fa fa-bars"></i></a>	
				<?php } ?>
				<!--FILTERS-->
				<nav class="filters <?php if ($always_filters) {
					echo 'always_show';
				} ?>">
					<div class="container">
						<ul class="list-inline">
							<?php $filters = get_terms('work-categorie');
							
							if ($filters) {
								$i = 1;
								foreach ($filters as $filter) {
									if ($i==1) {?>
										<li data-filter="<?php echo esc_attr($filter->slug); ?>"><?php echo esc_attr($filter->name); ?>	</li
									<?php }else{ ?>
										><li data-filter="<?php echo esc_attr($filter->slug); ?>"><?php echo esc_attr($filter->name); ?></li
									<?php }
									$i++; 
								}
							}
							?>
							><li data-filter="all"><?php _e('All','milk') ?></li>
						</ul>
					</div>
				</nav>
				<!--END FILTERS-->
			</div>
		<?php } ?>
		<div class="container">
			<div class="row">
				<ul class="grid">
					
				</ul>
			</div>
			<div class="row">
				<button id="load-more" class="btn btn-default" data-pages="<?php echo esc_attr($wp_query->max_num_pages); ?>" data-url="<?php echo esc_url(site_url()) ?>"><i class="fa fa-cloud-download"></i><?php _e('Load more','milk') ?></button>
				<a href="#top" id="to-top" class="btn btn-default"><i class="fa fa-angle-up"></i><?php _e('Go to top','milk') ?></a>
			</div>	
		</div>
		<?php } ?>
</div>

 <?php 	get_footer(); ?>