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
						{if $archive->isDay}
							{__ 'Daily Archives:'} <span>{$posts[0]->date|date:$site->dateFormat}</span>
						{elseif $archive->isMonth}
							{__ 'Monthly Archives:'} <span>{$posts[0]->date|date:'F Y'}</span>
						{elseif $archive->isYear}
							{__ 'Yearly Archives:'} <span>{$posts[0]->date|date:'Y'}</span>
						{else}
							{__ 'Blog Archives'}
						{/if}
					</h1>
				</header>

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
						{include general-search-form.php}
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			{/if}

		</div><!-- end of content-wrapper -->
	</div>
	<!-- SIDEBAR -->
	{isActiveSidebar homepage-widgets-col-2}
	<div class="sidebar clearfix right">

		{dynamicSidebar "homepage-widgets-col-2"}

	</div><!-- end of sidebar -->
	{/isActiveSidebar}

</div><!-- end of container -->