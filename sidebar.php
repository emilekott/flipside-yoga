<?php
global $latteParams;
if(isset($GLOBALS['post'])){
	$latteParams['post'] = WpLatte::createPostEntity(
		$GLOBALS['post'],
		array(
			'meta' => $GLOBALS['pageOptions'],
		)
	);
}
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();