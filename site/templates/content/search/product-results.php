<?php $httpurl = new \Purl\Url($page->fullURL->getUrl()); ?>
<?php $httpurl->path = $section->url; ?>

<!-- PRODUCTS -->
<?php $matches = $pages->find($selector.", template=product-page|kit-page, limit=$session->display"); ?>
<?php if ($matches->count) : ?>
    <?php $ajaxdata = "data-focus='#product-results' data-loadinto='#product-results'"; ?>
    <?php $paginator = new Paginator($input->pageNum, $pages->find($selector.", template=product-page|kit-page")->count, $httpurl->getUrl(), $section->name, $ajaxdata); ?>
    <div>
        <div id="product-results">
            <?= $paginator->generate_showonpage(); ?>
            <h3>Products</h3>
            <hr>
            <div class="row">
                <?php foreach ($matches as $match) : ?>
                    <div class='col-md-3 form-group'>
                        <a href='<?= $match->url; ?>'>
                            <img class='img-responsive' src='<?= $match->product_image->url; ?>' >
                        </a>
                        <h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
                        <p>Model: <?= $match->itemid; ?></p>
                        <a href='<?= $match->url; ?>' class='btn btn-info btn-block'>See more</a>
                    </br>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?= $paginator; ?>
    </div>
<?php endif; ?>
