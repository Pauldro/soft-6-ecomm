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
				<?php
				$randoms = $pages->find("template=product-page, sort=random");
				$i = 0;
				foreach ($randoms as $random) {
				?>
					<div class="col-md-4">
						<img class="img-responsive" src="<?php echo $random->product_image->url; ?>" alt="">
						<h3><?php echo $random->product_title; ?></h3>
						<p><?php echo $random->product_features; ?></p>
						<p class="price">$<?php echo $random->price; ?></p>
						<form action="<?php echo $random->url; ?>"
							<button class="btn btn-info" type="submit" name="button">Add to Cart</button>
						</form>
					</div>
				<?php
				$i++;
				if ($i==3) break;
				}
				?>
			</div>
		</div>
		<!-- END FEATURED PRODUCTS -->
		<?php include $config->paths->content."common/newsletter.php"; ?>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
