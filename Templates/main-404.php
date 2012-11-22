{extends $layout}
{block content}

<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clearfix clear">
	<!-- MAINBAR -->
		<div id="content" class="mainbar entry-content {isActiveSidebar subpages-sidebar}{else}onecolumn{/isActiveSidebar}">
			<div id="content-wrapper">
				<h1>{$post->title}</h1>
				{if $post->thumbnailSrc != false }
				<div class="entry-thumbnail">
					<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=640" alt="" />
				</div>
				{/if}
				<h1>{__ "This is somewhat embarrassing, isn't it?"}</h1>

				<p>{__ "It seems we can't find what you are looking for. Perhaps searching, or one of the links below, can help."}</p>

				{include general-search-form.php}
			</div>
		</div>
		<!-- SIDEBAR -->
		{isActiveSidebar subpages-sidebar}
			<div class="sidebar right clearfix">
				{dynamicSidebar subpages-sidebar}
			</div>
		{/isActiveSidebar}
</div><!-- end of container -->
{/block}