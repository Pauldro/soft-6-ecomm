
<hr class="title-divider">
<div class="column-labels row">
    <label class="col-md-2"><p></p></label>
    <label class="col-md-5">Product</label>
    <label class="col-md-1">Price</label>
    <label class="col-md-1">Quantity</label>
    <label class="col-md-1">Total</label>
    <label class="col-md-2"><p></p></label>
</div>
<hr class="label-divider">

<?php
  $cartdetails = get_cart(session_id(), false);
  $subtotal = 0;
  setlocale(LC_MONETARY, NULL);
  $cartqty = 0;
  foreach ($cartdetails as $cartdetail) :
?>

<div class="product row">
    <a href="<?php echo $pages->get("itemid=".$cartdetail['itemid'])->url; ?>">
        <img class="col-sm-2 col-md-2 img-responsive" src="<?php echo $pages->get("itemid=".$cartdetail['itemid'])->product_image->height(300)->url; ?>" alt="">
    </a>

    <div class="col-sm-4 col-md-5 product-info">
        <h4 class="cart-product-title">
            <a href="<?php echo $pages->get("itemid=".$cartdetail['itemid'])->url; ?>"><?php echo $pages->get("itemid=".$cartdetail['itemid'])->title; ?></a>
        </h4>
        <p class="cart-product-model">Model: <?php echo $cartdetail['itemid']; ?></p>
    </div>

    <p class="col-sm-2 col-md-1 product-price">
        $<?php echo $cartdetail['price']; ?>
    </p>

    <div class="col-sm-2 col-md-1 product-quantity">
        <form class="" id="<?php echo $cartdetail['itemid'].'-form'; ?>" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
          <input type="hidden" name="action" value="update-line">
          <input type="hidden" name="itemID" value="<?php echo $cartdetail['itemid']; ?>">
          <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
          <input type="hidden" name="price" value="<?php echo $cartdetail['price']; ?>">
          <input type="text" class="form-control input-sm auto-width" size="4" name="qty" value="<?php echo $cartdetail['qty']; ?>">
          <input type="hidden" name="page" value="<?php echo $page->url; ?>">
        </form>
    </div>

    <h4 class="col-sm-2 col-md-1 product-total green">
        $<?php echo $cartdetail['amount']; ?>
    </h4>
    
    <?php $subtotal += $cartdetail['amount']; ?>
    <?php $cartqty += $cartdetail['qty']; ?>

    <div class="col-sm-12 col-md-2 btn-form">
        <form class="" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
          <input type="hidden" name="action" value="remove-line">
          <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
          <input type="hidden" name="page" value="<?php echo $page->url; ?>">
          <button type="submit" class="btn btn-md btn-danger">Remove</button>
        </form>
        
        <button form="<?php echo $cartdetail['itemid'].'-form'; ?>" type="submit" class="btn btn-md btn-warning pull-right">Update</button>
    </div>
</div>
<hr>

<?php endforeach; ?>

<div class="row">
    <div class="col-md-2 text-right pull-right">
        <p>$<?php echo money_format("%i", $subtotal); ?></p>
        <p>$<?php $shipping = "5.00"; echo money_format("%i", $shipping); ?></p>
        <h3 class="price">$<?php $total = $subtotal + $shipping; echo money_format("%i", $total); ?></h3>
    </div>
    <div class="col-md-2 text-right pull-right">
        <p>Subtotal</p>
        <p>Shipping</p>
        <h3>Total</h3>
    </div>
</div>
