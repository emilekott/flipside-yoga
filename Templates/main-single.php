{extends $layout}
{block content}
<!-- TOOLBAR -->

<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clear {isActiveSidebar post-sidebar}{else}onecolumn{/isActiveSidebar post-sidebar}">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content clearfix left">
		<div id="content-wrapper">


			{include snippet-posted-on.php}

			{if !isset($post->options('featured-image')->hideFeatured)}
			{if $post->thumbnailSrc != false }
			<a href="{$post->thumbnailSrc}">
			<div class="entry-thumbnail">
				{isActiveSidebar post-sidebar}
					<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=612&h=330" alt="" />
				{else}
				<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=940&h=330" alt="" />
				{/isActiveSidebar}
			</div>
			</a>
			{/if}
			{/if}

			<div class="entry-content">
				{!$post->content}
			</div>

			<div class="entry-meta post-footer">

				{if $post->type == 'post'}
					<p><strong>Posted:</strong><a class="url fn n ln" href="{$post->author->postsUrl}" title="{__ 'View all posts by'} {$post->author->name}" rel="author"> {$post->author->name}</a>
                		{if $post->type == 'post'}
    						{if $post->categories}
                				<strong>{__ 'Categories:'}</strong> {!$post->categories}</p>
                  			{/if}
                		{/if}

					{if $post->tags}
					<span class="tag-links">
						<span class="entry-utility-prep entry-utility-prep-tag-links">{__ 'Tagged:'}</span>
						{!$post->tags}
					</span>
					{/if}
				{/if}

				{editPostLink $post->id}
			</div><!-- /.entry-meta -->
			<div class="rule"></div>
			{include 'snippet-post-nav.php' location=> nav-above}
			{include snippet-comments.php}
		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->
	{isActiveSidebar post-sidebar}
		<!-- SIDEBAR -->
	<div class="sidebar clearfix right">
		{dynamicSidebar post-sidebar}
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


{? isset($post->options('products')->overrideGlobal) ? $sectionC = 'sectionC' : $sectionC = 'xe'}
{define $sectionC}
	{include snippet-custom-products.php, products => $site->create('products', $post->options('products')->category)}
{/define}