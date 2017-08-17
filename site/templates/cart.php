<?php include('./_head.php'); ?>

<div class="cart-container container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <h1>Your Cart</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                      <tr>
                        <td class="col-sm-8 col-md-6">
                          <div class="media">
                              <a class="pull-left" href="#">
                                <img class="media-object" src="" style="width: 72px; height: 72px;" alt="product image">
                              </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><a href="#">Product</a></h4>
                                  <span>Model: #000000</span>
                              </div>
                          </div>
                        </td>

                        <td class="col-sm-1 col-md-1" style="text-align: center">
                          <input type="text" class="form-control" id="" value="3">
                          </td>
                          <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                          <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                          <td class="col-sm-1 col-md-1">
                          <button type="button" class="btn remove">Remove</button>
                        </td>

                    </tr>
                    <tr>
                        <td class="col-md-6">
                          <div class="media">
                              <a class="pull-left" href="#">
                                <img class="media-object" src="" style="width: 72px; height: 72px;" alt="product image">
                              </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><a href="#">Product</a></h4>
                                  <span>Model: #000000</span>
                              </div>
                          </div>
                        </td>
                        <td class="col-md-1" style="text-align: center">
                          <input type="text" class="form-control" id="" value="2">
                          </td>
                          <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                          <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                          <td class="col-md-1">
                          <button type="button" class="btn remove">Remove</button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                          <h5>Subtotal<br>
                            Estimated shipping
                          </h5>
                          <h3 class="green">Total</h3>
                        </td>
                        <td class="text-right">
                          <h5><strong>24.59<br>
                            6.94</strong>
                          </h5>
                          <h3 class="green">$31.53</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                          <button type="button" class="btn btn-default">
                              <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                          </button>
                        </td>
                        <td>
                          <button type="button" class="btn checkout">Checkout</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
