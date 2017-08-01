<?php include('./_head.php'); ?>

	<div class="container page">
		<div class="row">
      <div class="col-md-1"></div>
		  <div class="col-md-5">
		    <h1>Paint > Colors > <?php echo $page->product_title; ?></h1>
        <img class="img-responsive" src="<?php $page->product_image->height(400)->url; ?>" alt="">
        <p><?php echo $page->product_description; ?></p>
		  </div>
      <div class="col-md-5">
        <h2>Features</h2>
        <p><?php echo $page->product_features; ?></p>
        <h2>Specifications</h2>
        <p><?php echo $page->product_specifications; ?></p>
      </div>
      <div class="col-md-1"></div>
		</div>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
