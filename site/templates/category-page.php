<?php include('./_head.php'); ?>
<?php $i = 0; ?>
	<div class="container page">
		<div class="row category-page-title">
			<div class="col-md-12">
				<h1><a href="<?php echo $page->parent->url; ?>">Products</a> > <?php echo $page->title; ?></h1>
			</div>
		</div>
		<?php
			$children = $page->children("", array('findIDs' => true));
			foreach (array_chunk($children, 4, true) as $array) : ?>
				<div class="category row">
					<?php foreach ($array as $child) : ?>
						<?php $product = $pages->get($child['id']); ?>
						<div class="col-sm-3 form-group">
						<img class="img-responsive" src="<?php echo $product->product_image->height(300)->url; ?>" alt="<?php echo $product->title; ?>">
						<h4><a href="<?php echo $product->url; ?>"><?php echo $product->title; ?></a></h4>
						<p><?php echo $product->product_specifications; ?></p>
						<h4 class="price">$<?php echo $product->price; ?></h4>
						<a href="<?php echo $product->url; ?>" class="btn btn-info">See more...</a>
					</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>


	</div>

<?php include('./_foot.php'); // include footer markup ?>
