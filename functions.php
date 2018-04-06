<?php
/**
 * MaterialDesignBlog functions and definitions
 *
 * @package MaterialDesignBlog
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 725; /* pixels */
}

if ( ! function_exists( 'mdb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mdb_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Add custom thumbnail size
	 */
	add_image_size( 'content-thumbnail', 403, 179, true );
	add_image_size( 'content-thumbnail-sticky', 1268, 562, true );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'materialdesignblog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside'
	) );

	// Adding editor style
	add_editor_style( array(
		'//fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,500,700,300italic,400',
		'editor.css'
	) );	
}
endif; // mdb_setup
add_action( 'after_setup_theme', 'mdb_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mdb_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'materialdesignblog' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'mdb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mdb_scripts() {
    wp_enqueue_style( 'materialdesignblog-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,700,300italic,400' );

	wp_enqueue_style( 'materialdesignblog-style', get_stylesheet_uri(), array(), '20150226' );

	wp_enqueue_script( 'materialdesignblog-script', get_template_directory_uri() . '/js/materialdesignblog.js', array( 'jquery' ), '20150226' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Loading scripts for edit profile page
	if( is_user_logged_in() && 'edit-profile' == is_mdb_page( 'edit-profile' ) ){
		wp_enqueue_media();
		wp_enqueue_script( 'hijapedia-profile-editing', get_template_directory_uri() . '/js/fep-edit-profile.js', array( 'jquery' ), false, false );		
	}
}
add_action( 'wp_enqueue_scripts', 'mdb_scripts' );

/**
 * Enqueue scripts for login screen
 */
function mdb_login_scripts(){
	wp_enqueue_script( 'materialdesignblog-login-script', get_template_directory_uri() . '/js/login.js', array( 'jquery' ), '20150426' );
	wp_localize_script( 'materialdesignblog-login-script', 'login_params', array(
		'site_url' => esc_url( site_url() )
	) );

    wp_enqueue_style( 'materialdesignblog-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,700,300italic,400' );
    wp_enqueue_style( 'materialdesignblog-login', get_bloginfo('template_directory') . '/login.css', array( 'materialdesignblog-google-fonts' ), false, 'screen');
}
add_action( 'login_head', 'mdb_login_scripts' );

if( ! function_exists( 'mdb_excerpt_length') ) :
/**
 * Modifying excerpt's length
 * 
 * @return int
 */
function mdb_excerpt_length(){
	if( has_post_thumbnail() ){
		return false;
	} else {		
		return 90;
	}
}
endif;
add_filter( 'excerpt_length', 'mdb_excerpt_length' );

if( ! function_exists( 'mdb_excerpt_more' ) ) :
/**
 * Replacing excerpt's annoying [&hellip;]
 * 
 * @return string
 */
function mdb_excerpt_more(){
	return '';
}
endif;
add_filter( 'excerpt_more', 'mdb_excerpt_more' );

function mdb_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous .thumbnail{ display: block; background-image: url(' . esc_url( $prevthumb[0] ) . '); background-size: cover; }
			.post-navigation .nav-previous a{ padding-left: 140px }

			@media screen and ( min-width: 760px ){
				.post-navigation .nav-previous .thumbnail{ width: 150px }
				.post-navigation .nav-previous a{ padding-left: 170px }
			}
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next .thumbnail{ display: block; background-image: url(' . esc_url( $nextthumb[0] ) . '); background-size: cover; }
			.post-navigation .nav-next a{ padding-left: 140px }

			@media screen and ( min-width: 760px ){
				.post-navigation .nav-next .thumbnail{ width: 150px }
				.post-navigation .nav-next a{ padding-right: 170px; padding-left: 15px; }
			}
		';
	}

	wp_add_inline_style( 'materialdesignblog-style', $css );
}
add_action( 'wp_enqueue_scripts', 'mdb_post_nav_background' );

/**
 * Simplifying get_the_archive_title output
 */
if( ! function_exists( 'mdb_get_the_archive_title' ) ){
	function mdb_get_the_archive_title( $title ){
		if( is_category() ){
			$title = str_replace( __( 'Category: ', 'materialdesignblog' ), '', $title );
		}

		if( is_tag() ){
			$title = str_replace( __( 'Tag: ', 'materialdesignblog' ), '', $title );			
		}

		return $title;
	}
}
add_filter( 'get_the_archive_title', 'mdb_get_the_archive_title' );

/**
 * 
 */
function mdb_social_network_list(){
	return array( 'website', 'twitter', 'facebook', 'instagram', 'googleplus', 'github', 'dribbble', 'linkedin', 'youtube', 'vimeo' );
}

/**
 * If uses mandrill translate /n as br tag
 * 
 * @param bool
 * 
 * @return bool
 */
function mdb_mandrill_nl2br( $nl2br ){
	return true;
}
add_filter( 'mandrill_nl2br', 'mdb_mandrill_nl2br' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load shortcodes file.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load User customization file.
 */
require get_template_directory() . '/inc/class-users.php';

/**
 * Load Post customization file.
 */
require get_template_directory() . '/inc/class-posts.php';

/**
 * Load Front end publishing file.
 */
require get_template_directory() . '/inc/class-front-end-publishing.php';

/**
 * Incorporating morph by bonfire plugin
 */
require get_template_directory() . '/inc/plugins/morph-by-bonfire/morph.php';