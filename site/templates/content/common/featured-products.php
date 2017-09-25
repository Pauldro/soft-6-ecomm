<div class="featured-products">
	<div class="row">
		<div class="col-md-12">
			<h2>Featured Products</h2>
		</div>
	</div>
	<div class="row">
	<?php $randoms = $pages->find("template=product-page, sort=random, limit=4"); ?>
	<?php  foreach ($randoms as $random) : ?>
		<div class="col-xs-12 col-sm-4 col-md-3 form-group">
			<img class="img-responsive" src="<?= $random->product_image->url; ?>" alt="">
			<h4>
				<a href="<?= $random->url; ?>" class="title"><?= $random->title; ?></a>
			</h4>
			<p><?= $random->speca; ?></p>
			<p class="price">$<?php echo $random->price; ?></p>
			<a href="<?php echo $random->url; ?>" class="btn btn-info btn-block">See More</a>
		</div>
	<?php endforeach; ?>
	</div>
</div>
