<?php $children = $page->children(); ?>
<div class="row">
	<?php foreach ($children as $child) : ?>
		<div class="col-sm-4">
			<h2><a href="<?= $child->url; ?>"><?= $child->title; ?></a></h2>
			<?php
				if ($child->title == "Paints") {
			?>
					<a href="<?= $child->url; ?>"><img class="img-responsive" src="<?php echo $page->paint_cat_img->url; ?>" ></a>
			<?php
				} elseif ($child->title == "Stains") {
			?>
					<a href="<?= $child->url; ?>"><img class="img-responsive" src="<?php echo $page->stain_cat_img->url; ?>" ></a>
			<?php
				} elseif ($child->title == "Rollers") {
			?>
					<a href="<?= $child->url; ?>"><img class="img-responsive" src="<?php echo $page->rollers_cat_img->url; ?>" ></a>
			<?php
				} elseif ($child->title == "Brushes") {
			?>
					<a href="<?= $child->url; ?>"><img class="img-responsive" src="<?php echo $page->brushes_cat_img->url; ?>" ></a>
			<?php
				} elseif ($child->title == "Accessories") {
			?>
					<a href="<?= $child->url; ?>"><img class="img-responsive" src="<?php echo $page->acc_cat_img->url; ?>" ></a>
			<?php
				};
			?>
		</div>
	<?php endforeach; ?>
</div>
