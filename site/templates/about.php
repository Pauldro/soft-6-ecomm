<?php
include('./_head.php');
?>
<div class="jumbotron page-banner" style="background: url('<?php echo $page->pagebanner->url; ?>'); background-size: cover;">
</div>

	<div class="container about">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $page->headline; ?></h1>
				<?php echo $page->body; ?>
			</div>
		</div>
	</div>

<?php
include('./_foot.php');
?>
