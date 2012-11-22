<?php //netteCache[01]000474a:2:{s:4:"time";s:21:"0.43170600 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:85:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/main-index.php";i:2;i:1352245734;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/main-index.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '6meqtqghwa')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe8369c1334_content')) { function _lbe8369c1334_content($_l, $_args) { extract($_args)
?>


<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clear clearfix <?php if(is_active_sidebar("homepage-widgets-col-2")): else: ?>
onecolumn<?php endif ?>">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content clearfix">

		<div id="content-wrapper">
<?php if (!$isIndexPage): ?>
			<h1><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>
			<?php echo $post->content ?>

<?php endif ?>

<?php if ($posts): ?>

<?php NCoreMacros::includeTemplate("general-content-nav.php", array('location' => 'nav-above') + $template->getParams(), $_l->templates['6meqtqghwa'])->render() ?>

<?php NCoreMacros::includeTemplate("snippet-content-loop.php", array('posts' => $posts) + $template->getParams(), $_l->templates['6meqtqghwa'])->render() ?>

<?php NCoreMacros::includeTemplate("general-content-nav.php", array('location' => 'nav-below') + $template->getParams(), $_l->templates['6meqtqghwa'])->render() ?>

<?php else: ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h2 class="entry-title"><?php echo NTemplateHelpers::escapeHtml(__('Nothing Found', 'ait'), ENT_NOQUOTES) ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php echo NTemplateHelpers::escapeHtml(__('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'ait'), ENT_NOQUOTES) ?></p>
<?php NCoreMacros::includeTemplate('general-search-form.php', $template->getParams(), $_l->templates['6meqtqghwa'])->render() ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

<?php endif ?>

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->
	<!-- SIDEBAR -->
<?php if(is_active_sidebar("homepage-widgets-col-2")): ?>
	<div class="sidebar right clearfix">
<?php dynamic_sidebar("homepage-widgets-col-2'") ?>
	</div><!-- end of sidebar -->
<?php endif ?>
</div><!-- end of container -->
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = true; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
$_l->extends = $layout ?>

<?php if (!$isIndexPage): $sectionsOrder = isset($post->options('sections-order')->overrideGlobal) ? $post->options('sections-order')->order : null ;endif ?>


<?php if (!$isIndexPage): isset($post->options('slider')->overrideGlobal) ? $slider = 'slider' : $slider = 'adasdas' ;//
// block $slider
//
if (!function_exists($_l->blocks[$slider][] = '_lba63f142cab__slider')) { function _lba63f142cab__slider($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-home-slider.php", array('options' => $post->options('slider')) + $template->getParams(), $_l->templates['6meqtqghwa'])->render() ;}} call_user_func(reset($_l->blocks[$slider]), $_l, get_defined_vars()) ?>

<?php isset($post->options('testimonials')->overrideGlobal) ? $sectionB = 'sectionB' : $sectionB = 'xb' ;//
// block $sectionB
//
if (!function_exists($_l->blocks[$sectionB][] = '_lbd4aa4094e9__sectionB')) { function _lbd4aa4094e9__sectionB($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-testimonials.php", array('show' => $post->options('testimonials')->show, 'options' => $post->options('testimonials')) + $template->getParams(), $_l->templates['6meqtqghwa'])->render() ;}} call_user_func(reset($_l->blocks[$sectionB]), $_l, get_defined_vars()) ?>

<?php isset($post->options('products')->overrideGlobal) ? $sectionC = 'sectionC' : $sectionC = 'xe' ;//
// block $sectionC
//
if (!function_exists($_l->blocks[$sectionC][] = '_lbb0f26d988b__sectionC')) { function _lbb0f26d988b__sectionC($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-products.php", array('products' => $site->create('products', $post->options('products')->category)) + $template->getParams(), $_l->templates['6meqtqghwa'])->render() ;}} call_user_func(reset($_l->blocks[$sectionC]), $_l, get_defined_vars()) ;endif ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
