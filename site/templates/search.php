<?php

include("./_head.php"); ?>

<div class="container page" id='content'>

	<?php

	// search.php template file
	// See README.txt for more information. 

	// look for a GET variable named 'q' and sanitize it
	$q = $sanitizer->text($input->get->q); 

	echo "<h1>Search Results</h1><hr>";
	// did $q have anything in it?
	if($q) { 

		// Sanitize for placement within a selector string. This is important for any 
		// values that you plan to bundle in a selector string like we are doing here.
		$q = $sanitizer->selectorValue($q); 

		// Search the title and body fields for our query text.
		// Limit the results to 50 pages. 
		$selector = "title|body~=$q, limit=50"; 

		// If user has access to admin pages, lets exclude them from the search results.
		// Note that 2 is the ID of the admin page, so this excludes all results that have
		// that page as one of the parents/ancestors. This isn't necessary if the user 
		// doesn't have access to view admin pages. So it's not technically necessary to
		// have this here, but we thought it might be a good way to introduce has_parent.
		if($user->isLoggedin()) $selector .= ", has_parent!=2"; 

		// Find pages that match the selector
		$matches = $pages->find($selector); 
		
		// did we find any matches? ...
		if($matches->count) {
			// we found matches
			echo "<h5>Found $matches->count results matching your query:</h5>";
			
			// output navigation for them (see TIP below)
			echo "<ul class='nav'>";

			foreach($matches as $match) {
				echo "<li><h4><a href='$match->url'>$match->title</a></h4></li>";
				echo "<li><p class='small'><a href='$match->url' class='text-muted'>$match->url</a></p></li>";
				echo "<li><p>Surround text <a href='$match->url'>$match->title</a> Surrounding text</p></li>";
				
				if ($match->parent->parent->name == 'paints' ||
					$match->parent->name == 'stains' ||
					$match->parent->parent->name == 'paint-tools') {
					
					?>
					
					    <?php $matchimage = $match->product_image->url; ?>
						<!-- for some reason the image url wouldn't convert with the echo method -->
						<img height='150px' src="<?php echo $matchimage; ?>" >
				
					<?php
					echo "<li><p class='price'>$match->price</p></li>";
					echo "<hr>";
					
				} elseif ($match->parent->name == 'blog') {
					?>
					
					    <?php $matchimage = $match->blog_image->url; ?>
						<!-- for some reason the image url wouldn't convert with the echo method -->
						<img height='150px' src="<?php echo $matchimage; ?>" >
				
					<?php
					echo "<hr>";
					
				} else {
					echo "<hr>";
				}
			}
			
			echo "</ul>";
			
			// TIP: you could replace everything from the <ul class='nav'> above
			// all the way to here, with just this: renderNav($matches); 

		} else {
			// we didn't find any
			echo "<h3>Sorry, no results were found.</h3>";
		}

	} else {
		// no search terms provided
		echo "<h3>Please enter a search term in the search box (upper right corner)</h3>";
	}

	?>

</div><!-- end content -->

<?php include("./_foot.php"); ?>
