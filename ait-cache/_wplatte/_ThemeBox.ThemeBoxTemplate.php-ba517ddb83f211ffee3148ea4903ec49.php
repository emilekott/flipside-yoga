<?php //netteCache[01]000494a:2:{s:4:"time";s:21:"0.78916600 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:104:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/AIT/Framework/ThemeBox/ThemeBoxTemplate.php";i:2;i:1339169544;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/AIT/Framework/ThemeBox/ThemeBoxTemplate.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'utx80mrbbi')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
require_once AIT_FRAMEWORK_DIR . '/ThemeBox/ThemeBox.php' ?>
<!-- ThemeBox -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/themebox.css" />
<!--[if lte IE 8]><script src="<?php echo NTemplateHelpers::escapeHtmlComment($themeBox->url) ?>/gui/json2.min.js"></script><![endif]-->
<script src="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/plugins.js"></script>
<script>
	var aitThemeCodeName = <?php echo NTemplateHelpers::escapeJs(THEME_CODE_NAME) ?>;
	var aitCufonFontsUrl = <?php echo NTemplateHelpers::escapeJs(THEME_FONTS_URL) ?>;
	var aitThemeUrl = <?php echo NTemplateHelpers::escapeJs(preg_replace('|https?://[^/]+|i', '', $site->url . '/')) ?>;

	Cookies.cookieName = 'aitThemeBox-' + aitThemeCodeName;
	Cookies.cookiePlugin = jQuery.cookie;
	Cookies.jquery = jQuery;
	Cookies.path = aitThemeUrl;

	<?php echo $themeBox->getSelectors() ?>

</script>

<div id="ait-themebox">
	<h1 class="visuallyhidden">ThemeBox</h1>
	<div id="ait-themebox-social">
		<a href="http://ait-themes.com" target="_blank"><img src="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/themebox/ico_ait.png" width="32" height="32" alt="AIT-Themes icon" title="Visit our site" /></a>
		<a href="http://themeforest.net/user/ait/follow" target="_blank"><img src="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/themebox/ico_tf.png" width="32" height="32" alt="Themeforest icon" title="Follow us on Themeforest" /></a>
		<a href="http://twitter.com/AitThemes" target="_blank"><img src="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/themebox/ico_tw.png" width="32" height="32" alt="Twitter icon" title="Follow us on Twitter" /></a>
		<a href="http://www.facebook.com/AitThemes" target="_blank"><img src="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/themebox/ico_fb.png" width="32" height="32" alt="Facebook icon" title="Like us on Facebook" /></a>
		<a href="http://www.youtube.com/user/AitThemes" target="_blank"><img src="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/themebox/ico_yt.png" width="32" height="32" alt="YouTube icon" title="Watch us on YouTube" /></a>
	</div>

	<div id="ait-themebox-purchase">
<?php if (strpos($_SERVER['SERVER_NAME'], 'ait-themes.com') !== false and !$site->isUserLoggedIn): if ($themeBox->thisTheme === null): ?>
		<a href="http://themeforest.net/user/ait/portfolio" title="Our portfolio" target="_blank">Our Portfolio</a>
<?php else: ?>
		<a href="<?php echo htmlSpecialChars($themeBox->thisTheme->url) ?>?ref=ait" title="Only $<?php echo htmlSpecialChars($themeBox->thisTheme->price) ?>" target="_blank">Purchase NOW</a>
<?php endif ;else: ?>
		<a href="http://themeforest.net/user/ait/portfolio" title="Our portfolio" target="_blank">Our Portfolio</a>
<?php endif ?>
	</div>
<?php if ($site->isUserLoggedIn): ?>
	<form id="ait-themebox-form" action="<?php echo htmlSpecialChars($themeBox->url) ?>/ThemeBoxAjax.php">
<?php if (defined('ICL_LANGUAGE_CODE')): ?>
		<input type="hidden" name="ait-themebox[lang]" value="<?php echo htmlSpecialChars(ICL_LANGUAGE_CODE) ?>" />
<?php else: ?>
		<input type="hidden" name="ait-themebox[lang]" value="en" />
