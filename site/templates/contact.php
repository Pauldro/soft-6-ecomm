<?php include('./_head.php'); ?>

<div class="container page">
	<h1>Contact Us!</h1>
	<div class="row">
		<div class="col-md-3">
			<h4><i class="fa fa-home" aria-hidden="true"></i>&ensp;Address</h4>
					<p><?php echo $site->address; ?></p>
			<h4><i class="fa fa-phone" aria-hidden="true"></i>&ensp;Phone</h4>
					<p><a href="tel:+<?php echo $site->phone800; ?>"><?php echo $site->phone800; ?></a></p>
			<h4><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Email</h4>
					<p><a href="mailto:<?php echo $site->company_email; ?>"><?php echo $site->company_email; ?></a></p>
		</div>
		<div class="col-md-3">
			<h4><i class="fa fa-clock-o" aria-hidden="true"></i>&ensp;Hours</h4>
					<p><?php echo $site->hours; ?></p>
		</div>
		<div class="col-md-6">
			<form action="" method="">
				<div class="form-group">
					<p><?php echo $page->headline; ?></p>
					<!-- <label for="name">Name</label> -->
					<input type="text" class="form-control" id="name" placeholder="Name">
				</div>
				<div class="form-group">
					<!-- <label for="email">Email</label> -->
					<input type="email" class="form-control" id="email" placeholder="Email">
				</div>
				<div class="form-group">
					<!-- <label for="commentgl">Comment</label> -->
					<textarea class="form-control" rows="3" id="comment" placeholder="Type your question or comment here..."></textarea>
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
