<?php include('./_head.php'); ?>
<div class="jumbotron page-banner" style="background: url('<?php echo $page->pagebanner->url; ?>'); background-size: cover;">
</div>

<div class="container page">
	<h1><?php echo $page->headline; ?></h1>
	<p><?php echo $page->body; ?></p>
	</br>
	<?php include $config->paths->content."about/icon.php"; ?>
	</br>
	</br>
	<?php include $config->paths->content."common/newsletter.php"; ?>

</div>

<?php include('./_foot.php'); ?>
