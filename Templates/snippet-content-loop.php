<section class="grid-style clear">
				{var $i = 0}
        {foreach $posts as $post}
				{if $post->thumbnailSrc}
				  <article id="post-{$post->id}" class="{$post->htmlClasses} {if $i % 2 == 1}{_}gridSecond{/_}{else}{_}gridFirst{/_}{/if}">
				{else}
				  <article id="post-{$post->id}" class="{$post->htmlClasses} no-thumbnail {if $i % 2 == 1}{_}gridSecond{/_}{else}{_}gridFirst{/_}{/if}">
				{/if}
					<header class="entry-header">

						{if $post->thumbnailSrc}


            	<div class="entry-thumbnail">

					<div class="entry-thumb-img greyscale">
						<a href="{$post->permalink}"><img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=140&h=140" alt=""/></a>
							<div class="rotate-holder date-button">
								<div class="date">
									<a href="{dayLink $post->date}" title="{$post->date|date:$site->dateFormat}" rel="bookmark"><div class="day">{$post->date|date:"d"}</div><div class="month-year"><p class="date-month">{$post->date|date:"M"}</p><p class="date-year">{$post->date|date:"Y"}</p></div></a>
								</div>
							</div>
							<div class="rotate-holder edit-button">
								<div class="tool-buttons">
									{editPostLink $post->id}
								</div>
							</div>
					</div>
				</div>

						{else}

				<div class="title-no-thumbnail">

					<div class="no-thumb-img-description">
							<div class="date clearfix"><a href="{dayLink $post->date}" title="{$post->date|date:$site->dateFormat}" rel="bookmark"><div class="day">{$post->date|date:"d"}</div><div class="month-year">{$post->date|date:"M"}</div></a>
							<div class="tool-buttons">
								{editPostLink $post->id}
							</div>
							</div>
					</div>


  				</div>
						{/if}

					</header><!-- .entry-header -->

					{if $site->isSearch}
					<h2 class="entry-title">
						<a href="{$post->permalink}" title="Permalink to {$post->title}" rel="bookmark">{$post->title}</a>
						<span class="post-links"><a href="{$post->permalink}" class="share-link" rel="prettySociable">{_x 'share', 'share button'}</a></span>
					</h2>
					<div class="entry-summary">
						{$post->excerpt}
					</div><!-- .entry-summary -->
					{else}
					<div class="entry-content no-thumbnail grid-content">

					<h2 class="entry-title">
						<a href="{$post->permalink}" title="Permalink to {$post->title}" rel="bookmark">{$post->title}</a>
						<span class="post-links"><a href="{$post->permalink}" class="share-link" rel="prettySociable">{_x 'share', 'share button'}</a></span>
					</h2>
						{!$post->content}

					<div class="entry-meta">
					<p><strong>{__ 'Posted:'} </strong> <a class="url fn n ln" href="{$post->author->postsUrl}" title="{__ 'View all posts by'} {$post->author->name}" rel="author"> {$post->author->name}</a>
                		{if $post->type == 'post'}
    						{if $post->categories}
                				<strong>{__ 'Categories:'}</strong> {!$post->categories}</p>
                  			{/if}
                		{/if}
						<div class="comments"><span>{$post->commentsCount}</span></div>

					</div>
					</div><!-- .entry-content -->
						{postContentPager}
					{/if}




              <!-- /.entry-meta -->
				<div class="rule"></div>
				</article><!-- /#post-{$post->id} -->
				{var $i++}
				{/foreach}
				</section>