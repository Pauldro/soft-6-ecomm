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

    $section = $page;
    include($config->paths->content."search/$section->name.php");
