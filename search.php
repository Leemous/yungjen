<?php get_header(); ?>
<!--MAIN SECTION-->
	<div class="main archive-result">
		<div class="container">
			<div class="row">
			<!--CONTENT GRID-->
				<?php 
					$search_layout = get_theme_mod( 'search_layout' );
					$search_sidebar = get_theme_mod( 'search_sidebar' );
					switch ($search_layout) {
						case 'left': ?>
							<div class="col-md-3 col-sm-4">
								<aside>
									<?php if ( is_active_sidebar( $search_sidebar ) ) : ?>	
											<?php dynamic_sidebar( $search_sidebar ); ?>
									<?php endif; ?>
								</aside>
							</div>
							<div class="posts col-md-9 col-sm-8">
							<?php break;
						case 'right': ?>
							<div class="posts col-md-9 col-sm-8">
							<?php break;
						case '12': ?>
							<div class="col-md-3 col-sm-4" style="display:none;">
								<aside>
									<?php if ( is_active_sidebar( $search_sidebar ) ) : ?>	
											<?php dynamic_sidebar( $search_sidebar ); ?>
									<?php endif; ?>
								</aside>
							</div>
							<div class="posts col-md-12 col-sm-12">
							<?php break;
						case '10': ?>
							<div class="col-md-3 col-sm-4" style="display:none;">
								<aside>
									<?php if ( is_active_sidebar( $search_sidebar ) ) : ?>	
											<?php dynamic_sidebar( $search_sidebar ); ?>
									<?php endif; ?>
								</aside>
							</div>
							<div class="posts col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
							<?php break;
						case '8': ?>
							<div class="col-md-3 col-sm-4" style="display:none;">
								<aside>
									<?php if ( is_active_sidebar( $search_sidebar ) ) : ?>	
											<?php dynamic_sidebar( $search_sidebar ); ?>
									<?php endif; ?>
								</aside>
							</div>
							<div class="posts col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
							<?php break;
						case '6': ?>
							<div class="col-md-3 col-sm-4" style="display:none;">
								<aside>
									<?php if ( is_active_sidebar( $search_sidebar ) ) : ?>	
											<?php dynamic_sidebar( $search_sidebar ); ?>
									<?php endif; ?>
								</aside>
							</div>
							<div class="posts col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
							<?php break;

				} ?>
					<div class="content">
						<h3><?php _e('Search results for', 'milk'); ?> <span><?php echo the_search_query(); ?></span></h3>
					</div>
					<!--CONTENT GRID-->
					<div id="masonry">
						<div class="row">
							<ul class="grid">

								<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

								get_template_part( 'search', 'template' );

								endwhile; else: ?>

									<p>There are no posts.</p>

								<?php endif; ?>

							</ul>
						</div>
						<div class="row">
							<?php echo paginate_links(array(
								'prev_text'    => __('<', $textdomain),
								'next_text'    => __('>', $textdomain),
							) ); ?>
						</div>
					</div>
				</div>
				<?php  
					if ($search_layout == 'right') { ?>
						<div class="col-md-3 col-sm-4">
							<aside>
								<?php if ( is_active_sidebar( $search_sidebar ) ) : ?>	
										<?php dynamic_sidebar( $search_sidebar ); ?>
								<?php endif; ?>
							</aside>
						</div>
				<?php }	?>
			</div>
		</div>
	</div>

	 <?php 	get_footer(); ?>