<?php 
	/**
	 * Class for dealing with \ProcessWire\Page objects that have the template product-page
	 */
    class KitPage extends \ProcessWire\Page {
        use CreateFromObjectArrayTraits;
		use CreateClassArrayTraits;
        use CreatePageTraits;
		
		function get_kitcomponents($tag) {
            $tags = DplusWire::wire('pages')->find("kit_tag=$tag");
            return $tags;
        }
    }
