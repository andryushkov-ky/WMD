<?php
/* Die if it is accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Configuring front end publishing mechanism for MDB
 * 
 */
class MaterialDesignBlog_Front_End_Publishing{
	private static $instance = null;
	public $template_directory;

	/**
	 * Returns instance of this class
	 */	
	public static function get_instance(){
		if ( null == self::$instance ){
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Initialize the plugin
	 */
	private function __construct(){
		$this->template_directory = get_template_directory();

		$this->init_hooks();
	}

	/**
	 * Hook into actions and filters
	 */
	private function init_hooks(){
		add_filter( 'login_redirect', 	array( $this, 'login_redirect' ), 100, 3);
		add_filter( 'show_admin_bar', 	array( $this, 'show_admin_bar' ) );	
		add_action( 'init', 		 	array( $this, 'register_rewrite_tag_rule' ) );	
		add_filter( 'template_include', array( $this, 'register_template' ) );	
		add_filter( 'body_class', 		array( $this, 'body_class' ) );	
		add_filter( 'option_wpfepp_errors', array( $this, 'option_wpfepp_errors' ) );
		add_filter( 'wpfepp_wp_editor', array( $this, 'wpfepp_wp_editor' ) );
	}

	/**
	 * Automatically redirect contributor below to front page when logging in
	 * 
	 * @param string url to redirect to
	 * @param string requested redirect destination URL
	 * @param obj WP_User or WP_Error
	 * 
	 * @return string url to redirect to
	 */
	public function login_redirect( $url, $request, $user ){
		$admin_url 			= admin_url();
		$admin_url_length 	= strlen( $admin_url );

	    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
	        if( ! $user->has_cap( 'publish_posts' ) && $admin_url == substr( $request, 0, $admin_url_length ) ) {
	            $url = site_url();
	        }
	    }

	    return $url;
	}

	/**
	 * Hide admin bar for contributor below
	 * 
	 * @param bool default setting for displaying admin bar
	 * 
	 * @return bool filtered setting for displaying admin bar
	 */
	public function show_admin_bar( $display_admin_bar ){

		if( is_user_logged_in() ){
			$current_user = wp_get_current_user();

			foreach ( $current_user->roles as $role ) {
				if( in_array( $role , array( 'contributor', 'subscriber' ) ) ){
					$display_admin_bar = false;
				}
			}
		}

		return $display_admin_bar;
	}

	/**
	 * Register rewrite URL
	 * 
	 * @return void
	 */
	public function register_rewrite_tag_rule(){
	    add_rewrite_tag( '%materialdesignblog_page%', 	'([^/]+)');

	    add_rewrite_rule('post-new/?$', 	'index.php?materialdesignblog_page=post-new', 'top');
	    add_rewrite_rule('posts-list/?$', 	'index.php?materialdesignblog_page=posts-list', 'top');	
	    add_rewrite_rule('edit-profile/?$', 	'index.php?materialdesignblog_page=edit-profile', 'top');	
	}

	/**
	 * Register custom template for front end publishing
	 * 
	 * @return path to template file
	 */
	public function register_template( $template ){
		if( is_mdb_page( 'post-new' ) ){
			return $this->template_directory . '/fep-post-new.php';
		} elseif( is_mdb_page( 'posts-list' ) ){
			return $this->template_directory . '/fep-post-list.php';
		} elseif( is_mdb_page( 'edit-profile' ) ){
			return $this->template_directory . '/fep-edit-profile.php';
		} else {
			return $template;			
		}
	}

	/**
	 * Register proper body class for front end publishing page
	 * 
	 * @return 
	 */
	public function body_class( $classes ){

		if( is_mdb_page( 'post-new' ) || is_mdb_page( 'posts-list' ) || is_mdb_page( 'edit-profile' ) ){

			$class_index = 0;

			// Loop the classes, and remove conflicted classes
			foreach ( $classes as $class ) {
				if( in_array( $class, array( 'home' ) ) ){
					unset( $classes[$class_index] );
				}

				$class_index++;
			}

			// Adding required classes
			$classes[] = 'page';
			$classes[] = 'front-end-publishing';
		}

		// Adding specific class for edit profile page
		if( is_mdb_page( 'edit-profile' ) ){
			$classes[] = 'edit-profile';
		}

		return $classes;
	}

	/**
	 * Filtering frontend-publishing-pro error message
	 * 
	 * @uses filter option_$option
	 * 
	 * @param array from get_option('wpfepp_errors')
	 * @return array filtered parameters
	 */
	public function option_wpfepp_errors( $error ){

		$error['required'] = __( 'This field is required. Be nice and do not spam! This involves posting the same thing over and over or posting many nonsense / irrelevant / disruptive posts.' );

		return $error;
	}

	/**
	 * Adding editor styling to frontend-publishing-pro editor
	 * 
	 * @param array wp_editor arguments
	 * @return array filtered wp_editor arguments
	 */
	public function wpfepp_wp_editor( $args ){

		$args['tinymce']['content_css'] = get_template_directory_uri() . '/editor-wpfepp.css';

		return $args;
	}
}

$MaterialDesignBlog_Front_End_Publishing = MaterialDesignBlog_Front_End_Publishing::get_instance();