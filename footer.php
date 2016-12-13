<?php
/**
<!--<footer class="<?php echo esc_attr(get_theme_mod('footer_theme')) ?>">
<div class="container">
<?php if ( is_active_sidebar( 'footer_widget_area' ) ) : ?>
<?php dynamic_sidebar( 'footer_widget_area' ); ?>
<?php endif; ?>
</div>
<div class="footer_bottom">
<div class="container">
<?php $logo = get_theme_mod( 'upload_footer_logo' ); ?>
<?php if (!empty($logo)) { ?>
<a href="<?php echo esc_url( home_url() ); ?>">
<img
src="<?php echo esc_url(get_theme_mod( 'upload_footer_logo' )) ?>"
srcset="<?php echo esc_url(get_theme_mod( 'upload_footer_logo' )) . ' 1x ,' . esc_url(get_theme_mod( 'upload_footer_logo2x' )) . ' 2x' ?>"
alt="<?php echo bloginfo('name') ?>">
</a>
<?php } ?>

<div class="sidebar">
<?php if ( is_active_sidebar( 'footer_social_links_area' ) ) : ?>

<?php dynamic_sidebar( 'footer_social_links_area' ); ?>

<?php endif; ?>
</div>

<p>&#169; <?php echo date('Y'); ?> <?php _e('All rights reserved.','milk') ?></p>
</div>
</div>
</footer>-->
 */
?>
		<footer class="yj-footer">
			<div class="row">
				<div class="copyright col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
					Copyright &copy; 2016 Yungjen 讲真小宇宙 <?php echo get_option( 'zh_cn_l10n_icp_num' );?>
				</div>
			</div>
		</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>