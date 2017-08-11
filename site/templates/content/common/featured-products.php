<div class="featured-products">
<<<<<<< HEAD
    <h2>Featured Products</h2>
      <?php
      $randoms = $pages->find("template=product-page, sort=random");
      $i = 0;
      foreach ($randoms as $random) {
      ?>
        <div class="col-md-3">
          <img class="img-responsive" src="<?php echo $random->product_image->url; ?>" alt="">
          <h4><a href="<?php echo $random->url; ?>"><?php echo $random->product_title; ?></a></h4>
          <p><?php echo $random->product_specifications; ?></p>
          <p class="price">$<?php echo $random->price; ?></p>
          <form action="<?php echo $random->url; ?>" >
            <button class="btn btn-info" type="submit" name="button">See More...</button>
          </form>
        </div>
      <?php
      $i++;
      if ($i==4) break;
      }
      ?>
=======
	<div class="row">
		<div class="col-md-12">
			<h2>Featured Products</h2>
		</div>
	</div>
	<div class="row">
	<?php $randoms = $pages->find("template=product-page, sort=random, limit=4"); ?>
	<?php  foreach ($randoms as $random) : ?>
		<div class="col-md-3 form-group">
			<img class="img-responsive" src="<?= $random->product_image->url; ?>" alt="">
			<h4>
				<a href="<?= $random->url; ?>" class="title"><?= $random->title; ?></a>
			</h4>
			<p><?php echo $random->product_features; ?></p>
			<p class="price">$<?php echo $random->price; ?></p>
			<a href="<?php echo $random->url; ?>" class="btn btn-info">See More...</a>
		</div>
	<?php endforeach; ?>
	</div>
>>>>>>> 584731f0ef3ce38ee5bb3526f6622cce2eac6381
</div>
