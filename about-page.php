<?php get_header(); 
/*
	Template Name: Hi Page
*/
?>
<?php get_template_part( 'slider', 'template' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!--MAIN SECTION-->
<div class="main yj-hi-page">
	<div class="row">
		<div class="content col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
			<div class="image-wrapper">
				<?php the_post_thumbnail();?>
			</div>
			<h3><?php the_title() ?></h3>
			<?php the_content(); ?>
		</div>
	</div>
</div>
<!--END MAIN SECTION-->
<?php endwhile; else: ?>
	<p>About page has no content.</p>
<?php endif; ?>

<?php get_footer(); ?>
