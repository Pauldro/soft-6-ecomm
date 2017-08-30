<?php include('./_head.php'); ?>

<div class="blog-post container page">
	<div class="col-sm-9">
		        <h1><?php echo $page->title; ?></h1>
                <img class='img-responsive' src='<?= $page->blog_image->height(400)->url; ?>' alt=''>
				<h4><?php echo $page->blog_date; ?></h4>
                <p><?= $page->blog_body; ?></p>
	</div>
	<?php
		$prevLink = $page->prev->url;
		$nextLink = $page->next->url;
	?>
	<div class="next col-sm-9">
		<div class="row">
			<div class="col-sm-6">
				<!-- <h4 class="prev-post"> -->
					<a href="<?php echo $prevLink; ?>" class="btn btn-info prev-post">Previous Post</a>
				<!-- </h4> -->
			</div>
			<div class="col-sm-6">
				<!-- <h4 class="next-post"> -->
					<a href="<?php echo $nextLink; ?>" class="btn btn-info next-post">Next Post</a>
				<!-- </h4> -->
			</div>
		</div>
	</div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
