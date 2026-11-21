<?php
/**
 * Prompt Next Theme Functions and Definitions
 *
 * @package PromptNext
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Setup Theme Supports and Navigations
 */
function promptnext_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Enable HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Custom Logo Support
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'promptnext'),
        'footer'  => __('Footer Navigation', 'promptnext'),
    ));
}
add_action('after_setup_theme', 'promptnext_theme_setup');

/**
 * Enqueue Styles and Scripts
 */
function promptnext_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // Google/Fontshare Satoshi Web Fonts
    wp_enqueue_style(
        'promptnext-satoshi',
        'https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap',
        array(),
        null
    );

    // Master Theme Stylesheet (style.css metadata)
    wp_enqueue_style(
        'promptnext-root',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );

    // Core Shared Layout and Component Styles
    wp_enqueue_style(
        'promptnext-main',
        get_template_directory_uri() . '/css/main.css',
        array('promptnext-satoshi'),
        $theme_version
    );

    // Page-Specific Dynamic Stylesheets
    if (is_front_page()) {
        wp_enqueue_style('promptnext-landing', get_template_directory_uri() . '/css/pages/landing.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-what-we-do.php') || is_page('what-we-do')) {
        wp_enqueue_style('promptnext-what-we-do', get_template_directory_uri() . '/css/pages/what-we-do.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-industries.php') || is_page('industries')) {
        wp_enqueue_style('promptnext-industries', get_template_directory_uri() . '/css/pages/industries.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-how-we-work.php') || is_page('how-we-work')) {
        wp_enqueue_style('promptnext-how-we-work', get_template_directory_uri() . '/css/pages/how-we-work.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-about-us.php') || is_page('about-us')) {
        wp_enqueue_style('promptnext-about-us', get_template_directory_uri() . '/css/pages/about-us.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-contact-us.php') || is_page('contact-us')) {
        wp_enqueue_style('promptnext-contact-us', get_template_directory_uri() . '/css/pages/contact-us.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-bfsi.php') || is_page('bfsi')) {
        wp_enqueue_style('promptnext-bfsi', get_template_directory_uri() . '/css/pages/bfsi.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-healthcare.php') || is_page('healthcare')) {
        wp_enqueue_style('promptnext-healthcare', get_template_directory_uri() . '/css/pages/healthcare.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-telecommunication.php') || is_page('telecommunication')) {
        wp_enqueue_style('promptnext-telecom', get_template_directory_uri() . '/css/pages/telecom.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-government.php') || is_page('government')) {
        wp_enqueue_style('promptnext-government', get_template_directory_uri() . '/css/pages/government.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-hospitality.php') || is_page('hospitality')) {
        wp_enqueue_style('promptnext-hospitality', get_template_directory_uri() . '/css/pages/hospitality.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-manufacturing.php') || is_page('manufacturing')) {
        wp_enqueue_style('promptnext-manufacturing', get_template_directory_uri() . '/css/pages/manufacturing.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-partners.php') || is_page('partners')) {
        wp_enqueue_style('promptnext-partners', get_template_directory_uri() . '/css/pages/partners.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-insights.php') || is_page('insights')) {
        wp_enqueue_style('promptnext-insights', get_template_directory_uri() . '/css/pages/insights.css', array('promptnext-main'), $theme_version);
    } elseif (is_page_template('page-templates/page-blog.php') || is_page('blog') || is_single() || is_home()) {
        wp_enqueue_style('promptnext-blog', get_template_directory_uri() . '/css/pages/blog.css', array('promptnext-main'), $theme_version);
    }

    // Interactive JavaScript Runtime (loaded in footer for fast FCP and complete DOM availability)
    wp_enqueue_script(
        'promptnext-interaction',
        get_template_directory_uri() . '/js/interaction.js',
        array(),
        $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'promptnext_enqueue_assets');

/**
 * Filter body class for subpages
 */
function promptnext_body_classes($classes) {
    if (is_page('what-we-do') || is_page_template('page-templates/page-what-we-do.php')) {
        $classes[] = 'what-we-do-page';
    }
    return $classes;
}
add_filter('body_class', 'promptnext_body_classes');

/**
 * Self-healing: Grant missing Elementor v4+ Global Classes & Atomic Widgets capabilities
 * Resolves "Access denied" on PUT /wp-json/elementor/v1/global-classes and POST design-system-sync
 */
function promptnext_register_elementor_caps() {
    $role = get_role('administrator');
    if ($role) {
        $caps = array(
            'elementor_global_classes_update_class',
            'elementor_atomic_widgets_access_styles_tab',
            'elementor_atomic_widgets_edit_local_css_class',
        );
        foreach ($caps as $cap) {
            if (!$role->has_cap($cap)) {
                $role->add_cap($cap);
            }
        }
    }
}
add_action('admin_init', 'promptnext_register_elementor_caps');


/**
 * Include Native Meta Boxes (Zero-Plugin Editing Support)
 */
if (file_exists(get_template_directory() . '/inc/admin-meta-boxes.php')) {
    require_once get_template_directory() . '/inc/admin-meta-boxes.php';
}
