<?php
	
	/* ==========================================
	   Enqueue child theme style
	   ========================================== */
	function enqueue_parent_theme_style() {
    	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	}
	
	add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );

	/* ==========================================
	   Remove version info from head and feeds
	   ========================================== */
	function complete_version_removal() {
	    return '';
	}
	
	add_filter('the_generator', 'complete_version_removal');

	/* ==========================================
	   add josefin google font
	   ========================================== */
	function google_fonts() {
		$query_args = array(
			'family' => 'Josefin+Sans:300'
		);
		wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	}            
	
	add_action('wp_enqueue_scripts', 'google_fonts');

	/* ==========================================
	   Remove unnecessary page templates
	   ========================================== */
	function filter_page_templates( $page_templates ) {
 
	    // Removes item from template array.
	    unset( $page_templates['page-templates/page-with-sidebar.php'] );
	    unset( $page_templates['page-templates/boxed-page.php']);
	    unset( $page_templates['page-templates/bio-page.php']);
	    unset( $page_templates['page-templates/split-page.php']);
	 
	    // Returns the updated array.
	    return $page_templates;
	}

	add_filter( 'theme_page_templates', 'filter_page_templates');

	/* ==========================================
	   Remove unnecessary sidebars
	   ========================================== */
	function unregister_sidebars() {
	    unregister_sidebar( 'sidebar-bio-left' );
	    unregister_sidebar( 'sidebar-bio-contentleft' );
	    unregister_sidebar( 'sidebar-bio-right' );
	    unregister_sidebar( 'sidebar-bio-contentright' );
	}

	add_action( 'widgets_init', 'unregister_sidebars', 11 );

	/* ==========================================
	   Remove unnecessary widgets
	   ========================================== */

	function unregister_widgets() {
		unregister_widget('passenger_biobox_Widget');
	}

	add_action( 'widgets_init', 'unregister_widgets', 12);

	/* ==========================================
	   Add another homepage widget section
	   ========================================== */

	function add_homepage_widget() {
		register_sidebar( array(
		'name'          => __( 'Front Page Widget Area Three', 'passenger' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	}
	
	add_action( 'widgets_init', 'add_homepage_widget' );

?>