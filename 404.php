<?php get_header(); ?>

<div class="error404 main">
	<h1>404</h1>
	<h2>Whoops, that&#8217;s an error.</h2>
	<p>The required URL was not found on this server.</p>
	<p>That&#8217;s all we know.</p>
	<a href="<?php echo esc_url(site_url()); ?>" class="btn btn-default"><i class="fa fa-long-arrow-left"></i>Go to home</a>
</div>

<?php get_footer(); ?>