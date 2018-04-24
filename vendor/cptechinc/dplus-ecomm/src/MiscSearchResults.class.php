<?php 
	class MiscSearchResults extends SearchResults {
		
		protected $filterable = false;
		
		public function set_defaultselector() {
			parent::set_defaultselector();
			$this->selector .= ", template=about|contact|basic-page|home";
		}
		
	}
