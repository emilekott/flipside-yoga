<?php //netteCache[01]000473a:2:{s:4:"time";s:21:"0.06738200 1353575415";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:84:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/themebox.html";i:2;i:1337707904;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/themebox.html

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 've4bmsur7w')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<div class="ait-themebox-options-header">Homepage Options</div>

<div id="ait-themebox-display" class="ait-themebox-display">
  <a href="javascript: display('.home .mainpage .header-container'); display('.home .mainpage .separator');">Slider On/Off</a><br />
  <a href="javascript: display('.home .mainpage .testimonials');">Testimonials On/Off</a><br />
  <a href="javascript: display('.home .mainpage #content'); display('.home .mainpage .sidebar');">Content On/Off</a><br />
  <a href="javascript: display('.home .mainpage .products-simple');">Service Boxes</a><br />
  <a href="javascript: display('.home .mainpage .widgets');">Footer Widgets On/Off</a><br />
</div>

<script type="text/javascript">
function display(element)
{
  if($j(element).is(':visible')){
    $j(element).hide();
  }
  else{
    $j(element).show();
  }
}
</script>
