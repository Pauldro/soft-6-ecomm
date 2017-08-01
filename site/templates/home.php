<?php include('./_head.php'); ?>
	<div class="jumbotron page-banner" style="background: url('<?= $page->pagebanner->height(900)->url; ?>');">
		<div class="container tsp-background">
			<h1 class="white-text"><?php echo $page->get('pagetitle|headline|title') ; ?></h1>
		</div>
	</div>
	<div class="container page">
		<?php if ($user->logged_in) : ?>
			<h2>Welcome, <?php echo $user->username; ?>!</h2>
		<?php endif; ?>
		<?php echo $page->body; ?>
		<?php include $config->paths->content."common/newsletter.php"; ?>
	</div>

	
<?php include('./_foot.php'); // include footer markup ?>
