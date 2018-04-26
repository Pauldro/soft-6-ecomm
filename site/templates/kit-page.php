<!-- this page contains the product listings, ie. all the reds or all the rollers -->
<?php 
	$kit = KitPage::create_fromobject($page);
	$paginator = new Paginator($input->pageNum, $page->children->count, $page->fullURL->getUrl(), $page->name);
?>
<?php include('./_head.php'); ?>

	<div class="container page">
		<ol class="breadcrumb">
			<?php foreach ($kit->generate_breadcrumbs() as $crumb) : ?>
				<li><a href="<?= $crumb->url; ?>"><?= $crumb->title; ?></a></li>
			<?php endforeach; ?>
		  	<li><?php echo $page->title; ?></li>
		</ol>
        
		<div class="row">
			<div class="col-md-4">
				</br>
				<img class ='img-responsive' src="<?php echo $page->product_image->url; ?>" alt="">
			</div>
			<div class="col-md-8">
				<h2><?php echo $page->title; ?></h2>
				<h4>Model: <?php echo $page->itemid; ?></h4>
				<p><?php echo $page->longdesc; ?></p>
			</div>
		</div>

		</br>
		</br>
		
		<hr class="title-divider">
		<div class="column-labels row">
		    <label class="col-md-2"><p></p></label>
		    <label class="col-md-5">Component</label>
		    <label class="col-md-3">Model #</label>
		    <label class="col-md-2 text-right">Qty Included</label>
		</div>
		<hr class="label-divider">
		
		<?php foreach ($kit->get_kitcomponents($page->itemid) as $tag) : ?>
			<div class="product row">
			    <img class="col-sm-2 col-md-2 img-responsive" src="<?php echo $tag->product_image->height(300)->url; ?>" alt="">
			    <div class="col-sm-4 col-md-5 product-info">
			        <h4 class="cart-product-title">
						<a href="<?php echo $tag->url; ?>"><?php echo $tag->title; ?></a>
			        </h4>
			    </div>
			    <div class="col-sm-2 col-md-3 product-price">
			        <p class="cart-product-model"><?php echo $tag->itemid; ?></p>
			    </div>
			    <div class="col-sm-2 col-md-2 product-quantity">
			        <p class='text-right'><?php echo $tag->qtyinkit; ?></p>
			    </div>
			</div>
			<hr>
		<?php endforeach; ?>

		<div class="row">
		    <div class="col-sm-5 pull-right">
		        <form class="form-inline" action="<?php echo $pages->get('/cart/redir/')->url; ?>" method="post">
		            <input type="hidden" name="action" value="add-to-cart">
		            <input type="hidden" name="itemID" value="<?= $page->itemid; ?>">
		            <input type="hidden" name="page" value="<?= $page->url; ?>">
		            <div class="quantity-group">
		                <label for="quantity">Number of Kits:</label>&emsp;
		                <input class="form-control input-sm qty" type="text" name="qty" size="3">
		            </div>
		            <h3 class="price text-right">$<?php echo $page->price; ?></h3>
		            <button class="btn btn-info btn-block add_to_cart" type="submit" name="add_to_cart">Add to Cart</button>
		        </form>
		    </div>
		</div>
	</div>
<?php include('./_foot.php'); // include footer markup ?>
