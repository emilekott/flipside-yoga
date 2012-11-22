{extends $layout}

{var $sectionsOrder = isset($post->options('sections-order')->overrideGlobal) ? $post->options('sections-order')->order : null}

{block content}

<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clear clearfix {isActiveSidebar subpages-sidebar}{else}onecolumn{/isActiveSidebar}">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content clearfix">
		<div class="{isActiveSidebar subpages-sidebar}left leftContent{else}content{/isActiveSidebar}">
			<h1>{$post->title}</h1>
			{!$post->content}
		</div>
		{include snippet-comments.php}
	</div><!-- end of mainbar -->
	{isActiveSidebar subpages-sidebar}
		<!-- SIDEBAR -->
	<div class="sidebar right clearfix">
		{if $post->thumbnailSrc != false }
			<div class="entry-thumbnail sidebar-image">
				<a href="{$post->thumbnailSrc}" title="">
					{!$post->thumbnail}
				</a>
			</div>
		{/if}
		{dynamicSidebar subpages-sidebar}
	</div>
	{/isActiveSidebar}
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