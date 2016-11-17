<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

	get_template_part( 'blog', 'template' );

endwhile; else: ?>

	<p>There are no posts.</p>

<?php endif; ?>