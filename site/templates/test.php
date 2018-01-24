<?php include('./_head.php'); ?>

<?php 
	$importer = new DplusItemImporter();
	$importer->get_itemsfromim();
?>

	<div class="container page">
		<ul>
			<?php foreach ($importer->items as $item) : ?>
				<li><?= $item['itemid']; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
