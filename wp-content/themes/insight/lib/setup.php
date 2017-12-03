<?php

namespace Roots\ Sage\ Setup;

use Roots\ Sage\ Assets;

/**
 * Theme setup
 */
function setup() {
    // Enable features from Soil when plugin is activated
    // https://roots.io/plugins/soil/
    add_theme_support( 'soil-clean-up' );
    add_theme_support( 'soil-nav-walker' );
    add_theme_support( 'soil-nice-search' );
    add_theme_support( 'soil-jquery-cdn' );
    add_theme_support( 'soil-relative-urls' );

    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/sage-translations
    load_theme_textdomain( 'sage', get_template_directory() . '/lang' );

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support( 'title-tag' );

    // Enable logo upload
    // https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
    add_theme_support( 'custom-logo' );

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus( [
        'primary_navigation' => __( 'Primary Navigation', 'sage' )
    ] );

    register_nav_menus( [
        'mobile_navigation' => __( 'Mobile Navigation', 'sage' ),
        'home_navigation' => __( 'Home Navigation', 'sage' ),
        'members_navigation' => __( 'Members Navigation', 'sage'),
        'employers_navigation' => __( 'Employers Navigation', 'sage'),
        'agents_navigation' => __( 'Agents Navigation', 'sage'),
        'providers_navigation' => __( 'Providers Navigation', 'sage')
    ] );

    register_nav_menus( [
        'footer_navigation' => __( 'Footer Navigation', 'sage' )
    ] );

    // Enable post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support( 'post-thumbnails' );

    // Enable post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ] );

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );

    // Use main stylesheet for visual editor
    // To add custom styles edit /assets/styles/layouts/_tinymce.scss
    add_editor_style( Assets\ asset_path( 'styles/main.css' ) );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Register sidebars
 */
function widgets_init() {
//    register_sidebar( [
//        'name' => __( 'Sidebar Additional', 'sage' ),
//        'id' => 'sidebar-primary',
//        'before_widget' => '<section class="widget %1$s %2$s">',
//        'after_widget' => '</section>',
//        'before_title' => '<h3>',
//        'after_title' => '</h3>'
//    ] );

    register_sidebar( [
        'name' => __( 'Home Welcome', 'sage' ),
        'id' => 'home-welcome',
        'before_widget' => '<section class="widget welcome-message %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ] );

    register_sidebar( [
        'name' => __( 'Home Contact', 'sage' ),
        'id' => 'home-contact',
        'before_widget' => '<section class="widget contact-area %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ] );

    register_sidebar( [
        'name' => __( 'Audience Contact', 'sage' ),
        'id' => 'audience-contact',
        'before_widget' => '<section class="widget contact-area %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ] );

    register_sidebar( [
        'name' => __( 'Members Intro', 'sage' ),
        'id' => 'members-intro',
        'before_widget' => '<section class="widget intro %1$s %2$s">',
        'after_widget' => '</section>'
    ] );

    register_sidebar( [
        'name' => __( 'Members Quick Links', 'sage' ),
        'id' => 'members-quick-links',
        'before_widget' => '<section class="widget quick-links %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ] );

    register_sidebar( [
        'name' => __( 'Members Call To Action', 'sage' ),
        'id' => 'members_ca',
        'before_widget' => '<section class="widget call-to-action %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ] );

    register_sidebar( [
        'name' => __( 'Employers Intro', 'sage' ),
        'id' => 'employers-intro',
        'before_widget' => '<section class="widget intro %1$s %2$s">',
        'after_widget' => '</section>'
    ] );

    register_sidebar( [
        'name' => __( 'Employers Quick Links', 'sage' ),
        'id' => 'employers-quick-links',
        'before_widget' => '<section class="widget quick-links %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ] );

    register_sidebar( [
        'name' => __( 'Employers Call To Action', 'sage' ),
        'id' => 'employers_ca',
        'before_widget' => '<section class="widget call-to-action %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ] );

    register_sidebar( [
        'name' => __( 'Agents Intro', 'sage' ),
        'id' => 'agents-intro',
        'before_widget' => '<section class="widget intro %1$s %2$s">',
        'after_widget' => '</section>'
    ] );

    register_sidebar( [
        'name' => __( 'Agents Quick Links', 'sage' ),
        'id' => 'agents-quick-links',
        'before_widget' => '<section class="widget quick-links %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ] );

    register_sidebar( [
        'name' => __( 'Agents Call To Action', 'sage' ),
        'id' => 'agents_ca',
        'before_widget' => '<section class="widget call-to-action %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ] );

    register_sidebar( [
        'name' => __( 'Providers Intro', 'sage' ),
        'id' => 'providers-intro',
        'before_widget' => '<section class="widget intro %1$s %2$s">',
        'after_widget' => '</section>'
    ] );

    register_sidebar( [
        'name' => __( 'Providers Quick Links', 'sage' ),
        'id' => 'providers-quick-links',
        'before_widget' => '<section class="widget quick-links %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ] );

    register_sidebar( [
        'name' => __( 'Providers Call To Action', 'sage' ),
        'id' => 'providers_ca',
        'before_widget' => '<section class="widget call-to-action %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ] );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
    static $display;

    isset( $display ) || $display = !in_array( true, [
        // The sidebar will NOT be displayed if ANY of the following return true.
        // @link https://codex.wordpress.org/Conditional_Tags
        is_404(),
        is_front_page(),
        is_page_template( 'template-home.php' ),
        is_category(),
        is_search(),
        is_page('Privacy Terms & Conditions'),
        is_page('Contacts for Employers + Agents')
    ] );

    return apply_filters( 'sage/display_sidebar', $display );
}

/**
 * Theme assets
 */
function assets() {
    wp_enqueue_style( 'sage/css', Assets\ asset_path( 'styles/main.css' ), false, null );

    if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'sage/js', Assets\ asset_path( 'scripts/main.js' ), [ 'jquery' ], null, true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100 );