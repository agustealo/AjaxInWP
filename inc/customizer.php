<?php
/**
 * AjaxinWP Theme Customizer
 * Developed by Zeus Eternal
 */

function ajaxinwp_customize_register( $wp_customize ) {
    // Add custom sections, settings, and controls here

    // Add a new section for theme customization options
    $wp_customize->add_section('ajaxinwp_theme_options', array(
        'title'    => __('Theme Options', 'ajaxinwp'),
        'priority' => 130,
    ));

    // Add setting for theme color scheme
    $wp_customize->add_setting('ajaxinwp_color_scheme', array(
        'default'   => '#1e73be',
        'transport' => 'refresh',
    ));

    // Add control for the theme color scheme
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ajaxinwp_color_scheme', array(
        'label'    => __('Color Scheme', 'ajaxinwp'),
        'section'  => 'ajaxinwp_theme_options',
        'settings' => 'ajaxinwp_color_scheme',
    )));

    // Add setting for enabling/disabling AJAX navigation
    $wp_customize->add_setting('ajaxinwp_enable_ajax_navigation', array(
        'default'   => '1',
        'transport' => 'refresh',
    ));

    // Add control for AJAX navigation toggle
    $wp_customize->add_control('ajaxinwp_enable_ajax_navigation', array(
        'label'    => __('Enable AJAX Navigation', 'ajaxinwp'),
        'section'  => 'ajaxinwp_theme_options',
        'settings' => 'ajaxinwp_enable_ajax_navigation',
        'type'     => 'checkbox',
    ));
}

add_action( 'customize_register', 'ajaxinwp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ajaxinwp_customize_preview_js() {
    wp_enqueue_script( 'ajaxinwp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'ajaxinwp_customize_preview_js' );
