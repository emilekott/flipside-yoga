{willPaginate}
	{capture $prev}{!__ '%s Newer posts' |printf: '<span class="meta-nav">&larr;</span>'}{/capture}
	{capture $next}{!__ 'Older posts %s' |printf: '<span class="meta-nav">&rarr;</span>'}{/capture}
	<nav id="{$location}">
		<div class="nav-previous">{prevPostsLink $prev}</div>
		<div class="nav-next">{nextPostsLink $next}</div>
	</nav>
{/willPaginate}
