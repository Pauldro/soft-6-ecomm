<?php include('./_head.php'); ?>
	<div class="container page">
		<?php $paints = $pages->get('/products/paints-stains/paints')->children('template=family-page'); ?>
		<ul>
			<?php foreach ($paints as $paint) : ?>
				<?php $paint->of(false); ?>
				<?php $paint->familyid = "$paint->name-paints"; ?>
				<?php $paint->save(); ?>
				<li><?php echo "$paint->name : $paint->name-paints"; ?></li>
			<?php endforeach; ?>
		</ul>
		<?php $pages = $pages->find('id=1054|1055'); ?>
		<?php echo var_dump($pages); ?>
	</div>
<?php include('./_foot.php'); // include footer markup ?>
