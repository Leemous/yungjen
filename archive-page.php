<?php 
/*
Template Name: Archives
*/

	get_header(); 
	$textdomain = 'milk';
?>
<?php get_template_part( 'slider', 'template' ); ?>
<div class="main archive-page">
	<div class="container">
		<div class="row">

		<?php 

			get_template_part( 'left_sidebar', 'template' ); ?>

				<!--CONTENT-->
				<div class="content">
					<?php the_content(); ?>
					<h3><?php _e('Last 10 posts', $textdomain); ?></h3>
					<ul class="archive">
						<?php $res = wp_get_archives( array( 
												'type' => 'postbypost', 
												'limit' => 10,
												'echo' =>false ) ); 
							$links = explode('<li>', trim($res));
							foreach ($links as $link) {
								if(!empty($link)){
									$pos = strrpos($link,"'>");
									if($pos == 0) $pos = strrpos($link,'">');
									$pos = $pos + 2;
									$newstr = substr_replace($link,'<i class="fa fa-chevron-right"></i>', $pos, 0);
									echo '<li>'.balanceTags($newstr);
								}
							}
						?>	
					</ul>
					<h3><?php _e('Archives by month', $textdomain); ?></h3>
					<ul class="archive">
						<?php $res =  wp_get_archives(array( 
												'type' => 'monthly',
												'echo' =>false ) );
							$links = explode('<li>', trim($res));
							foreach ($links as $link) {
								if(!empty($link)){
									$pos = strrpos($link,"'>");
									if($pos == 0) $pos = strrpos($link,'">');
									$pos = $pos + 2;
									$newstr = substr_replace($link,'<i class="fa fa-chevron-right"></i>', $pos, 0);
									echo '<li>'.balanceTags($newstr);
								}
							}
						?>	
					</ul>
					<h3><?php _e('Archives by format', $textdomain); ?></h3>
					<ul class="archive">
						<?php if ( current_theme_supports( 'post-formats' ) ) {
						    $post_formats = get_theme_support( 'post-formats' );
							
						    foreach ($post_formats[0] as $format) { ?>
						    	<li><a href="<?php echo esc_url( home_url() ) . '/type/' . $format .'/' ?>"><i class="fa fa-chevron-right"></i><?php echo esc_attr(ucfirst($format)); ?></a></li>
						    <?php }
						} ?>
						
					</ul>
				</div>
			</div>

			<?php get_template_part( 'right_sidebar', 'template' ); ?>
		
		</div>
	</div>
</div>
<?php get_footer(); ?>