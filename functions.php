<?php

/**
 * Bed and Art functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage bed_and_art
 * @since Bed and Art 1.0
 */

/**
 * Bed and Art only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}



if ( ! function_exists( 'bed_and_art_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function bed_and_art_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	//load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bedandart' ),
		//'social'  => __( 'Social Links Menu', 'bed_and_art' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
        
        

	//$color_scheme  = twentyfifteen_get_color_scheme();
	//$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
//		'default-color'      => $default_color,
//		'default-attachment' => 'fixed',
//	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	//add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'bed_and_art_setup' );

//Aggiungo Custom post type per le gallerie
if ( ! function_exists('baa_gallerie') ) {

    // Register Custom Post Type
    function baa_gallerie() {

            $labels = array(
                    'name'                => __( 'Galleria', 'Post Type General Name', 'baa_gallerie' ),
                    'singular_name'       => __( 'Galleria', 'Post Type Singular Name', 'baa_gallerie' ),
                    'menu_name'           => __( 'Galleria', 'baa_gallerie' ),
                    'parent_item_colon'   => __( 'Parent Item:', 'baa_gallerie' ),
                    'all_items'           => __( 'Tutte le immagini', 'baa_gallerie' ),
                    'view_item'           => __( 'View Item', 'baa_gallerie' ),
                    'add_new_item'        => __( 'Aggiungi nuovo', 'baa_gallerie' ),
                    'add_new'             => __( 'Aggiungi nuovo', 'baa_gallerie' ),
                    'edit_item'           => __( 'Edit Item', 'baa_gallerie' ),
                    'update_item'         => __( 'Aggiorna', 'baa_gallerie' ),
                    'search_items'        => __( 'Search Item', 'baa_gallerie' ),
                    'not_found'           => __( 'Not found', 'baa_gallerie' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'baa_gallerie' ),
            );
            $rewrite = array(
                    'slug'                => 'baa_gallerie',
                    'with_front'          => true,
                    'pages'               => true,
                    'feeds'               => true,
            );
            $args = array(
                    'label'               => __( 'baa_gallerie', 'baa_gallerie' ),
                    'description'         => __( 'Gallerie di Bad and Art', 'baa_gallerie' ),
                    
                    'labels'              => $labels,
                    'supports'            => array( 'title', 'thumbnail', 'editor', 'custom-fields' ),
                    'hierarchical'        => false,
                    'public'              => false,
                    'show_ui'             => true,
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => false,
                    'show_in_admin_bar'   => true,
                    'menu_position'       => 6,
                    'can_export'          => true,
                    'has_archive'         => true,
                    'exclude_from_search' => true,
                    'publicly_queryable'  => true,
                    'rewrite'             => $rewrite,
                    'capability_type'     => 'post',
            );

            register_post_type( 'baa_gallerie', $args );
            register_taxonomy('galleria_type', 'baa_gallerie', array('hierarchical' => true, 'label' => 'Categorie Galleria', 'query_var' => true, 'rewrite' => true));
            

    }

    // Hook into the 'init' action
    add_action( 'init', 'baa_gallerie', 0 ); 
    
    /**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
    add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
    function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'baa_gallerie'; // change to your post type
	$taxonomy  = 'galleria_type'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
    /**
     * Filter posts by taxonomy in admin
     * @author  Mike Hemberger
     * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
     */
    add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
    function tsm_convert_id_to_term_in_query($query) {
            global $pagenow;
            $post_type = 'baa_gallerie'; // change to your post type
            $taxonomy  = 'galleria_type'; // change to your taxonomy
            $q_vars    = &$query->query_vars;
            if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
                    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                    $q_vars[$taxonomy] = $term->slug;
            }
    }
    
}

