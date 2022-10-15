<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['page'] = 'default';

$templates = array('post-templates/single-'.$post->post_type.'.twig', 'post-templates/single.twig', 'page-templates/page.twig');
Timber::render($templates, $context);