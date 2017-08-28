<?php include('./_head.php'); ?>

<div class="container page">
	<div class="row">
        <h1>Spectrum Blog</h1>
        <hr>
		<?php
		   $panels = $pages->find("has_parent=blog");
		   $panels = $panels->reverse();
		   foreach($panels as $panel) {
		?>

			<div class="panels">

		         <div class="content">
		            <h2><a href="<?php echo $panel->url; ?>"><?php echo $panel->title; ?></a></h2>
                    <?php
           		         if($panel->blog_image){
           		            echo "<a href='{$panel->url}'><img class='img-responsive' src='{$panel->blog_image->height(200)->url}' alt=''></a>";

           		         }
       		         ?>
		            <h4><?php echo $panel->blog_date; ?></h4>
		            <?php echo $panel->blog_description; ?>
		            <p class="readmore"><a href="<?php echo $panel->url; ?>">Read More</a></p>
		         </div>
		      <hr>
		      </div>
		<?php } ?>
	</div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
