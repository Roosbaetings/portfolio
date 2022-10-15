<?php

/**
 * Based on: https://github.com/olefredrik/FoundationPress
 */

/**
 * Start cleanup functions
 * ----------------------------------------------------------------------------
 */

if ( ! function_exists( 'theme_cleanup' ) ) {
	function theme_cleanup() {

		// launching operation cleanup
		add_action('init', 'theme_cleanup_head');

		// remove WP version from RSS
		add_filter('the_generator', 'theme_remove_rss_version');

		// remove pesky injected css for recent comments widget
		add_filter( 'wp_head', 'theme_remove_wp_widget_recent_comments_style', 1 );

		// clean up comment styles in the head
		add_action('wp_head', 'theme_remove_recent_comments_style', 1);

		// clean up gallery output in wp
		add_filter('gallery_style', 'gallery_style');
	}

	add_action('after_setup_theme','theme_cleanup');
}


/**
 * Clean up head
 * ----------------------------------------------------------------------------
 */
if ( ! function_exists( 'theme_cleanup_head' ) ) {
	function theme_cleanup_head() {

		// EditURI link.
		remove_action( 'wp_head', 'rsd_link' );
		
		// Category feed links.
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		
		// Post and comment feed links.
		remove_action( 'wp_head', 'feed_links', 2 );
		
		// Windows Live Writer.
		remove_action( 'wp_head', 'wlwmanifest_link' );
		
		// Index link.
		remove_action( 'wp_head', 'index_rel_link' );
		
		// Previous link.
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		
		// Start link.
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		
		// Canonical.
		remove_action( 'wp_head', 'rel_canonical', 10, 0 );
		
		// Shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
		
		// Links for adjacent posts.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		
		// WP version.
		remove_action( 'wp_head', 'wp_generator' );
		
		// Emoji detection script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		
		// Emoji styles.
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}
}


// Remove RSS
if ( ! function_exists( 'theme_remove_rss_version' ) ) {
	function theme_remove_rss_version() {
		return '';
	}
}


// Remove injected CSS for recent comments widget.
if ( ! function_exists( 'themek_remove_wp_widget_recent_comments_style' ) ) {
	function theme_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}
}

// Remove injected CSS from recent comments widget.
if ( ! function_exists( 'theme_remove_recent_comments_style' ) ) {
	function theme_remove_recent_comments_style() {
		global $wp_widget_factory;
		
		if ( isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']) ) {
			remove_action( 'wp_head', array(
				$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
				'recent_comments_style'
			) );
		}
	}
}