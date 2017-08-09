<?php include('./_head.php'); ?>

<div class="container page">
	<form action="" method="">
		<div class="form-group">
			<h1>Contact Us!</h1>
			<p><?php echo $page->contact_paragraph; ?></p>
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

<?php include('./_foot.php'); ?>
