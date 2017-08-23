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
			<div class="col-md-12">
				<h3>Quality products with quality guarantees.</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec mauris ut quam mollis facilisis vitae ac est.
				Ut nec accumsan nibh. Sed sit amet ipsum nec ex venenatis convallis eget maximus lorem. Aliquam pharetra dictum rutrum.
				Sed at elit nec urna tincidunt gravida. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
				Pellentesque in tincidunt elit. Morbi auctor volutpat condimentum. Suspendisse euismod egestas enim, sit amet vehicula elit posuere non.
				Phasellus ac lorem scelerisque, placerat quam in, pellentesque tortor. In ut gravida dolor.
				Sed eget luctus elit. Integer sit amet libero elit. Fusce posuere lacus mauris, sit amet feugiat
				leo mollis sit amet. Etiam vestibulum, magna id convallis semper, urna tellus sodales mi, sed auctor ipsum mi in nulla.</p>

				<p>Suspendisse sed aliquet justo. Sed semper nec justo id tristique. Integer eu venenatis nibh. Phasellus eu nibh vulputate,
				cursus odio quis, placerat nunc. Nulla augue risus, lobortis accumsan volutpat luctus, lobortis a dolor. Donec porta
				bibendum scelerisque. Fusce et nisi sagittis, eleifend eros sit amet, pulvinar lorem. Proin ut diam pulvinar, auctor
				sem quis, scelerisque eros. In bibendum dictum velit, nec mattis metus vehicula non. </p>
			</div>
		</div>
		<?php include $config->paths->content."common/featured-products.php"; ?>
		<!-- END FEATURED PRODUCTS -->

	</div>
<?php include $config->paths->content."common/newsletter.php"; ?>
<?php include('./_foot.php'); // include footer markup ?>
