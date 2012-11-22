<div class="entry-meta clear">

	<div class="date"><a href="{dayLink $post->date}" title="{$post->date|date:$site->dateFormat}" rel="bookmark"><div class="day">{$post->date|date:"d"}</div><div class="month-year"><p class="date-month">{$post->date|date:"M"}</p><p class="date-year">{$post->date|date:"Y"}</p></div></a></div>
	<h1>{$post->title}</h1>

	<div class="comments"><span>{$post->commentsCount}</span></div>

</div><!-- .entry-meta -->