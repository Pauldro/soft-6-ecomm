<?php include('./_head.php'); ?>

<div class="container page">
    <h1><?php echo $page->title; ?></h1>
    <hr>
    <p><?php echo $page->startdate; ?> - <?php echo $page->throughdate; ?></p>
    <p><?php echo $page->address; ?></p>
    <p><a href="<?php echo $page->link; ?>"><?php echo $page->link; ?></a></p>
    <p><?php echo $page->body; ?></p>
</div>

<?php include('./_foot.php'); ?>
