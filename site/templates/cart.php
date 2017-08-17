<?php include('./_head.php'); ?>

<div class="container page">
    <div class="cart-container">
        <div class="table-responsive">
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

                      <?php
                        $cartdetails = get_cart(session_id(), false);
                        foreach ($cartdetails as $cartdetail) :
                      ?>
                      <tr>
                        <td class="col-sm-8 col-md-6">
                          <div class="media">
                              <a class="pull-left" href="<?php echo $pages->get("product_model=".$cartdetail['itemid'])->url; ?>">
                                <img class="media-object" src="<?php echo $pages->get("product_model=".$cartdetail['itemid'])->product_image->url; ?>" style="width: 72px; height: 72px;" alt="product image">
                              </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><a href="<?php echo $pages->get("product_model=".$cartdetail['itemid'])->url; ?>"><?php echo $pages->get("product_model=".$cartdetail['itemid'])->title; ?></a></h4>
                                  <span>Model: <?php echo $cartdetail['itemid']; ?></span>
                              </div>
                          </div>
                        </td>

                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="text" class="form-control qty" value="<?php echo $cartdetail['qty']; ?>">
                        </td>
                          <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $cartdetail['price']; ?></strong></td>
                          <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $cartdetail['amount']; ?></strong></td>
                          <td class="col-sm-1 col-md-1">

                              <form class="" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
                                <input type="hidden" name="action" value="update-line">
                                <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
                                <input type="hidden" name="qty" value="<?php echo $cartdetail['qty']; ?>">
                                <input type="hidden" name="page" value="<?php echo $page->url; ?>">
                                <button type="submit" class="btn remove">Update</button>
                              </form>

                              <form class="" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
                                <input type="hidden" name="action" value="remove-line">
                                <input type="hidden" name="linenbr" value="<?php echo $cartdetail['recordno']; ?>">
                                <input type="hidden" name="page" value="<?php echo $page->url; ?>">
                                <button type="submit" class="btn remove">Remove</button>
                              </form>

                        </td>
                      </tr>
                    <?php
                      endforeach;
                    ?>

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
                          <h5><strong>1.00<br>
                            1.00</strong>
                          </h5>
                          <h3 class="green">$1.00</h3>
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
