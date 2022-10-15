<?php
$context = Timber::get_context();

$context['page'] = '404';
Timber::render(array('404.twig' ), $context );