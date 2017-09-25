<?php 
	if ($user->isLoggedin()) {
		// user is already logged in, so they don't need to be here
		$session->remove('loginerror');
	   // $session->redirect("/store/"); 
	}
?>


<?php include('./_head.php'); ?>
	<div class="container page">
		<h1><?php echo $page->get('pagetitle|headline|title') ; ?></h1>
		<div class="row">
			<div class="col-sm-6">
				<div class="well">
					<div class="text-center login-logo">
						<img src="<?= $site->companylogo->maxHeight(50)->url; ?>" alt="<?= $site->company_name; ?> logo" class="img-responsive">
					</div>
					
					<form action="<?= $pages->get('/user/redir/')->url; ?>" method="post" novalidate>
						<input type="hidden" name="action" value="login">
						<?php if ($session->loginerror) : ?>
							<br>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  	<span aria-hidden="true">&times;</span>
							  </button>
							  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Error!</strong> <?= $session->loginerror; ?>
							</div>
							<br>
						<?php endif; ?>
						<div class="form-group">
							<label for="username" class="control-label">Email</label>
							<input type="text" class="form-control" id="username" name="email" title="Please enter your Email" placeholder="example@gmail.com">
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label for="password" class="control-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" title="Please enter your password">
							<span class="help-block"></span>
						</div>
						<div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
						<button type="submit" class="btn btn-success btn-block">Login</button>
					</form>
				</div>
			</div>
			<div class="col-sm-6">
				<p class="lead">Register now for <span class="text-success">FREE</span></p>
				<ul class="list-unstyled" style="line-height: 2">
					<li><span class="fa fa-check text-success"></span> See all your orders</li>
					<li><span class="fa fa-check text-success"></span> Fast re-order</li>
					<li><span class="fa fa-check text-success"></span> Save your favorites</li>
					<li><span class="fa fa-check text-success"></span> Fast checkout</li>
					<li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
					<li><a href="/read-more/"><u>Read more</u></a></li>
				</ul>
				<p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
			</div>
		</div>        
	</div>
<?php include('./_foot.php'); // include footer markup ?>
