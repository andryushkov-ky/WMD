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
<link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'materialdesignblog' ); ?></a>

	<nav id="ico-navigation">

    <a href="#drawer"
       data-target-id="drawer"
       id="toggle-drawer"
       class="genericon genericon-menu no-animation toggle-button ripple-effect"
       data-ripple-wrap-class="toggle-top-nav"
       data-ripple-mode="fixed">
    </a>

    <a href="/" class="site-logo-link ripple-effect site-logo-ico" data-ripple-mode="fixed">
      <div class="logo-img-box"></div>
      <div class="logo-text-box"></div>
    </a>

    <div class="header-btn-wrap">
      <div class="header-btn header-btn--prev">
<!--        <svg viewBox="0 0 24 24" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: #f16f50;"><g><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path></g></svg>-->
      </div>
    </div>


    <ul id="login-links">
      <li>
        <a href="https://icoanatomy.com/rating" title="ICO">ICO</a>
      </li>
      <li>
        <a href="https://icoanatomy.com/coinlist" title="Coinlist">COINLIST</a>
      </li>
      <li>
        <a href="https://icoanatomy.com/cryptofunds" title="Cryptofunds">CRYPTOFUNDS</a>
      </li>
      <li class="<?php if(is_category() && single_cat_title('', false ) == "Guides") {echo "top-link-active";} ?>">
        <a href="/category/guides" title="Guides">GUIDES</a>
      </li>
      <li class="<?php if($_SERVER[REQUEST_URI] == "/" || stripos($_SERVER[REQUEST_URI], '/page') === 0 || stripos($_SERVER[REQUEST_URI], '/news/page') !== FALSE || (is_category() && single_cat_title('', false ) == "News")) {echo "top-link-active";} ?>">
        <a href="/category/news" title="News">NEWS</a>
      </li>
    </ul>

    <div class="header-btn-wrap header-btn-wrap--right">
      <div class="header-btn header-btn--next">
<!--        <svg viewBox="0 0 24 24" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: #f16f50;"><g><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></g></svg>-->
      </div>
    </div>

    <div class="header-search">
      <div class="morph-search-button">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
								<path id="magnifier-3-icon" d="M208.464,363.98c-86.564,0-156.989-70.426-156.989-156.99C51.475,120.426,121.899,50,208.464,50
									c86.565,0,156.991,70.426,156.991,156.991C365.455,293.555,295.029,363.98,208.464,363.98z M208.464,103.601
									c-57.01,0-103.389,46.381-103.389,103.39s46.379,103.389,103.389,103.389c57.009,0,103.391-46.38,103.391-103.389
									S265.473,103.601,208.464,103.601z M367.482,317.227c-14.031,20.178-31.797,37.567-52.291,51.166L408.798,462l51.728-51.729
									L367.482,317.227z"/>
								</svg>
      </div>

      <!-- BEGIN SEARCH FORM -->
      <div class="morph-search-wrapper">
        <form autocomplete="off" method="get" id="searchform" action="<?php echo esc_url( home_url('') ); ?>/">
          <input type="text" name="s" id="s">
        </form>

        <!-- BEGIN SEARCH FORM CLOSE ICON -->
        <div class="morph-search-close-wrapper">
          <div class="morph-search-close-button">
          </div>
        </div>
        <!-- END SEARCH FORM CLOSE ICON -->

      </div>
      <!-- END SEARCH FORM -->
    </div>

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
