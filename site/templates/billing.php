<?php include('./_head.php'); ?>

<script>
function fillShipping(f) {
  if(f.shipTo.checked == true) {
      f.shipContact.value = f.billContact.value;
      f.shipName.value = f.billName.value;
      f.shipAddress.value = f.billAddress.value;
      f.shipAddress2.value = f.billAddress2.value;
      f.shipCity.value = f.billCity.value;
      f.shipState.value = f.billState.value;
      f.shipZip.value = f.billZip.value;
      f.shipCountry.value = f.billCountry.value;
  }
    if(f.shipTo.checked == false) {
        f.shipContact.value = '';
        f.shipName.value = '';
        f.shipAddress.value = '';
        f.shipAddress2.value ='';
        f.shipCity.value = '';
        f.shipState.value = '';
        f.shipZip.value = '';
        f.shipCountry.value = '';
  }
}
</script>

<div class="container billing page">
    <div class="steps">
        <a href="<?php echo $pages->get("template=cart")->url; ?>">
            <div class="step col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="icons">
                    <p><i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
                    <p>Cart</p>
                </div>
            </div>
        </a>
        <div class="active step col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="icons">
                <p><i class="fa fa-credit-card-alt" aria-hidden="true"></i></p>
                <p>Shipping/Payment</p>
            </div>
        </div>
        <a href="<?php echo $pages->get("template=review")->url; ?>">
            <div class="step col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="icons">
                    <p><i class="fa fa-pencil" aria-hidden="true"></i></p>
                    <p>Review</p>
                </div>
            </div>
        </a>
        <div class="step col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="icons">
                <p><i class="fa fa-check-circle" aria-hidden="true"></i></p>
                <p>Confirmation</p>
            </div>
        </div>
    </div>
    <h1>Bill To</h1>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h3>Bill To</h3>
            <form class="" action="index.html" method="post">
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text"  class="form-control" name="billContact">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text"  class="form-control" name="billName">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text"  class="form-control" name="billAddress">
                </div>
                <div class="form-group">
                    <label for="">Address 2</label>
                    <input type="text"  class="form-control" name="billAddress2">
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group">
                        <label for="">City</label>
                        <input type="text"  class="form-control" name="billCity">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 form-group">
                        <label for="">State</label>
                        <select name="billState" class="form-control required">
            	            <option> -- </option>
                            <?php
                            $states = getstates();
                            foreach ($states as $state) :
                            ?>
                            <option value="<?= $state['code']; ?>"><?= $state['code']; ?> - <?= $state['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 form-group">
                        <label for="">Zip</label>
                        <input type="text"  class="form-control" name="billZip">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text"  class="form-control" name="billCountry">
                </div>

            <h3>Ship To</h3>
                <label class="checkbox-inline">
                  <input type="checkbox" onclick="fillShipping(this.form)" name="shipTo"> Same as Billing
                </label>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text"  class="form-control" name="shipContact">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text"  class="form-control" name="shipName">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text"  class="form-control" name="shipAddress">
                </div>
                <div class="form-group">
                    <label for="">Address 2</label>
                    <input type="text"  class="form-control" name="shipAddress2">
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group">
                        <label for="">City</label>
                        <input type="text"  class="form-control" name="shipCity">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 form-group">
                        <label for="">State</label>
                        <select name="shipState" class="form-control required">
            	            <option> -- </option>
                            <?php
                            $states = getstates();
                            foreach ($states as $state) :
                            ?>
                            <option value="<?= $state['code']; ?>"><?= $state['code']; ?> - <?= $state['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 form-group">
                        <label for="">Zip</label>
                        <input type="text"  class="form-control" name="shipZip">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text"  class="form-control" name="shipCountry">
                </div>
            </form>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h3>Order</h3>
            <form class="" action="index.html" method="post">
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text"  class="form-control" name="" value="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"  class="form-control" name="" value="">
                </div>
                <div class="form-group">
                    <label for="">Purchase Order Number</label>
                    <input type="text"  class="form-control" name="" value="">
                </div>
                <div class="form-group">
                    <label for="">Ship Method</label>
                    <select class="form-control" name="">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Payment Method</label>
                    <select class="form-control" name="">
                        <option value="">Bill to Account</option>
                        <option value="">Credit Card</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Card Number</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Expiration Month</label>
                        <select class="form-control" name="Month">
                            <option value=""> -- </option>
                            <?php
                            for ($i=1; $i<=12; $i++) :
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            endfor;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Expiration Year</label>
                        <select class="form-control" name="Year">
                            <option value=""> -- </option>
                            <?php
                            $firstYear = (int)date('Y') - 1;
                            $lastYear = $firstYear + 50;
                            for ($i=$firstYear;$i<=$lastYear;$i++) :
                            ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            endfor;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">CVV Code</label>
                        <input type="text" class="form-control" name="" value="">
                    </div>
                </div>
                <label class="checkbox-inline">
                  <input type="checkbox" id="inlineCheckbox1" value="option1"> Ship Complete
                </label>
                <div class="form-group">
                    <label for="">Special Instructions</label>
                    <textarea class="form-control" name="name" rows="3" cols="80"></textarea>
                </div>
            </form>
        </div>
        <div class="cart col-md-12">
            <button class="btn checkout" type="button" name="button">Continue</button>
        </div>
    </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
