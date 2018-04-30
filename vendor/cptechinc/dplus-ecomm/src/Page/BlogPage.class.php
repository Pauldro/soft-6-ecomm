<?php 
	/**
	 * Class for dealing with \ProcessWire\Page objects that have the template product-page
	 */
    class BlogPage extends \ProcessWire\Page {
        use CreateFromObjectArrayTraits;
		use CreateClassArrayTraits;
        use CreatePageTraits;
		
		function get_blogposts($limit) {
            return $this->children("limit=$limit");
        }
    }