//Aggiungo Custom post type per i progetti
if ( ! function_exists('baa_projects') ) {

    // Register Custom Post Type
    function baa_projects() {

            $labels = array(
                    'name'                => __( 'Project', 'Post Type General Name', 'baa_projects' ),
                    'singular_name'       => __( 'Progetto', 'Post Type Singular Name', 'baa_projects' ),
                    'menu_name'           => __( 'Project', 'baa_projects' ),
                    'parent_item_colon'   => __( 'Parent Item:', 'baa_projects' ),
                    'all_items'           => __( 'Tutti i progetti', 'baa_projects' ),
                    'view_item'           => __( 'View Item', 'baa_projects' ),
                    'add_new_item'        => __( 'Aggiungi nuovo', 'baa_projects' ),
                    'add_new'             => __( 'Aggiungi nuovo', 'baa_projects' ),
                    'edit_item'           => __( 'Edit Item', 'baa_projects' ),
                    'update_item'         => __( 'Aggiorna', 'baa_projects' ),
                    'search_items'        => __( 'Search Item', 'baa_projects' ),
                    'not_found'           => __( 'Not found', 'baa_projects' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'baa_projects' ),
            );
            $rewrite = array(
                    'slug'                => 'baa_projects',
                    'with_front'          => true,
                    'pages'               => true,
                    'feeds'               => true,
            );
            $args = array(
                    'label'               => __( 'baa_projects', 'baa_projects' ),
                    'description'         => __( 'Progetti di Bed and Art', 'baa_projects' ),
                    
                    'labels'              => $labels,
                    'supports'            => array( 'title', 'editor', 'escerpt', 'thumbnail', 'custom-fields' ),
                    'hierarchical'        => false,
                    'public'              => false,
                    'show_ui'             => true,
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => false,
                    'show_in_admin_bar'   => true,
                    'menu_position'       => 6,
                    'can_export'          => true,
                    'has_archive'         => true,
                    'exclude_from_search' => true,
                    'publicly_queryable'  => true,
                    'rewrite'             => $rewrite,
                    'capability_type'     => 'post',
            );


            register_post_type( 'baa_projects', $args );
            register_taxonomy('project_type', 'baa_projects', array('hierarchical' => true, 'label' => 'Categorie Progetti', 'query_var' => true, 'rewrite' => true));

    }

    // Hook into the 'init' action
    add_action( 'init', 'baa_projects', 0 );   
}

//Aggiungo Custom post type per l'about
if ( ! function_exists('baa_abouts') ) {

    // Register Custom Post Type
    function baa_abouts() {

            $labels = array(
                    'name'                => __( 'About', 'Post Type General Name', 'baa_abouts' ),
                    'singular_name'       => __( 'About', 'Post Type Singular Name', 'baa_abouts' ),
                    'menu_name'           => __( 'About', 'baa_abouts' ),
                    'parent_item_colon'   => __( 'Parent Item:', 'baa_abouts' ),
                    'all_items'           => __( 'Tutti gli elementi', 'baa_abouts' ),
                    'view_item'           => __( 'View Item', 'baa_abouts' ),
                    'add_new_item'        => __( 'Aggiungi nuovo', 'baa_abouts' ),
                    'add_new'             => __( 'Aggiungi nuovo', 'baa_abouts' ),
                    'edit_item'           => __( 'Edit Item', 'baa_abouts' ),
                    'update_item'         => __( 'Aggiorna', 'baa_abouts' ),
                    'search_items'        => __( 'Search Item', 'baa_abouts' ),
                    'not_found'           => __( 'Not found', 'baa_abouts' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'baa_abouts' ),
            );
            $rewrite = array(
                    'slug'                => 'baa_abouts',
                    'with_front'          => true,
                    'pages'               => true,
                    'feeds'               => true,
            );
            $args = array(
                    'label'               => __( 'baa_abouts', 'baa_abouts' ),
                    'description'         => __( 'About in Bed and Art', 'baa_abouts' ),
                    
                    'labels'              => $labels,
                    'supports'            => array( 'title', 'editor', 'escerpt', 'thumbnail', 'custom-fields' ),
                    'hierarchical'        => false,
                    'public'              => false,
                    'show_ui'             => true,
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => false,
                    'show_in_admin_bar'   => true,
                    'menu_position'       => 6,
                    'can_export'          => true,
                    'has_archive'         => true,
                    'exclude_from_search' => true,
                    'publicly_queryable'  => true,
                    'rewrite'             => $rewrite,
                    'capability_type'     => 'post',
            );


            register_post_type( 'baa_abouts', $args );
            register_taxonomy('about_type', 'baa_abouts', array('hierarchical' => true, 'label' => 'Categorie About', 'query_var' => true, 'rewrite' => true));

    }

    // Hook into the 'init' action
    add_action( 'init', 'baa_abouts', 0 );   
    
    
    /**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
    add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_about');
    function tsm_filter_post_type_by_taxonomy_about() {
	global $typenow;
	$post_type = 'baa_abouts'; // change to your post type
	$taxonomy  = 'about_type'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
    /**
     * Filter posts by taxonomy in admin
     * @author  Mike Hemberger
     * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
     */
    add_filter('parse_query', 'tsm_convert_id_to_term_in_query_about');
    function tsm_convert_id_to_term_in_query_about($query) {
            global $pagenow;
            $post_type = 'baa_abouts'; // change to your post type
            $taxonomy  = 'about_type'; // change to your taxonomy
            $q_vars    = &$query->query_vars;
            if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
                    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                    $q_vars[$taxonomy] = $term->slug;
            }
    } 
    
    
}

