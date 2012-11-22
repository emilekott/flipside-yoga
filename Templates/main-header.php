<!doctype html>
<html class="no-js" lang="{$site->language}">
<head>
	<meta charset="{$site->charset}" />
	<script type="text/javascript">
		var ua = navigator.userAgent; var meta = document.createElement('meta');
		if(ua.match(/iPad/i) != null){
			meta.name = 'viewport';	meta.content = 'width=device-width, initial-scale=1';
		}else if((ua.toLowerCase().indexOf("android") > -1 && ua.toLowerCase().indexOf("mobile")) || ((ua.match(/iPhone/i)) || (ua.match(/iPod/i)))){
			meta.name = 'viewport';	meta.content = 'target-densitydpi=device-dpi, width=480';
		}
		var m = document.getElementsByTagName('meta')[0]; m.parentNode.insertBefore(meta,m)
	</script>

	<title>{title}</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="{$site->pingbackUrl}">

	{if $themeOptions->fonts->fancyFont->type == 'google'}
	<link href="http://fonts.googleapis.com/css?family={$themeOptions->fonts->fancyFont->font}" rel="stylesheet" type="text/css" />
	{/if}

	<link id="ait-style" rel="stylesheet" type="text/css" media="all" href="{less}">

	{head}

	<!--[if lte IE 8]>
		 <script src="{$themeUrl}/design/js/libs/modernizr.js"></script>
	<![endif]-->

	<!--[if lt IE 9]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<![endif]-->

	{if isset($post)}
	<!-- facebook open graph -->
	<meta property="og:description" content="{$post->excerpt}" />
	<meta property="og:image" content="{$post->thumbnailSrc}" />
	{/if}

	<link id="responsive-style" rel="stylesheet" type="text/css" media="all" href="{$themeUrl}/responsive.css" />
</head>

<body class="{bodyClasses $bodyClasses, ait-freestyle}" data-themeurl="{$themeUrl}">
<div class="mainpage">

	<!-- HEADER -->
	<div id="header" class="clearfix">

		<div class="logo left">
			{if !empty($themeOptions->general->logo_img)}
			<a href="{$homeUrl}">
				<img src="{linkTo $themeOptions->general->logo_img}" alt="logo" />
			</a>
			{else}
			<a href="{$homeUrl}">
				<span>{$themeOptions->general->logo_text}</span>
			</a>
			{/if}
			<p class="left textshadow info">{$themeOptions->general->tagline}</p>
		</div>
		{if $themeOptions->socialIcons->displayIcons}
		{ifset $themeOptions->socialIcons->icons}
			<ul id="social-links" class="right clearfix">
				{foreach $themeOptions->socialIcons->icons as $icon}
				<li><a href="{if !empty($icon->link)}{$icon->link}{else}#{/if}"><img src="{$icon->iconUrl}" height="32" width="32" alt="{$icon->title}" title="{$icon->title}"></a></li>
				{/foreach}
			</ul>
		{/ifset}
		{/if}

		<div class="mainmenu">
			<!-- WPML plugin required -->
			<div class="flags">
				<div class="phoneNumber left">{$themeOptions->general->phoneNumber}</div>
			    {if function_exists(icl_get_languages)}
					{if icl_get_languages('skip_missing=0')}
						{foreach icl_get_languages('skip_missing=0') as $lang}
							<a href="{$lang['url']}" class="{if $lang['active'] == 1}active{/if}"><img src="{$lang['country_flag_url']}" alt="{$lang['translated_name']}" /></a>
						{/foreach}
					{/if}
				{/if}
			</div>

			<div id="mainmenu-dropdown-duration" style="display: none;">{$themeOptions->general->mainmenu_dropdown_time}</div>
			<div id="mainmenu-dropdown-easing" style="display: none;">{$themeOptions->general->mainmenu_dropdown_animation}</div>
			{menu 'theme_location' => 'primary-menu', 'fallback_cb' => 'default_menu', 'container' => 'nav', 'container_class' => 'mainmenu', 'menu_class' => 'menu' }
		</div>
	</div>