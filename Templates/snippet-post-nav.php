{capture $prev}{!__ '%s Previous' |printf: '<span class="meta-nav">&larr;</span>'}{/capture}
{capture $next}{!__ 'Next %s' |printf: '<span class="meta-nav">&rarr;</span>'}{/capture}

<nav id="{$location}">
	<div class="nav-previous">{prevPostLink $prev}</div>
	<div class="nav-next">{nextPostLink $next}</div>
</nav>