//Aggiungo Custom post type per Book
if ( ! function_exists('baa_books') ) {

    // Register Custom Post Type
    function baa_books() {

            $labels = array(
                    'name'                => __( 'Books', 'Post Type General Name', 'baa_books' ),
                    'singular_name'       => __( 'Book', 'Post Type Singular Name', 'baa_books' ),
                    'menu_name'           => __( 'Books', 'baa_books' ),
                    'parent_item_colon'   => __( 'Parent Item:', 'baa_books' ),
                    'all_items'           => __( 'Tutti gli elementi', 'baa_books' ),
                    'view_item'           => __( 'View Item', 'baa_books' ),
                    'add_new_item'        => __( 'Aggiungi nuovo', 'baa_books' ),
                    'add_new'             => __( 'Aggiungi nuovo', 'baa_books' ),
                    'edit_item'           => __( 'Edit Item', 'baa_books' ),
                    'update_item'         => __( 'Aggiorna', 'baa_books' ),
                    'search_items'        => __( 'Search Item', 'baa_books' ),
                    'not_found'           => __( 'Not found', 'baa_books' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'baa_books' ),
            );
            $rewrite = array(
                    'slug'                => 'baa_books',
                    'with_front'          => true,
                    'pages'               => true,
                    'feeds'               => true,
            );
            $args = array(
                    'label'               => __( 'baa_books', 'baa_books' ),
                    'description'         => __( 'Books in Bed and Art', 'baa_books' ),
                    
                    'labels'              => $labels,
                    'supports'            => array( 'title', 'editor', 'escerpt', 'thumbnail', 'custom-fields' ),
                    'hierarchical'        => false,
                    'public'              => false,
                    'show_ui'             => true,
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => false,
                    'show_in_admin_bar'   => true,
                    'menu_position'       => 6,
                    'can_export'          => true,
                    'has_archive'         => true,
                    'exclude_from_search' => true,
                    'publicly_queryable'  => true,
                    'rewrite'             => $rewrite,
                    'capability_type'     => 'post',
            );


            register_post_type( 'baa_books', $args );
            register_taxonomy('book_type', 'baa_books', array('hierarchical' => true, 'label' => 'Categorie Books', 'query_var' => true, 'rewrite' => true));

    }

    // Hook into the 'init' action
    add_action( 'init', 'baa_books', 0 );   
    
    
    /**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
    add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_books');
    function tsm_filter_post_type_by_taxonomy_books() {
	global $typenow;
	$post_type = 'baa_books'; // change to your post type
	$taxonomy  = 'book_type'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
    /**
     * Filter posts by taxonomy in admin
     * @author  Mike Hemberger
     * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
     */
    add_filter('parse_query', 'tsm_convert_id_to_term_in_query_books');
    function tsm_convert_id_to_term_in_query_books($query) {
            global $pagenow;
            $post_type = 'baa_books'; // change to your post type
            $taxonomy  = 'book_type'; // change to your taxonomy
            $q_vars    = &$query->query_vars;
            if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
                    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                    $q_vars[$taxonomy] = $term->slug;
            }
    } 
}

