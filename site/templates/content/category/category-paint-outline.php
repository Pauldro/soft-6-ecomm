<!-- paint color categories -->

<?php $children = $page->children; ?>
<div class="row space">
	<?php foreach ($children as $child) : ?>
		<div class="col-md-3 col-sm-6 color form-group">
			<a href="<?php echo $child->url; ?>">
				<img src="<?= $child->product_image->url; ?>" alt="<?= $child->title; ?>" class="img-responsive paint-color-image">
				<div class="middle">
				    <h4 class="text"><?= $child->title; ?></h4>
				</div>
			</a>
		</div>
	<?php endforeach; ?>
</div>
