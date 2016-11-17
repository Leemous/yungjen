<?php get_header(); ?>
<?php get_template_part( 'slider', 'template' ); ?>
<div class="main blog-page">
	<div class="container">
		<div class="row">
			<!--CONTENT GRID-->

			<?php 
				$blog_layout = get_theme_mod( 'blog_layout' );
				$blog_sidebar = get_theme_mod( 'blog_sidebar' );
				switch ($blog_layout) {
					case 'left': ?>
						<div class="col-md-3 col-sm-4">
							<aside>
								<?php if ( is_active_sidebar( $blog_sidebar ) ) : ?>	
										<?php dynamic_sidebar( $blog_sidebar ); ?>
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
								<?php if ( is_active_sidebar( $blog_sidebar ) ) : ?>	
										<?php dynamic_sidebar( $blog_sidebar ); ?>
								<?php endif; ?>
							</aside>
						</div>
						<div class="posts col-md-12 col-sm-12">
						<?php break;
					case '10': ?>
						<div class="col-md-3 col-sm-4" style="display:none;">
							<aside>
								<?php if ( is_active_sidebar( $blog_sidebar ) ) : ?>	
										<?php dynamic_sidebar( $blog_sidebar ); ?>
								<?php endif; ?>
							</aside>
						</div>
						<div class="posts col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
						<?php break;
					case '8': ?>
						<div class="col-md-3 col-sm-4" style="display:none;">
							<aside>
								<?php if ( is_active_sidebar( $blog_sidebar ) ) : ?>	
										<?php dynamic_sidebar( $blog_sidebar ); ?>
								<?php endif; ?>
							</aside>
						</div>
						<div class="posts col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
						<?php break;
					case '6': ?>
						<div class="col-md-3 col-sm-4" style="display:none;">
							<aside>
								<?php if ( is_active_sidebar( $blog_sidebar ) ) : ?>	
										<?php dynamic_sidebar( $blog_sidebar ); ?>
								<?php endif; ?>
							</aside>
						</div>
						<div class="posts col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
						<?php break;

			} ?>
			
			<?php if (get_theme_mod('blog_pagination')=='default') { ?>
				<?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
					  	'paged' => $paged,
					  	'post_type' => 'post',
						'post_status' => 'publish'
					);

					$wp_query = new WP_Query( $args );
				?>
				<div class="row" id="masonry"> 
					<ul class="grid">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

							get_template_part( 'blog', 'template' );

						endwhile; else: ?>

							<p>There are no posts.</p>

						<?php endif; ?>
					</ul>
				</div>
				<div class="row">
				<?php milk_blog_pagination(); ?>
				</div>
			<?php }else{ ?>
				<div class="row" id="masonry"> 
					<ul class="grid">
					</ul>
				</div>
				<div class="row">
					<button id="load-more" class="btn btn-default" data-pages="<?php echo esc_attr($wp_query->max_num_pages); ?>" data-url="<?php echo esc_url(site_url()) ?>"><i class="fa fa-cloud-download"></i><?php _e('Load more','milk') ?></button>
					<a href="#top" id="to-top" class="btn btn-default"><i class="fa fa-angle-up"></i><?php _e('Go to top','milk') ?></a>
				</div>		
			<?php } ?>
				
		</div>
		<?php  
		if ($blog_layout == 'right') { ?>
			<div class="col-md-3 col-sm-4">
				<aside>
					<?php if ( is_active_sidebar( $blog_sidebar ) ) : ?>	
							<?php dynamic_sidebar( $blog_sidebar ); ?>
					<?php endif; ?>
				</aside>
			</div>
		<?php }	?>
			
		</div>
	</div>
</div>

 <?php 	get_footer(); ?>