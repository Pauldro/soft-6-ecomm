<?php 
    abstract class SearchResults {
		use ThrowErrorTrait;
		use MagicMethodTraits;
		
		/**
		 * Search string
		 * @var string
		 */
        protected $q;
		/**
		 * String for making Processwire query
		 * @var string
		 */
		protected $selector;
		/**
		 * ID of HTML element to focus on after ajax load
		 * @var string
		 */
        protected $focus;
		/**
		 * ID of HTML element to load from ajax into
		 * @var string
		 */
		protected $loadinto;
		/**
		 * String of html attributes used to load ajax
		 * ex. "data-focus='#product-results' data-loadinto='#product-results'"
		 * @var string
		 */
		protected $ajaxdata;
		/**
		 * ID of HTML modal to load into
		 * @var string
		 */
		protected $modal;
		/**
		 * Section of Search Results
		 * @var Processwire\Page
		 */
		protected $section;
		/**
		 * URL to load the results from
		 * @var Purl\Url
		 */
		protected $pageurl;
		/**
		 * Filter keys and the array of values that will be applied to the Search Results
		 * @var array
		 */
        protected $filters = false; // Will be instance of array
		/**
		 * Declaring which values are able to be filtered
		 * and information on filtering like are we going to use Processwire parent filtering
		 * @var array
		 */
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
        
		/**
		 * Class Constructor
		 * @param Purl\Url $pageurl  [description]
		 * @param string            $modal    [description]
		 * @param string            $loadinto [description]
		 * @param string            $ajax     [description]
		 * @param string            $q        [description]
		 * @param Processwire\Page  $section  Child of /search/
		 * @uses
		 */
        public function __construct(\Purl\Url $pageurl, $modal, $loadinto, $ajax, $q, $section) {
			$this->pageurl = new \Purl\Url($pageurl->getUrl());
			$this->pageurl->path = $section->url();
			$this->section = $section;
			$this->modal = $modal;
			$this->loadinto = $loadinto;
			$this->ajaxdata = $ajax;
			$this->set_searchvalue($q);
		}
        
		/**
		 * Sanitize search string, then creates default selector
		 * @param string $q search input
		 * @uses
		 */
		public function set_searchvalue($q) {
			$this->q = DplusWire::wire('sanitizer')->selectorValue($q);
			$this->set_defaultselector();
		}
		
		/**
		 * Creates the default Processwire filter string
		 * @uses
		 */
		public function set_defaultselector() {
			$this->selector = "title|body|headline|longdesc~=$this->q";
			//$this->selector .= (DplusWire::wire('user')->isLoggedin()) ? ", has_parent!=2" : '';
		}
		
		/**
		 * Assigns the value to $this->section
		 * @param ProcesswirePage $section [description]
		 * @uses
		 */
		public function set_section(Processwire\Page $section) {
			$this->section = $section;
		}
		
		/**
		 * Looks through the filters array, see if there's a value at index specified
		 * @param  string  $filtername filter key
		 * @param  int     $index      Which index of filter to grab
		 * @return string              grabs the assigned value for the filter if applicable
		 */
		public function get_filtervalue($filtername, $index = 0) {
			if (empty($this->filters)) return '';
			if (isset($this->filters[$filtername])) {
				return (isset($this->filters[$filtername][$index])) ? $this->filters[$filtername][$index] : '';
			}
			return '';
		}
		
		/**
		 * Checks if value is in filter or if that filter is that value
		 * @param  string $filtername filter key
		 * @param  mixed  $value      value to search for
		 * @return bool               if value is in the filter or filter equals that value
		 * @uses
		 */
		public function has_filtervalue($filtername, $value) {
			if (empty($this->filters)) return false;
			return (isset($this->filters[$filtername])) ? in_array($value, $this->filters[$filtername]) : false;
		}
        
		/**
		 * Takes the input object and creates the filters array
		 * Also defines default values if need be
		 * @param  ProcessWireWireInput $input [description]
		 * @return void                        [description]
		 * @uses
		 */
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
		
		/**
		 * Parses through the filter array 
		 * if the key is supposed be filtered through relationship to the results
		 * then we pull data in from filterable which will tell us what template to limit results to, and what are the names
		 * for the template to find
		 * @return string current selector string + generated selector
		 * @uses
		 */
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
		
		/**
		 * Creates the default selector string
		 * @param  string $q [description]
		 * @return string    selector
		 * @uses
		 */
		public static function generate_defaultselector($q) {
			return "title|body|headline|longdesc~=".DplusWire::wire('sanitizer')->selectorValue($q);
		}
    }
