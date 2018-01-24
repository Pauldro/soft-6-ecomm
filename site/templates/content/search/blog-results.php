<?php $httpurl = new \Purl\Url($page->fullURL->getUrl()); ?>
<?php $httpurl->path = $section->url; ?>

<!-- BLOG -->
<?php $matches = $pages->find($selector.", template=blog-post, limit=$session->display"); ?>
<?php if ($matches->count) : ?>
    <?php $ajaxdata = "data-focus='#blog-results' data-loadinto='#blog-results'"; ?>
    <?php $paginator = new Paginator($input->pageNum, $pages->find($selector.", template=product-page|kit-page")->count, $page->fullURL->getUrl(), $page->name, $page->ajaxdata); ?>
    <div id="blog-results">
        <h3>Blog</h3>
        <hr>
        <?php foreach ($matches as $match) : ?>
            <div class='row'>
                <div class='col-md-12'>
                    <h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
                    <p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-4'>
                    <a href='<?= $match->url; ?>'>
                        <img class='img-responsive' src='<?= $match->blog_image->url; ?>' >
                    </a>
                </div>
                <div class='col-md-8'>
                    <h5><?= $match->blog_date; ?></h5>
                    <!-- will give a sample of the blog article from the beginning -->
                    <?php $chars = 500; ?>
                    <?php $match->body = substr($match->body, 0, $chars); ?>
                    <?php $match->body = substr($match->body, 0, strrpos($match->body,' ')); ?>
                    <?php $match->body = $match->body . " ..."; ?>
                    <p><?php echo $match->body; ?></p>
                </div>
            </div>
            </br>
            <hr>
        <?php endforeach; ?>
    </div>
    <?= $paginator; ?>
<?php endif; ?>
