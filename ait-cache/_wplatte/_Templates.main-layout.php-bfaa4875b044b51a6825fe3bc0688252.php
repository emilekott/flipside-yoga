<?php //netteCache[01]000475a:2:{s:4:"time";s:21:"0.44859600 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:86:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/main-layout.php";i:2;i:1350027782;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/main-layout.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'ftbdx31wex')
;//
// block slider
//
if (!function_exists($_l->blocks['slider'][] = '_lb9851c9605d_slider')) { function _lb9851c9605d_slider($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippet-custom-home-slider.php", array('options' => $themeOptions->header) + $template->getParams(), $_l->templates['ftbdx31wex'])->render() ;
}}

//
// block sectionA
//
if (!function_exists($_l->blocks['sectionA'][] = '_lbeeeaa1a9de_sectionA')) { function _lbeeeaa1a9de_sectionA($_l, $_args) { extract($_args)
;NUIMacros::callBlock($_l, 'content', $template->getParams()) ;
}}

//
// block sectionB
//
if (!function_exists($_l->blocks['sectionB'][] = '_lbdee5fa20c6_sectionB')) { function _lbdee5fa20c6_sectionB($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippet-custom-testimonials.php", array('show' => $themeOptions->globals->showTestimonials, 'options' => $themeOptions->testimonials) + $template->getParams(), $_l->templates['ftbdx31wex'])->render() ;
}}

//
// block sectionC
//
if (!function_exists($_l->blocks['sectionC'][] = '_lbbd8cbc5551_sectionC')) { function _lbbd8cbc5551_sectionC($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippet-custom-products.php", array('products' => $site->create('product', $themeOptions->globals->globalProducts)) + $template->getParams(), $_l->templates['ftbdx31wex'])->render() ;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extends) ? FALSE : $template->_extends; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
get_header("") ?>

	<!-- layout -->

	<div id="sections">

<?php if (isset($post)): call_user_func(reset($_l->blocks['slider']), $_l, get_defined_vars()) ; endif ?>

	<div class="separator">
		<div class="slide-pattern-down"></div>
		<div class="hider"></div>
	</div>
	<div id="section-container" class="clearfix">




<?php if (!isset($sectionsOrder)): $sectionsOrder = $themeOptions->globals->sectionsOrder ;endif ?>


<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($sectionsOrder) as $section): NUIMacros::callBlock($_l, $section, $template->getParams()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</div>

<!-- /layout -->

<?php get_footer("") ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
