<?php include("./_head.php"); ?>

<div class="container page" id='content'>

	<!-- search.php template file
	See README.txt for more information. 

	look for a GET variable named 'q' and sanitize it  -->
	<?php $q = $sanitizer->text($input->get->q); ?>
	
	<h1>Search Results</h1>
	<!-- did $q have anything in it? -->
	<?php if ($q) : ?> 

		<!-- Sanitize for placement within a selector string. This is important for any 
		values that you plan to bundle in a selector string like we are doing here. -->
		<?php $q = $sanitizer->selectorValue($q); ?>

		<!-- Search the title and body fields for our query text.
		Limit the results to 50 pages.  -->
		<?php $selector = "title|body|headline|longdesc~=$q, limit=50"; ?>

		<!-- If user has access to admin pages, lets exclude them from the search results.
		Note that 2 is the ID of the admin page, so this excludes all results that have
		that page as one of the parents/ancestors. This isn't necessary if the user 
		doesn't have access to view admin pages. So it's not technically necessary to
		have this here, but we thought it might be a good way to introduce has_parent. -->
		<?php if ($user->isLoggedin()) $selector .= ", has_parent!=2"; ?>

		<!-- Find pages that match the selector -->
		<?php $matches = $pages->find($selector); ?>
		
		<!-- did we find any matches? ... -->
		<?php if ($matches->count) : ?>
			<!-- we found matches -->
			<h5>Found <?= $matches->count; ?> results matching "<?php echo $q; ?>":</h5>
			<hr>
			
			<!-- PRODUCTS -->
			<div class="row">
			<?php $count = 0; ?>
			<?php foreach ($matches as $match) : ?>
				<?php if ($match->template == 'product-page') : ?>
					<?php $count++; ?>
					<?php if ($count == 1) : ?>
						<div class="col-md-12">
							<h3>Products</h3>
							<hr>
						</div>
					<?php endif; ?>
					<?php $matchimage = $match->product_image->url; ?>
					<div class='col-md-3'>
						<a href='<?= $match->url; ?>'>
							<img class='img-responsive' src='<?= $matchimage; ?>' >
						</a>
						<h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
						<p>Model: <?= $match->itemid; ?></p>
						<a href='<?= $match->url; ?>' class='btn btn-info btn-block'>See more</a>
					</br>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			</div>
			
			<!-- BLOG -->
			<?php $count = 0; ?>
			<?php foreach ($matches as $match) : ?>
				<?php if ($match->template == 'blog-post') : ?>
					<?php $count++; ?>
					<?php if ($count == 1) : ?>
						<h3>Blog</h3>
						<hr>
					<?php endif; ?>
					<?php $matchimage = $match->blog_image->url; ?>
					<div class='row'>
						<div class='col-md-12'>
							<h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
							<p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-4'>
							<a href='<?= $match->url; ?>'>
								<img class='img-responsive' src='<?= $matchimage; ?>' >
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
				<?php endif; ?>
			<?php endforeach; ?>
			
			<!-- CATEGORIES -->
			<?php $count = 0; ?>
			<?php foreach ($matches as $match) : ?>
				<?php if ($match->template == 'all-products-page' || $match->template == 'category-page' || $match->template == 'family-page') : ?>
					<?php $count++; ?>
					<?php if ($count == 1) : ?>
						<h3>Categories</h3>
						<hr>
					<?php endif; ?>
					<div class='row'>
						<div class='col-md-12'>
							<ul class='nav'>	
								<li><h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4></li>
								<li><p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p></li>
							</ul>
							<hr>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
					
			<!-- MISCELLANEOUS -->
			<?php $count = 0; ?>
			<?php foreach ($matches as $match) : ?>
				<?php if ($match->template != 'blog-post' && $match->template != 'product-page' && $match->template != 'category-page' && $match->template != 'family-page') : ?>
					<?php $count++; ?>
					<?php if ($count == 1) : ?>
						<h3>Miscellaneous</h3>
						<hr>
					<?php endif; ?>
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
								<?php elseif ($match->template != 'login-page' && $match->template != 'contact') : ?>
									<?php $para = $match->longdesc; ?>
									<?php preg_match($express, $para, $result); ?>
									<?php preg_replace("/$q/","<strong>$q</strong>", $result[0]); ?>
									<?php $result[0] .= "..."; ?>
									<?php echo $result[0]; ?>
								<?php elseif ($match->template != 'login-page' && $match->template == 'contact') : ?>
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
				<?php endif; ?>
			<?php endforeach; ?>
			
			<!-- TIP: you could replace everything from the <ul class='nav'> above
			all the way to here, with just this: renderNav($matches);  -->

		<?php else : ?>
			<!-- we didn't find any -->
			<h3>Sorry, no results were found.</h3>
		<?php endif; ?>

	<?php else : ?>
		<!-- no search terms provided -->
		<h3>Please enter a search term in the search box (upper right corner)</h3>
	<?php endif; ?>

</div><!-- end content -->

<?php include("./_foot.php"); ?>
