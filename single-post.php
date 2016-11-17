<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="main post-page">
		<div class="container">
			<div class="row">
				<?php 
					$single_layout = get_theme_mod( 'single_layout' );
					$single_sidebar = get_theme_mod( 'single_sidebar' );
					switch ($single_layout) {
						case 'left': ?>
							<div class="col-md-3 col-sm-4">
								<?php if (	get_post_meta( get_the_ID(), 'show_pagination', true )){ ?> 
									<div class="post-nav">
										<?php previous_post_link('%link','<i class="fa fa-angle-left"></i>Previous'); ?>
										<?php next_post_link('%link','Next<i class="fa fa-angle-right"></i>'); ?>
									</div>
								<?php } ?>	
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
						$format = get_post_format(get_the_ID()); ?>
						<?php 
							switch ($format) {
							    case "chat": ?>
							    	<?php 
							    		$chat = get_post_meta( get_the_ID(), 'chat_list', true );
							    		if (!empty($chat)) { ?>
									       
										    	<?php 
													if ( has_post_thumbnail() ) { ?>
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php the_post_thumbnail(); ?>
														</a>
													<?php } ?>
										    	<ul class="chat">
										    	<?php 
										    		$chat_list = get_post_meta( get_the_ID(), 'chat_list', true );
										    		$chat_list = trim($chat_list," ");
										    		$replies = explode("\n", $chat_list); 
										    		foreach ($replies as $reply) { 
										    			$reply = explode(":", $reply);
										    			?>
										    			<li>
										    				<h6><?php echo wp_kses_post($reply[0]); ?></h6><br>
										    				<p class="msg"><?php echo wp_kses_post($reply[1]); ?></p>
										    			</li>
										    		<?php }
										    	?>
										        </ul>
										<?php } ?>
							        <?php break;
							    case "gallery":  ?>
							    	<?php 
							    		$urls = get_post_meta( get_the_ID(), 'gallery_images', true ); 
										if (!empty($urls)) { ?>
									    	<div class="slider" id="<?php echo 'post_' . get_the_ID(); ?>"
													data-auto="<?php echo (get_post_meta( get_the_ID(), 'slider_auto', true )=="on") 
																? 'true' 
																: 'false'; ?>"
													data-pause="<?php echo (get_post_meta( get_the_ID(), 'slider_pause', true )=="") 
																? '2000' 
																: intval(get_post_meta( get_the_ID(), 'slider_pause', true )); ?>"			
													data-mode="<?php echo esc_attr(get_post_meta( get_the_ID(), 'slider_mode', true )); ?>"
											>
						    					<div class="controls">
													<p class="prev"><i class="fa fa-angle-left"></i></p>
													<p class="next"><i class="fa fa-angle-right"></i></p>
												</div>
												<ul>

										    	<?php 
										    		$urls = get_post_meta( get_the_ID(), 'gallery_images', true );
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
										<?php } ?>
							        <?php break;
							    case "link":  ?>
							        <?php 
							    		$link = get_post_meta( get_the_ID(), 'link_text', true );
							    		if (!empty($link)) { ?>
							    			
								    			<?php if ( has_post_thumbnail() ) {
													$thumb_id = get_post_thumbnail_id();
													$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
												?>
												<blockquote style="	background-color:<?php echo esc_attr(get_post_meta( get_the_ID(), 'link_color', true )); ?>; 
																background-image:url(<?php echo esc_url($thumb_url[0]); ?>);
																background-size:cover">
												<?php }else{ ?>
									        		<blockquote style="background-color:<?php echo esc_attr(get_post_meta( get_the_ID(), 'link_color', true )); ?>" >
												<?php } ?>
												  	<?php 
											  			if (get_post_meta( get_the_ID(), 'link_text', true ) != "") {
											  				echo "<p>" . esc_attr(get_post_meta( get_the_ID(), 'link_text', true )) . "</p>"; 
											  			} 
												  	?>
											  		<footer>
											  			<cite title="Source Title"><a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'link_ref', true )); ?>"><i class="fa fa-link"></i><?php echo esc_attr(get_post_meta( get_the_ID(), 'link_ref', true )); ?></a></cite>
											  		</footer>
												</blockquote>	
														    			
							    	<?php } ?>
							        <?php break;
							    case "image": 
							    	$img = get_post_meta( get_the_ID(), 'image_url', true ); 
						        	if (!empty($img)) { ?>
						        		<a href="<?php echo get_permalink(); ?>">
						        			<img src="<?php echo esc_url($img) ?>" alt="<?php the_title() ?>">
						        		</a>
						        	<?php } ?>
							        <?php break;
							    case "quote":  ?>
							    	<?php 
							    		$quote = get_post_meta( get_the_ID(), 'quote_text', true );
							    		if (!empty($quote)) { ?>
								         	<a href="<?php echo get_the_permalink(); ?>">
									    	<?php if ( has_post_thumbnail() ) {
												$thumb_id = get_post_thumbnail_id();
												$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
												?>
												<blockquote style="	background-color:<?php echo esc_attr(get_post_meta( get_the_ID(), 'quote_color', true )); ?>; 
																	background-image:url(<?php echo esc_url($thumb_url[0]); ?>);
																	background-size:cover">
											<?php }else{ ?>
										        	<blockquote style="background-color:<?php echo esc_attr(get_post_meta( get_the_ID(), 'quote_color', true )); ?>" >
											<?php } ?>
													<p><?php echo esc_attr(get_post_meta( get_the_ID(), 'quote_text', true )); ?></p>
												  	<?php if (get_post_meta( get_the_ID(), 'quote_ref', true ) != "") { ?>
												  		<footer><cite title="Source Title"><i class="fa fa-user"></i><?php echo esc_attr(get_post_meta( get_the_ID(), 'quote_ref', true )); ?></cite></footer>
												  	<?php } ?>
												</blockquote>
											</a>
										<?php } ?>
							        <?php break;
							    case "status":  ?>
							       <?php if ( has_post_thumbnail() ) {
										$thumb_id = get_post_thumbnail_id();
										$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
										?>
										<div class="status" style="	background-color:<?php echo esc_attr(get_post_meta( get_the_ID(), 'status_color', true )); ?>;
																	background-image:url(<?php echo esc_url($thumb_url[0]); ?>);
																	background-size:cover">
									<?php }else{ ?>
								        <div class="status" style="	background-color:<?php echo esc_attr(get_post_meta( get_the_ID(), 'status_color', true )); ?>">
									<?php } ?>
										<?php echo balanceTags(get_post_meta( get_the_ID(), 'status_embed_code', true )) ?>
									</div>
							        <?php break;
							    case "video": ?>
							        <div class="video">
										<?php echo balanceTags(get_post_meta( get_the_ID(), 'video_embed_code', true )) ?>
									</div>
							    	<?php break;		
							    case "audio": ?>
							       <div class="audio" id="audio_<?php echo get_the_ID(); ?>">
							        	<?php 
							        		$code = get_post_meta( get_the_ID(), 'audio_embed_code', true );
							        		$code = trim($code);
							        		if (substr($code, 1,6) == "iframe") {
							        			echo balanceTags($code);
							        		}elseif (substr($code, 0,4)=="http") { ?>
							        			<?php if ( has_post_thumbnail() ) { ?>
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail(); ?>
													</a>
												<?php } ?>
							        			<audio src="<?php echo esc_url($code); ?>"></audio>
							        		<?php }
							        	 ?>
										
									</div>
							        <?php break;
							    default: ?>
							    	<?php 
									if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php the_post_thumbnail(); ?>
										</a>
									<?php } ?>
							    <?php break;
						    }
						?>

						<?php 
							$show_title = false;
							$show_meta = false;
							$show_content = false;
							$show_share = false;
							$show_title_meta = get_post_meta( get_the_ID(), 'show_title', true );
							$show_meta_meta = get_post_meta( get_the_ID(), 'show_meta', true );
							$show_content_meta = get_post_meta( get_the_ID(), 'show_content', true );
							
							if ( $show_title_meta == "always" || 
								$show_title_meta == "post" || empty($show_title_meta)) { 
								$show_title = true;
							}	
							if ( $show_meta_meta == "always" || 
								$show_meta_meta == "post" || empty($show_meta_meta)) { 
								$show_meta = true;
							}
							if ( $show_content_meta == "always" || 
								 $show_content_meta == "post" || empty($show_content_meta)) {
								$show_content = true;
							}
							if (	get_post_meta( get_the_ID(), 'show_share', true )){ 
								$show_share = true;
							}
						if ($show_title || $show_meta || $show_content || $show_share) { ?>

							<div class="content">
								<?php if ( $show_title ) { ?>
									<h3><?php the_title(); ?></h3>
								<?php }  ?>
								<?php if ( $show_meta ) { ?>
									<ul class="list-inline details">
										<li>
											<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><i class="fa fa-calendar"></i><?php the_time(get_option('date_format')); ?></a>
										</li><li>
											<a href="#comments"><i class="fa fa-comment-o"></i><?php comments_number(); ?></a>
										</li><li>
											<?php echo getPostLikeLink( get_the_ID() ); ?>
										</li>
									</ul>
									<?php } ?>
								<?php if ( $show_content ) { ?>
									<div class="row">
										<?php the_content(); ?>
									</div>
								<?php } ?>
								
									<?php $links = wp_link_pages(array(
															'before'           => '<div class="pagination">',
															'after'            => '</div>',
															'link_before'      => '<span>',
															'link_after'       => '</span>',
															'next_or_number'   => 'number',
															'separator'        => '',
															'nextpagelink'     => __('>', 'milk'),
															'previouspagelink' => __('<' , 'milk'),
															'pagelink'         => '%',
															'echo'             => 0
														)); 
										$links = str_replace ('<a' , '<a class="page-numbers" ' , $links );
										$links = str_replace ('<div class="pagination"><span>' , '<div class="pagination"><span class="page-numbers current">' , $links );
										$links = str_replace ('<div class="pagination"> <span>' , '<div class="pagination"><span class="page-numbers current">' , $links );
										$links = str_replace ('</a><span>' , '</a><span class="page-numbers current">' , $links );
					
										echo balanceTags($links);

									?>
									<div class="post-categories">
										<h5>Categories:</h5>
										<p>											
											<?php the_category(', '); ?>
										</p>
									</div>
									
									<div class="tagcloud col-md-6 col-sm-12">
										<?php the_tags('', '', '' ); ?>
									</div>

								<?php if ( $show_share ){ ?> 
									<div class="share">
									<p>Share via:</p>
										<ul class="list-inline">
											<li>
												<a class="color-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-facebook"></i></a>
											</li>
											<li>
												<a class="color-twitter" href="https://twitter.com/home?status=<?php echo get_the_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-twitter"></i></a>
											</li>
											<li>
												<a class="color-gplus" href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="fa fa-google-plus"></i></a>
											</li>
										</ul>
									</div>

								<?php } ?>
							</div>
						<?php } ?>
					</div>
					
						<?php $hide_comments = get_post_meta( get_the_ID(), 'hide_comments', true ); ?>
						<?php if (!$hide_comments) { ?> 
							<?php 
								$num = get_comments_number(); ?>
								<div class="comments" id="comments">
								<?php if ($num > 0) { ?>
									<h3><?php comments_number(); ?></h3>
								<?php } ?>
								<?php comments_template( '/comments.php'); ?>
								</div>
			            <?php } ?>
					
					<?php if (	get_post_meta( get_the_ID(), 'show_related', true )){ ?> 
						<div class="related" id="masonry">
							<div class="row">
								<ul class="grid">
								<?php  
								    $orig_post = $post;  
								    global $post;  
								    $tags = wp_get_post_tags($post->ID);  
								      
								    if ($tags) {  
									    $tag_ids = array();  
									    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
									    $args=array(  
									    'tag__in' => $tag_ids,  
									    'post__not_in' => array($post->ID),  
									    'posts_per_page'=>6, // Number of related posts to display.  
									    'ignore_sticky_posts '=>true  
									    );  
								      
								    	$my_query = new wp_query( $args );  
								  
									    while( $my_query->have_posts() ) {  
									    	$my_query->the_post();  
									    	get_template_part( 'blog', 'template' );
									    }  
								    }  
								    $post = $orig_post;  
								    wp_reset_query();  
								    ?> 
								</ul>
							</div> 
						</div>
					<?php }?>
				</div>
	            <?php  
					if ($single_layout == 'right') { ?>
						<div class="col-md-3 col-sm-4">
							<?php if (	get_post_meta( get_the_ID(), 'show_pagination', true )){ ?> 
									<div class="post-nav">
										<div class="post-nav-prev">
											<?php previous_post_link('%link','<i class="fa fa-angle-left"></i>Previous'); ?>
											<?php $prev_post = get_adjacent_post(false, '', true); ?>
											<?php if ( !empty( $prev_post ) ): ?>
												<div class="prev-title"><p><?php echo esc_attr($prev_post->post_title); ?></p></div>
											<?php endif; ?>
										</div>
										<div class="post-nav-next">
											<?php next_post_link('%link','Next <i class="fa fa-angle-right"></i>'); ?>
											<?php $next_post = get_adjacent_post( false, '', false); ?>
											<?php if ( !empty( $next_post ) ): ?>
												<div class="next-title"><p><?php echo esc_attr($next_post->post_title); ?></p></div>
											<?php endif; ?>
										</div>
									</div>
							<?php } ?>
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

<?php endwhile; else: ?>

	<p>There are no posts.</p>

<?php endif; ?>


<?php get_footer(); ?>