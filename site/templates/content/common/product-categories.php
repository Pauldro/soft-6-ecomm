<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Product Categories</h3>
	</div>
	<div class="panel-body">
		<ul class="list-unstyled">
			<?php foreach($pages->get('/products/')->children as $tag) : //iterate over each tag ?>
				<li><a href='<?php echo $tag->url; ?>'><?php echo $tag->title; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>