<?php
	$home_cols = get_theme_mod( 'blog_col_num' );
	switch ($home_cols) {
	    case 4: ?>
			<li class="col-md-3 col-sm-6">
		<?php break;
		case 3: ?>
			<li class="col-md-4 col-sm-6">
		<?php break;
		case 2: ?>
			<li class="col-md-6 col-sm-6">
		<?php break;
		case 1: ?>
			<li class="col-md-12 col-sm-12 list">
		<?php break; 
		}?>
		<?php
			$work_style = get_post_meta( get_the_ID(), 'work_style', true );
			if ($work_style) { ?>
				<?php 
					$animation = get_theme_mod( 'works_animation' ); 
					switch ($animation) {
						case 'type1':
							$pathTo = "m 180,64 -180,0 L 0,0 180,0 z";
							$pathD = "M 180,160 0,218 0,0 180,0 z";
							break;
						case 'type2':			
							$pathTo = "m 0,0 0,87.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z";
							$pathD = "m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z";
							break;
						case 'type3':
							$pathTo = "M 0,0 0,60 90,80 180.5,60 180,0 z";
							$pathD = "M 0 0 L 0 200 L 90 160 L 180 200 L 180 0 L 0 0 z ";
							break;	
						default:	
							$pathTo = "m 0,0 0,87.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z";
							$pathD = "m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z";
					}
				?>
			 	<a <?php post_class('post work work-post'); ?> data-type="<?php echo esc_attr($animation); ?>" href="<?php the_permalink(); ?>" data-path-to="<?php echo $pathTo; ?>">
				 	<?php if (is_sticky()) { ?>
						<div class="sticky-label"><p>Featured</p></div>	
					<?php } ?>
					<figure>
						<?php 
							if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail(); ?>
							<?php }else{ ?>
								<div class="no-thumbnail"></div>
							<?php } ?>
						<?php 
							$show_title = false;
							$show_meta = false;
							$show_content = false;
							
							$show_title_meta = get_post_meta( get_the_ID(), 'show_title', true );
							$show_meta_meta = get_post_meta( get_the_ID(), 'show_meta', true );
							$show_content_meta = get_post_meta( get_the_ID(), 'show_content', true );
						?>
						<svg preserveAspectRatio="none"><path d="<?php echo $pathD; ?>"/></svg>
						<figcaption>
							<?php if ($show_title_meta == "always" || empty($show_title_meta)) { ?>
								<h3><?php the_title(); ?></h3>
							<?php }  ?>
							<div class="divider" style="background-color: <?php echo esc_attr(get_post_meta( get_the_ID(), 'work_style_color', true )); ?>"></div>
							<?php if ($show_content_meta == "always" || empty($show_meta_meta)) { ?>
								<?php 
									$excerpt = get_the_excerpt(); 	
								 	$pos = strpos( $excerpt, '<a');
								 	if ($pos != false) {
								 		$excerpt = substr($excerpt, 0, $pos);
								 	}
								?>
								<p><?php echo wp_kses_post($excerpt); ?></p>
							<?php }  ?>
							<?php if ($show_meta_meta == "always" || empty($show_meta_meta)) { ?>
								<div class="button">
									<ul class="list-inline details">
										<li>
											<i class="fa fa-calendar"></i><?php the_time(get_option( 'date_format' )); ?>
										</li><li>
											<i class="fa fa-comment-o"></i><?php comments_number('0','1','%'); ?>
										</li><li>
											<?php echo getPostLikeCount( get_the_ID() ); ?>
										</li>
									</ul>
								</div>
							<?php }  ?>
						</figcaption>
					</figure>
				</a>
			<?php }else{ ?>
				<div <?php post_class('post'); ?>>
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
							    				<h6><?php echo balanceTags($reply[0]); ?></h6><br>
							    				<p class="msg"><?php echo balanceTags($reply[1]); ?></p>
							    			</li>
							    		<?php }
							    	?>
							        </ul>
							    <?php } ?>
					        <?php break;
					    case "gallery":  ?>
				    		<?php 
							if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							<?php }else{ ?>
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
														<li><a href="<?php echo get_permalink(); ?>">
															<img src="<?php echo esc_url($url); ?>" alt="<?php the_title(); ?>"/>
														</a></li>
													<?php }
									    		}else{
									    			$urls = explode(",", $urls);											
													foreach ($urls as $url) {
														$attachment = get_post( $url );
														$caption =  $attachment->post_excerpt;
														$attr = array('title'	=> $caption);
														?>
														<li><a href="<?php echo get_permalink(); ?>">
															<?php echo wp_get_attachment_image($url,'full',false,$attr); ?>
														</a></li>
													<?php }
									    		}
									    		
									    	 ?>
											</ul>
										</div>
								<?php } ?>					    	
							<?php } ?>
					        <?php break;
					    case "link":  ?>
					    	<?php 
					    		$link = get_post_meta( get_the_ID(), 'link_text', true );
					    		if (!empty($link)) { ?>
					    			<a href="<?php echo get_the_permalink(); ?>">
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
									  			<cite title="Source Title"><i class="fa fa-link"></i><?php echo esc_attr(get_post_meta( get_the_ID(), 'link_ref', true )); ?></cite>
									  		</footer>
										</blockquote>	
									</a>			    			
					    	<?php } ?>
							
					        <?php break;
					    case "image": ?>
					        <?php 
							if ( has_post_thumbnail() ) { ?>
								<a href="<?php echo get_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
					        <?php }else{ ?>
					        <?php 
					        	$img = get_post_meta( get_the_ID(), 'image_url', true ); 
					        	if (!empty($img)) { ?>
					        	<a href="<?php echo get_permalink(); ?>">
					        		<img src="<?php echo esc_url($img) ?>" alt="<?php the_title() ?>">
					        	</a>
					        	<?php } ?>
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
							<?php echo balanceTags(get_post_meta( get_the_ID(), 'video_embed_code', true )); ?>
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
				<div class="content">
					<?php 
						$show_title = false;
						$show_meta = false;
						$show_content = false;
						
						$show_title_meta = get_post_meta( get_the_ID(), 'show_title', true );
						$show_meta_meta = get_post_meta( get_the_ID(), 'show_meta', true );
						$show_content_meta = get_post_meta( get_the_ID(), 'show_content', true );
					?>
						<?php if ($show_title_meta == "always" || empty($show_title_meta)) { ?>
							<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php }  ?>
						<?php if (is_sticky()) { ?>
							<div class="sticky-label"><p>Featured</p></div>	
						<?php } ?>
						<?php if ($show_content_meta == "always" || empty($show_meta_meta)) { ?>
							<?php the_excerpt(); ?>
						<?php }  ?>
						<?php if ($show_meta_meta == "always" || empty($show_meta_meta)) { ?>
							<ul class="list-inline details">
								<li>
									<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><i class="fa fa-calendar"></i><?php the_time(get_option( 'date_format' )); ?></a>
								</li><li>
									<a href="<?php echo get_permalink(); ?>#comments"><i class="fa fa-comment-o"></i><?php comments_number('0','1','%'); ?></a>
								</li><li>
									<?php echo getPostLikeLink( get_the_ID() ); ?>
								</li>
							</ul>
						<?php }  ?>
					</div>
				</div>
			<?php } ?>
	</li>