<?php

include("./_head.php"); ?>

<div class="container page" id='content'>

	<?php
	
	// --------------------- example regex ------------------
	
	// function find_words($haystack, $needle) {
	//     $regex = '%\w+\s\w+\s' . preg_quote($needle) . '\s\w+\s\w+%';
    // 
	//     if (preg_match($regex, $haystack, $matches)) {
	//         return $matches[0];
	//     } else {
	//         return false;
	//     }
	// }
    // 
	// $s = 'John Brown: Lives in New York, married, have 3 sons and love playing football';
	// $search = 'sons';
	// var_dump(find_words($s, $search));
	
	// ------------------- end example --------------------

	// search.php template file
	// See README.txt for more information. 

	// look for a GET variable named 'q' and sanitize it
	$q = $sanitizer->text($input->get->q); 
	
	echo "<h1>Search Results</h1>";
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
			echo "<hr>";
			
			foreach ($matches as $match) {
				
				if ($match->template == 'product-page') {
					$matchimage = $match->product_image->url;
						echo "<div class='col-md-3'>";
							echo "<img class='img-responsive' src='$matchimage' >";
							echo "<h4><a href='$match->url'>$match->title</a></h4>";
							echo "<p>Model: $match->itemid</p>";
							echo "<a href='$match->url' class='btn btn-info btn-block'>See more</a>";
							echo "</br>";
							echo "</br>";
						echo "</div>";
					
				} elseif ($match->template == 'blog-post') {
					$matchimage = $match->blog_image->url;
					echo "<div class='row'>";
						echo "<div class='col-md-12'>";
							echo "<h4><a href='$match->url'>$match->title</a></h4>";
							echo "<p class='small'><a href='$match->url' class='text-muted'>$match->url</a></p>";
						echo "</div>";
					echo "</div>";
					
					echo "<div class='row'>";
						echo "<div class='col-md-4'>";
							echo "<img class='img-responsive' src='$matchimage' >";
						echo "</div>";
						echo "<div class='col-md-8'>";
							echo "<p>Surrounding text <a href='$match->url'>$q</a> Surrounding text</p>";
						echo "</div>";
					echo "</div>";
					echo "</br>";
					echo "<hr>";
					
				} else {
					echo "<div class='row'>";
						echo "<div class='col-md-12'>";
							echo "<ul class='nav'>";
								echo "<li><h4><a href='$match->url'>$match->title</a></h4></li>";
								echo "<li><p class='small'><a href='$match->url' class='text-muted'>$match->url</a></p></li>";
								echo "<li><p>Surrounding text <a href='$match->url'>$q</a> Surrounding text</p></li>";
							echo "</ul>";
						echo "</div>";
					echo "</div>";
					echo "<hr>";
					
				}
				
			}
			
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
