<?php 
	class EventSearchResults extends SearchResults {
		
		protected $filterable = false;
		
		public function set_defaultselector() {
			parent::set_defaultselector();
			$this->selector .= ", template=event|events";
		}
		
	}
