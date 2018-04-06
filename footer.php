<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WMD Theme
 */
?>

	</div><!-- #content -->

	<div id="drawer">
		<div class="drawer-content sliding-content" data-direction="left">
			<div class="drawer-header">
				<a href="#" data-target-id="drawer" class="genericon no-animation genericon-close-alt toggle-button ripple-effect" data-ripple-mode="fixed">
					<span class="label">Close Drawer</span>
				</a>

				<?php mdb_site_logo( 'site_logo_drawer' ); ?>
				<h2 class="site-name"><?php bloginfo('name' ); ?></h2>
				<p class="site-description"><?php echo get_theme_mod( 'custom_drawer_message', 'Inspired by Material Design & FORM' ); ?></p>
			</div><!-- .drawer-header -->

			<div class="drawer-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div><!-- .drawer-navigation -->
			
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>	
			<div class="drawer-widgets">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>				
			</div><!-- .drawer-widgets -->
			<?php endif; ?>
		</div><!-- .drawer-content -->

		<div class="drawer-overlay toggle-button no-animation" data-target-id="drawer"></div>
	</div><!-- #drawer -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php printf( __( '&copy; %s Yourwebsitename.com, All rights reserved', 'mateiraldesignblog' ), date( 'Y' ) ); ?><div itemscope itemtype=""https://schema.org/AboutPage">
   <a itemprop="url" href="http://yoursiteurl.com">About us</a>
   
   <a itemprop="url" href="http://yoursiteurl.com">Page1</a>
   
   <a itemprop="url" href="http://yoursiteurl.com">Page2</a>
   <br>
<img itemprop="logo" src="http://yourlogoimageurlgoeshere.com" width="210" height="73"/>
</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
