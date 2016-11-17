<?php 
/*
Template Name: Categories Page
*/
	get_header(); 
	$textdomain = 'milk';
	global $wp_query;
	$page_id = $wp_query->get_queried_object_id();
?>
<?php get_template_part( 'slider', 'template' ); ?>
<div class="main categories-page page_<?php echo get_the_id(); ?>">
	<div class="container">
		<div class="row">
			<!--CONTENT GRID-->
			<?php get_template_part( 'left_sidebar', 'template' ); ?>
				<div class="gallery"  id="masonry">
					<?php 
						$categories = get_terms('category');
						if ($categories) {
							$home_cols = get_post_meta( $page_id, 'columns', true );
						}
						?>
					<?php 
						$animation = get_post_meta( $page_id, 'animation', true ); 
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
											<div class="button"><i class="fa fa-eye"></i><?php _e('View',$textdomain); ?></div>
										</figcaption>
									</figure>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php get_template_part( 'right_sidebar', 'template' ); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>