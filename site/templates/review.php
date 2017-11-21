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

        <?php include ($config->paths->content.'billing/cart.php'); ?>

        <div class="row">
            <div class="col-sm-12 ">
                <button class="btn btn-success btn-block">Process Order</button>
            </div>
        </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
