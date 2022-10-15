<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$page = new FieldsBuilder('page');

$page
    ->addImage('home_image', ['required' => true])
	->addText('home_title', ['required' => true])
	->addText('home_name', ['required' => true, 'wrapper' => ['width' => '50%']])
	->addText('home_job', ['required' => true, 'wrapper' => ['width' => '50%']])
	->addLink('home_primary_button', ['required' => true, 'wrapper' => ['width' => '50%']])
	->addLink('home_secondary_button', ['required' => true, 'wrapper' => ['width' => '50%']])
	->setLocation('page_type', '==', 'front_page');

add_action('acf/init', function () use ($page) {
	acf_add_local_field_group($page->build());
});