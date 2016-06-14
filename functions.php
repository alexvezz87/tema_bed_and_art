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


@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '600' );


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
            
            
        
        function gallery_attachments( $attachments )
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
            'post_type'     => array( 'baa_gallerie' ),

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

          $attachments->register( 'gallery_attachments', $args ); // unique instance name
        }

        add_action( 'attachments_register', 'gallery_attachments' );

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

//Aggiungo Custom post type per Video
if ( ! function_exists('baa_videos') ) {

    // Register Custom Post Type
    function baa_videos() {

            $labels = array(
                    'name'                => __( 'Videos', 'Post Type General Name', 'baa_videos' ),
                    'singular_name'       => __( 'Video', 'Post Type Singular Name', 'baa_videos' ),
                    'menu_name'           => __( 'Video', 'baa_videos' ),
                    'parent_item_colon'   => __( 'Parent Item:', 'baa_videos' ),
                    'all_items'           => __( 'Tutti gli elementi', 'baa_videos' ),
                    'view_item'           => __( 'View Item', 'baa_videos' ),
                    'add_new_item'        => __( 'Aggiungi nuovo', 'baa_videos' ),
                    'add_new'             => __( 'Aggiungi nuovo', 'baa_videos' ),
                    'edit_item'           => __( 'Edit Item', 'baa_videos' ),
                    'update_item'         => __( 'Aggiorna', 'baa_videos' ),
                    'search_items'        => __( 'Search Item', 'baa_videos' ),
                    'not_found'           => __( 'Not found', 'baa_videos' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'baa_videos' ),
            );
            $rewrite = array(
                    'slug'                => 'baa_videos',
                    'with_front'          => true,
                    'pages'               => true,
                    'feeds'               => true,
            );
            $args = array(
                    'label'               => __( 'baa_videos', 'baa_videos' ),
                    'description'         => __( 'Videos in Bed and Art', 'baa_videos' ),
                    
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


            register_post_type( 'baa_videos', $args );
            register_taxonomy('video_type', 'baa_videos', array('hierarchical' => true, 'label' => 'Categorie Video', 'query_var' => true, 'rewrite' => true));

    }

    // Hook into the 'init' action
    add_action( 'init', 'baa_videos', 0 );   
    
    
    /**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
    add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_videos');
    function tsm_filter_post_type_by_taxonomy_videos() {
	global $typenow;
	$post_type = 'baa_videos'; // change to your post type
	$taxonomy  = 'video_type'; // change to your taxonomy
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
    add_filter('parse_query', 'tsm_convert_id_to_term_in_query_videos');
    function tsm_convert_id_to_term_in_query_videos($query) {
            global $pagenow;
            $post_type = 'baa_videos'; // change to your post type
            $taxonomy  = 'video_type'; // change to your taxonomy
            $q_vars    = &$query->query_vars;
            if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
                    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                    $q_vars[$taxonomy] = $term->slug;
            }
    } 
}



function printElement($post){
    $attachments = new Attachments( 'gallery_attachments', $post->ID );
    $path_img = esc_url( get_template_directory_uri() ).'/images/';
   
    if($attachments->exist()){
        //VIDEO INTERNO
        //echo '<div class="swiper-slide video-player-interno">';
        echo '<video class="cover-video" autoplay muted loop>';
        while($attachments->get()){
            $extension = explode('.', $attachments->url());
            $ext = $extension[count($extension)-1];
            echo '<source src="'.$attachments->url().'" type="video/'.$ext.'">';
        }               
        echo '</video>';
        //echo '<div class="slide-description"><img src="'.$path_img.'video_play_black.png" /><h1 class="hidden-xs hidden-sm">'.$post->post_title.'</h1><p class="hidden-xs hidden-sm">'.$post->post_content.'</p></div>';
        //echo '</div>';
    }      
    else if( wp_get_attachment_url( get_post_thumbnail_id($post->ID))!= false){
        //è un'immagine
        echo '<div class="swiper-slide">';
        echo '<div class="swiper-slide-image" style="background:url(\''.wp_get_attachment_url( get_post_thumbnail_id($post->ID)).'\') center center" />';
        echo '<div class="slide-description hidden-xs hidden-sm"><h1>'.$post->post_title.'</h1><p>'.$post->post_content.'</p></div>';
        echo '</div>';
        echo '</div>';
    }    
    else{
        
        //è un video di youtube           
        
        //$embed_video = str_replace('watch?v=', 'embed/', get_post_meta($post->ID, 'video', true)); 
        $embed_video = explode('watch?v=', get_post_meta($post->ID, 'video', true));
        $idVideo = $embed_video[count($embed_video)-1];       
    ?>    
        
      
        <div id="video"></div>

        <script>
           
            $('#video').YTPlayer({

               fitToBackground: true,

               videoId: '<?php echo $idVideo ?>'

            });            

        </script>
        
        
        
        
    
        

<?php
        
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
    $taxonomy = 'galleria_type';
    $post_type = 'baa_gallerie';    
    
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

function getTextBetweenTags($tag, $html, $strict=0){
    /*** a new dom object ***/
    $dom = new domDocument;

    /*** load the html into the object ***/
    if($strict==1)
    {
        $dom->loadXML($html);
    }
    else
    {
        @$dom->loadHTML($html);
    }

    /*** discard white space ***/
    $dom->preserveWhiteSpace = false;

    /*** the tag by its tag name ***/
    $content = $dom->getElementsByTagname($tag);

    /*** the array to return ***/
    $out = array();
    foreach ($content as $item)
    {
        /*** add node value to the out array ***/
        $out[] = $item->nodeValue;
    }
    /*** return the results ***/
    return $out;
}

function printPreviewBlogPost($item){
?>    

    <div class="blog-post">
        <h2 class="red-1"><?php echo $item->post_title ?></h2>
        <h4><?php echo get_the_author_meta('display_name', $item->post_author ); ?> - <?php echo get_the_date('', $item->ID) ?></h4>
        <div class="image">
            <a href="<?php echo $item->guid ?>">
                <div class="link">
                    <a href="<?php echo $item->guid ?>">See more ></a>
                </div>
                <div class="image-post" style="background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($item->ID))  ?>') center center"></div>                
            </a>
           
        </div>
        <div class="excerpt">
            <p><?php echo $item->post_excerpt ?></p>
        </div>
        
    </div>
<?php
}

function printPreviewBlogPosts($fields){
 
    $count_post = 0;   
    foreach($fields as $item){
        if($count_post == 0){
?>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 first-post">
                    <?php printPreviewBlogPost($item); ?>
                </div>
            </div>

<?php 
        }
        else{
            if($count_post % 2 != 0){
                ?>
                    <div class="row">
                <?php
            }
?>                    
            <div class="col-xs-12 col-md-6 not-first-post">
                <?php printPreviewBlogPost($item); ?>
            </div>                        
<?php
            if($count_post % 2 == 0 || $count_post == (count($fields) - 1)){
                //chiudo il div se il post è divisibile per due oppure è l'ultimo
                ?>
                    </div>
                <?php
            }
        }
        $count_post++;
    }
            
}


add_action( 'wp_ajax_my_ajax', 'my_ajax_callback' );
add_action( 'wp_ajax_nopriv_my_ajax', 'my_ajax_callback' );
function my_ajax_callback(){    
    
    if(isset($_POST['offset'])){
        //faccio una call con offset indicato
        $args = array(
            'posts_per_page'   => 4,
            'offset'           => $_POST['offset'],
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
        
       $fields = get_posts($args); 
       $result = array();
       foreach($fields as $item){
           $temp = array();
           $temp['title'] = $item->post_title;
           $temp['subtitle'] = get_the_author_meta('display_name', $item->post_author ).' - '.get_the_date('', $item->ID);
           $temp['image'] = wp_get_attachment_url( get_post_thumbnail_id($item->ID));
           $temp['excerpt'] = $item->post_excerpt;
           $temp['link'] = $item->guid;
           
           array_push($result, $temp);
           
       }
       
       
       echo json_encode($result);
       wp_die();  
        
    }
    else{
        echo 'miao';
    }
    
}


function printFooter(){
    $path_img = esc_url( get_template_directory_uri() ).'/images/';
    
?>
     </div>
<!-- end main content -->

<!-- Booking form -->
<div id="booking-form" class="black-container">
    <div class="col-xs-12 col-md-6">
        <h2>Contact for bookings</h2><span class="close-form">X</span>
        <div class="form-container">
            <?php echo do_shortcode('[contact-form-7 id="109" title="booking-form"]') ?>
        </div>
    </div>
</div>
<!-- end Booking form -->

<!-- Newsletter -->
<div id="newsletter-form" class="black-container">
    <div class="col-xs-12 col-md-6">
        <h2>Subscribe to the Newsletter</h2><span class="close-form">X</span>
        <div class="form-container">
        <?php 
            $widgetNL = new WYSIJA_NL_Widget(true);
            echo $widgetNL->widget(array('form' => 2, 'form_type' => 'php'));
        ?>
        </div>
    </div>
</div>
<!-- end Newsletter -->

<footer class="site-footer container-fluid" role="contentinfo">
    <div class="row">
        <div class="copyright col-xs-12 col-md-3">
            <p style="font-size:0.9em">
                P. IVA 04275020271<br>                
                B&A - Bed and Art è stato registrato il 7/07/2014 presso il ministero dello Sviluppo Economico.<br>
                <a href="mailto:info@bedandart.it">info@bedandart.it</a><br>
                Venezia, San Marco, 30124. <br>
                Copyright &copy; 2015 All right reserved
            </p>
        </div>
        <div class="field col-xs-12 col-md-3">
            <h3 class="booking-link">BOOKING NOW</h3>
        </div>
        <div class="field col-xs-12 col-md-3">
            <h3 class="newsletter-link">NEWSLETTER</h3>
        </div>
        <div class="field col-xs-12 col-md-3">
            <div class="social-links-container">
                <ul class="social-link">
                    <li>
                        <a target="_blank" href="https://www.youtube.com/channel/UCNOwuPM7QAtmUxSdNOro8dA"><img src="<?php echo $path_img ?>social_youtube.png" alt="youtube" /></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.facebook.com/bedandartvenice"><img src="<?php echo $path_img ?>social_facebook.png" alt="facebook" /></a>
                    </li>               
                    <li>
                        <a target="_blank" href="https://www.instagram.com/bedandart.it/"><img src="<?php echo $path_img ?>social_instagram.png" alt="instagram"/></a>
                    </li>               
                </ul>
                <a href="#header-top" class="arrow-up"></a>
            </div>
        </div>
    </div>
    
		
</footer><!-- .site-footer -->   
<?php
}

?>