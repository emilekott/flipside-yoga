{if !empty($products)}
	<div class="products-simple clear">
		<div class="product-container">
			<ul id="products-list-simple" class="clearfix clear">
				{foreach $products as $product}
					<li>
						<a href="{$product->options->productLink}" title="{$product->title}">
							{ifset $product->options->productLabel}
							<span class="label">
								<span style="background-color: {ifset $product->options->productLabelColor}#{$product->options->productLabelColor}{else}#C9000D{/ifset};">{$product->options->productLabel}</span>
							</span>
							{/ifset}
							<span class="thumb"><img src="{$product->thumbnailSrc}" alt="{$product->title}" /></span>
							<span class="title">{$product->title}</span>
						</a>
						<span class="descr">{$product->options->productText}</span>
					</li>
				{/foreach}
			</ul>
		</div>
	</div><!-- end of products -->
{/if}