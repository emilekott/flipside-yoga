<?php

$latteParams['bodyClasses'] .= ' with-sidebar';
$latteParams['bodyId'] = 'normal-page';

$latteParams['tag'] = new WpLatteTagEntity($GLOBALS['wp_query']->queried_object);

$latteParams['posts'] = WpLatte::createPostEntity($GLOBALS['wp_query']->posts);

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();