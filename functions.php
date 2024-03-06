<?php
/**
 * Functions and definitions for AjaxinWP Theme
 * Developed by Zeus Eternal
 */

if ( ! function_exists( 'ajaxinwp_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function ajaxinwp_setup() {
        // Make theme available for translation.
        load_theme_textdomain( 'ajaxinwp', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Register menu locations.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'ajaxinwp' ),
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add theme support for responsive embeds.
        add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'ajaxinwp_setup' );

// Enqueue CSS stylesheet
function enqueue_theme_styles() {
    // Enqueue main theme stylesheet
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');

/**
 * Enqueue scripts and styles.
 */
function ajaxinwp_scripts() {
    wp_enqueue_style( 'ajaxinwp-style', get_stylesheet_uri() );

    wp_enqueue_script( 'ajaxinwp-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'ajaxinwp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Enqueue AJAX scripts
    wp_enqueue_script( 'ajaxinwp-ajax', get_template_directory_uri() . '/assets/js/ajaxinwp.js', array( 'jquery' ), null, true );
    wp_localize_script( 'ajaxinwp-ajax', 'ajaxinwp_params', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'ajaxinwp_nonce' ),
    ) );
}

add_action( 'wp_enqueue_scripts', 'ajaxinwp_scripts' );

/**
 * Implement additional files.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/ajax.php';

function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
