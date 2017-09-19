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
				<button type="submit" class="btn btn-info">Submit</button>
			</form>
		</div>
	</div>
	<div class="row">
		<iframe class="col-xs-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2832.4138103758974!2d-93.38800038446558!3d44.
		772368379098815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87f63d04cca1d973%3A0x2e24659c4a9ff01b!2s8628+
		Eagle+Creek+Cir%2C+Savage%2C+MN+55378!5e0!3m2!1sen!2sus!4v1505404276308"
		width="1200" height="250" frameborder="0" style="border:0"></iframe>
	</div>
</div>

<?php include('./_foot.php'); ?>
