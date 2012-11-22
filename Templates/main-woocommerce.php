{extends $layout}
{block content}

<!-- SUBPAGE -->
<div id="container" class="subpage subpage-line clear clearfix {isActiveSidebar subpages-sidebar}{else}onecolumn{/isActiveSidebar}">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content clearfix">
		<div id="content-wrapper">

		{? woocommerce_content() }

		</div><!-- end of content-wrapper -->
	</div>
	<!-- SIDEBAR -->
	{isActiveSidebar subpages-sidebar}
	<div class="sidebar clearfix right">

		{dynamicSidebar subpages-sidebar}

	</div><!-- end of sidebar -->
	{/isActiveSidebar}

</div><!-- end of container -->