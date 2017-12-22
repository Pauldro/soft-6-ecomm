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
		<?php $selector = "title|body~=$q, limit=50"; ?>

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
			<h5>Found <?= $matches->count; ?> results matching your query:</h5>
			<hr>
			
			<?php foreach ($matches as $match) : ?>
				<?php if ($match->template == 'blog-post') : ?>
					<?php $matchimage = $match->blog_image->url; ?>
					<div class='row'>
						<div class='col-md-12'>
							<h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
							<p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-4'>
							<img class='img-responsive' src='<?= $matchimage; ?>' >
						</div>
						<div class='col-md-8'>
							<h5><?= $match->blog_date; ?></h5>
							<p>Surrounding text <a href='<?= $match->url; ?>'><?= $q; ?></a> Surrounding text</p>
						</div>
					</div>
					</br>
					<hr>
				<?php endif; ?>
			<?php endforeach; ?>
					
			<?php foreach ($matches as $match) : ?>
				<?php if ($match->template != 'blog-post' && $match->template != 'product-page') : ?>
					<div class='row'>
						<div class='col-md-12'>
							<ul class='nav'>
								<li><h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4></li>
								<li><p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p></li>
								<li><p>Surrounding text <a href='<?= $match->url; ?>'><?= $q; ?></a> Surrounding text</p></li>
							</ul>
							<hr>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			
			<div class="row">
			</br>
				<?php foreach ($matches as $match) : ?>
					<?php if ($match->template == 'product-page') : ?>
						<?php $matchimage = $match->product_image->url; ?>
						<div class='col-md-3'>
							<img class='img-responsive' src='<?= $matchimage; ?>' >
							<h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
							<p>Model: <?= $match->itemid; ?></p>
							<a href='<?= $match->url; ?>' class='btn btn-info btn-block'>See more</a>
						</br>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			
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
