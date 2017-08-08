<?php
include('./_head.php');
?>

	<div class="container page">
		<div class="row category-page-title">
			<div class="col-md-12">
				<h1><a href="<?php echo $page->parent->url; ?>">Products</a> > <?php echo $page->title; ?></h1>
			</div>
		</div>
		<!-- <div class="row category-page"> -->
			<?php
			$products = $page->children;
			$i = 0;
			foreach ($products as $product) {
				if ($i % 4 == 0) {
					echo "<div class='row category-page'>";
				}
			?>
			<div class="col-sm-3">
				<img class="img-responsive" src="<?php echo $product->product_image->height(300)->url; ?>" alt="<?php echo $product->title; ?>">
				<h4><?php echo $product->title; ?></h4>
				<p><?php echo $product->product_features; ?></p>
				<p><?php echo $product->product_specifications; ?></p>
				<h4 class="price">$<?php echo $product->price; ?></h4>
				<form action="<?php echo $product->url; ?>">
					<button class="btn btn-info" type="submit" name="button">See more...</button>
				</form>
			</div>
			<?php
			$i++;
				if ($i % 4 == 0) {
					echo "</div>";
				}
			}
			?>
		</div>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
