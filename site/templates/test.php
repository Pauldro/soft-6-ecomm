<?php include('./_head.php'); ?>

<div class="container page">
	<div class="row category-page">
		<div class="col-md-12">
			<h1><a href="<?php echo $page->parent->url; ?>">Products</a> > <?= $page->title; ?></h1>
		</div>
	</div>
	<?php 
		$item = get_itemim('002157', false);
		Product::makeproductfromim($item);
	?>
	
	
</div>


<?php include('./_foot.php'); // include footer markup ?>
