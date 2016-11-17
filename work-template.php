<?php 
	$view_text = get_theme_mod('work_button_text');
	$home_cols = get_theme_mod( 'home_col_num' );
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
	} 
?>
<?php 
 	/*if (get_theme_mod('filters_type')=='tags') {
 		$filters = wp_get_post_tags(get_the_ID(), array( 'fields' => 'slugs' ));
 	}else{
 		$filters = wp_get_post_categories( get_the_ID(), array( 'fields' => 'slugs' ));
 	}*/
 	$filters = wp_get_post_terms( get_the_ID(), 'work-categorie', array( 'fields' => 'slugs' ) ); 
?>
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
	 	<a class="work <?php foreach ($filters as $filter){ echo esc_attr($filter) . ' ';} ?>" data-type="<?php echo esc_attr($animation); ?>" href="<?php the_permalink(); ?>" data-path-to="<?php echo $pathTo; ?>">
		<figure>
			<?php 
				if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail(); ?>
				<?php }else{ ?>
					<div class="no-thumbnail"></div>
				<?php } ?>
			<svg preserveAspectRatio="none"><path d="<?php echo $pathD; ?>"/></svg>
			<figcaption>
				<h3><?php the_title(); ?></h3>
				<div class="divider" style="background-color: <?php echo esc_attr(get_post_meta( get_the_ID(), 'work_color', true )); ?>"></div>
				<?php 
					$excerpt = get_the_excerpt(); 	
				 	$pos = strpos( $excerpt, '<a');
				 	if ($pos != false) {
				 		$excerpt = substr($excerpt, 0, $pos);
				 	}
				?>
				<p><?php echo wp_kses_post($excerpt); ?></p>
				<div class="button"><i class="fa fa-eye"></i><?php echo esc_attr($view_text); ?></div>
			</figcaption>
		</figure>
	</a>
</li>



