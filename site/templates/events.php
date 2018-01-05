<?php include('./_head.php'); ?>

<div class="container page">
        <h1>Spectrum Events</h1>
		<hr>
        <?php $panels = $pages->find("has_parent=event"); ?>
        <?php $panels = $panels->reverse(); ?>
        <?php foreach($panels as $panel) : ?>

            <div class="panels row">
           </div>
           <hr>

        <?php endforeach; ?>
</div>

<?php include('./_foot.php'); ?>
