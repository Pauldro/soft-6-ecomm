<?php include('./_head.php'); ?>

	<div class="container page">
		<div class="product-container">
			<div class="row">
				<div class="col-md-12">
					<h1><a href="<?php echo $page->parent->parent->url; ?>">Products</a> > <a class="blue
						" href="<?php echo $page->parent->url; ?>"><?php echo $page->parent->title; ?></a> > <?php echo $page->product_title; ?></h1>
				</div>
			</div>
			<div class="row">
			  <div class="col-md-6">
	        <img class="img-responsive" src="<?php echo $page->product_image->url; ?>" alt="">
	        <p><?php echo $page->product_description; ?></p>
			  </div>
	      <div class="col-md-6">
					<h2>Rating</h2>
					<p><i class="fa fa-star fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-star fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-star fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-star fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-star-o fa-2x" aria-hidden="true"></i></p>
	        <h2>Features</h2>
	        <p><?php echo $page->product_features; ?></p>
	        <h2>Specifications</h2>
	        <p><?php echo $page->product_specifications; ?></p>
					<h3 class="price">$<?php echo $page->price; ?></h3>
					<form class="" action="index.html" method="post">
						<label for="quantity">Quantity:</label>
						<input class="quantity" type="text" name="quantity" value="" size="3"><br>
						<button class="btn btn-info add_to_cart" type="button" name="add_to_cart">Add to Cart</button>
					</form>
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
				<?php
				$related = $page->parent->children;
				$i = 0;
				$exclude = $page->id;
				foreach ($related as $relate) {
					if($relate->id != $exclude) {
				?>
					<div class="col-md-3">
						<img class="img-responsive" src="<?php echo $relate->product_image->height(300)->url ?>" alt="">
						<a href="<?php echo $relate->url; ?>"><h4><?php echo $relate->title; ?></h4></a>
						<p><?php echo $relate->product_features; ?></p>
						<h4 class="price">$<?php echo $relate->price; ?></h4>
						<form action="<?php echo $relate->url; ?>">
							<button class="btn btn-info" type="submit" name="button">See more...</button>
						</form>
					</div>
				<?php
				}
				$i++;
				if($i==5) break;
				}
				?>
			</div>
		</div>
		<!-- END RELATED PRODUCTS -->
</div>

<?php include('./_foot.php'); // include footer markup ?>
