<?php 
	$q = $input->get->text('q');
	if ($q) {
		// Sanitize for placement within a selector string. This is important for any 
		// values that you plan to bundle in a selector string like we are doing here.
		$q = $sanitizer->selectorValue($q);
		// Search the title and body fields for our query text.
		// Limit the results to 50 pages.
		$selector = "title|body|headline|longdesc~=$q";
		// If user has access to admin pages, lets exclude them from the search results.
		// Note that 2 is the ID of the admin page, so this excludes all results that have
		// that page as one of the parents/ancestors. This isn't necessary if the user 
		// doesn't have access to view admin pages. So it's not technically necessary to
		// have this here, but we thought it might be a good way to introduce has_parent.
		if ($user->isLoggedin()) $selector .= ", has_parent!=2";
	}
?>
<?php include("./_head.php"); ?>

<div class="container page" id='content'>
	
	<h1>Search Results</h1>
	<!-- did $q have anything in it? -->
	<?php if ($q) : ?> 
		<!-- Find pages that match the selector -->
		<?php $matches = $pages->find($selector); ?>
		
		<!-- did we find any matches? ... -->
		<?php if ($matches->count) : ?>
			<!-- we found matches -->
			<h5>Found <?= $matches->count; ?> results matching "<?php echo $q; ?>":</h5>
			<hr>
			
			<?php $paginator = new Paginator($input->pageNum, $matches->count, $page->fullURL->getUrl(), $page->name); ?>
			
			
			<!-- PRODUCTS -->
			<?php $matches = $pages->find($selector.', template=product-page|kit-page'); ?>
			<?php if ($matches->count) : ?>
				<?php $ajaxdata = "data-focus='#product-results' data-loadinto='#product-results'"; ?>
				<?php $paginator = new Paginator($input->pageNum, $matches->count, $page->fullURL->getUrl().' #product-results', $page->name, $ajaxdata); ?>
				<?= $paginator->generate_showonpage(); ?>
				<div id="product-results">
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
			<?php endif; ?>
			
			<!-- BLOG -->
			<?php $matches = $pages->find($selector.', template=blog-post'); ?>
			<?php if ($matches->count) : ?>
				<?php $paginator = new Paginator($input->pageNum, $matches->count, $page->fullURL->getUrl(), $page->name); ?>
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
				<?= $paginator; ?>
			<?php endif; ?>
			
			<!-- EVENTS -->
			<?php $matches = $pages->find($selector.', template=event'); ?>
			<?php if ($matches->count) : ?>
				<?php $paginator = new Paginator($input->pageNum, $matches->count, $page->fullURL->getUrl(), $page->name); ?>
				<h3>Events</h3>
				<hr>
				<?php foreach ($matches as $match) : ?>
					<div class='row'>
						<div class='col-md-12'>
							<h3><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h3>
							<p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-2'>
							<a href='<?= $match->url; ?>'>
								<img class='img-responsive' src='<?= $match->images->url; ?>' >
							</a>
						</div>
						<div class='col-md-10'>
							<h4><?= $match->startdate; ?></h4>
							<?php $chars = 300; ?>
		                    <?php $match->body = substr($match->body, 0, $chars); ?>
		                    <?php $match->body = substr($match->body, 0, strrpos($match->body,' ')); ?>
		                    <?php $match->body = $match->body . " ..."; ?>
		                    <p><?php echo $match->body; ?></p>
						</div>
					</div>
					</br>
					<hr>
				<?php endforeach; ?>
				<?= $paginator; ?>
			<?php endif; ?>
			
			<!-- CATEGORIES -->
			<?php $matches = $pages->find($selector.', template=category-page|family-page'); ?>
			<?php if ($matches->count) : ?>
				<?php $paginator = new Paginator($input->pageNum, $matches->count, $page->fullURL->getUrl(), $page->name); ?>
				<h3>Categories</h3>
				<hr>
				<?php foreach ($matches as $match) : ?>
					<h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
					<p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p>
				<?php endforeach; ?>
				<?= $paginator; ?>
			<?php endif; ?>
			
			<!-- MISCELLANEOUS -->
			<?php $matches = $pages->find($selector.', template=about|contact|basic-page'); ?>
			<?php if ($matches->count) : ?>
				<h3>Miscellaneous</h3>
				<hr>
				<?php foreach ($matches as $match) : ?>
					<div class='row'>
						<div class='col-md-12'>
							<ul class='nav'>
								<?php if ($match->template != 'basic-page' || $match->template == 'contact') : ?>
									<li><h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4></li>
									<li><p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p></li>
								<?php else : ?>
									<li><h4><a href='<?= $match->parent->url; ?>'><?= $match->title; ?></a></h4></li>
									<li><p class='small'><a href='<?= $match->parent->url; ?>' class='text-muted'><?= $match->parent->url; ?></a></p></li>
								<?php endif; ?>
								
								<?php $express = "/(\w+\')? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?$q ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\'\w+)?/i"; ?>
								<?php if ($match->template != 'login-page' && $match->template != 'contact') : ?>
									<?php $para = $match->body; ?>
									<?php preg_match($express, $para, $result); ?>
									<?php preg_replace("/$q/","<strong>$q</strong>", $result[0]); ?>
									<?php $result[0] .= "..."; ?>
									<?php echo $result[0]; ?>
								<?php elseif ($match->template == 'contact') : ?>
									<?php $para = $match->headline; ?>
									<?php preg_match($express, $para, $result); ?>
									<?php preg_replace("/$q/","<strong>$q</strong>", $result[0]); ?>
									<?php $result[0] .= "..."; ?>
									<?php echo $result[0]; ?>
								<?php endif; ?>
							</ul>
							<hr>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

		<?php endif; ?>

	<?php else : ?>
		<!-- no search terms provided -->
		<h3>Please enter a search term in the search box (upper right corner)</h3>
	<?php endif; ?>

</div><!-- end content -->

<?php include("./_foot.php"); ?>
