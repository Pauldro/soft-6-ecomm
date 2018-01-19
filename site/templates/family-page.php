<!-- this page contains the product listings, ie. all the reds or all the rollers -->
<?php 
	$paginator = new Paginator($input->pageNum, $page->children->count, $page->fullURL->getUrl(), $page->name);
?>
<?php include('./_head.php'); ?>

	<div class="container page">
		<ol class="breadcrumb">
			<li><a href="<?php echo $page->parent->parent->url; ?>"><?php echo $page->parent->parent->title; ?></a></li>
		  	<li><a href="<?php echo $page->parent->url; ?>"><?php echo $page->parent->title; ?></a></li>
		  	<li><?php echo $page->title; ?></li>
		</ol>
		
		<?= $paginator->generate_showonpage(); ?>
		<?php $children = $page->children("limit=$session->display", array('findIDs' => true)); ?>

		<?php foreach (array_chunk($children, 4, true) as $array) : ?>
			<div class="row space">
			<?php foreach ($array as $child) : ?>
				<?php $product = $pages->get($child['id']); ?>
				<div class="col-xs-6 col-md-3 form-group">
					<a href="<?php echo $product->url; ?>">
						<img class="img-responsive" src="<?php echo $product->product_image->height(300)->url; ?>" alt="<?php echo $product->title; ?>">
					</a>
					<h4><a href="<?php echo $product->url; ?>"><?php echo $product->title; ?></a></h4>
					<p>Model: <?php echo $product->itemid; ?></p>
					<a href="<?php echo $product->url; ?>" class="btn btn-info btn-block">See more</a>
				</div>
			<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		<?= $paginator; ?>
	</div>
<?php include('./_foot.php'); // include footer markup ?>
