<div class="row">

<?php $colors = $page->children; ?>
<?php foreach ($colors as $color) : ?>

    <div class="col-md-4" style="color: <?php echo $color->headline; ?>;">
        <img src="<?php echo $color->images->height(250)->url; ?>" class="img-responsive center-block" alt="">
        <h2 style="text-align: center; color: <?php echo $color->headline; ?>;"><?php echo $color->title; ?></h2>
        <p><?php echo $color->body; ?></p>
    </div>

<?php endforeach; ?>

</div>
    
