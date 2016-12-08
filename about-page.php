<?php get_header(); 
/*
	Template Name: About Page
*/
?>
<?php get_template_part( 'slider', 'template' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!--MAIN SECTION-->
<div class="main contact-page">
	<div class="row">

		<?php get_template_part( 'left_sidebar', 'template' ); ?>

			<?php 
				$adress = get_post_meta( get_the_ID(), 'contact_form_map', true ); 
				if ($adress != '') { ?>
					<div class="map" id="map_<?php echo get_the_ID(); ?>" data-address="<?php echo esc_attr($adress); ?>"></div>
			<?php } ?>
			<div class="content">
				<h3><?php the_title() ?></h3>
				<?php the_content(); ?>
				
				<!--CONTACT FORM-->
				<form method="get" id="contact" name="contact" accept-charset="UTF-8">
					<div class="row">
						<div class="col-md-6 col-sm-12">
					      	<input type="text" class="form-control" name="name" id="name" placeholder="<?php _e('Name*','milk'); ?>" required>
					    </div>
					    <div class="col-md-6 col-sm-12">
					      	<input type="email"  class="form-control" name="email" id="email" placeholder="<?php _e('Email*','milk'); ?>" required>
					    </div>
				    </div>
				    <div class="row">
					    <div class="col-md-12 col-sm-12">
					      	<input type="text" class="form-control" name="subject" id="subject" placeholder="<?php _e('Subject*','milk'); ?>" required>
					    </div>
					</div>
					<input style="display:none" class="form-control" name="to" id="to" value="<?php echo esc_attr(get_post_meta( get_the_ID(), 'contact_form_email', true )) ?>">
					<textarea class="form-control" name="message" id="message" required placeholder="<?php _e('Message*','milk'); ?>" rows="10"></textarea>
		    		
		    		<button class="btn btn-default" id="submit" type="submit" name="submit" value="Submit"><i class="fa fa-envelope-o"></i><?php _e('Send Message','milk'); ?></button>

		    		<div class="alert alert-danger">
					  	<button type="button" class="close" data-dismiss="alert">&times;</button>
					  	<strong><?php _e('Oh snap! ','milk'); ?></strong><?php _e('Change a few things up and try submitting again.','milk');?>
					</div>

					<div class="alert alert-success">
					  	<button type="button" class="close" data-dismiss="alert">&times;</button>
					  	<strong><?php _e('Well done! ','milk'); ?></strong><?php _e('Your message was sent succssfully!','milk'); ?>
					</div>
		    	</form>
		    	<!--END CONTACT FORM-->
			</div>
		</div>
		
		<?php get_template_part( 'right_sidebar', 'template' ); ?>
	</div>
</div>
<!--END MAIN SECTION-->
<?php endwhile; else: ?>

	<p>There are no posts.</p>

<?php endif; ?>

 <?php 	get_footer(); ?>
