<?php include('./_head.php'); ?>

<div class="container page">
    <h1>Spectrum Events</h1>
	<hr>
    <?php $events = $pages->find("has_parent=events, sort=startdate"); ?>
    <?php foreach($events as $event) : ?>
        <div class="row">
            <div class="col-md-2">
                <img class="img-responsive" src="<?php echo $event->images->url; ?>" alt="">
            </div>
            <div class="col-md-10">
                <h2><a href="<?php echo $event->url; ?>"><?php echo $event->title; ?></a></h2>
                <h4><?php echo $event->startdate; ?> - <?php echo $event->throughdate; ?></h4>
                <p><?php echo $event->address; ?></p>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
</div>

<?php include('./_foot.php'); ?>
