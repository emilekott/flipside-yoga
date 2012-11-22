<?php //netteCache[01]000475a:2:{s:4:"time";s:21:"0.49737500 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:86:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/main-header.php";i:2;i:1351596720;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/main-header.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'k5y1lacm90')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!doctype html>
<html class="no-js" lang="<?php echo htmlSpecialChars($site->language) ?>">
<head>
	<meta charset="<?php echo htmlSpecialChars($site->charset) ?>" />
	<script type="text/javascript">
		var ua = navigator.userAgent; var meta = document.createElement('meta');
		if(ua.match(/iPad/i) != null){
			meta.name = 'viewport';	meta.content = 'width=device-width, initial-scale=1';
		}else if((ua.toLowerCase().indexOf("android") > -1 && ua.toLowerCase().indexOf("mobile")) || ((ua.match(/iPhone/i)) || (ua.match(/iPod/i)))){
			meta.name = 'viewport';	meta.content = 'target-densitydpi=device-dpi, width=480';
		}
		var m = document.getElementsByTagName('meta')[0]; m.parentNode.insertBefore(meta,m)
	</script>

	<title><?php echo WpLatteFunctions::getTitle() ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php echo htmlSpecialChars($site->pingbackUrl) ?>" />

<?php if ($themeOptions->fonts->fancyFont->type == 'google'): ?>
	<link href="http://fonts.googleapis.com/css?family=<?php echo htmlSpecialChars($themeOptions->fonts->fancyFont->font) ?>" rel="stylesheet" type="text/css" />
<?php endif ?>

	<link id="ait-style" rel="stylesheet" type="text/css" media="all" href="<?php echo WpLatteFunctions::lessify() ?>" />

<?php if(is_singular() && get_option("thread_comments")){wp_enqueue_script("comment-reply");}wp_head() ?>

	<!--[if lte IE 8]>
		 <script src="<?php echo NTemplateHelpers::escapeHtmlComment($themeUrl) ?>/design/js/libs/modernizr.js"></script>
	<![endif]-->

	<!--[if lt IE 9]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<![endif]-->

<?php if (isset($post)): ?>
	<!-- facebook open graph -->
	<meta property="og:description" content="<?php echo htmlSpecialChars($post->excerpt) ?>" />
	<meta property="og:image" content="<?php echo htmlSpecialChars($post->thumbnailSrc) ?>" />
<?php endif ?>

	<link id="responsive-style" rel="stylesheet" type="text/css" media="all" href="<?php echo htmlSpecialChars($themeUrl) ?>/responsive.css" />
</head>

<body class="<?php echo join(' ', get_body_class()) . ' ' . join(' ', array($bodyClasses, 'ait-freestyle')) ?>
" data-themeurl="<?php echo htmlSpecialChars($themeUrl) ?>">
<div class="mainpage">

	<!-- HEADER -->
	<div id="header" class="clearfix">

		<div class="logo left">
<?php if (!empty($themeOptions->general->logo_img)): ?>
			<a href="<?php echo htmlSpecialChars($homeUrl) ?>">
				<img src="<?php echo WpLatteFunctions::linkTo($themeOptions->general->logo_img) ?>" alt="logo" />
			</a>
<?php else: ?>
			<a href="<?php echo htmlSpecialChars($homeUrl) ?>">
				<span><?php echo NTemplateHelpers::escapeHtml($themeOptions->general->logo_text, ENT_NOQUOTES) ?></span>
			</a>
<?php endif ?>
			<p class="left textshadow info"><?php echo NTemplateHelpers::escapeHtml($themeOptions->general->tagline, ENT_NOQUOTES) ?></p>
		</div>
<?php if ($themeOptions->socialIcons->displayIcons): if (isset($themeOptions->socialIcons->icons)): ?>
			<ul id="social-links" class="right clearfix">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($themeOptions->socialIcons->icons) as $icon): ?>
				<li><a href="<?php if (!empty($icon->link)): echo htmlSpecialChars($icon->link) ;else: ?>
#<?php endif ?>"><img src="<?php echo htmlSpecialChars($icon->iconUrl) ?>" height="32" width="32" alt="<?php echo htmlSpecialChars($icon->title) ?>
" title="<?php echo htmlSpecialChars($icon->title) ?>" /></a></li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			</ul>
<?php endif ;endif ?>

		<div class="mainmenu">
			<!-- WPML plugin required -->
			<div class="flags">
				<div class="phoneNumber left"><?php echo NTemplateHelpers::escapeHtml($themeOptions->general->phoneNumber, ENT_NOQUOTES) ?></div>
<?php if (function_exists('icl_get_languages')): if (icl_get_languages('skip_missing=0')): $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator(icl_get_languages('skip_missing=0')) as $lang): ?>
							<a href="<?php echo htmlSpecialChars($lang['url']) ?>" class="<?php if ($lang['active'] == 1): ?>
active<?php endif ?>"><img src="<?php echo htmlSpecialChars($lang['country_flag_url']) ?>
" alt="<?php echo htmlSpecialChars($lang['translated_name']) ?>" /></a>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;endif ;endif ?>
			</div>

			<div id="mainmenu-dropdown-duration" style="display: none;"><?php echo NTemplateHelpers::escapeHtml($themeOptions->general->mainmenu_dropdown_time, ENT_NOQUOTES) ?></div>
			<div id="mainmenu-dropdown-easing" style="display: none;"><?php echo NTemplateHelpers::escapeHtml($themeOptions->general->mainmenu_dropdown_animation, ENT_NOQUOTES) ?></div>
<?php wp_nav_menu(array('theme_location' => 'primary-menu', 'fallback_cb' => 'default_menu', 'container' => 'nav', 'container_class' => 'mainmenu', 'menu_class' => 'menu')) ?>
		</div>
	</div>