<?php $children = $page->children(); ?>
<div class="row">
	<?php foreach ($children as $child) : ?>
		<div class="col-sm-4">
			<h2><a href="<?= $child->url; ?>"><?= $child->title; ?></a></h2>
			<?php
			if ($child->title == 'Paints') {
			?>
				<a href="<?= $child->url; ?>"><img class="img-responsive" src="<?= $child->product_image->url; ?>" alt=""></a>
			<?php
			}
			?>
				<a href="<?= $child->url; ?>"><img class="img-responsive" src="<?= $child->schematicimage->url; ?>" alt=""></a>
		</div>
	<?php endforeach; ?>
</div>
