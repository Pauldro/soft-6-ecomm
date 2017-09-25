<?php include('./_head.php'); ?>

<div class="container page">
        <?php include ($config->paths->content.'billing/process-steps.php'); ?>
        <h1>Review Your Purchase</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="divider">
                    <h4>Payment</h4>
                </div>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4">Contact</label>
                        <p class="col-md-8">Barbara Bullemer</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Name</label>
                        <p class="col-md-8">Barbara Bullemer</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Address</label>
                        <p class="col-md-8">123 Main St.</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">City, State Zip</label>
                        <p class="col-md-8">Minneapolis, MN 55408</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Country</label>
                        <p class="col-md-8">USA</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Phone</label>
                        <p class="col-md-8">555-555-5555</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Email</label>
                        <p class="col-md-8">me@email.com</p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-4">Payment Method</label>
                        <p class="col-md-8">Credit Card</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Card Number</label>
                        <p class="col-md-8">4111 1111 1111 1111</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Expiration Date</label>
                        <p class="col-md-8">06/2017</p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-12">Purchase Order Number</label>
                        <p class="col-md-12">0000000000</p>
                    </div>
                </div>
                <button class="btn btn-info review-btn" type="button" name="button">Edit</button>
            </div>

            <div class="col-md-6">
                <div class="divider">
                    <h4>Ship To</h4>
                </div>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4">Contact</label>
                        <p class="col-md-8">Barbara Bullemer</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Name</label>
                        <p class="col-md-8">Barbara Bullemer</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Address</label>
                        <p class="col-md-8">123 Main St.</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">City, State Zip</label>
                        <p class="col-md-8">Minneapolis, MN 55408</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Country</label>
                        <p class="col-md-8">USA</p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-4">Shipping Method</label>
                        <p class="col-md-8">FedEx Ground</p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-12">Special Instructions</label>
                        <p class="col-md-12">Here are some special instructions for shipping.</p>
                    </div>
                </div>
                <button class="btn btn-info review-btn" type="button" name="button">Edit</button>
            </div>

            <div class="col-md-12">
                <div class="divider">
                    <h4>Order</h4>
                </div>
            </div>
        </div>

        <div class="column-labels row">
            <label class="col-md-2"><p></p></label>
            <label class="col-md-5">Product</label>
            <label class="col-md-1">Price</label>
            <label class="col-md-1">Quantity</label>
            <label class="col-md-1">Total</label>
            <label class="col-md-2"><p></p></label>
        </div>
        <hr class="label-divider">

        <?php $cartdetails = get_cart(session_id(), false); ?>
        <?php foreach ($cartdetails as $cartdetail) : ?>

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
                <input type="text" class="form-control input-sm auto-width" size="4" name="qty" value="<?php echo $cartdetail['qty']; ?>">
            </div>

            <h4 class="col-sm-2 col-md-1">
                $<?php echo $cartdetail['amount']; ?>
            </h4>

            <div class="col-sm-12 col-md-2 btn-form">
                <form class="" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
                  <input type="hidden" name="action" value="update-line">
                  <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
                  <input type="hidden" name="qty" value="<?php echo $cartdetail['qty']; ?>">
                  <input type="hidden" name="page" value="<?php echo $page->url; ?>">
                  <button type="submit" class="btn btn-md btn-warning">Update</button>
                </form>
                <form class="" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
                  <input type="hidden" name="action" value="remove-line">
                  <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
                  <input type="hidden" name="page" value="<?php echo $page->url; ?>">
                  <button type="submit" class="btn btn-md btn-danger">Remove</button>
                </form>
            </div>
        </div>
        <hr>
        <?php
          endforeach;
        ?>

        <div class="row">
            <div class="col-md-2 text-right pull-right">
                <p id="cart-subtotal">$10.00</p>
                <p id="cart-shipping">$5.00</p>
                <h3 id="cart-subtotal">$15.00</h3>
            </div>
            <div class="col-md-2 text-right pull-right">
                <p>Subtotal</p>
                <p>Shipping</p>
                <h3 class="cart-total">Total</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 text-right pull-right">
                <button class="btn btn-success">Process Order</button>
            </div>
        </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
