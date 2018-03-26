<form action="<?= $page->fullURL->getUrl(); ?>" method="get" data-focus="#product-results" data-loadinto="#product-results" class="products-filter-form">
	<input type="hidden" name="q" value="<?= $productresults->q; ?>">
    <input type="hidden" name="filter" value="filter">
	
	<h4>Filter by Color:</h4>
	<div class="row">
		<?php foreach ($colors as $color) : ?>
	        <div class="col-sm-3">
	            <input type="checkbox" name="color[]" value="<?= $color->name; ?>" <?= ($productresults->has_filtervalue('color', "$color->name")) ? 'checked' : ''; ?>>&emsp;
	            <label for=""><?= $color->title; ?></label></br>
	        </div>
	    <?php endforeach; ?>
	    
	    <?php $stains = $pages->get('name=paints-stains')->children(); ?>
	    <?php foreach ($stains as $stain) : ?>
	        <?php if ($stain->title == 'Stains') : ?>
	            <div class="col-sm-3">
	                <input type="checkbox" name="color[]" value="<?= $stain->name; ?>" <?= ($productresults->has_filtervalue('color', "$stain->name")) ? 'checked' : ''; ?>>&emsp;
	                <label for=""><?= $stain->title; ?></label></br>
	            </div>
	        <?php endif; ?>
	    <?php endforeach; ?>  
	</div>
	</br>

	<h4>Filter by Category</h4>
		<div class="row">
		<?php foreach ($categories as $category) : ?>
		    <div class="col-sm-3">
		        <input type="checkbox" name="category[]" value="<?= $category->name; ?>" <?= ($productresults->has_filtervalue('category', "$category->name")) ? 'checked' : ''; ?>>&emsp;
		        <label for=""><?= $category->title; ?></label></br>
		    </div>
		<?php endforeach; ?>
	</div>
</br>

	<div class="row">
	    <div class="col-sm-4">
	        <h4>Filter by Price</h4>
	        <div class="input-group form-group">
	            <input class="form-control form-group inline input-sm" type="text" name="price[]" value="<?= $productresults->get_filtervalue('price'); ?>" placeholder="From Price">
	        </div>
	        <div class="input-group form-group">
	            <input class="form-control form-group inline input-sm" type="text" name="price[]" value="<?= $productresults->get_filtervalue('price', 1); ?>" placeholder="Through Price">
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-12 form-group">
	    </br>
	        <button class="btn btn-success btn-block" type="submit">Filter</button>
	    </div>
	</div>
</form>
