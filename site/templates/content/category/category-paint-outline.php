<!-- paint color categories -->

<?php $children = $page->children; ?>
<div class="row space">
	<?php foreach ($children as $child) : ?>
		<div class="col-xs-12 col-sm-3 col-md-2">
			<a class="paint-category-link" href="<?php echo $child->url; ?>">
				<h4 class="paint-category-title" style="border-color: <?php echo $child->title; ?>;"><?php echo $child->title; ?></h4>
			</a>
		</div>
	<?php endforeach; ?>
</div>
