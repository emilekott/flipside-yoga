<?php

$latteParams['bodyClasses'] .= ' with-sidebar';
$latteParams['bodyId'] = 'normal-page';

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();