<?php endif ;endif ?>

		<span id="ait-themebox-toggler" class="closed">open/close</span>

		<div id="ait-themebox-options">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($themeBox->getOptions()) as $type => $options): if (isset($themeBox->sections[$type])): ?>
			<div class="ait-themebox-options-header"><?php echo NTemplateHelpers::escapeHtml($themeBox->sections[$type], ENT_NOQUOTES) ?></div>
			<div id="ait-themebox-<?php echo htmlSpecialChars($type) ?>" class="ait-themebox-options-content">

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($options) as $option => $value): if ($value['displayIt']): if ($type == 'colorpicker'): ?>

						<label for="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>" class="ait-themebox-label"><?php echo NTemplateHelpers::escapeHtml($value['label'], ENT_NOQUOTES) ?></label>
						<input type="text" class="ait-themebox-colorpicker option-<?php echo htmlSpecialChars($option) ?>
" id="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>-<?php echo htmlSpecialChars($option) ?>
" data-ait-themebox-option='{ "section": "<?php echo htmlSpecialChars($value['section'], ENT_QUOTES) ?>
", "option": "<?php echo htmlSpecialChars($option, ENT_QUOTES) ?>" }' name="ait-themebox[<?php echo htmlSpecialChars($value['section']) ?>
][<?php echo htmlSpecialChars($option) ?>]" value="<?php echo htmlSpecialChars($value['value']) ?>" />

<?php elseif ($type == 'image-url'): ?>

						<div class="ait-themebox-label"><?php echo NTemplateHelpers::escapeHtml($value['label'], ENT_NOQUOTES) ?></div>
						<ul class="ait-themebox-link-list" data-ait-themebox-option='{ "section": "<?php echo htmlSpecialChars($value['section'], ENT_QUOTES) ?>
", "option": "<?php echo htmlSpecialChars($option, ENT_QUOTES) ?>" }'>
						<?php
							if(isset($themeBox->themeOptions->{$value['section']}->{"{$option}Color"})){
								$__color = $themeBox->themeOptions->{$value['section']}->{"{$option}Color"};
							}else{
								$__color = '';
								}
							$iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($value['value']) as $i => $bg): ?>
							<li>
<?php if ($themeBox->themeOptions->{$value['section']}->$option == $themeUrl . '/' . $bg['img']): ?>
								<strong>
<?php endif ?>
									<a href="#" data-ait-themebox-img-data='{"img": "<?php echo htmlSpecialChars($themeUrl, ENT_QUOTES) ?>
/<?php echo htmlSpecialChars($bg['img'], ENT_QUOTES) ?>", "color": "<?php if (isset($bg['color'])): echo htmlSpecialChars($bg['color'], ENT_QUOTES) ;else: echo htmlSpecialChars($__color, ENT_QUOTES) ;endif ?>
", "repeat": "<?php if (isset($bg['repeat'])): echo htmlSpecialChars($bg['repeat'], ENT_QUOTES) ;else: ?>
repeat<?php endif ?>", "x": "<?php if (isset($bg['x'])): echo htmlSpecialChars($bg['x'], ENT_QUOTES) ;else: ?>
0<?php endif ?>", "y": "<?php if (isset($bg['y'])): echo htmlSpecialChars($bg['y'], ENT_QUOTES) ;else: ?>
0<?php endif ?>", "attach": "<?php if (isset($bg['attach'])): echo htmlSpecialChars($bg['attach'], ENT_QUOTES) ;else: ?>
scroll<?php endif ?>"}'><?php echo NTemplateHelpers::escapeHtml($bg['title'], ENT_NOQUOTES) ?></a>
<?php if ($themeBox->themeOptions->{$value['section']}->$option == $themeUrl . '/' . $bg['img']): ?>
								</strong>
<?php endif ?>
							</li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

							<li>
<?php if ($themeBox->themeOptions->{$value['section']}->$option == $themeUrl . '/' . $value['default']): ?>
								<strong>
<?php endif ?>
									<a href="#" data-ait-themebox-img-data='{"img": "<?php echo htmlSpecialChars($themeUrl, ENT_QUOTES) ?>
/<?php echo htmlSpecialChars($value['default'], ENT_QUOTES) ?>", "color": "<?php echo htmlSpecialChars($__color, ENT_QUOTES) ?>
", "repeat": "repeat", "x": "0", "y": "0", "attach": "scroll"}'><?php echo NTemplateHelpers::escapeHtml(__('Default', 'ait'), ENT_NOQUOTES) ?></a>
<?php if ($themeBox->themeOptions->{$value['section']}->$option == $themeUrl . '/' . $value['default']): ?>
								</strong>
