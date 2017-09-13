<?php $steps = $pages->find('template=cart|billing|review|confirmation'); ?>
<div class="steps">
	<?php foreach ($steps as $step) : ?>
		<?php if ($step->id == $page->id) : ?>
			<div class="step active col-xs-12 col-sm-3">
				<div class="icons">
					<p><i class="<?= $step->processicon; ?>" aria-hidden="true"></i></p>
					<p><?= $step->processlabel; ?></p>
				</div>
			</div>
		<?php else : ?>
			<a href="<?= $step->url; ?>">
				<div class="step col-xs-12 col-sm-3">
					<div class="icons">
						<p><i class="<?= $step->processicon; ?>" aria-hidden="true"></i></p>
					<p><?= $step->processlabel; ?></p>
					</div>
				</div>
			</a>
		<?php endif; ?>
	<?php endforeach; ?>
</div>