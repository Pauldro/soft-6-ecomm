<?php include('./_head.php'); ?>

<div class="container page">
    <div class="row">
        <div class="col-sm-12">
            <h1>Welcome back, Customer!</h1><p>If you would like to login as a different user, or you would like to log out of your account, <a href="<?= $pages->get('/user/redir/')->url . '?action=logout'; // TODO fix url ?>">log out here.</a></p>
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Customer Information<i class="pull-right fa fa-address-card" aria-hidden="true"></i></h3>
                      </div>
                      <div class="panel-body">
                          <form class="form-horizontal">
                            <label class="col-sm-4">&nbsp;<i class="fa fa-user" aria-hidden="true"></i>&emsp;Name</label>
                            <p class="col-sm-8">John Snow</p>
                              <label class="col-sm-4"><i class="fa fa-envelope" aria-hidden="true"></i>&emsp;Email</label>
                              <p class="col-sm-8">customer@email.com</p>
                              <label class="col-sm-4"><i class="fa fa-truck" aria-hidden="true"></i>&emsp;Address</label>
                              <p class="col-sm-8">123 Main St.</br>
                                Minneapolis, MN 55408</p>
                          </form>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h3 class="panel-title">Login Information<i class="pull-right fa fa-user" aria-hidden="true"></i></h3>
                      </div>
                      <div class="panel-body">
                         <p class="col-sm-12"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Change your password</a></p>
                         <p class="col-sm-12"><a href="<?= $pages->get('/user/redir/')->url . '?action=logout'; // TODO fix url ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out of your account</a></p>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Orders<i class="pull-right fa fa-check-square" aria-hidden="true"></i></h3>
                          </div>
                          <div class="panel-body">
                              <table class="table-responsive">
                                  <table class="table table-striped table-condensed">
                                      <thead>
                                          <th>Details</th> <th>Date</th> <th>Order Number</th> <th>Customer PO</th> <th>Status</th>
                                      </thead>
                                      <tr>
                                          <td><i class="fa fa-plus" aria-hidden="true"></i></td>
                                          <td>09/25/2017</td> 
                                          <td>123456789</td> 
                                          <td>Customer PO</td> 
                                          <td>Shipped</td>
                                      </tr>
                                      <tr>
                                          <td><i class="fa fa-plus" aria-hidden="true"></i></td>
                                          <td>09/25/2017</td> 
                                          <td>123456789</td> 
                                          <td>Customer PO</td> 
                                          <td>Shipped</td>
                                      </tr>
                                      <tr>
                                          <td><i class="fa fa-plus" aria-hidden="true"></i></td>
                                          <td>09/25/2017</td> 
                                          <td>123456789</td> 
                                          <td>Customer PO</td> 
                                          <td>Shipped</td>
                                      </tr>
                                  </table>
                              </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
