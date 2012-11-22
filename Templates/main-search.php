{extends $layout}
{block content}
<!-- TOOLBAR -->


<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clearfix {isActiveSidebar subpages-sidebar}{else}onecolumn{/isActiveSidebar}">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">

			{if $posts}

				<header class="page-header">
					<h1 class="page-title">
						{__ 'Search Results for:'}<span>{$site->searchQuery}</span>
					</h1>
				</header>
				<style type="text/css" scoped="scoped">
					div.non-thumb-item { display: none; }
					div.entry-thumb-img { display: none; }
					div.tool-buttons { display: none; }
				</style>


				{include general-content-nav.php location => 'nav-above'}

				{include snippet-content-loop.php posts => $posts}

				{include general-content-nav.php location => 'nav-below'}

			{else}

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title">{__ 'Nothing Found'}</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>{__ 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.'}</p>
						{include 'general-search-form.php'}
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			{/if}
		</div>
	</div><!-- end of content-wrapper -->
	<!-- SIDEBAR -->
	{isActiveSidebar subpages-sidebar}
		<div class="sidebar right clearfix">
			{dynamicSidebar "subpages-sidebar"}
		</div>
	{/isActiveSidebar}
	<!-- end of sidebar -->



</div><!-- end of container -->
{/block}