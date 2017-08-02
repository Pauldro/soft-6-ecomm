<?php include('./_head.php'); ?>
	<div class="jumbotron page-banner" style="background: url('<?= $page->pagebanner->height(900)->url; ?>');">
		<!-- <div class="container tsp-background">
			<h1 class="white-text"><?php echo $page->get('pagetitle|headline|title') ; ?></h1>
		</div> -->
	</div>
	<div class="container page">
		<?php if ($user->logged_in) : ?>
			<h2>Welcome, <?php echo $user->username; ?>!</h2>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-8">
				<img class="img-responsive" src="<?php echo $page->main_image->url; ?>" alt="">
			</div>
			<div class="col-md-4">
				<h1><?php echo $page->body_headline; ?></h1>
				<p><?php echo $page->body; ?></p>
			</div>
		</div>
		<div class="featured-products">
			<div class="row">
				<div class="col-md-12">
					<h2>Featured Products</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo $pages->get("/product-1/")->product_image->url; ?>" alt="">
					<h3><?php echo $pages->get("/product-1/")->product_title; ?></h3>
					<p><?php echo $pages->get("/product-1/")->product_features; ?></p>
					<p class="price">$<?php echo $pages->get("/product-1/")->price; ?></p>
					<button class="btn btn-info" type="button" name="button">Add to Cart</button>
				</div>
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo $pages->get("/product-1/")->product_image->url; ?>" alt="">
					<h3><?php echo $pages->get("/product-1/")->product_title; ?></h3>
					<p><?php echo $pages->get("/product-1/")->product_features; ?></p>
					<p class="price">$<?php echo $pages->get("/product-1/")->price; ?></p>
					<button class="btn btn-info" type="button" name="button">Add to Cart</button>
				</div>
				<div class="col-md-4">
					<img class="img-responsive" src="<?php echo $pages->get("/product-1/")->product_image->url; ?>" alt="">
					<h3><?php echo $pages->get("/product-1/")->product_title; ?></h3>
					<p><?php echo $pages->get("/product-1/")->product_features; ?></p>
					<p class="price">$<?php echo $pages->get("/product-1/")->price; ?></p>
					<button class="btn btn-info" type="button" name="button">Add to Cart</button>
				</div>
			</div>
		</div>
		<!-- END FEATURED PRODUCTS -->
		<?php include $config->paths->content."common/newsletter.php"; ?>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
