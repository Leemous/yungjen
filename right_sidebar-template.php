<?php  
	global $wp_query;
	$page_id = $wp_query->get_queried_object_id();

	$show_sidebar = get_post_meta( $page_id, 'show_sidebar', true ); 
	$select_sidebar = get_post_meta( $page_id, 'select_sidebar', true ); 
	$sidebar_position = get_post_meta( $page_id, 'sidebar_position', true ); 
	$page_width = get_post_meta( $page_id, 'page_width', true ); 

	if (empty($show_sidebar) && empty($select_sidebar) && empty($sidebar_position) && empty($page_width)) { ?>
		<div class="posts col-md-12 col-sm-12">
	<?php }else{

		if ($show_sidebar && $sidebar_position=="right") { ?>
			<div class="col-md-3 col-sm-4">
				<aside>
					<?php if ( is_active_sidebar( $select_sidebar ) ) : ?>	
							<?php dynamic_sidebar( $select_sidebar ); ?>
					<?php endif; ?>
				</aside>
			</div>
		<?php } ?>
<?php } ?>