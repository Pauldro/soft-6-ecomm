<?php

/**
 * Shared functions used by the beginner profile
 *
 * This file is included by the _init.php file, and is here just as an example.
 * You could place these functions in the _init.php file if you prefer, but keeping
 * them in this separate file is a better practice.
 *
 */

/**
 * Given a group of pages, render a simple <ul> navigation
 *
 * This is here to demonstrate an example of a simple shared function.
 * Usage is completely optional.
 *
 * @param PageArray $items
 *
 */
function renderNav(PageArray $items) {

	if(!$items->count()) return;

	echo "<ul class='nav' role='navigation'>";

	// cycle through all the items
	foreach($items as $item) {

		// render markup for each navigation item as an <li>
		if($item->id == wire('page')->id) {
			// if current item is the same as the page being viewed, add a "current" class to it
			echo "<li class='current' aria-current='true'>";
		} else {
			// otherwise just a regular list item
			echo "<li>";
		}

		// markup for the link
		echo "<a href='$item->url'>$item->title</a> ";

		// if the item has summary text, include that too
		if($item->summary) echo "<div class='summary'>$item->summary</div>";

		// close the list item
		echo "</li>";
	}

	echo "</ul>";
}

function navigationmenu(PageArray $items) {
	if(!$items->count()) return;
	echo "<ul class='nav navbar-nav' role='navigation'>";
	foreach ($items as $item) {
		if ($item->showinnavigation) {
			if ($item->hasChildren() && $item->id != wire('pages')->get('/')->id) {
				if($item->id == wire('page')->rootParent->id) {
					// if current item is the same as the page being viewed, add a "current" class to it
					echo "<li class='active dropdown' aria-current='true'>";
				} else {
					// otherwise just a regular list item
					echo "<li class='dropdown'>";
				}
				echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>" .
					 $item->title."<span class='caret'></span></a>";
				echo "<ul class='dropdown-menu'>";
				echo "<li><a href='".$item->url."'>".$item->title."</a></li>";
				echo '<li role="separator" class="divider"></li>';
				// echo '<li class="dropdown-header">Product Categories</li>';
				foreach ($item->children() as $itemchild) {
					echo "<li><a href='".$itemchild->url."'>".$itemchild->title."</a></li>";
				}
				echo "</ul>";
			} else {
				if($item->id == wire('page')->id) {
					// if current item is the same as the page being viewed, add a "current" class to it
					echo "<li class='active' aria-current='true'>";
				} else {
					// otherwise just a regular list item
					echo "<li>";
				}
				echo "<a href='$item->url'>$item->title</a> ";
			}


			echo "</li>";
		}

	}
	echo "</ul>";

}

/**
 * Given a group of pages render a tree of navigation
 *
 * @param Page|PageArray $items Page to start the navigation tree from or pages to render
 * @param int $maxDepth How many levels of navigation below current should it go?
 *
 */
function renderNavTree($items, $maxDepth = 3) {

	// if we've been given just one item, convert it to an array of items
	if($items instanceof Page) $items = array($items);

	// if there aren't any items to output, exit now
	if(!count($items)) return;

	// $out is where we store the markup we are creating in this function
	// start our <ul> markup
	echo "<ul class='nav nav-tree' role='navigation'>";

	// cycle through all the items
	foreach($items as $item) {

		// markup for the list item...
		// if current item is the same as the page being viewed, add a "current" class and
		// visually hidden text for screen readers to it
		if($item->id == wire('page')->id) {
			echo "<li class='current' aria-current='true'><span class='visually-hidden'>Current page: </span>";
		} else {
			echo "<li>";
		}

		// markup for the link
		echo "<a href='$item->url'>$item->title</a>";

		// if the item has children and we're allowed to output tree navigation (maxDepth)
		// then call this same function again for the item's children
		if($item->hasChildren() && $maxDepth) {
			renderNavTree($item->children, $maxDepth-1);
		}

		// close the list item
		echo "</li>";
	}

	// end our <ul> markup
	echo "</ul>";
}

/* =============================================================
	STRING FUNCTIONS
============================================================ */
	function shortentext($str, $length) {
		return substr($str, 0, strrpos(substr($str, 0, $length), '. '));
	}

	function addreadmore($str, $length, $link) {
		if (strlen($str) > $length) {
			return shortentext($str, $length);
			return shortentext($str, $length) . " <a href='".$link.">Read More</a>";
		} else {
			return str_pad($str, $length, ' ');
		}
	}
/* =============================================================
   DB FUNCTIONS
 ============================================================ */

 	function returnsqlquery($sql, $oldtonew, $havequotes) {
		$i = 0;
		foreach ($oldtonew as $old => $new) {
			if ($havequotes[$i]) {
				$sql = str_replace($old, "'".$new."'", $sql);
			} else {
				$sql = str_replace($old, $new, $sql);
			}
			$i++;
		}
		return $sql;
	}

	function returnlimitstatement($limit, $page) {
		if ($limit) {
			if ($page > 1 ) {$start_point = ($page * $limit) - $limit; } else { $start_point = 0; }
			return "LIMIT ".$start_point.",".$limit;
		} else {
			return "";
		}
	}
