<?php include('./_head.php'); ?>

<div class="container page">
	<h1>Contact Us!</h1>
	<div class="row">
		<div class="col-md-6">
			<h4>Address</h4>
			<p>123 Main St.</p>
			<p>Minneapolis, MN 55414</p>
			<h4>Phone</h4>
			<a href="tel:+15555555555">
				<p>555-555-5555</p>
			</a>
			<h4>Email</h4>
			<a href="mailto:info@spectrumpaint.com">
				<p>info@spectrumpaint.com</p>
			</a>
			<h4>Hours</h4>
			<p>Monday - Friday&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;9:00AM - 8:00PM</p>
			<p>Saturday and Sunday&emsp;&nbsp;10:00AM - 6:00PM</p><br>
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
		<iframe class="col-xs-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4745.9889863059825!2d-93.2591112972863!3d44.
		98467809859388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32d7b982cdb03%3A0xcc26ecbbba7137b6!2s123+SE+
		Main+St%2C+Minneapolis%2C+MN+55414!5e0!3m2!1sen!2sus!4v1503500149823"
		width="1200" height="250" frameborder="0" style="border:0"></iframe>
	</div>
</div>

<?php include('./_foot.php'); ?>
