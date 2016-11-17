<?php get_header(); ?>
<?php 
	$term = get_query_var( 'term' );
	$always_filters = get_theme_mod('always_filters');
?>

<div class="gallery"  id="masonry">
	<?php if ( get_theme_mod('add_filters') == true) { ?>
		<div class="filter-section">
			<!--FILTERS-->
			<nav class="filters <?php if ($always_filters) {
				echo 'always_show';
			} ?>">
				<div class="container">
					<ul class="list-inline">
						<?php $filters = get_terms('work-categorie');
						
						if ($filters) {
							$i = 1;
							foreach ($filters as $filter) {
								if ($filter->slug!=$term) {
									if ($i==1) {?>
										<li data-filter="<?php echo esc_attr($filter->slug); ?>"><?php echo esc_attr($filter->name); ?>	</li
									<?php }else{ ?>
										><li data-filter="<?php echo esc_attr($filter->slug); ?>"><?php echo esc_attr($filter->name); ?></li
									<?php }
									$i++; 
								}
							}
						}
						?>
						><li data-filter="all"><?php _e('All','milk') ?></li>
					</ul>
				</div>
			</nav>
			<!--END FILTERS-->
		</div>
	<?php } ?>
	<div class="container">
		<div class="row">
			<ul class="grid">
				
			</ul>
		</div>
		<div class="row">
			<button id="load-more" class="btn btn-default" data-term="<?php echo esc_attr($term) ?>" data-pages="<?php echo esc_attr($wp_query->max_num_pages); ?>" data-url="<?php echo esc_url(site_url()) ?>"><i class="fa fa-cloud-download"></i><?php _e('Load more','milk') ?></button>
			<a href="#top" id="to-top" class="btn btn-default"><i class="fa fa-angle-up"></i><?php _e('Go to top','milk') ?></a>
		</div>	
	</div>
</div>

 <?php 	get_footer(); ?>