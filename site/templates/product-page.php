<?php include('./_head.php'); ?>
	<div class="container page">
		<ol class="breadcrumb">
			<li><a href="<?= $page->parent->parent->parent->url; ?>"><?= $page->parent->parent->parent->title; ?></a></li>
			<li><a href="<?= $page->parent->parent->url; ?>"><?= $page->parent->parent->title; ?></a></li>
			<li><a href="<?= $page->parent->url; ?>"><?= $page->parent->title; ?></a></li>
			<li>Spectrum - <?= $page->title ?></li>
		</ol>
		
		<div class="product-container">
			<h1>Spectrum - <?= $page->title ?></h1>
			<div class="row">
				<div class="col-sm-5">
					<img class="product-img img-responsive" src="<?= $page->product_image->height(434)->url; ?>" alt="">
					<h4>Model: <?php echo $page->itemid; ?></h4>
					<form class="form-inline" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
						<input type="hidden" name="action" value="add-to-cart">
						<input type="hidden" name="itemID" value="<?= $page->itemid; ?>">
						<input type="hidden" name="page" value="<?= $page->url; ?>">
						<div class="quantity-group">
							<label for="quantity">Quantity:</label>
							<input class="form-control input-sm qty" type="text" name="qty" size="3">
						</div>
						<h3 class="price">$<?php echo $page->price; ?></h3>
						<button class="btn btn-info btn-block add_to_cart" type="submit" name="add_to_cart">Add to Cart</button>
					</form>

				</div>
				<div class="col-sm-7">

					<!-- displays room with paint sample if category is paints -->
					<?php if ($page->parent->parent->name == 'paints') : ?>
						<div class="bedroom-color img-responsive" style="background-color: <?= '#'.$page->itemid; ?>;">
							<img class="bedroom img-responsive" src="<?php echo $config->urls->assets.'files/images/bedroom.png'; ?>">
						</div>
					<?php endif; ?>

					<div class="description">
						<h4>Product Description</h4>
						<p><?php echo $page->longdesc; ?></p>
					</div>
				</div>
			</div>
		</div>
	<!-- END PRODUCT CONTAINER -->
	</br>
	<hr>
	<div class="related-products">
		<h3>Related Products</h3>
		<div class="row">
			<?php foreach ($page->siblings('limit=4', false) as $relate) : ?>
				<div class="col-xs-6 col-sm-4 col-md-3 form-group">
					<a href="<?= $relate->url; ?>">
						<img class="img-responsive" src="<?php echo $relate->product_image->height(400)->url ?>" alt="">
					</a>
					<h4><a href="<?php echo $relate->url; ?>"><?php echo $relate->title; ?></a></h4>
					<p>Model: <?php echo $relate->itemid; ?></p>
					<a href="<?php echo $relate->url; ?>" class="btn btn-info btn-block">See More</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- END RELATED PRODUCTS -->
	</div>
<?php include('./_foot.php'); // include footer markup ?>