//Aggiungo Custom post type per Support
if ( ! function_exists('baa_supports') ) {

    // Register Custom Post Type
    function baa_supports() {

            $labels = array(
                    'name'                => __( 'Support', 'Post Type General Name', 'baa_supports' ),
                    'singular_name'       => __( 'Support', 'Post Type Singular Name', 'baa_supports' ),
                    'menu_name'           => __( 'Support', 'baa_supports' ),
                    'parent_item_colon'   => __( 'Parent Item:', 'baa_supports' ),
                    'all_items'           => __( 'Tutti gli elementi', 'baa_supports' ),
                    'view_item'           => __( 'View Item', 'baa_supports' ),
                    'add_new_item'        => __( 'Aggiungi nuovo', 'baa_supports' ),
                    'add_new'             => __( 'Aggiungi nuovo', 'baa_supports' ),
                    'edit_item'           => __( 'Edit Item', 'baa_supports' ),
                    'update_item'         => __( 'Aggiorna', 'baa_supports' ),
                    'search_items'        => __( 'Search Item', 'baa_supports' ),
                    'not_found'           => __( 'Not found', 'baa_supports' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'baa_supports' ),
            );
            $rewrite = array(
                    'slug'                => 'baa_supports',
                    'with_front'          => true,
                    'pages'               => true,
                    'feeds'               => true,
            );
            $args = array(
                    'label'               => __( 'baa_supports', 'baa_supports' ),
                    'description'         => __( 'Support in Bed and Art', 'baa_supports' ),
                    
                    'labels'              => $labels,
                    'supports'            => array( 'title', 'editor', 'escerpt', 'thumbnail', 'custom-fields' ),
                    'hierarchical'        => false,
                    'public'              => false,
                    'show_ui'             => true,
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => false,
                    'show_in_admin_bar'   => true,
                    'menu_position'       => 6,
                    'can_export'          => true,
                    'has_archive'         => true,
                    'exclude_from_search' => true,
                    'publicly_queryable'  => true,
                    'rewrite'             => $rewrite,
                    'capability_type'     => 'post',
            );


            register_post_type( 'baa_supports', $args );
            register_taxonomy('support_type', 'baa_supports', array('hierarchical' => true, 'label' => 'Categorie Support', 'query_var' => true, 'rewrite' => true));

    }

    // Hook into the 'init' action
    add_action( 'init', 'baa_supports', 0 );   
    
    
    /**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
    add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_supports');
    function tsm_filter_post_type_by_taxonomy_supports() {
	global $typenow;
	$post_type = 'baa_supports'; // change to your post type
	$taxonomy  = 'support_type'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
    /**
     * Filter posts by taxonomy in admin
     * @author  Mike Hemberger
     * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
     */
    add_filter('parse_query', 'tsm_convert_id_to_term_in_query_supports');
    function tsm_convert_id_to_term_in_query_supports($query) {
            global $pagenow;
            $post_type = 'baa_supports'; // change to your post type
            $taxonomy  = 'support_type'; // change to your taxonomy
            $q_vars    = &$query->query_vars;
            if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
                    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                    $q_vars[$taxonomy] = $term->slug;
            }
    } 
}


