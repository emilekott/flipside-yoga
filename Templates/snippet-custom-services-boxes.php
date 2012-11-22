{if $boxes}
<div class="services clearfix clear">
	{var $width = 960}
	{var $i = count($boxes)}

	{var $widthSer = ($width/$i)-0}
	{var $widthSBox = $widthSer-40}

	<style type="text/css" scoped="scoped">
		div.services div.sbox { width: {!$widthSBox}px; }
	</style>

	{foreach $boxes as $box}
		<div class="clearfix sbox sbox{$iterator->counter}" {ifset $box->options->boxWidth}style="width: {$box->options->boxWidth};"{/ifset}>
			<div class="sbox-wrap">
				<div class="sbox-content clear clearfix">
					<h2 class="title"><a href="{$box->options->boxLink}"><img src="{$box->thumbnailSrc}" class="sbox-icon" alt="{$box->title}" /><span>{$box->title}</span></a></h2>
					<p class="left">{$box->options->boxText}</p>
					<!--<a href="{$box->options->boxLink}" class="more">{$box->options->boxMoreText}</a>-->
			    </div>
			</div>
		</div>
	{/foreach}
</div><!-- end of services -->
{/if}