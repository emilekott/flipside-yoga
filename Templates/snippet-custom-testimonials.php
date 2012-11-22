{if !empty($options->text)}
{if $show}

<div class="testimonials clearfix left">
  <style type="text/css" scoped="scoped">
	 div.testimonials { background-color: {!$options->bgColor} !important; }
	 div.testimonials p a { color: {!$options->linkColor } !important;}
	 div.testimonials p a:hover {  font-family: @fancyFont, Arial, sans-serif; }
  </style>
	<p style="color: {!$options->color}">{!$options->text}</p>
</div>
{/if}
{/if}