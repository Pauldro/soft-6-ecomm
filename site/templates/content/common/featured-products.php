<div class="featured-products">
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
</div>
