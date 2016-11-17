<?php get_header(); ?>
<?php get_template_part( 'slider', 'template' ); ?>
<div class="main default-page page_<?php echo get_the_id(); ?>">
	<div class="container">
		<div class="row">
			<!--CONTENT GRID-->
			<?php get_template_part( 'left_sidebar', 'template' ); ?>
			
				<div class="post">
					<div class="content">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<h3><?php echo get_the_title(); ?></h3>
						<div class="row">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				
				<?php 
					$num = get_comments_number(); 
					if ($num > 0) { ?>
					<div class="comments" id="comments">
						<h3><?php comments_number(); ?></h3>
						<?php comments_template( '/comments.php'); ?>
					 </div>
				<?php } ?>
					
					<?php endwhile; else: ?>

						<p>There are no posts.</p>

					<?php endif; ?>
			</div>
			<?php get_template_part( 'right_sidebar', 'template' ); ?>
		</div>
	</div>
</div>

 <?php 	get_footer(); ?>