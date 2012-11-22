<?php
/**
 * Template Name: Fullwidth Template
 * Description: Page without sidebar
 *
 */

$latteParams['post'] = WpLatte::createPostEntity(
	$GLOBALS['wp_query']->post,
	array(
		'meta' => $GLOBALS['pageOptions'],
	)
);

/* HEADER HEIGHT :: START
$maxHeight = 0;
$sliderSlug = (isset($latteParams['post']->options('slider')->overrideGlobal)) ? $latteParams['post']->options('slider')->sliderCategory: $aitThemeOptions->header->sliderCategory;
if($sliderSlug != '-1'){
	$images = ($sliderSlug == '0') ? get_posts(array('post_type'=>'ait-slider-creator')) : get_posts(array('post_type'=>'ait-slider-creator','tax_query' => array(array( 'taxonomy' => 'ait-slider-creator-category', 'field' => 'slug', 'terms' => $sliderSlug))));
	foreach($images as $image){
		$imageData = get_post_meta($image->ID, '_ait-slider-creator', TRUE);
		if(!empty($imageData['topImage'])){
			if ($imageSize[$imageData['topImage']] = @getimagesize($imageData['topImage'])) {
				$imageHeight = $imageSize[$imageData['topImage']][1];
				if($imageHeight > $maxHeight){
					$maxHeight = $imageHeight;
				}
			} else {
				$src = THEME_DIR . "/" . substr($imageData['topImage'], strlen(THEME_URL) + 1);
				if(!is_file($src)){
					$u = wp_upload_dir();
					$baseUrl = $u['baseurl'];
					$baseDir = $u['basedir'];
					$src = $baseDir . "/" . substr($imageData['topImage'], strlen($baseUrl) + 1);
				}

				if(is_file($src)){
					$imageSize[$imageData['topImage']] = @getimagesize($src);
					$imageHeight = $imageSize[$imageData['topImage']][1];

					if($imageHeight > $maxHeight){
						$maxHeight = $imageHeight;
					}
				}
			}
		}
	}
}
if($maxHeight == 0){$maxHeight = 400;}
$latteParams['imageSize'] = $maxHeight;
HEADER HEIGHT :: END */

$latteParams['post']->classes = implode(' ', get_post_class());

if($aitThemeOptions->general->enableCSSFeatures->enable === 'enable') {
	$latteParams['bodyClasses'] .= ' css-features';
}

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();
