<?php //netteCache[01]000483a:2:{s:4:"time";s:21:"0.56067800 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:94:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/general-content-nav.php";i:2;i:1352245734;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/general-content-nav.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'sgprifsgie')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if($GLOBALS["wp_query"]->max_num_pages > 1): ?>
	<?php ob_start() ;echo $template->printf(__('%s Newer posts', 'ait'), '<span class="meta-nav">&larr;</span>') ;$prev = ob_get_clean() ?>

	<?php ob_start() ;echo $template->printf(__('Older posts %s', 'ait'), '<span class="meta-nav">&rarr;</span>') ;$next = ob_get_clean() ?>

	<nav id="<?php echo htmlSpecialChars($location) ?>">
		<div class="nav-previous"><?php previous_posts_link($prev) ?></div>
		<div class="nav-next"><?php next_posts_link($next) ?></div>
	</nav>
<?php endif; 
