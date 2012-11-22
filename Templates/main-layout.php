{getHeader}

	<!-- layout -->

	<div id="sections">

	{if isset($post)}
		{block slider}
			{include snippet-custom-home-slider.php, options => $themeOptions->header}
		{/block}
  	{/if}

	<div class="separator">
		<div class="slide-pattern-down"></div>
		<div class="hider"></div>
	</div>
	<div id="section-container" class="clearfix">

	{define sectionA}
		{include #content}
	{/define}

	{define sectionB}
		{include snippet-custom-testimonials.php, show => $themeOptions->globals->showTestimonials, options => $themeOptions->testimonials}
	{/define}

	{define sectionC}
		{include snippet-custom-products.php, products => $site->create('product', $themeOptions->globals->globalProducts)}
	{/define}

	{if !isset($sectionsOrder)}
		{var $sectionsOrder = $themeOptions->globals->sectionsOrder}
	{/if}


	{foreach $sectionsOrder as $section}
		{include #$section}
	{/foreach}
	</div>

<!-- /layout -->

{getFooter}