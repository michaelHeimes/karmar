<?php
/**
 * Karmar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Karmar
 */

if ( ! function_exists( 'karmar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function karmar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Karmar, use a find and replace
		 * to change 'karmar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'karmar', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'karmar' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'karmar_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'karmar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function karmar_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'karmar_content_width', 640 );
}
add_action( 'after_setup_theme', 'karmar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function karmar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'karmar' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'karmar' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'karmar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function karmar_scripts() {
	wp_enqueue_style( 'karmar-style', get_stylesheet_uri() );

	wp_enqueue_script( 'karmar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'karmar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	if(is_front_page() || is_singular('listings') || is_page_template('page-template-about.php')) {
		wp_enqueue_style( 'karmar-slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
		wp_enqueue_script( 'karmar-slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.8.1', true );	
	}

	if(is_singular('listings') || is_page_template('page-template-contact.php')) {
		wp_enqueue_script( 'karmar-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB_6tbyFLKar9JvxizGWTVrM8VL9WKrIJk', array(), '20151215', true );			
	}
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'karmar-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	

	
}
add_action( 'wp_enqueue_scripts', 'karmar_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// ***** CUSTOM *****
// Google Fonts
function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Karla', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

// CUSTOM IMAGE SIZES
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
add_image_size( 'propertyarchivethumb', 596, 455, true );
add_image_size( 'featured-property-archive-thumb', 354, 276, true );
add_image_size( 'property-slide', 862, 439, true );
add_image_size( 'property-slider-thumb', 172, 85, true );
add_image_size( 'similar-thumb', 370, 221, true );
add_image_size( 'home-testimonial-img', 200, 200, true );
add_image_size( 'news-archive-thumb', 434, 350, true );
add_image_size( 'mobile-news-archive-thumb', 511, 287, true );
add_image_size( 'single-news-banner', 2000, 500, true );
add_image_size( 'team-portrait', 395, 246, true );
}

// Add ACF Options
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();
}

// Register Footer Widgets
register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

// Register Footer Nav Menu
function wpb_custom_new_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

// Register Footer Social media Menu
function wp_custom_new_menu() {
  register_nav_menu('footer-social',__( 'Footer Social' ));
}
add_action( 'init', 'wp_custom_new_menu' );


// Allow is_post_type
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

// Allow CPT Category Archives
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'listings'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}

// Get query for Sale and Lease buttons

/*
function new_query_var() {

    global $wp;
    $wp->add_query_var('availability');

}

add_filter('init', 'new_query_var');
*/

/*
function my_pre_get_posts( $query ) {
	if( is_admin() ) {
		return $query;
	}
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'listings' ) {
		if( isset($_GET['availability']) ) {
    		$query->set('meta_key', 'availability');
			$query->set('meta_value', $_GET['availability']);
    	} 
	}
	// return
	return $query;
}
add_action('pre_get_posts', 'my_pre_get_posts');
*/


// Numbered Post Navigation
function wordpress_numeric_post_nav() {
    if( is_singular() )
        return;
    global $wp_query;
    /* Stop the code if there is only a single page page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /*Add current page into the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /*Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="numbered-page-nav"><ul>' . "\n";
    /*Display Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="prev-next pn-prev">%s</li>' . "\n", get_previous_posts_link('<i class="fas fa-angle-left"></i>') );
    /*Display Link to first page*/
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
    /* Link to current page */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="prev-next pn-next">%s</li>' . "\n", get_next_posts_link('<i class="fas fa-angle-right"></i>') );
    echo '</ul></div>' . "\n";
}

// Add all-listings to lisiting archive body tag
add_action('wp', 'custom1');
function custom1() {
	if ( is_archive('listings') && !is_tax() ) {
		
		add_filter( 'body_class', 'section_id_class1' );
	
		function section_id_class1( $classes ) {
		
        $id = get_current_blog_id();
        $slug = strtolower(str_replace(' ', '-', trim(get_bloginfo('name'))));
        $classes[] = $slug;
        $classes[] = 'all-listings';
        return $classes;
		}
	}
}

//Body Class For Retail Archive
function my_custom_body_class_category($classes) {
    if ( is_archive('listings') && is_tax('property_type', 'retail'))
        $classes[] = 'retail-archive';
        
    elseif ( is_archive('listings') && is_tax('property_type', 'investment'))
        $classes[] = 'investment-archive';
        
    elseif ( is_archive('listings') && is_tax('property_type', 'office'))
        $classes[] = 'office-archive';
  
    elseif ( is_archive('listings') && is_tax('property_type', 'industrial'))
        $classes[] = 'industrial-archive';
        
    elseif ( is_archive('listings') && is_tax('property_type', 'land'))
        $classes[] = 'land-archive';
        
    elseif ( is_archive('listings') && is_tax('property_type', 'mixed-use'))
        $classes[] = 'mixed-use-archive';
        
    elseif ( is_archive('listings') && is_tax('property_type', 'multi-family'))
        $classes[] = 'multi-family-archive';
        
    elseif ( is_archive('listings') && is_tax('property_type', 'sold-leased'))
        $classes[] = 'sold-leased-archive';
            return $classes;
} 
add_filter('body_class','my_custom_body_class_category');

// ACF Google Map
// API
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyB_6tbyFLKar9JvxizGWTVrM8VL9WKrIJk');
}

add_action('acf/init', 'my_acf_init');

// Rename Posts as News
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );


