<?php include('./_head.php'); ?>

<div class="container page">
        <?php include ($config->paths->content.'billing/process-steps.php'); ?>
        <h1>Your Cart</h1>
        
        <?php include ($config->paths->content.'billing/cart.php'); ?>
        
        </br>
        <div class="row">
            <div class="col-md-12">
                <a href="" class="btn btn-md btn-success btn-block">Checkout</a>
            </div>
        </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
