<?php

/**
 * Polvolab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package polvolab
 */

//Turn on all error reporting
error_reporting();//error_reporting(0) to turn off

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */

if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

// Replace the version number of the theme on each release.
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('polvolab_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function polvolab_setup() {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         * The .mo files must use language-only filenames, like languages/de_DE.mo in your theme directory.
         * Unlike plugin language files, a name like my_theme-de_DE.mo will NOT work. 
         * Although plugin language files allow you to specify the text-domain in the filename, this will NOT work with themes. 
         * Language files for themes should include the language shortcut ONLY.
         */

        load_theme_textdomain('polvolab', get_stylesheet_directory() . '/languages');

        /**
         * This feature enables Post Thumbnails (https://codex.wordpress.org/Post_Thumbnails) support for a theme. 
         * Note that you can optionally pass a second argument, $args, 
         * with an array of the Post Types (https://codex.wordpress.org/Post_Types) for which you want to enable this feature.
         */

        add_theme_support('post-thumbnails');
        //add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
        //add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only
        //add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies

        /**
         * To display thumbnails in themes index.php or single.php or custom templates, use:
         * 
         * the_post_thumbnail();
         * 
         * To check if there is a post thumbnail assigned to the post before displaying it, use:
         * 
         * if ( has_post_thumbnail() ) {
         *  the_post_thumbnail();
         * }
         */

        /**
         * Registers navigation menu locations for a theme.
         * Use register_nav_menu() for creating a single menu. 
         * See Navigation Menus (https://codex.wordpress.org/Navigation_Menus) for adding theme support.
         */

        register_nav_menus(array(
            'header' => __('Header Menu', 'polvolab'),
            //'main' => __('Main Menu', 'polvolab'),
            'footer' => __('Footer Menu', 'polvolab'),
        ));

        /**
         * This feature enables Post Formats support for a theme. When using child themes, be aware that it
         * will override the formats as defined by the parent theme, not add to it.
         */

        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ));
        
        /**
         * To enable the specific formats (see supported formats at Post Formats), use:
         * add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
         * To check if there is a ‘quote’ post format assigned to the post, use has_post_format():
         * // In your theme single.php, page.php or custom post type
         * if ( has_post_format( 'quote' ) ) {
         *  echo 'This is a quote.';
         * }
         */

         // This feature enables plugins and themes to manage the document title tag (https://codex.wordpress.org/Title_Tag). 

        add_theme_support('title-tag');

           // Enables Theme_Logo (https://codex.wordpress.org/Theme_Logo) support for a theme.

        add_theme_support('custom-logo');

        /**
            * Note that you can add default arguments using:
            * add_theme_support( 'custom-logo', array(
            *     'height'               => 100,
            *     'width'                => 400,
            *     'flex-height'          => true,
            *     'flex-width'           => true,
            *     'header-text'          => array( 'site-title', 'site-description' ),
            *     'unlink-homepage-logo' => true,
            * ) );
            */

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */

        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

        //This feature enables Custom_Backgrounds (https://codex.wordpress.org/Custom_Backgrounds) support for a theme.

        add_theme_support('custom-background');

        /**
         * Note that you can add default arguments using:
         * $defaults = array(
         *   'default-image'          => '',
         *   'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
         *   'default-position-x'     => 'left',    // 'left', 'center', 'right'
         *   'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
         *   'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
         *   'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
         *   'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
         *   'default-color'          => '',
         *   'wp-head-callback'       => '_custom_background_cb',
         *   'admin-head-callback'    => '',
         *   'admin-preview-callback' => '',
         *  );
         *add_theme_support( 'custom-background', $defaults );
         */
        }


    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version
    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles'); // Disabling emoji library from Wordpress.
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink  
    remove_action('wp_head', 'rest_output_link_wp_head', 10); //Disable Link header for the REST API
    remove_action('template_redirect', 'rest_output_link_header', 11, 0); //Disable Link header for the REST API
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10); //Remove oEmbed discovery links
    remove_action('wp_head', 'rest_output_link_wp_head', 10); // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    remove_action('rest_api_init', 'wp_oembed_register_route'); // Remove the REST API endpoint.
    add_filter('embed_oembed_discover', '__return_false'); // Turn off oEmbed auto discovery.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10); // Don't filter oEmbed results.
    remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_host_js'); // Remove oEmbed-specific JavaScript from the front-end and back-end.
    // Remove all embeds rewrite rules.
    //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

