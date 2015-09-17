<?php

add_action( 'wp_ajax_wp5_export', 'wl_mico_wp5_export' );
add_action( 'wp_ajax_nopriv_wp5_export', 'wl_mico_wp5_export' );

function wl_mico_wp5_export(){

	// Retrieve all published data
	$posts = get_posts( array(
		'post_status' => 'publish',
		'posts_per_page' => '-1',
		), OBJECT );

	// Loop on retrieved data to compose post objects collection
	$posts = array_map( function( $post ){  
		
		// Retrieve classification boxes definition
		$boxes = unserialize( WL_CORE_POST_CLASSIFICATION_BOXES );
	
		$object = array();

		$object[ 'id' ] = $post->post_name;
		$object[ 'body' ] = wp_strip_all_tags( $post->post_content );
		$object[ 'entities' ] = array();

		foreach ( $boxes as $box ) {
			$object[ 'entities' ][ $box[ "id" ] ] = array_map( function( $entity_id ) {
			  return wl_get_entity_uri( $entity_id ); 
			}, wl_core_get_related_entity_ids( $post->ID, array( "predicate" => $box[ "id" ] ) ) );
		}

		return $object;

	}, $posts );

	wl_core_send_json( $posts );

}