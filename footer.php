<?php
global $latteParams;
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();