//Aggiungo Custom post type per Visit
if ( ! function_exists('baa_visits') ) {

    // Register Custom Post Type
    function baa_visits() {

            $labels = array(
                    'name'                => __( 'Visit', 'Post Type General Name', 'baa_visits' ),
                    'singular_name'       => __( 'Visit', 'Post Type Singular Name', 'baa_visits' ),
                    'menu_name'           => __( 'Visit', 'baa_visits' ),
                    'parent_item_colon'   => __( 'Parent Item:', 'baa_visits' ),
                    'all_items'           => __( 'Tutti gli elementi', 'baa_visits' ),
                    'view_item'           => __( 'View Item', 'baa_visits' ),
                    'add_new_item'        => __( 'Aggiungi nuovo', 'baa_visits' ),
                    'add_new'             => __( 'Aggiungi nuovo', 'baa_visits' ),
                    'edit_item'           => __( 'Edit Item', 'baa_visits' ),
                    'update_item'         => __( 'Aggiorna', 'baa_visits' ),
                    'search_items'        => __( 'Search Item', 'baa_visits' ),
                    'not_found'           => __( 'Not found', 'baa_visits' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'baa_visits' ),
            );
            $rewrite = array(
                    'slug'                => 'baa_visits',
                    'with_front'          => true,
                    'pages'               => true,
                    'feeds'               => true,
            );
            $args = array(
                    'label'               => __( 'baa_visits', 'baa_visits' ),
                    'description'         => __( 'Visit in Bed and Art', 'baa_visits' ),
                    
                    'labels'              => $labels,
                    'supports'            => array( 'title', 'editor', 'escerpt', 'thumbnail', 'custom-fields', 'attachments' ),
                    'hierarchical'        => false,
                    'public'              => false,
                    'show_ui'             => true,
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => false,
                    'show_in_admin_bar'   => true,
                    'menu_position'       => 6,
                    'can_export'          => true,
                    'has_archive'         => true,
                    'exclude_from_search' => true,
                    'publicly_queryable'  => true,
                    'rewrite'             => $rewrite,
                    'capability_type'     => 'post',
            );


            register_post_type( 'baa_visits', $args );
            register_taxonomy('visit_type', 'baa_visits', array('hierarchical' => true, 'label' => 'Categorie Visit', 'query_var' => true, 'rewrite' => true));

    }

    // Hook into the 'init' action
    add_action( 'init', 'baa_visits', 0 );   
    
    
    /**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
    add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_visits');
    function tsm_filter_post_type_by_taxonomy_visits() {
	global $typenow;
	$post_type = 'baa_visits'; // change to your post type
	$taxonomy  = 'visit_type'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
    /**
     * Filter posts by taxonomy in admin
     * @author  Mike Hemberger
     * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
     */
    add_filter('parse_query', 'tsm_convert_id_to_term_in_query_visits');
    function tsm_convert_id_to_term_in_query_visits($query) {
            global $pagenow;
            $post_type = 'baa_visits'; // change to your post type
            $taxonomy  = 'visit_type'; // change to your taxonomy
            $q_vars    = &$query->query_vars;
            if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
                    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                    $q_vars[$taxonomy] = $term->slug;
            }
    } 
    
    
    function my_attachments( $attachments )
    {
      $fields         = array(
        array(
          'name'      => 'title',                         // unique field name
          'type'      => 'text',                          // registered field type
          'label'     => __( 'Title', 'attachments' ),    // label to display
          'default'   => 'title',                         // default value upon selection
        ),
        array(
          'name'      => 'caption',                       // unique field name
          'type'      => 'textarea',                      // registered field type
          'label'     => __( 'Caption', 'attachments' ),  // label to display
          'default'   => 'caption',                       // default value upon selection
        ),
      );

      $args = array(

        // title of the meta box (string)
        'label'         => 'My Attachments',
        // all post types to utilize (string|array)
        'post_type'     => array('baa_visits'),
        // meta box position (string) (normal, side or advanced)
        'position'      => 'normal',
        // meta box priority (string) (high, default, low, core)
        'priority'      => 'high',
        // allowed file type(s) (array) (image|video|text|audio|application)
        'filetype'      => null,  // no filetype limit
        // include a note within the meta box (string)
        'note'          => 'Attach files here!',
        // by default new Attachments will be appended to the list
        // but you can have then prepend if you set this to false
        'append'        => true,
        // text for 'Attach' button in meta box (string)
        'button_text'   => __( 'Attach Files', 'attachments' ),
        // text for modal 'Attach' button (string)
        'modal_text'    => __( 'Attach', 'attachments' ),
        // which tab should be the default in the modal (string) (browse|upload)
        'router'        => 'browse',
        // whether Attachments should set 'Uploaded to' (if not already set)
        'post_parent'   => false,
        // fields array
        'fields'        => $fields,

      );

      $attachments->register( 'my_attachments', $args ); // unique instance name
    }

    add_action( 'attachments_register', 'my_attachments' );
}


