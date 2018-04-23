<?php 

    trait CreatePageTraits {
        
        public function generate_breadcrumbs() {
            return $this->parents('template!=home');
		}
        
        public function get_relatedproducts($limit = 4) {
			return $this->siblings("limit=$limit", false);
		}
    }
