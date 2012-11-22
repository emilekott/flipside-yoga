<?php //netteCache[01]000484a:2:{s:4:"time";s:21:"0.63758900 1353575412";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:95:"/Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/snippet-content-loop.php";i:2;i:1352301760;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /Users/emile/Sites/flipside-yoga/wp-content/themes/freestyle/Templates/snippet-content-loop.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '0dnbgd43js')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<section class="grid-style clear">
<?php $i = 0 ;$iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($posts) as $post): if ($post->thumbnailSrc): ?>
				  <article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?>
 <?php if ($i % 2 == 1): ob_start() ?>gridSecond<?php echo  htmlSpecialChars(__(ob_get_clean(), 'ait')) ;else: ob_start() ?>
gridFirst<?php echo  htmlSpecialChars(__(ob_get_clean(), 'ait')) ;endif ?>">
<?php else: ?>
				  <article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?>
 no-thumbnail <?php if ($i % 2 == 1): ob_start() ?>gridSecond<?php echo  htmlSpecialChars(__(ob_get_clean(), 'ait')) ;else: ob_start() ?>
gridFirst<?php echo  htmlSpecialChars(__(ob_get_clean(), 'ait')) ;endif ?>">
<?php endif ?>
					<header class="entry-header">

<?php if ($post->thumbnailSrc): ?>


            	<div class="entry-thumbnail">

					<div class="entry-thumb-img greyscale">
						<a href="<?php echo htmlSpecialChars($post->permalink) ?>"><img src="<?php echo htmlSpecialChars($timthumbUrl) ?>
?src=<?php echo htmlSpecialChars($post->thumbnailSrc) ?>&w=140&h=140" alt="" /></a>
							<div class="rotate-holder date-button">
								<div class="date">
									<a href="<?php echo WpLatteFunctions::getDayLink($post->date) ?>" title="<?php echo htmlSpecialChars($template->date($post->date, $site->dateFormat)) ?>
" rel="bookmark"><div class="day"><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "d"), ENT_NOQUOTES) ?>
</div><div class="month-year"><p class="date-month"><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "M"), ENT_NOQUOTES) ?>
</p><p class="date-year"><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "Y"), ENT_NOQUOTES) ?></p></div></a>
								</div>
							</div>
							<div class="rotate-holder edit-button">
								<div class="tool-buttons">
<?php edit_post_link(__("Edit"), "<span class=\"edit-link\">", "</span>", $post->id) ?>
								</div>
							</div>
					</div>
				</div>

<?php else: ?>

				<div class="title-no-thumbnail">

					<div class="no-thumb-img-description">
							<div class="date clearfix"><a href="<?php echo WpLatteFunctions::getDayLink($post->date) ?>
" title="<?php echo htmlSpecialChars($template->date($post->date, $site->dateFormat)) ?>
" rel="bookmark"><div class="day"><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "d"), ENT_NOQUOTES) ?>
</div><div class="month-year"><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "M"), ENT_NOQUOTES) ?></div></a>
							<div class="tool-buttons">
<?php edit_post_link(__("Edit"), "<span class=\"edit-link\">", "</span>", $post->id) ?>
							</div>
							</div>
					</div>


  				</div>
<?php endif ?>

					</header><!-- .entry-header -->

<?php if ($site->isSearch): ?>
					<h2 class="entry-title">
						<a href="<?php echo htmlSpecialChars($post->permalink) ?>" title="Permalink to <?php echo htmlSpecialChars($post->title) ?>
" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a>
						<span class="post-links"><a href="<?php echo htmlSpecialChars($post->permalink) ?>
" class="share-link" rel="prettySociable"><?php echo NTemplateHelpers::escapeHtml(_x('share', 'share button', 'ait'), ENT_NOQUOTES) ?></a></span>
					</h2>
					<div class="entry-summary">
						<?php echo NTemplateHelpers::escapeHtml($post->excerpt, ENT_NOQUOTES) ?>

					</div><!-- .entry-summary -->
<?php else: ?>
					<div class="entry-content no-thumbnail grid-content">

					<h2 class="entry-title">
						<a href="<?php echo htmlSpecialChars($post->permalink) ?>" title="Permalink to <?php echo htmlSpecialChars($post->title) ?>
" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a>
						<span class="post-links"><a href="<?php echo htmlSpecialChars($post->permalink) ?>
" class="share-link" rel="prettySociable"><?php echo NTemplateHelpers::escapeHtml(_x('share', 'share button', 'ait'), ENT_NOQUOTES) ?></a></span>
					</h2>
						<?php echo $post->content ?>


					<div class="entry-meta">
					<p><strong><?php echo NTemplateHelpers::escapeHtml(__('Posted:', 'ait'), ENT_NOQUOTES) ?>
 </strong> <a class="url fn n ln" href="<?php echo htmlSpecialChars($post->author->postsUrl) ?>
" title="<?php echo htmlSpecialChars(__('View all posts by', 'ait')) ?> <?php echo htmlSpecialChars($post->author->name) ?>
" rel="author"> <?php echo NTemplateHelpers::escapeHtml($post->author->name, ENT_NOQUOTES) ?></a>
<?php if ($post->type == 'post'): if ($post->categories): ?>
                				<strong><?php echo NTemplateHelpers::escapeHtml(__('Categories:', 'ait'), ENT_NOQUOTES) ?>
</strong> <?php echo $post->categories ?></p>
<?php endif ;endif ?>
						<div class="comments"><span><?php echo NTemplateHelpers::escapeHtml($post->commentsCount, ENT_NOQUOTES) ?></span></div>

					</div>
					</div><!-- .entry-content -->
<?php 
			$a = array();
			if(empty($a)){
				wp_link_pages(array(
					"before" => "<div class=\"page-link\"><span>" . __("Pages:") . "</span>",
					"after" => "</div>"
				));
			}else{
				wp_link_pages(array(
					"before" => $a[1] . "<span>" . $a[0] . "</span>",
					"after" => $a[2]
				));
			}
			unset($a);
			 endif ?>




              <!-- /.entry-meta -->
				<div class="rule"></div>
				</article><!-- /#post-<?php echo NTemplateHelpers::escapeHtmlComment($post->id) ?> -->
<?php $i++ ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
				</section>