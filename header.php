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

    <a href="/" class="site-logo-link ripple-effect site-logo-ico" data-ripple-mode="fixed">
<!--      <img src="http://materialdesignblog.com/wp-content/uploads/2015/02/logom.png">-->
      <div class="logo-img-box"></div>
      <div class="logo-text-box"></div>
    </a>


		<h3 class="site-title-nav"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
		
		<a href="#login-links" id="toggle-login-links" class="fa fa-ellipsis-v"><span class="label"><?php _e( 'ICO / Guides' ); ?></span></a>
		<ul id="login-links">
      <li>
        <a href="https://icoanatomy.com/rating" title="ICO">ICO</a>
      </li>
      <li>
        <a href="https://icoanatomy.com/guides" title="Guides">Guides</a>
      </li>
		</ul>
	</nav>




	<header id="masthead" class="<?php mdb_masthead_classes(); ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
		<?php mdb_site_branding(); ?>
		
<!--		<div class="shadow"></div>-->
	</header><!-- #masthead -->
	
	<?php if ( is_mdb_author_current_user() || is_mdb_page( 'edit-profile' ) ) : ?>
		<ul id="page-tab-nav">
			<li><a href="<?php echo esc_url( mdb_current_author_page() ); ?>" class="ripple-effect<?php echo ( is_author() ) ? ' active' : ''; ?>">Your Posts</a></li>
			<li><a href="<?php echo esc_url( home_url( '/edit-profile/' ) );?>" class="ripple-effect<?php echo ( is_mdb_page( 'edit-profile' ) ) ? ' active' : ''; ?>">Edit Profile</a></li>
		</ul>
	<?php endif; ?>

	<div id="content" class="site-content">
