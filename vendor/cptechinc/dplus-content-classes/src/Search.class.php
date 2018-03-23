<?php 
    
    class Search {
        use ProcessWire\Wire;
        
        public $focus;
		public $loadinto;
		public $ajaxdata;
        public $filters;
        public $filters = false; // Will be instance of array
		public $filterable;
        
        public function __construct($sessionID, \Purl\Url $pageurl, $modal, $loadinto, $ajax) {
			$this->pageurl = $this->setup_pageurl($pageurl);
		}
        
        public function generate_filter(ProcessWire\WireInput $input) {
			if (!$input->get->filter) {
				$this->filters = false;
				return;
			} else {
				$this->filters = array();
				foreach ($this->filterable as $filter => $type) {
					if (!empty($input->get->$filter)) {
						if (!is_array($input->get->$filter)) {
							$value = $input->get->text($filter);
							$this->filters[$filter] = explode('|', $value);
						} else {
							$this->filters[$filter] = $input->get->$filter;
						}
					} elseif (is_array($input->get->$filter)) {
						if (strlen($input->get->$filter[0])) {
							$this->filters[$filter] = $input->get->$filter;
						}
					}
				}
			}
		}
		
		public function get_filtervalue($filtername, $index = 0) {
			if (empty($this->filters)) return '';
			if (isset($this->filters[$filtername])) {
				return (isset($this->filters[$filtername][$index])) ? $this->filters[$filtername][$index] : '';
			}
			return '';
		}
		
		public function has_filtervalue($filtername, $value) {
			if (empty($this->filters)) return false;
			return (isset($this->filters[$filtername])) ? in_array($value, $this->filters[$filtername]) : false;
		}
        
    }
