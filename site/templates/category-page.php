<!-- this page contains "paints" and "stains" links -->

<?php include('./_head.php'); ?>
	<div class="container page">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo $page->parent->url; ?>"><?php echo $page->parent->title; ?></a></li>
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
