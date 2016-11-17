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
						<?php
						$author = '';
						if(is_author()) {
							$id = get_query_var('author');
							$author = get_userdata( $id );
							} ?>

						<h3><?php 
							if (is_category()) {
								__('All posts in ', 'milk');echo '<span>';echo single_cat_title('',false);echo '</span>';

							} elseif (is_tag()) {
								__('All posts tagged %s', 'milk');echo '<span>';echo single_tag_title('',false);echo '</span>';

							} elseif (is_day()) {
								_e('Archive for ', 'milk');echo '<span>'; the_time('F jS, Y');echo '</span>';

							} elseif (is_month()) { 
								_e('Archive for ', 'milk');echo '<span>'; the_time('F, Y');echo '</span>';

							} elseif (is_year()) { 
								_e('Archive for ', 'milk');echo '<span>'; the_time('Y');echo '</span>';

							} elseif (is_author()) { 
								_e('All posts by ', 'milk');echo '<span>'; echo esc_attr($author->display_name);echo '</span>';

							} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { 
								__('All items in %s', 'milk');echo '<span>';echo single_cat_title('',false); echo '</span>';
							}else{
								__('All posts in %s', 'milk');echo '<span>';echo  get_post_format();echo '</span>';
							}
						?></h3>
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

<?php get_footer(); ?>