<?php
	// top navigation consists of homepage and its visible children
	$homepage = $pages->get('/');
	$children = $homepage->children();

	// make 'home' the first item in the navigation
	$children->prepend($homepage);

	if ($config->debug) {
		$navbar = 'navbar-default';
		$navbar = 'navbar-inverse';
	} else {
		$navbar = 'navbar-inverse';
		$navbar = 'navbar-default';
	}
	
	if ($user->isLoggedin()) {
		// user is already logged in, so they don't need to be here
		$session->remove('loginerror');
	   // $session->redirect("/store/"); 
	}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<a href="<?php echo $pages->get(1)->httpUrl; ?>">
				<img class="logo img-responsive" src="<?= $site->companylogo->maxHeight(50)->url; ?>" alt="<?= $site->company_name; ?> logo">
			</a>
		</div>
		<div class="col-sm-6">
			<?php if ($user->loggedin) : ?> 
			<?php else : ?>
				<form class="form-inline pull-right header-login hidden-xs" action="<?= $pages->get('/user/redir/')->url; ?>" method="post" novalidate>
				  <input type="hidden" name="action" value="login">
				  <div class="form-group">
				    <label class="sr-only" for="username">Email address</label>
				    <input type="text" class="form-control input-sm" id="username" name="email" placeholder="Email">
					<span class="help-block"></span>
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="password">Password</label>
				    <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password">
					<span class="help-block"></span>
				  </div>
				  <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
				  <button type="submit" class="btn btn-info btn-sm">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
				  <a href="<?php echo $pages->get('template=register')->url; ?>" class="btn btn-primary btn-sm">Register </a>
				</form>
			<?php endif; ?>
		</div>
	</div>
</div>
<nav class="navbar <?= $navbar; ?> navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>
			<?php if ($user->loggedin) : ?> 
				<a class="navbar-item" href="<?= $pages->get('/user/redir/')->url . '?action=logout'; // TODO fix url ?>">Logout</a>	
			<?php else : ?>
				<a class="navbar-item" href="<?= $pages->get('/user/login/')->url; ?>">Login</a>	
			<?php endif; ?>

		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<?php navigationmenu($children) ; ?>

			<form class="navbar-form navbar-right header-search">
				<div class="input-group">
					<input type="text" class="form-control input-sm" placeholder="Search" name="q">
					<div class="input-group-btn">
						<button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
        		</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="active">
					<a href="<?php echo $pages->get("template=cart")->url; ?>" class="sliding-white">Cart (0<!-- TODO INSERT ITEM NUMBERS -->) <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
