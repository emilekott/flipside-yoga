	{isActiveSidebar subpages-sidebar}
		<!-- SIDEBAR -->
	<div class="sidebar right clearfix">
		{if isset($post) and $post->thumbnailSrc != false}
			<div class="entry-thumbnail sidebar-image">
				<a href="{$post->thumbnailSrc}" title="">
					{!$post->thumbnail}
				</a>
			</div>
		{/if}
		{dynamicSidebar subpages-sidebar}
	</div>
	{/isActiveSidebar}