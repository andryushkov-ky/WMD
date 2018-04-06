<?php
/**
 * Register shortcode for service
 * 
 * Simple three columns item. It assumes the length of the description is the same
 */
function mdb_service_shortcode( $atts = array(), $content = false ){

	// Default
	$param = shortcode_atts( 
		array(
			'icon' 			=> 'md-home',
			'title' 		=> __( 'Title', 'materialdesignblog' ),
			'description' 	=> __( 'This is description of the service item', 'materialdesignblog' ) 
		), 
		$atts 
	);

	if( $content ){
		return "<div class='mdb-service-item'><i class='md {$param['icon']}'></i><span class='title'>{$param['title']}</span><span class='description'>{$content}</span></div>";		
	} else {
		return "<div class='mdb-service-item'><i class='md {$param['icon']}'></i><span class='title'>{$param['title']}</span><span class='description'>{$param['description']}</span></div>";
	}
}
add_shortcode( 'service', 'mdb_service_shortcode' );