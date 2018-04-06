<?php
/* Die if it is accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Extending MDB's post mechanism
*/ 
class MaterialDesignBlog_Posts{
	public function __construct(){
		add_action( 'post_submitbox_misc_actions', 	array( $this, 'trending_checkbox' ) );
		add_action( 'save_post', 					array( $this, 'save_trending' ) );
	}

	/**
	 * Adding trending checkbox
	 */
	public function trending_checkbox(){
		global $post;

		// Only display the UI in post type post
		if( 'post' != $post->post_type )
			return;

		// Get trending status
		$trending = intval( get_post_meta( $post->ID, '_mdb_trending', true ) );

		echo '<div class="misc-pub-section misc-pub-trending">';
		echo '<label for="mdb-trending"><input id="mdb-trending" name="mdb-trending" value="1" type="checkbox" '. checked( $trending, 1, false ) .'> Trending post</label>';
		echo '</div>';

		// Adding nonce
		wp_nonce_field( 'mdb_trending_nonce_' . $post->ID, '_mdb_trending_nonce' );
	}

	/**
	 * Saving MDB trending data
	 */
	public function save_trending( $post_id ){

		// Verify input
		if( isset( $_POST['_mdb_trending_nonce'] ) && wp_verify_nonce( $_POST['_mdb_trending_nonce'], 'mdb_trending_nonce_' . $post_id ) ){

			if( isset( $_POST['mdb-trending'] ) ){
				// Save value
				update_post_meta( $post_id, '_mdb_trending', intval( $_POST['mdb-trending'] ) );				
			} else {
				// Delete value
				delete_post_meta( $post_id, '_mdb_trending' );
			}

		}
	}
}
new MaterialDesignBlog_Posts;