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
		<?php
		include('featured-products.php');
		?>
		<!-- END FEATURED PRODUCTS -->
		<?php include $config->paths->content."common/newsletter.php"; ?>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
