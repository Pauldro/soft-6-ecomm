<?php $children = $page->children(); ?>
<div class="row">
	<?php foreach ($children as $child) : ?>
		<div class="col-sm-4">
			<h2><a href="<?= $child->url; ?>"><?= $child->title; ?></a></h2>
		</div>
	<?php endforeach; ?>
</div>
