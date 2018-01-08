<?php include('./_head.php'); ?>

<div class="container page">
    <h1><?php echo $page->title; ?></h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <img class="img-responsive" src="<?php echo $page->images->url; ?>" alt="">
        </div>
        <div class="col-md-8">
            <h4><?php echo $page->startdate; ?> - <?php echo $page->throughdate; ?></h4>
            <p><?php echo $page->address; ?></p>
            <p><a href="<?php echo $page->link; ?>"><?php echo $page->link; ?></a></p>
            <p><?php echo $page->body; ?></p>
        </div>
    </div>
    </br>
    </br>
    <h3>More Upcoming Events</h3>
    </br>
    <div class="row">
        <?php $relates = $page->siblings("template=event, limit=4, sort=startdate", false) ?>
        <?php foreach ($relates as $relate) : ?>
            <div class="col-md-3">
                <img class="img-responsive" src="<?php echo $relate->images->url; ?>" alt="">
                <h4><a href="<?php echo $relate->url; ?>"><?php echo $relate->title; ?></a></h4>
                <h5><?php echo $relate->startdate; ?></h5>
                <p><?php echo $relate->address; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    </br>
</div>

<?php include('./_foot.php'); ?>
