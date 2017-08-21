<?php include('./_head.php'); ?>

<div class="container cart page">
        <div class="steps">
            <div class="step active col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="icons">
                    <p><i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
                    <p>Cart</p>
                </div>
            </div>
            <a href="<?php echo $pages->get("template=billing")->url; ?>">
                <div class="step col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="icons">
                        <p><i class="fa fa-credit-card-alt" aria-hidden="true"></i></p>
                        <p>Shipping/Payment</p>
                    </div>
                </div>
            </a>
            <div class="step col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="icons">
                    <p><i class="fa fa-pencil" aria-hidden="true"></i></p>
                    <p>Review</p>
                </div>
            </div>
            <div class="step col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="icons">
                    <p><i class="fa fa-check-circle" aria-hidden="true"></i></p>
                    <p>Confirmation</p>
                </div>
            </div>
        </div>
        <h1>Your Cart</h1>
        <hr class="title-divider">
        <div class="column-labels row">
            <label class="col-md-2">Image</label>
            <label class="col-md-5">Product</label>
            <label class="col-md-1">Price</label>
            <label class="col-md-1">Quantity</label>
            <label class="col-md-1">Total</label>
            <label class="col-md-2"><p></p></label>
        </div>
        <hr class="label-divider">

        <?php
          $cartdetails = get_cart(session_id(), false);
          foreach ($cartdetails as $cartdetail) :
        ?>

        <div class="product row">

            <a href="<?php echo $pages->get("product_model=".$cartdetail['itemid'])->url; ?>">
                <img class="col-sm-2 col-md-2 img-responsive" src="<?php echo $pages->get("product_model=".$cartdetail['itemid'])->product_image->height(300)->url; ?>" alt="">
            </a>

            <div class="col-sm-4 col-md-5 product-info">
                <h4 class="cart-product-title">
                    <a href="<?php echo $pages->get("product_model=".$cartdetail['itemid'])->url; ?>"><?php echo $pages->get("product_model=".$cartdetail['itemid'])->title; ?></a>
                </h4>
                <p class="cart-product-model">Model: <?php echo $cartdetail['itemid']; ?></p>
            </div>

            <p class="col-sm-2 col-md-1 product-price">
                $<?php echo $cartdetail['price']; ?>
            </p>

            <div class="col-sm-2 col-md-1 product-quantity">
                <input type="text" class="form-control input-sm auto-width" size="4" name="qty" value="<?php echo $cartdetail['qty']; ?>">
            </div>

            <h4 class="col-sm-2 col-md-1 product-total green">
                $<?php echo $cartdetail['amount']; ?>
            </h4>

            <div class="col-sm-12 col-md-2 btn-form">
                <form class="" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
                  <input type="hidden" name="action" value="update-line">
                  <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
                  <input type="hidden" name="qty" value="<?php echo $cartdetail['qty']; ?>">
                  <input type="hidden" name="page" value="<?php echo $page->url; ?>">
                  <button type="submit" class="btn update">Update</button>
                </form>
                <form class="" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
                  <input type="hidden" name="action" value="remove-line">
                  <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
                  <input type="hidden" name="page" value="<?php echo $page->url; ?>">
                  <button type="submit" class="btn remove">Remove</button>
                </form>
            </div>
        </div>
        <hr>
        <?php
          endforeach;
        ?>

        <div class="totals row">
            <div class="col-md-2 right">
                <p class="totals-value" id="cart-subtotal">$10.00</p>
                <p class="totals-value" id="cart-shipping">$5.00</p>
                <h3 class="totals-value green cart-total" id="cart-subtotal">$15.00</h3>
            </div>
            <div class="col-md-2 right">
                <p>Subtotal</p>
                <p>Shipping</p>
                <h3 class="cart-total">Total</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 right">
                <button class="btn checkout">Checkout</button>
            </div>
        </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
