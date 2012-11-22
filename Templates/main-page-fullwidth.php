{extends $layout}

{var $sectionsOrder = isset($post->options('sections-order')->overrideGlobal) ? $post->options('sections-order')->order : null}

{block content}


<!-- SUBPAGE -->
<div id="container" class="subpage clear onecolumn">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">
			<h1>{$post->title}</h1>

			{if $post->thumbnailSrc != false }
			<div class="entry-thumbnail">
				<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=640&h=200" alt="" />
			</div>
			{/if}

			{!$post->content}

			{include snippet-comments.php}

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

</div><!-- end of container -->
{/block}

{? isset($post->options('slider')->overrideGlobal) ? $slider = 'slider' : $slider = 'adasdas'}
{define $slider}
	{include snippet-custom-home-slider.php, options => $post->options('slider')}
{/define}

{? isset($post->options('testimonials')->overrideGlobal) ? $sectionB = 'sectionB' : $sectionB = 'xb'}
{define $sectionB}
	{include snippet-custom-testimonials.php, show => $post->options('testimonials')->show, options => $post->options('testimonials')}
{/define}

{? isset($post->options('products')->overrideGlobal) ? $sectionC = 'sectionC' : $sectionC = 'xd'}
{define $sectionC}
	{include snippet-custom-products.php, products => $site->create('product', $post->options('products')->category)}
{/define}