<div class="featured-products">
  <div class="container">
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
        <div class="col-md-3">
          <img class="img-responsive" src="<?php echo $random->product_image->url; ?>" alt="">
          <h4><a href="<?php echo $random->url; ?>"><?php echo $random->product_title; ?></a></h4>
          <p><?php echo $random->product_features; ?></p>
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
    </div>
  </div>
</div>
