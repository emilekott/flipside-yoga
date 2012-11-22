{extends $layout}
{block content}

<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clear clearfix {isActiveSidebar homepage-widgets-col-2}{else}onecolumn{/isActiveSidebar}">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content clearfix">
		<div id="content-wrapper">

			{if $posts}

				<header class="page-header">
					<h1 class="page-title">
						{__ 'Tag Archives:'}<span>{$tag->title}</span>
					</h1>

					{if !empty($tag->description)}
						<div class="category-archive-meta">{!$tag->description}</div>
					{/if}
				</header>

				{include general-content-nav.php location => 'nav-above'}

				{include snippet-content-loop.php posts => $posts}

				{include general-content-nav.php location => 'nav-below'}

			{else}

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title">{__ 'Nothing Found'}</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>{__ 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post'}</p>
						{include 'general-search-form.php'}
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			{/if}

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	{isActiveSidebar homepage-widgets-col-2}
		<div class="sidebar right clearfix">
			{dynamicSidebar homepage-widgets-col-2}
		</div>
	{/isActiveSidebar}

</div><!-- end of container -->
{/block}