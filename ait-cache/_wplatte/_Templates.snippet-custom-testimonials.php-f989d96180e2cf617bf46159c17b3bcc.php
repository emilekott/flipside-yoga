<?php //netteCache[01]000492a:2:{s:4:"time";s:21:"0.51887600 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:102:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/snippet-custom-testimonials.php";i:2;i:1335951182;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/snippet-custom-testimonials.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'axrgtsay61')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (!empty($options->text)): if ($show): ?>

<div class="testimonials clearfix left">
  <style type="text/css" scoped="scoped">
	 div.testimonials { background-color: <?php echo $options->bgColor ?> !important; }
	 div.testimonials p a { color: <?php echo $options->linkColor ?> !important;}
	 div.testimonials p a:hover {  font-family: @fancyFont, Arial, sans-serif; }
  </style>
	<p style="color: <?php echo $options->color ?>"><?php echo $options->text ?></p>
</div>
<?php endif ;endif ;
