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

		<div class="row">
			<?php
				$children = $page->children;
				foreach ($children as $child) :
			?>
				<div class="col-xs-12 col-sm-3 col-md-2">
					<a class="paint-category-link" href="<?php echo $child->url; ?>">
						<h4 class="paint-category-title" style="border-color: <?php echo $child->title; ?>;"><?php echo $child->title; ?></h4>
					</a>
				</div>
			<?php endforeach; ?>
		</div>

	</div>

<?php include('./_foot.php'); // include footer markup ?>
