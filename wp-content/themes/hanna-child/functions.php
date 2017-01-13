<?php
	
	/* ==========================================
	   Enqueue child theme style
	   ========================================== */
	function enqueue_parent_theme_style() {
    	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	}
	
	add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );

	/* ==========================================
	   Remove comments from jetpack carousel
	   ========================================== */

	function tweakjp_rm_comments_att( $open, $post_id ) {
    	$post = get_post( $post_id );
    	if( $post->post_type == 'attachment' ) {
        	return false;
    	}
    	return $open;
	}
	add_filter( 'comments_open', 'tweakjp_rm_comments_att', 10 , 2 );
?>