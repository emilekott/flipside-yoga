{if $options->sliderEnable == 'yes'}
	{if $options->sliderType == 'anything'}
		{var $slides = $site->create('slider-creator', $options->sliderCategory)}
		{if $slides}
		<div id="header-container" class="header-container" style="height: auto; background: {!$options->headerBgColor} url('{$options->headerBg}') {$options->headerBgRepeat} {$options->headerBgX} {$options->headerBgY};">
			<div class="hider"></div>
			<div id="slider-container" style="height: auto;">
				<div id="slider-delay" style="display:none">{$themeOptions->header->sliderDelayTime}</div>
			    <div id="slider-animTime" style="display:none">{$themeOptions->header->sliderAnimTime}</div>
			    <div id="slider-height" style="display:none">{$themeOptions->header->sliderImageHeight}</div>

				<div id="main-background-slider-bottom" style="display:none;"><img src="#" alt="top" /></div>
			    <div id="main-background-slider-top" style="display:none;"><img src="#" alt="bottom" /></div>

			    <div id="preload--background-slider-images" style="display: none;">
			    	{foreach $slides as $slide}
			    		{if $slide->options->backgroundImage}
			    		  <img src="{$slide->options->backgroundImage}" alt="Background" />
			    		{else}
			    		  <img src="#" alt="Background" />
			    		{/if}
			    	{/foreach}
			    </div>

				<ul id="slider" class="slide clear clearfix">
					{var $i=0}
					{foreach $slides as $slide}

					<li>
						<a href="{$slide->options->link}">
							{ifset $slide->options->topImage}
								{if $slide->options->slideDescription}
									<img src="{$timthumbUrl}?src={$slide->options->topImage}&w=1024&h={$imageSize}" alt="{*$slide->options->slideDescription*}" />
								{else}
									<img src="{$timthumbUrl}?src={$slide->options->topImage}&w=1024&h={$imageSize}" alt="" />
								{/if}
							{/ifset}
						</a>
						{if $slide->options->slideDescriptionPosition != 'hide'}
						<div class="custom-slide-{$slide->options->slideDescriptionPosition} csss clearfix" style="display: none; top: {$slide->options->buttonYPosition};">
							<div class="buyNow swis hoverLinkBg-{$i}"><h2 class="title"><a href="{$slide->options->link}" style="color: {!$slide->options->colorTitle}">{!$slide->options->buttonText}</a></h2>
								<div class="infoBuy" style="color: {!$slide->options->colorText}">{!$slide->options->slideDescription}</div>
							</div>
							{var $i++}
			            		</div>
			            {/if}
					</li>
					{/foreach}
				</ul>
				<div class="slide-pattern-up"></div>
				<div class="slide-pattern-down"></div>
			</div><!-- end of slider -->
		</div><!-- end of header-container -->
		{/if}
	{elseif $options->sliderType == 'revolution'}
		{if $options->sliderAliases != 'null'}
			{if isset($options->sliderAlternative)}
			<div class="slider-alternative" style="display: none">
				<img src="{$options->sliderAlternative}" alt="alternative" />
			</div>
			{/if}
			{putRevSlider($options->sliderAliases)}
		{/if}
	{/if}
{/if}
