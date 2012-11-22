<?php

$latteParams['bodyClasses'] .= ' with-sidebar';
$latteParams['bodyId'] = 'normal-page';

$latteParams['archive'] = new WpLatteArchiveEntity();

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();