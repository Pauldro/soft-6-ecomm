<?php 
	class CatSearchResults extends SearchResults {
		
		protected $filterable = false;
		
		public function set_defaultselector() {
			parent::set_defaultselector();
			$this->selector .= ", template=category-page|family-page";
		}
		
	}
