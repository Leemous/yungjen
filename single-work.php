<?php get_header(); ?>
<?php $global_allow_comments = wp_allow_comment(array());?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="main work-page">
		<div class="auto-container">
			<div class="row">
				<?php 
					$single_layout = get_theme_mod( 'single_work_layout' );
					$single_sidebar = get_theme_mod( 'single_work_sidebar' );
					switch ($single_layout) {
						case 'left': ?>
							<div class="col-md-3 col-sm-4">
								<aside>
									<?php if ( is_active_sidebar( $single_sidebar ) ) : ?>	
											<?php dynamic_sidebar( $single_sidebar ); ?>
									<?php endif; ?>
								</aside>
							</div>
							<div class="posts col-md-9 col-sm-8">
							<?php break;
						case 'right': ?>
							<div class="posts col-md-9 col-sm-8">
							<?php break;
						case '12': ?>
							<div class="posts col-md-12 col-sm-12">
							<?php break;
						case '10': ?>
							<div class="posts col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
							<?php break;
						case '8': ?>
							<div class="posts col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
							<?php break;
						case '6': ?>
							<div class="posts col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
							<?php break;

				} ?>
					<!--POST-->
					<div class="post">
						<?php 
							$format = get_post_format(get_the_ID()); 
							switch ($format) {
							    case "gallery":  ?>
							    	<div class="slider" id="<?php echo 'post_' . get_the_ID(); ?>"
											data-auto="<?php echo (get_post_meta( get_the_ID(), 'work_slider_auto', true )=="on") 
														? 'true' 
														: 'false'; ?>"
											data-pause="<?php echo (get_post_meta( get_the_ID(), 'work_slider_pause', true )=="") 
														? '2000' 
														: intval(get_post_meta( get_the_ID(), 'work_slider_pause', true )); ?>"			
											data-mode="<?php echo esc_attr(get_post_meta( get_the_ID(), 'work_slider_mode', true )); ?>"
									>
				    					<div class="controls">
											<p class="prev"><i class="fa fa-angle-left"></i></p>
											<p class="next"><i class="fa fa-angle-right"></i></p>
										</div>
										<ul>

								    	<?php 
								    		$urls = get_post_meta( get_the_ID(), 'work_gallery_images', true );
								    		if (strpos($urls,';') !== false) {
								    			$urls = substr($urls, 0, -1);
								    			$urls = explode(";", $urls);

												foreach ($urls as $url) {?>
													<li><img src="<?php echo esc_url($url); ?>" alt="<?php the_title(); ?>"/></li>
												<?php }
								    		}else{
								    			$urls = explode(",", $urls);											
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
							        <?php break;
							    case "image": ?>
							        <img src="<?php echo esc_url(get_post_meta( get_the_ID(), 'work_image_url', true )) ?>" alt="<?php the_title() ?>">
							        <?php break;
							    case "video": ?>
									<?php echo balanceTags(get_post_meta( get_the_ID(), 'work_video_embed_code', true )); ?>
							    	<?php break;		
							    case "audio": ?>
							        <div class="audio" id="audio_<?php echo get_the_ID(); ?>">
							        	<?php 
							        		$code = get_post_meta( get_the_ID(), 'work_audio_embed_code', true );
							        		$code = trim($code);
							        		if (substr($code, 1,6) == "iframe") {
							        			echo balanceTags($code);
							        		}elseif (substr($code, 0,4)=="http") { ?>
							        			<audio src="<?php echo esc_url($code); ?>"></audio>
							        		<?php }
							        	 ?>
									</div>
							        <?php break;
							    }
						?>
						<div class="content">
							<h3><?php echo get_the_title(); ?></h3>
							<div class="row">
							<?php the_content(); ?>
							</div>
							<?php 
								$client = get_post_meta( get_the_ID(), 'work_client', true );
								$client_url = get_post_meta( get_the_ID(), 'work_client_url', true )
							 ?>
							<?php if (!empty($client)){ ?>
								<p class="client"><i class="fa fa-user"></i>Client: <a href="<?php echo esc_url($client_url); ?>"><?php echo esc_attr($client); ?></a></p>
							<?php } ?>
						</div>
					</div>
					<?php $num = get_comments_number(); ?>
					<?php if ((comments_open() || $num > 0) && $allow_comments): ?>
						<div class="comments" id="comments">
							<?php if ($num > 0) { ?>
								<h3><?php comments_number(); ?></h3>
							<?php } ?>
							<?php comments_template( '/comments.php' ); ?>
						</div>
					<?php endif ?>
					<?php if (	get_post_meta( get_the_ID(), 'show_related_works', true )){ ?> 	

						<div class="related" id="masonry">
							<div class="row">
					        	<ul class="grid">
					        	<?php  
								    $orig_post = $post;  
								    global $post;  
								    $tags = wp_get_post_tags($post->ID);  

									/*$tags = wp_get_post_terms( $post->ID , 'work-categorie');
									
									if ($tags) {  
									    $tag_ids = array();  
									    foreach($tags as $individual_tag) $tags[] = $individual_tag->term_id;  
									    $args=array(  
									      'post_type' => 'work',
									      'tax_query' => array(
									                    array(
									                        'taxonomy' => 'work-categorie',
									                        'field' => 'id',
									                        'terms' => $tags,
									                        'operator'=> 'IN' //Or 'AND' or 'NOT IN'
									                     )),
									      'posts_per_page' => 4,
									      'ignore_sticky_posts' => 1,
									      'post__not_in'=>array($post->ID)
									   ) );
									*/
								      
								    if ($tags) {  
									    $tag_ids = array();  
									    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
									    $args=array(  
									    'post_type' => 'work',
									    'tag__in' => $tag_ids,  
									    'post__not_in' => array($post->ID),  
									    'posts_per_page'=>6, // Number of related posts to display.  
									    'ignore_sticky_posts '=>true    
									    );  
								      
								    	$my_query = new wp_query( $args );  
								  
									    while( $my_query->have_posts() ) {  
									    	$my_query->the_post();  ?>
									    	<li class="col-md-3 col-sm-6">
									    		<?php $filters = wp_get_post_terms( get_the_ID(), 'work-categorie', array( 'fields' => 'slugs' ) );  ?>
												<a class="work <?php foreach ($filters as $filter){ echo esc_attr($filter) . ' ';} ?>" href="<?php the_permalink(); ?>" data-path-to="m 0,0 0,87.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
													<figure>
														<?php 
															if ( has_post_thumbnail() ) { ?>
																<?php the_post_thumbnail(); ?>
															<?php }else{ ?>
																<div class="no-thumbnail"></div>
															<?php } ?>
														
														<svg preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
														<figcaption>
															<h3><?php the_title(); ?></h3>
															<div class="divider" style="background-color: <?php echo get_post_meta( get_the_ID(), 'work_color', true ); ?>"></div>
															<?php 
																$excerpt = get_the_excerpt(); 	
															 	$pos = strpos( $excerpt, '<a');
															 	if ($pos != false) {
															 		$excerpt = substr($excerpt, 0, $pos);
															 	}
															?>
															<p><?php echo wp_kses_post($excerpt); ?></p>
															<div class="button"><i class="fa fa-eye"></i><?php _e('View','milk') ?></div>
														</figcaption>
													</figure>
												</a>
											</li>

									    <?php }  
								    }  
								    $post = $orig_post;  
								    wp_reset_query();  
								    ?> 
								</ul>
							</div> 
						</div>
					<?php } ?>
				</div>
				<?php  
					if ($single_layout == 'right') { ?>
						<div class="col-md-3 col-sm-4">
							<aside>
								<?php if ( is_active_sidebar( $single_sidebar ) ) : ?>	
										<?php dynamic_sidebar( $single_sidebar ); ?>
								<?php endif; ?>
							</aside>
						</div>
				<?php }	?>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else: ?>

	<p>There are no posts.</p>

<?php endif; ?>

 <?php 	get_footer(); ?>