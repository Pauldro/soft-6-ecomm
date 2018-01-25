<?php include('./_head.php'); ?>
<?php $paginator = new Paginator($input->pageNum, $pages->find("template=blog-post")->count, $page->fullURL->getUrl(), $page->name); ?>

<div class="container page">
        <h1>Spectrum Blog</h1>
		<hr>

        <?= $paginator->generate_showonpage(); ?>
        
        <?php $panels = $pages->find("template=blog-post, limit=$session->display, sort=-blog_date"); ?>
        <?php foreach ($panels as $panel) : ?>
            <div class="panels row">
                <div class="col-md-4">
                    <?php if($panel->blog_thumbnail) : ?>
                        <?php echo "<a href='{$panel->url}'><img class='img-responsive' src='{$panel->blog_thumbnail->height(400)->url}' alt=''></a>"; ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <h2><a href="<?php echo $panel->url; ?>" class="sliding-middle-out"><?php echo $panel->title; ?></a></h2>
                    <h5><?php echo $panel->blog_date; ?></h5>
                    
                    <!-- This will truncate the blog body to create a preview -->
                    <?php $chars = 500; ?>
                    <?php $panel->body = substr($panel->body, 0, $chars); ?>
                    <?php $panel->body = substr($panel->body, 0, strrpos($panel->body,' ')); ?>
                    <?php $panel->body = $panel->body . " ..."; ?>
                    
                    <p><?php echo $panel->body; ?></p>
                    <a href="<?php echo $panel->url; ?>" class="btn btn-info">Read More</a>
                </div>
           </div>
           <hr>
        <?php endforeach; ?>
        <?= $paginator; ?>
</div>

<?php include('./_foot.php'); // include footer markup ?>
