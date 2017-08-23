<?php
include('./_head.php');
?>
<div class="jumbotron page-banner" style="background: url('<?php echo $page->about_img1->url; ?>'); background-size: cover;">
</div>

	<div class="container about">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $page->about_heading; ?></h1>
				<p><?php echo $page->about_para1; ?></p>
				<img class="img-responsive" src="<?php echo $page->about_img2->url; ?>" alt="">
				<p><?php echo $page->about_para2; ?></p>
			</div>
		</div>
		<?php include $config->paths->content."common/featured-products.php"; ?>
	</div>

<?php
include('./_foot.php');
?>
