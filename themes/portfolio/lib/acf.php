<?php

/*
 === === === === === === === === *\
|| Get files from /acf/ folder and include them
\* === === === === === === === === */

$acf_files = glob(get_template_directory() . '/acf/*.php');
foreach ($acf_files as $file) {
	require_once $file;
}

// Register ACF options page
if ( function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}