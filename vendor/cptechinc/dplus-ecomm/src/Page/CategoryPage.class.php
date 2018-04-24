<?php 

    class CategoryPage extends \ProcessWire\Page {
        use CreateFromObjectArrayTraits;
		use CreateClassArrayTraits;
        use CreatePageTraits;
        
        function get_categorylinks() {
            return $this->children();
        }
    }
