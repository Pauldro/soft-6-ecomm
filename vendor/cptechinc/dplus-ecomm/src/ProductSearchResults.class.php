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
		
		public function set_defaultselector() {
			parent::set_defaultselector();
			
			if (DplusWire::wire('config')->sitetype == 'paints') {
				$categories = array('paints-stains', 'paint-tools');
				$categorypages = DplusWire::wire('pages')->find("template=category-page,name=".implode('|', $categories));
				foreach ($category as $category) {
					$this->selector .= ", parent!=$category->id";
				}
			}
			$this->selector .= ", template=product-page|kit-page|family-page";
		}
		
	}
