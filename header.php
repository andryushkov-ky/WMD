<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package MaterialDesignBlog
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php mdb_schema_org_markup(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'materialdesignblog' ); ?></a>

	<nav id="top-navigation">
		<a href="#drawer" data-target-id="drawer" id="toggle-drawer" class="genericon genericon-menu no-animation toggle-button ripple-effect" data-ripple-wrap-class="toggle-top-nav" data-ripple-mode="fixed"><span class="label"><?php _e( 'Navigation', 'materialdesignblog' ); ?></span></a>
		<?php mdb_site_logo( 'site_logo_top_nav' ); ?>
		<h3 class="site-title-nav"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
		
		<a href="#login-links" id="toggle-login-links" class="fa fa-ellipsis-v"><span class="label"><?php _e( 'Login / Register' ); ?></span></a>
		<ul id="login-links">
			<?php if( is_user_logged_in() ) : ?>
				<li><a href="<?php echo esc_url( home_url( '/post-new/' ) ); ?>" title="<?php _e( 'Submit Article' ); ?>"><?php _e( 'Submit Article' ); ?></a></li>
				<li><a href="<?php echo wp_logout_url( mdb_current_url() ); ?>" title="<?php _e( "Logout" ); ?>"><?php _e( 'Logout' ); ?></a></li>
			<?php else : ?>
				<li><a href="<?php echo esc_url( add_query_arg( array( 'redirect_to' => urlencode( mdb_current_url() ) ), home_url( '/wp-login.php' ) ) ); ?>" title="<?php _e( 'Login' ); ?>"><?php _e( 'Login' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( 'wp-login.php?action=register' ) ); ?>" title="<?php _e( 'Register' ); ?>"><?php _e( 'Register' ); ?></a></li>
			<?php endif; ?>
		</ul>
	</nav>




	<header id="masthead" class="<?php mdb_masthead_classes(); ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner" <?php mdb_masthead_background(); ?>>
		<?php mdb_site_branding(); ?>
		
		<div class="shadow"></div>
	</header><!-- #masthead -->
	
	<?php if ( is_mdb_author_current_user() || is_mdb_page( 'edit-profile' ) ) : ?>
		<ul id="page-tab-nav">
			<li><a href="<?php echo esc_url( mdb_current_author_page() ); ?>" class="ripple-effect<?php echo ( is_author() ) ? ' active' : ''; ?>">Your Posts</a></li>
			<li><a href="<?php echo esc_url( home_url( '/edit-profile/' ) );?>" class="ripple-effect<?php echo ( is_mdb_page( 'edit-profile' ) ) ? ' active' : ''; ?>">Edit Profile</a></li>
		</ul>
	<?php endif; ?>

	<div id="content" class="site-content">
