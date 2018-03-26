<?php 
    abstract class SearchResults {
		use ThrowErrorTrait;
		use MagicMethodTraits;
		
        protected $q;
		protected $selector;
        protected $focus;
		protected $loadinto;
		protected $ajaxdata;
		protected $modal;
		protected $section;
		protected $pageurl;
        protected $filters = false; // Will be instance of array
        protected $filterable = array(
			'color' => array(
				'processwire' => true,
				'relationship' => 'parent',
				'querytype' => 'in',
				'datatype' => 'char',
				'label' => 'Colors',
				'template' => 'family-page'
			),
            'price' => array(
				'processwire' => false,
				'relationship' => false,
				'querytype' => 'between',
				'datatype' => 'char',
				'label' => 'Price'
			)
		);
        
        public function __construct(\Purl\Url $pageurl, $modal, $loadinto, $ajax, $q, $section) {
			$this->pageurl = new \Purl\Url($pageurl->getUrl());
			$this->pageurl->path = $section->url();
			$this->modal = $modal;
			$this->loadinto = $loadinto;
			$this->ajaxdata = $ajax;
			$this->set_searchvalue($q);
		}
        
		public function set_searchvalue($q) {
			$this->q = DplusWire::wire('sanitizer')->selectorValue($q);
			$this->set_defaultselector();
		}
		
		public function set_defaultselector() {
			$this->selector = "title|body|headline|longdesc~=$this->q";
			//$this->selector .= (DplusWire::wire('user')->isLoggedin()) ? ", has_parent!=2" : '';
		}
		
		public function set_section(Processwire\Page $section) {
			$this->section = $section;
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
        
        public function generate_filter(ProcessWire\WireInput $input) {
			$stringerbell = new StringerBell();
            
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
            
            if (isset($this->filters['price'])) {
				if (!strlen($this->filters['price'][0])) {
					$this->filters['price'][0] = '0.00';
				}
				
				for ($i = 0; $i < (sizeof($this->filters['price']) + 1); $i++) {
					if (isset($this->filters['price'][$i])) {
						if (strlen($this->filters['price'][$i])) {
							$this->filters['price'][$i] = number_format($this->filters['price'][$i], 2, '.', '');
						}
					}
				}
			}
		}
		
		public function generate_processwireselector() {
			$selector = array();
			$string = '';
			if (!empty($this->filters)) {
				foreach ($this->filters as $filter => $values) {
					if ($this->filterable[$filter]['processwire']) {
						switch ($this->filterable[$filter]['relationship']) {
							case 'parent':
								$template = $this->filterable[$filter]['template'];
								$parents = implode('|', $values);
								$selector[] = "parent=" . implode('|', DplusWire::wire('pages')->findIDS("template=$template,name=$parents"));
								break;
						}
					}
				}
				$string = (!empty($selector)) ? ', '.implode(', ', $selector) : '';
			}
			return $this->selector . $string;
		}
		
		public static function generate_defaultselector($q) {
			return "title|body|headline|longdesc~=".DplusWire::wire('sanitizer')->selectorValue($q);
		}
    }
