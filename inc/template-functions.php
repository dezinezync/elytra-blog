<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Elytra
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function elytra_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'elytra-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'elytra-front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	// Add class for one or two column page layouts.
	if ( is_page() || is_archive() ) {
		if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
			$classes[] = 'page-one-column';
		} else {
			$classes[] = 'page-two-column';
		}
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	return $classes;
}

add_filter( 'body_class', 'elytra_body_classes' );

/**
 * Count our number of active panels.
 *
 * Primarily used to see if we have any panels active, duh.
 */
function twentyseventeen_panel_count() {

	$panel_count = 0;

	/**
	 * Filter number of front page sections in Twenty Seventeen.
	 *
	 * @since Elytra
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'elytra_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}

	return $panel_count;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function elytra_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Custom navigation markup
 */
function elytra_the_posts_navigation( $args = array() ) {
    $navigation = '';

    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        $args = wp_parse_args( $args, array(
            'prev_text'          => __( 'Older Articles' ),
            'next_text'          => __( 'Newer Articles' ),
            'screen_reader_text' => __( 'Posts navigation' ),
        ) );

        $next_link = get_previous_posts_link( $args['next_text'] );
        $prev_link = get_next_posts_link( $args['prev_text'] );

        if ( $prev_link ) {
            $navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
        }

        if ( $next_link ) {
            $navigation .= '<div class="nav-next">' . $next_link . '</div>';
        }

		// if ( $prev_link && !$next_link ) {
		// 	$navigation .= '<div class="nav-rss"><a title="Subscribe via RSS" href="/feed/">Subscribe via RSS</a></div>';
		// }

        $navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );
    }

    return $navigation;
}