function printElement($post){
   
    if( wp_get_attachment_url( get_post_thumbnail_id($post->ID))!= false){
        //è un'immagine
        echo '<div class="swiper-slide">';
        echo '<div class="swiper-slide-image" style="background:url(\''.wp_get_attachment_url( get_post_thumbnail_id($post->ID)).'\') center center" />';
        echo '<div class="slide-description hidden-xs hidden-sm"><h1>'.$post->post_title.'</h1><p>'.$post->post_content.'</p></div>';
        echo '</div>';
        echo '</div>';
    }
    else{
        //è un video               
        $embed_video = str_replace('watch?v=', 'embed/', get_post_meta($post->ID, 'video', true));  
        echo '<div class="swiper-slide video-player">';
        echo '<div class="cover-video" style="width:100%; height:100%; position:absolute; z-index:9999; cursor:pointer"></div>';
        echo '<iframe width="100%" height="100%" src="'.$embed_video.'" frameborder="0" allowfullscreen></iframe>';
        echo '</div>';
    }
}


function printDirectElement($url){
    echo '<div class="swiper-slide">';
    echo '<div class="swiper-slide-image" style="background:url(\''.$url.'\') center center" /></div>';
    echo '</div>';
}

//calcolo altezza box menu
function calculateHeightSingleMenu($numVoci){
    $rows = $numVoci / 2;
    $rows = ceil($rows);
    return 100 / $rows;
}


function getImageBackgroundItemMenu($title){    
    //La funzione ritorna l'immagine di sfondo passato il titolo
    //devo trasformare il titolo in uno slug di categoria: titolo-menu-image
    $title = strtolower($title);
    
    if($title == 'books'){
        $title = 'book';
    }
   
    $terms = $title.'-menu-image';
    $taxonomy = $title.'_type';
    $post_type = 'baa_'.$title.'s';    
    
    //ottengo il post giusto
    $args = array(
            'post_type' => $post_type,
            'tax_query' => array(
		array(
			'taxonomy' => $taxonomy,
			'field' => 'slug',
			'terms' => $terms
		)
            )        
        );
    
    $posts = get_posts($args); 
    
    
    $idPost = null;
    foreach($posts as $post){
        $idPost = $post->ID;
    }
    
    if($idPost != null){
        return wp_get_attachment_url( get_post_thumbnail_id($idPost));    
    }
    
    
   
    return null;
}


function getIdPostFromIdCategory($idCategory){
    global $wpdb;
    //ottengo l'id
    $query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = $idCategory";
    return $wpdb->get_var($query);
    
    
}

function sortArray($array, $orderByField, $typeOrder){
        
        $sort = array();
        foreach($array as $field){ 
            foreach($field as $key=>$value){ 
                if(!isset($sort[$key])){ 
                    $sort[$key] = array(); 
                } 
                $sort[$key][] = $value; 
            } 
        } 
            
        //array_multisort($sort_partners[$orderby],SORT_ASC,$partners);
        array_multisort($sort[$orderByField],$typeOrder,$array);
        
        return $array;    
}

?>