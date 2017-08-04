<ul class="products">

	<h1>Products</h1>
	<?php
	$tags = $pages->get('/products/')->children;
	foreach($tags as $tag) { //iterate over each tag
	?>
	    <li><h2><a href='<?php echo $tag->url; ?>'><?php echo $tag->title; ?></a></h2></li>
	<?php
	}
	?>
</ul>
