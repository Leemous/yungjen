<?php 
	$comments_number = get_comments_number();
	$pages = 0;
	if ($comments_number != 0) { ?>
		<ul>
			<?php
				$comments = get_comments(array(
					'post_id' => get_the_ID(),
					'status' => 'approve' 
				));
				$pages = get_comment_pages_count( $comments );

				wp_list_comments(array( 
					'reverse_top_level' => false,
					'callback' => 'milk_comment_callback'
				), $comments);
			?>
    	</ul>
	<?php } ?>
	<?php 
	if ($pages > 1) { ?>
		<div class="pagination">
    		<?php paginate_comments_links(array(
    								'prev_text'    => __('<' , 'milk'),
									'next_text'    => __('>', 'milk'))); ?>
		</div>
	<?php  } ?>
<?php if (comments_open()): ?>
	<?php comment_form(); ?>
<?php endif ?>
