<h1>Products</h1>
	<ul class="products list-unstyled">

	
	
	<?php foreach($pages->get('/products/')->children as $tag) : //iterate over each tag ?>
	    <li><h2><a href='<?php echo $tag->url; ?>'><?php echo $tag->title; ?></a></h2></li>
	<?php endforeach; ?>
</ul>
