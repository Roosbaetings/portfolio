<?php
/**
 * Default page template
 *
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['page'] = 'default';

Timber::render( array( 'templates/page.twig'), $context );