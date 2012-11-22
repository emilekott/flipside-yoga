{extends $layout}

{if !$isIndexPage}
	{var $sectionsOrder = isset($post->options('sections-order')->overrideGlobal) ? $post->options('sections-order')->order : null}
{/if}

{block content}


<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clear clearfix {isActiveSidebar homepage-widgets-col-2}{else}onecolumn{/isActiveSidebar}">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content clearfix">

		<div id="content-wrapper">
			{if !$isIndexPage}
			<h1>{$post->title}</h1>
			{!$post->content}
			{/if}

			{if $posts}

				{include general-content-nav.php location => 'nav-above'}

				{include snippet-content-loop.php posts => $posts}

				{include general-content-nav.php location => 'nav-below'}

			{else}

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h2 class="entry-title">{__ 'Nothing Found'}</h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>{__ 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.'}</p>
						{include 'general-search-form.php'}
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			{/if}

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->
	<!-- SIDEBAR -->
	{isActiveSidebar homepage-widgets-col-2}
	<div class="sidebar right clearfix">
		{dynamicSidebar "homepage-widgets-col-2'"}
	</div><!-- end of sidebar -->
	{/isActiveSidebar}
</div><!-- end of container -->
{/block}

{if !$isIndexPage}
	{? isset($post->options('slider')->overrideGlobal) ? $slider = 'slider' : $slider = 'adasdas'}
	{define $slider}
		{include snippet-custom-home-slider.php, options => $post->options('slider')}
	{/define}

  	{? isset($post->options('testimonials')->overrideGlobal) ? $sectionB = 'sectionB' : $sectionB = 'xb'}
	{define $sectionB}
		{include snippet-custom-testimonials.php, show => $post->options('testimonials')->show, options => $post->options('testimonials')}
	{/define}

	{? isset($post->options('products')->overrideGlobal) ? $sectionC = 'sectionC' : $sectionC = 'xe'}
	{define $sectionC}
		{include snippet-custom-products.php, products => $site->create('products', $post->options('products')->category)}
	{/define}
{/if}
