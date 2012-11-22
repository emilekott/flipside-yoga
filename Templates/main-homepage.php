{extends $layout}

{var $sectionsOrder = isset($post->options('sections-order')->overrideGlobal) ? $post->options('sections-order')->order : null}

{block content}
<div id="container" class="home subpage clear {isActiveSidebar homepage-widget-slider}{else}onecolumn{/isActiveSidebar}">
	{if trim($post->content) != ""}
		<div id="content" class="mainbar entry-content clearfix ">
				{!$post->content}
				<!-- SIDEBAR -->
		</div>
		{isActiveSidebar homepage-widget-slider}
		<div class="sidebar right clearfix">
		{dynamicSidebar homepage-widget-slider}
		</div>
		{/isActiveSidebar}
		</div>
	{/if}
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