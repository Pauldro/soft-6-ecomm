<?php include('./_head.php'); ?>

<div class="container page">
	<div class="col-sm-9">
		        <h1><?php echo $page->title; ?></h1>
		        <h4><?php echo $page->blog_date; ?></h4>
                <img class='img-responsive' src='<?= $page->blog_image->height(400)->url; ?>' alt=''>
                <p><?= $page->blog_body; ?></p>
	</div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
