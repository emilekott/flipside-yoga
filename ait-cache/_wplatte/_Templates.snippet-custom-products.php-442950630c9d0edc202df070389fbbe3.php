<?php //netteCache[01]000487a:2:{s:4:"time";s:21:"0.54800700 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/snippet-custom-products.php";i:2;i:1336042244;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/snippet-custom-products.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'tcf8kwwy52')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (!empty($products)): ?>
	<div class="products-simple clear">
		<div class="product-container">
			<ul id="products-list-simple" class="clearfix clear">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($products) as $product): ?>
					<li>
						<a href="<?php echo htmlSpecialChars($product->options->productLink) ?>" title="<?php echo htmlSpecialChars($product->title) ?>">
<?php if (isset($product->options->productLabel)): ?>
							<span class="label">
								<span style="background-color: <?php if (isset($product->options->productLabelColor)): ?>
#<?php echo htmlSpecialChars(NTemplateHelpers::escapeCss($product->options->productLabelColor)) ;else: ?>
#C9000D<?php endif ?>;"><?php echo NTemplateHelpers::escapeHtml($product->options->productLabel, ENT_NOQUOTES) ?></span>
							</span>
<?php endif ?>
							<span class="thumb"><img src="<?php echo htmlSpecialChars($product->thumbnailSrc) ?>
" alt="<?php echo htmlSpecialChars($product->title) ?>" /></span>
							<span class="title"><?php echo NTemplateHelpers::escapeHtml($product->title, ENT_NOQUOTES) ?></span>
						</a>
						<span class="descr"><?php echo NTemplateHelpers::escapeHtml($product->options->productText, ENT_NOQUOTES) ?></span>
					</li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			</ul>
		</div>
	</div><!-- end of products -->
<?php endif ;
