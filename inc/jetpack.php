<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package MaterialDesignBlog
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function mdb_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' 		=> 'main',
		'footer'    		=> 'page',
		'posts_per_page' 	=> 10
	) );
}
add_action( 'after_setup_theme', 'mdb_jetpack_setup' );