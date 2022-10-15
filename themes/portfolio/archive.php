<?php
/**
 * The template for displaying Archive pages.
 *
 */
if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

$templates = array( 'post-templates/archive.twig', 'index.twig' );

$data = Timber::get_context();

$data['title'] = 'Overzicht';

if ( is_post_type_archive() ) {
	$data['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'post-templates/archive-' . get_query_var( 'post_type' ) . '.twig' );
}

$data['posts'] = Timber::get_posts();

Timber::render( $templates, $data );