<?php endif ?>


<?php if (!empty($value['default'])): ?>
								<input type="hidden" id="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>-img" name="ait-themebox[<?php echo htmlSpecialChars($value['section']) ?>
][<?php echo htmlSpecialChars($option) ?>]" value="<?php echo htmlSpecialChars($themeUrl) ?>
/<?php echo htmlSpecialChars($value['default']) ?>" />
<?php else: ?>

								<input type="hidden" id="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>-img" name="ait-themebox[<?php echo htmlSpecialChars($value['section']) ?>
][<?php echo htmlSpecialChars($option) ?>]"  value="" />
<?php endif ?>
								<input type="hidden" id="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>-repeat" name="ait-themebox[<?php echo htmlSpecialChars($value['section']) ?>
][<?php echo htmlSpecialChars($option) ?>Repeat]" value="" />
								<input type="hidden" id="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>-x" name="ait-themebox[<?php echo htmlSpecialChars($value['section']) ?>
][<?php echo htmlSpecialChars($option) ?>X]" value="" />
								<input type="hidden" id="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>-y" name="ait-themebox[<?php echo htmlSpecialChars($value['section']) ?>
][<?php echo htmlSpecialChars($option) ?>Y]" value="" />
								<input type="hidden" id="ait-themebox-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>-attach" name="ait-themebox[<?php echo htmlSpecialChars($value['section']) ?>
][<?php echo htmlSpecialChars($option) ?>Attach]" value="" />
								</li>
						</ul>

<?php elseif ($type == 'font'): ?>
						<label for="ait-themebox-fonts-<?php echo htmlSpecialChars($value['section']) ?>
-<?php echo htmlSpecialChars($option) ?>" class="ait-themebox-label"><?php echo NTemplateHelpers::escapeHtml($value['label'], ENT_NOQUOTES) ?></label>
						<?php echo aitFontsDropdown(
							"ait-themebox[{$value['section']}][{$option}]",
							'ait-themebox-fonts-' . $value['section'] . '-' . $option,
							$value['value'],
							'all',
							'data-ait-themebox-option=\'{ "section": "' . $value['section'] . '", "option": "' . $option . '"}\''
							) ?>


<?php endif ;endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			</div>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>


<?php if (file_exists($themeBox->themeTemplate)): NCoreMacros::includeTemplate($themeBox->themeTemplate, array('themeBox' => $themeBox) + $template->getParams(), $_l->templates['utx80mrbbi'])->render() ;endif ?>

<?php if ($site->isUserLoggedIn): ?>
			<div id="ait-themebox-save-button">
				<input type="submit" id="ait-themebox-save" value="Save settings" />
			</div>
<?php endif ?>

		<div id="ait-themebox-reset-options">
			<a href="#" id="ait-themebox-reset" title="This will reset only these temporary settings stored in cookies">Reset All These Settings</a>
		</div>

		</div> <!-- /#ait-themebox-options -->

<?php if ($site->isUserLoggedIn): ?>
	</form>
<?php endif ?>



	<script src="<?php echo htmlSpecialChars($themeBox->url) ?>/gui/themebox.js"></script>

	<div id="ait-themebox-ait-themes">
		<a href="#" id="ait-themebox-themes-toggler"><?php echo NTemplateHelpers::escapeHtml(__("Our WordPress Themes", 'ait'), ENT_NOQUOTES) ?></a>
		<div id="ait-themebox-themes">
			<ul id="ait-themebox-themes-list">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($themeBox->otherAitThemes) as $theme): if ($theme->inThemeBox): ?>
				<li>
					<a href="<?php echo htmlSpecialChars($theme->url) ?>" target="_blank">
						<img src="<?php echo htmlSpecialChars($theme->thumbnail) ?>" class="thumb" width="32" height="32" alt="thumbnail" />
						<img src="<?php echo htmlSpecialChars($theme->preview) ?>" class="preview" alt="preview image" />
						<strong><?php echo NTemplateHelpers::escapeHtml($theme->shortName, ENT_NOQUOTES) ?></strong>
					</a>
				</li>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			</ul>
		</div>
	</div>
</div><!-- /#themebox  -->
<!-- /ThemeBox -->