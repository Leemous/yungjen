<?php
	$global_allow_comments = wp_allow_comment(array());
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
										</li>
										<?php if ($global_allow_comments) {?>
										<li>
											<i class="fa fa-comment-o"></i><?php comments_number('0','1','%'); ?>
										</li>
										<li>
											<?php echo getPostLikeCount( get_the_ID() ); ?>
										</li>
										<?php }?>
									</ul>
								</div>
							<?php }  ?>
						</figcaption>
					</figure>
				</a>
			<?php }else{ ?>
				<div <?php post_class('post'); ?>>
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
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="thumbnail">
								<a href="<?php echo get_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
						<?php }else{ ?>
							<div class="no-thumbnail"></div>
						<?php } ?>
						<?php if (is_sticky()) { ?>
							<div class="sticky-label"><p>Featured</p></div>	
						<?php } ?>
						<?php if ($show_content_meta == "always" || empty($show_meta_meta)) { ?>
							<?php the_excerpt(); ?>
						<?php }  ?>
						<?php if ($show_meta_meta == "always" || empty($show_meta_meta)) { ?>
							<ul class="list-inline details">
								<li>
									<a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php the_time(get_option( 'date_format' )); ?></a>
								</li>
								<?php if ($global_allow_comments) {?>
								<li>
									<a href="<?php echo get_permalink(); ?>#comments"><i class="fa fa-comment-o"></i><?php comments_number('0','1','%'); ?></a>
								</li>
								<li>
									<?php echo getPostLikeLink( get_the_ID() ); ?>
								</li>
								<?php }?>
							</ul>
						<?php }  ?>
					</div>
				</div>
			<?php } ?>
	</li>