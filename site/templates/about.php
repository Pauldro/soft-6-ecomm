<?php
include('./_head.php');
?>

<div class="container about">
  <div class="row">
    <div class="col-md-12">
      <img class="img-responsive about" src="<?php echo $page->about_img1->url; ?>" alt="">
      <h1><?php echo $page->about_heading; ?></h1>
      <p><?php echo $page->about_para1; ?></p>
      <img class="img-responsive" src="<?php echo $page->about_img2->url; ?>" alt="">
      <p><?php echo $page->about_para2; ?></p>
    </div>
  </div>
</div>

<?php
include('./_foot.php');
?>
