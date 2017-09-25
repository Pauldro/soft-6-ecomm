<?php include('./_head.php'); ?>

<div class="container page">
	<h1>Contact Us!</h1>
	<div class="row">
		<div class="col-md-6">
			<h4>Address</h4>
			<p><?php echo $site->address; ?></p>
			<h4>Phone</h4>
			<a href="tel:+<?php echo $site->phone800; ?>">
				<p><?php echo $site->phone800; ?></p>
			</a>
			<h4>Email</h4>
			<a href="mailto:<?php echo $site->company_email; ?>">
				<p><?php echo $site->company_email; ?></p>
			</a>
			<h4>Hours</h4>
			<p><?php echo $site->hours; ?></p><br>
		</div>
		<div class="col-md-6">
			<form action="" method="">
				<div class="form-group">
					<p><?php echo $page->headline; ?></p>
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" placeholder="">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" placeholder="">
				</div>
				<div class="form-group">
					<label for="commentgl">Comment</label>
					<textarea class="form-control" rows="3" id="comment"></textarea>
				</div>
				<button type="submit" class="btn btn-info btn-block">Submit</button>
			</form>
		</div>
	</div>
	<div class="row">
		<iframe class="col-xs-12" src="<?= $page->google_maps; ?>"
		width="1200" height="250" frameborder="0" style="border:0"></iframe>
	</div>
</div>

<?php include('./_foot.php'); ?>