endif; // polvolab_setup

add_action('after_setup_theme', 'polvolab_setup');

function get_custom_mobile_logo_url() {
    // Get the template directory URI
    $template_dir_uri = get_stylesheet_directory_uri();

    // Construct the relative path to the mobile logo image
    $mobile_logo_relative_path = '/assets/images/polvo-logo.svg';

    // Combine the template directory URI and the relative path to get the full URL
    $mobile_logo_url = $template_dir_uri . $mobile_logo_relative_path;

    return esc_url($mobile_logo_url);
}




/* Remove wp version from any enqueued scripts
* --------------------------------------------------------------------------------- */

function remove_css_js_version($src) {
    if (strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

add_filter('style_loader_src', 'remove_css_js_version', 9999);
add_filter('script_loader_src', 'remove_css_js_version', 9999);

// remove wp version number from head and rss

function remove_version() {
    return '';
}

add_filter('the_generator', 'remove_version');

function translate_words_array($translated) {
    $words = array(
        // 'word to translate' = > 'translation'
        'Produtos relacionados' => 'Quem viu também gostou',
    );
    $translated = str_ireplace(array_keys($words),  $words,  $translated);
    return $translated;
}

//Page Slug Body Class

function add_slug_body_class($classes) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}

add_filter('body_class', 'add_slug_body_class');

/* Custom logo URL on login page
* --------------------------------------------------------------------------------- */

function custom_logo_login_url() {
    return home_url();
}

add_filter('login_headerurl', 'custom_logo_login_url');

/* Custom admin footer
* --------------------------------------------------------------------------------- */

function custom_admin_footer() {
    echo '<a target="_blank" href="' . home_url() . '">' . get_bloginfo('name') . '</a> &copy; ' . date('Y');
}

add_filter('admin_footer_text', 'custom_admin_footer');

/* Remove WordPress logo from top bar
* --------------------------------------------------------------------------------- */

function remove_logo_toolbar($wp_toolbar) {
    global $wp_admin_bar;
    $wp_toolbar->remove_node('wp-logo');
}

add_action('admin_bar_menu', 'remove_logo_toolbar');

/* Add custom logo in WordPress login screen
* --------------------------------------------------------------------------------- */

$location_path = get_stylesheet_directory_uri();
function my_custom_login_logo() {
    global $location_path;
    echo '<style type="text/css">
		.login h1 a {
		background-image:url(' . $location_path . '/assets/images/Logo-header.png);
		width: 280px;
		height: 52px;
		margin-bottom: 0;
		background-size: cover;
	}
	</style>';
}

add_action('login_head', 'my_custom_login_logo');

/* Custom logo title on login page
* --------------------------------------------------------------------------------- */

function custom_logo_login_title() {
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'custom_logo_login_title');

/* Remove Recent Comments
* --------------------------------------------------------------------------------- */

function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action('widgets_init', 'remove_recent_comments_style');

/* Checks if there are any posts in the results
* --------------------------------------------------------------------------------- */

function is_search_has_results() {
    return 0 != $GLOBALS['wp_query']->found_posts;
}

/* Function to create the menu
* --------------------------------------------------------------------------------- */

function default_theme_nav($menu_location, $menu_class, $menu_id) {
    wp_nav_menu(
        array(
            'theme_location'  => $menu_location, // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
            'menu'            => '', // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
            'container'       => 'div', // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
            'container_class' => '', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
            // 'container_id'    => $menu_id, // (string) The ID that is applied to the container.
            'menu_class'      => $menu_class, // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
            'menu_id'         => $menu_id, // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
            'echo'            => true, // (bool) Whether to echo the menu or return it. Default true.
            'fallback_cb'     => 'wp_page_menu', // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
            'before'          => '', // (string) Text before the link markup.
            'after'           => '', // (string) Text after the link markup.
            'link_before'     => '', // (string) Text before the link text.
            'link_after'      => '', // (string) Text after the link text.
            //'items_wrap'      => '<ul>%3$s</ul>', // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
            'item_spacing'      => 'preserve', // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
            'depth'           => 0, // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
            'walker'          => '' // (object) Instance of a custom walker class.
        )
    );
}

// Custom login header text.

add_filter('login_headertext', 'customize_login_headertext');

function customize_login_headertext($headertext) {
    $headertxt = esc_html__('Welcome', 'plugin-textdomain');
    return $headertext;
}

/*
* Remove JSON API links in header html
*/

function remove_json_api(){

    // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');

    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Remove all embeds rewrite rules.
    //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action('after_setup_theme', 'remove_json_api');

/**
 * Snippet completely disable the REST API and shows {"code":"rest_disabled","message":"The REST API is disabled on this site."} 
 * when visiting http://yoursite.com/wp-json/
 */

function disable_json_api() {

    // Filters for WP-API version 1.x
    add_filter('json_enabled', '__return_false');
    add_filter('json_jsonp_enabled', '__return_false');

    // Filters for WP-API version 2.x
    add_filter('rest_enabled', '__return_false');
    add_filter('rest_jsonp_enabled', '__return_false');
}

add_action('after_setup_theme', 'disable_json_api');

/**
 * Enqueue scripts and styles.
 */

function polvolab_scripts() {

    wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', false, 'all');
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array('bootstrap-style'), false, 'all');
    wp_enqueue_style('polvolab-stylesheet', get_stylesheet_uri(), array(), 'polvolab_VERSION');

    // scripts
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', true, null);
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('bootstrap', 'jquery'), '1.0.0', true);
    wp_enqueue_script('polvolab-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('slick-js', 'jquery'), null, true);

    // Get the ID of the "Home" page
    $home_page_id = get_option('page_on_front');

    // Get the featured image URL of the home page
    $featured_image_url = get_the_post_thumbnail_url($home_page_id);

    // Pass the featured image URL to the JavaScript
    wp_localize_script('polvolab-js', 'featuredImageData', array('featuredImageUrl' => $featured_image_url));
}

add_action('wp_enqueue_scripts', 'polvolab_scripts', 99);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function polvolab_register_sidebars() {

    register_sidebar(array(
        'name'          => esc_html__('Home Section Two', 'polvolab'),
        'id'            => 'home-section-two',
        'description'   => esc_html__('Widgets added here would appear inside the second section of the home', 'polvolab'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ));
    register_sidebar(array(
        'name'          => esc_html__('404 Page', 'polvolab'),
        'id'            => '404',
        'description'   => esc_html__('Widgets added here would appear inside the 404 page', 'polvolab'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ));
}

add_action('widgets_init', 'polvolab_register_sidebars');


// Replaces the excerpt "Read More" text by a link

function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="' . get_permalink($post->ID) . '"> [...]</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function remove_default_favicon() {
    // Remove WordPress default favicon actions
    remove_action('wp_head', 'wp_site_icon', 99);
}
add_action('init', 'remove_default_favicon');

function custom_child_theme_favicon() {
    echo '<link rel="icon" type="image/x-icon" href="' . esc_url( get_stylesheet_directory_uri() . '/favicon.ico' ) . '" />' . "\n";
    echo '<link rel="icon" href="' . esc_url( get_stylesheet_directory_uri() . '/favicon.png' ) . '" sizes="32x32" />' . "\n";
    echo '<link rel="icon" href="' . esc_url( get_stylesheet_directory_uri() . '/favicon.png' ) . '" sizes="192x192" />' . "\n";
    echo '<link rel="apple-touch-icon" href="' . esc_url( get_stylesheet_directory_uri() . '/favicon.png' ) . '" />' . "\n";
    echo '<meta name="msapplication-TileImage" content="' . esc_url( get_stylesheet_directory_uri() . '/favicon.png' ) . '" />' . "\n";
}

add_action( 'wp_head', 'custom_child_theme_favicon' );

function custom_excerpt( $length = 500 ) {
    $content = get_the_content();
    $excerpt = mb_substr( $content, 0, $length );

    // If the content is longer than the excerpt, add "..." at the end
    if ( mb_strlen( $content ) > $length ) {
        $excerpt .= '...';
    }
    // Wrap the excerpt in a <p> tag with the class
    $excerpt = '<p class="mx-3">' . $excerpt . '</p>';

    return apply_filters( 'the_content', $excerpt );
}



