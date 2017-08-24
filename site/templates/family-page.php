<?php include('./_head.php'); ?>
<?php $i = 0; ?>
	<div class="container page">
		<div class="row category-page-title">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo $page->parent->parent->url; ?>"><?php echo $page->parent->parent->title; ?></a></li>
				  <li><a href="<?php echo $page->parent->url; ?>"><?php echo $page->parent->title; ?></a></li>
				  <li><?php echo $page->title; ?></li>
				</ol>
			</div>
		</div>
		<?php $children = $page->children("", array('findIDs' => true)); ?>
		
		<?php foreach (array_chunk($children, 4, true) as $array) : ?>
			<div class="category row">
				<?php foreach ($array as $child) : ?>
				<?php $product = $pages->get($child['id']); ?>
				<div class="col-xs-6 col-md-3 form-group">
					<img class="img-responsive" src="<?php echo $product->product_image->height(300)->url; ?>" alt="<?php echo $product->title; ?>">
					<h4><a href="<?php echo $product->url; ?>"><?php echo $product->title; ?></a></h4>
					<p>Model: <?php echo $product->product_model; ?></p>
					<a href="<?php echo $product->url; ?>" class="btn btn-info">See more</a>
				</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
