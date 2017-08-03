<ul class="products">

	<h1>Products</h1>
	<?php
	$tags = $pages->get('/products/')->children;
	foreach($tags as $tag){ //iterate over each tag
	    echo "<li><a href='{$tag->url}'>{$tag->title}</a></li>"; // and generate link to that page
	}
	?>
</ul>
