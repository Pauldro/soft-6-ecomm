<?php include('./_head.php'); ?>

<div class="container page">
	<div class="row">
		<div class="col-sm-9">
	        <h1 class="blog-post"><?php echo $page->title; ?></h1>
	        <img class='blog-post img-responsive' src='<?= $page->blog_image->height(400)->url; ?>' alt=''>
			<h4 class="blog-post"><?php echo $page->blog_date; ?></h4>
	        <p><?= $page->body; ?></p>
		</div>
		<div class="next col-sm-9">
			<div class="row">
				<div class="col-xs-6">
					<?php if ($page->prev->title) { ?>
					<h4>"<?php echo $page->prev->title; ?>"</h4>
					<a href="<?php echo $page->prev->url; ?>" class="btn btn-info prev-post">Previous Post</a>
					<?php } ?>
				</div>
				<div class="col-xs-6">
					<?php if ($page->next->title) { ?>
					<h4 class="text-right">"<?php echo $page->next->title; ?>"</h4>
					<a href="<?php echo $page->next->url; ?>" class="btn btn-info next-post">Next Post</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
