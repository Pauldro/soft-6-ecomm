<?php 

    class FamilyPage extends \ProcessWire\Page {
        use CreateFromObjectArrayTraits;
		use CreateClassArrayTraits;
        use CreatePageTraits;
        
        function get_familylinks($limit) {
            return $this->children("limit=$limit");
        }
    }
