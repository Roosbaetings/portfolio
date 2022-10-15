<?php
/*
Template Name: Home
*/

$context = Timber::get_context();
$templates = array('page-templates/home.twig', 'page.twig');
$post = new TimberPost();

$context['post'] = $post;
$context['page'] = 'home';

Timber::render($templates, $context);