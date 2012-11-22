	<!-- FOOTER -->
	<div class="borderline"></div>
	<div class="widgets clear clearfix">
		{dynamicSidebar footer-widgets-area}
	</div>

	<div id="footer">
		<div class="left">
      {doShortcode $themeOptions->general->footer_text}
    </div>
		<div class="right clearfix">
		   {menu 'theme_location' => 'footer-menu','fallback_cb' => 'default_footer_menu', 'container' => 'nav', 'container_class' => 'footer-menu', 'menu_class' => 'menu clear', 'depth' => 1 }
		</div>
	</div><!-- end of footer -->
</div><!-- end of mainpage -->
</div>

{ifset $themeOptions->general->displayThemebox}
	{include "$themeboxDir/ThemeBoxTemplate.php"}
{/ifset}

{if $themeOptions->fonts->fancyFont->type == 'cufon' or $themeOptions->general->displayThemebox}
	{cufon
		fonts,
		fancyFont,
		"$themeUrl/design/js/libs/cufon.js",
		THEME_FONTS_URL . "/{$themeOptions->fonts->fancyFont->file}",
		$themeOptions->fonts->fancyFont->font,
		isset($themeOptions->general->displayThemebox)
	}
{/if}

{footer}

<script type="text/javascript">
{if isset($themeOptions->general->ga_code) && ($themeOptions->general->ga_code!="")}
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', {$themeOptions->general->ga_code}]);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
{/if}
	(function() {
		$('#sti-menu').iconmenu();
	});
</script>

</body>
</html>