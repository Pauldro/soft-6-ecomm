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
?>
<div class="container">
	<a href="<?php echo $pages->get(1)->httpUrl; ?>">
		<img class="logo img-responsive" src="<?= $site->companylogo->maxHeight(50)->url; ?>" alt="<?= $site->company_name; ?> logo">
	</a>
</div>
<nav class="navbar <?= $navbar; ?> navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<?php navigationmenu($children) ; ?>

			<form class="navbar-form navbar-right">
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
