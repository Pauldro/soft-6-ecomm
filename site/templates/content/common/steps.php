<div class="steps">
    <a href="<?php echo $pages->get("template=cart")->url; ?>">
        <div class="step col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="icons">
                <p><i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
                <p>Cart</p>
            </div>
        </div>
    </a>
    <a href="<?php echo $pages->get("template=billing")->url; ?>">
        <div class="active step col-xs-12 col-sm-3 col-md-3 col-lg-3">
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
