<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$page = new FieldsBuilder('page');

$page
    ->addText('page_title', ['required' => true, 'instructions' => 'A page needs a title for SEO'])
	->setLocation('post_type', '==', 'page');

add_action('acf/init', function () use ($page) {
	acf_add_local_field_group($page->build());
});