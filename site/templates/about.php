<?php include('./_head.php'); ?>
<div class="jumbotron page-banner" style="background: url('<?php echo $page->pagebanner->url; ?>'); background-size: cover;">
</div>

	<div class="container page">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $page->headline; ?></h1>
				<p><?php echo $page->body; ?></p>
				<img src="<?php echo $page->main_image->url; ?>" alt="" class="img-responsive">
				<p><?php echo $page->body_2; ?></p>
			</div>
		</div>
	</div>

<?php include('./_foot.php'); ?>
