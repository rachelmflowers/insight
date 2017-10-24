<?php

namespace Roots\ Sage\ Extras;

use Roots\ Sage\ Setup;
/**
 * Add <body> classes
 */
function body_class( $classes ) {
    // Add page slug if it doesn't exist
    if ( is_single() || is_page() && !is_front_page() ) {
        if ( !in_array( basename( get_permalink() ), $classes ) ) {
            $classes[] = basename( get_permalink() );
        }
    }
    
    $logged_in = is_user_logged_in() ? "logged-in" : "logged-out";
    
    $classes[] = $logged_in;
    
    // Add classes for audience sections
    if ( is_category( '10' ) ) {
        $classes[] = "members-page";
    } elseif ( is_category( '11' ) ) {
        $classes[] = "employers-page";
    } elseif ( is_category( '12' ) ) {
        $classes[] = "agents-page";
    } elseif ( is_category( '13' ) ) {
        $classes[] = "providers-page";
    }

    // Add class if sidebar is active
    if ( Setup\ display_sidebar() ) {
        $classes[] = 'sidebar-primary';
    }

    return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
    return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'sage' ) . '</a>';
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );