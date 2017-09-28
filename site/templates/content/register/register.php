<form id="register-form" action="/account/redir/" method="post">
    <input type="hidden" name="page" value="/">
    <input type="hidden" name="action" value="register-new-account">
    <div class="row">
        <div class="col-sm-12">
            <h3>Account Information</h3>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label" for="email">Email address</label>
                <input type="email" class="form-control required" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="control-label" for="email-conf">Confirm Email</label>
                <input type="email" class="form-control required" id="email-conf" placeholder="Confirm email">
            </div>
            <p class="help-block"> Enter and Confirm your password  </p>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control required" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Confirm Password</label>
                <input type="password" class="form-control required" id="conf-password" placeholder="Password">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label" for="contact">Contact Name</label>
                <input type="text" class="form-control required" id="contact" name="contact" placeholder="Contact Name">
            </div>
            <div class="form-group">
                <label class="control-label" for="company">Company Name</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Company">
            </div>
            <p class="help-block"> The following two questions will are for password recovery </p>
            <div class="form-group">
                <label class="control-label" for="city-input">What city were you born in?</label>
                <input type="text" class="form-control required" name="cityborn" id="city-input" placeholder="City e.g. Minneapolis">
            </div>
            <div class="form-group">
                <label class="control-label" for="maiden-name">Mother's Maiden Name?</label>
                <input type="text" class="form-control required" name="mmn" id="maiden-name" placeholder="Example: Johnson">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3>Shipping</h3>
            <div class="form-group">
                <label class="control-label">Address</label> <input class="form-control required" name="address">
            </div>
            <div class="form-group">
                <label class="control-label">Address 2</label> <input class="form-control" name="address2">
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <label class="control-label">City</label> <input class="form-control required" name="city" value="">
                </div>
                <div class="col-sm-3 form-group">
                    <label for="">State</label>
                    <select name="registerState" class="form-control required">
                        <option>Choose</option>
                        <?php $states = getstates(); ?>
                        <?php foreach ($states as $state) : ?>
                        <option value="<?= $state['code']; ?>"><?= $state['code']; ?> - <?= $state['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                      <label class="control-label">Zip</label> <input class="form-control required" name="bill-zip" value="">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Country</label>
                        <select name="country" class="form-control required" onChange="showhidestates(this.value, 'bill')">
                            <!-- TODO: logic for country code -->
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone Number</label>
                        <input type="text" class="form-control required" id="phone" name="phone" onKeyup='addDashes(this)' placeholder="952-888-1888">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Billing</h3>
            <div class="form-group">
                <label class="control-label">Address</label> <input class="form-control required" name="address">
            </div>
            <div class="form-group">
                <label class="control-label">Address 2</label> <input class="form-control" name="address2">
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <label class="control-label">City</label> <input class="form-control required" name="city" value="">
                </div>
                <div class="col-sm-3 form-group">
                    <label for="">State</label>
                    <select name="registerState" class="form-control required">
                        <option>Choose</option>
                        <?php $states = getstates(); ?>
                        <?php foreach ($states as $state) : ?>
                        <option value="<?= $state['code']; ?>"><?= $state['code']; ?> - <?= $state['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                      <label class="control-label">Zip</label> <input class="form-control required" name="bill-zip" value="">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Country</label>
                        <select name="country" class="form-control required" onChange="showhidestates(this.value, 'bill')">
                            <!-- TODO: logic for country code -->
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone Number</label>
                        <input type="text" class="form-control required" id="phone" name="phone" onKeyup='addDashes(this)' placeholder="952-888-1888">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block">Create Account</button>    
</form>
