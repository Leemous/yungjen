<?php 
	global $wp_query;
	$page_id = $wp_query->get_queried_object_id();

	
	$add_slider = get_post_meta( $page_id, 'add_slider', true ); 
	$gallery_images = get_post_meta( $page_id, 'gallery_images', true ); 
	$slider_mode = get_post_meta( $page_id, 'slider_mode', true ); 
	$slider_auto = get_post_meta( $page_id, 'slider_auto', true ); 
	$slider_pause = get_post_meta( $page_id, 'slider_pause', true );
	

	if ($add_slider) { ?>
		<div class="home-slider" id="<?php echo 'page_' . esc_attr($page_id); ?>" 
			data-auto="<?php echo ($slider_auto=="on") 
							? 'true' 
							: 'false'; ?>" 
			data-pause="<?php echo ($slider_pause=="") 
							? '2000' 
							: intval($slider_pause); ?>"
			data-mode="<?php echo esc_attr($slider_mode); ?>">
			<div class="controls">
				<p class="prev"><img src="<?php echo esc_url(URI) ?>/img/prew.png" alt="prew"></p>
				<p class="next"><img src="<?php echo esc_url(URI) ?>/img/next.png" alt="prew"></p>
			</div>
			<ul>

			<?php 
				if (strpos($gallery_images,';') !== false) {
	    			$urls = substr($gallery_images, 0, -1);
	    			$urls = explode(";", $urls);

					foreach ($urls as $url) {?>
						<li><img src="<?php echo esc_url($url); ?>" alt="<?php the_title(); ?>"/></li>
					<?php }
	    		}else{
	    			$urls = explode(",", $gallery_images);											
					foreach ($urls as $url) {
						$attachment = get_post( $url );
						$caption =  $attachment->post_excerpt;
						$attr = array('title'	=> $caption);
						?>
						<li><?php echo wp_get_attachment_image($url,'full',false,$attr); ?></li>
					<?php }
	    		}
			 ?>
			</ul>
		</div>
	<?php } ?>