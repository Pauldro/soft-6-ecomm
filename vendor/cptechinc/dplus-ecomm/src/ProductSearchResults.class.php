<?php 
	class ProductSearchResults extends SearchResults {
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
		public function __construct(\Purl\Url $pageurl, $modal, $loadinto, $ajax, $q, $section = false) {
			parent::__construct($pageurl, $modal, $loadinto, $ajax, $q);
			$this->section = $section;
			$this->pageurl->path = $section->url;
		}
		
		public function set_defaultselector() {
			parent::set_defaultselector();
			$this->selector .= ", template=product-page|kit-page";
		}
		
	}
