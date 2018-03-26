<?php 
	$productresults = $searchresults->create_searchsection($section);
	$productresults->generate_filter($input);
	$productresults->set('ajaxdata', "data-focus='#product-results' data-loadinto='#product-results'");
	$selector = trim($productresults->generate_processwireselector());
	$matches = $pages->find("$selector, limit=$session->display"); 
	
	$colors = $pages->get('name=paints')->children();
	$categories = $pages->get('name=paint-tools')->children();
	
	echo $selector; 
	

?>

<!-- PRODUCTS -->

<?php if ($matches->count) : ?>
    <?php $paginator = new Paginator($input->pageNum, $pages->find($productresults->generate_processwireselector())->count, $productresults->pageurl->getUrl(), $section->name, $productresults->ajaxdata); ?>
    <div>
        <div id="product-results">
            <h3>Products</h3>
            <hr>
            <h4>Filter by Color:</h4>
            <div class="row">
                <?php include($config->paths->content."search/products-filter-form.php"); ?>
            </div>
            </br>
            
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
