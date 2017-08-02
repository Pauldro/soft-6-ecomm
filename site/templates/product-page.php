<?php include('./_head.php'); ?>

	<div class="container page">
		<h1><?= $page->product_title; ?></h1>
		<div class="row">
			<div class="col-sm-4">
				<img class="img-responsive" src="<?= $page->product_image->height(400)->url; ?>" alt="">
			</div>
			<div class="col-sm-4">
				<h3>Specs</h3>
				<div>
					<?php echo $page->product_specifications; ?>
				</div>
				<button class="btn btn-primary">Add to Cart</button>
			</div>
		</div>
		<div class="row">
      <div class="col-md-1"></div>
		  <div class="col-md-5">
        
        <p><?php echo $page->product_description; ?></p>
		  </div>
      <div class="col-md-5">
        <h2>Features</h2>
        <p></p>
        <h2>Specifications</h2>
        <p><?php echo $page->product_specifications; ?></p>
      </div>
      <div class="col-md-1"></div>
		</div>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
