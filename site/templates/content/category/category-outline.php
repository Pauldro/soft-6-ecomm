<!-- paint and stains links -->
<div class="row">
	<?php foreach ($category->get_categorylinks() as $child) : ?>
		<div class="col-sm-4">
			<h2><a href="<?= $child->url; ?>" class="sliding-middle-out"><?= $child->title; ?></a></h2>
			<a href="<?= $child->url; ?>">
				<img class="img-responsive" src="<?= $child->product_image->url; ?>" alt="">
			</a>
		</div>
	<?php endforeach; ?>
</div>
