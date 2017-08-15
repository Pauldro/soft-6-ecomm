<?php include('./_head.php'); ?>

	<div class="container page">
		<div class="product-container">
			<ol class="breadcrumb">
				<li><a href="<?php echo $page->parent->parent->parent->url; ?>"><?php echo $page->parent->parent->parent->title; ?></a></li>
			  <li><a href="<?php echo $page->parent->parent->url; ?>"><?php echo $page->parent->parent->title; ?></a></li>
			  <li><a href="<?php echo $page->parent->url; ?>"><?php echo $page->parent->title; ?></a></li>
			  <li><?php echo $page->title; ?></li>
			 </ol>
			<h1><?php echo $page->title; ?></h1>

			<div class="row">
			  <div class="col-md-5 col-sm-5">
				<img class="product-img img-responsive" src="<?php echo $page->product_image->height(434)->url; ?>" alt="">
				<h4 class="product-name">Spectrum - <?php echo $page->title ?> - <?php echo $page->product_features; ?></h4>
				<p>Model: <?php echo $page->product_model; ?></p>
				<p class="star">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</p>
				<form class="" action="index.html" method="post">
					<div class="quantity-group">
						<label for="quantity">Quantity:</label>
						<input class="quantity" type="text" name="quantity" size="3">
					</div>
					<h3 class="price">$<?php echo $page->price; ?></h3>
					<button class="btn btn-info add_to_cart" type="button" name="add_to_cart">Add to Cart</button>
				</form>

				</div>
				<div class="col-md-7 col-sm-7">
					<div style="background-color: <?php echo $page->product_model; ?>;">
						<img class="bedroom img-responsive" src="<?php echo $config->urls->assets.'files/images/bedroom.png'; ?>">
					</div>
				</div>

			</div>
		</div>
		<!-- END PRODUCT CONTAINER -->
		<div class="related-products">
			<div class="row">
				<div class="col-md-12">
					<h3>Related Products</h3>
				</div>
			</div>
			<div class="row">
				<?php foreach ($page->siblings('limit=4', false) as $relate) : ?>
					<div class="col-md-3 form-group">
						<img class="img-responsive" src="<?php echo $relate->product_image->height(400)->url ?>" alt="">
						<a href="<?php echo $relate->url; ?>"><h5><?php echo $relate->title; ?></h5></a>
						<p><?php echo $relate->product_specifications; ?></p>
						<a href="<? $relate->url; ?>" class="btn btn-info">See More</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- END RELATED PRODUCTS -->
</div>

<?php include('./_foot.php'); // include footer markup ?>
