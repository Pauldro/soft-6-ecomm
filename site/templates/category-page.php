<!-- this page is a router for "paints" and "stains" page and the listing of category paints page -->
<?php 
	$category = CategoryPage::create_fromobject($page);
?>

<?php include('./_head.php'); ?>
	<div class="container page">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<?php foreach ($category->generate_breadcrumbs() as $crumb) : ?>
  	  					<li><a href="<?= $crumb->url; ?>"><?= $crumb->title; ?></a></li>
  	  				<?php endforeach; ?>
				  <li><?php echo $page->title; ?></li>
				</ol>
			</div>
		</div>

		<?php
			if ($page->name == 'paints') {
				include $config->paths->content.'category/category-paint-outline.php';
			} else {
				include $config->paths->content.'category/category-outline.php';
			}
		?>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
