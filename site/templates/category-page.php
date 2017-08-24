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
		
		<?php 
			if ($page->name == 'paints') {
				include $config->paths->content.'category/category-paint-outline.php'; 
			} else {
				include $config->paths->content.'category/category-outline.php'; 
			}
		?>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
