<?php include('./_head.php'); ?>

<div class="container page">
    <h1>Spectrum Events</h1>
	<hr>
    <?php $events = $pages->find("has_parent=events"); ?>
    <?php $events = $events->reverse(); ?>
    <?php foreach($events as $event) : ?>
        <div class="row">
            <div class="col-md-9">
                <h2><a href="<?php echo $event->url; ?>"><?php echo $event->title; ?></a></h2>
                <p><?php echo $event->startdate; ?> - <?php echo $event->throughdate; ?></p>
                <p><?php echo $event->address; ?></p>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
</div>

<?php include('./_foot.php'); ?>
