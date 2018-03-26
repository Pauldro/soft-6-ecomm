<?php
    trait CreateClassArrayTraits {
        public static function generate_classarray() {
            $class = get_called_class();
 			return $class::remove_nondbkeys(get_class_vars($class));
 		}
 		
 		public static function remove_nondbkeys($array) {
			unset($array['actionlineage']);
 			return $array;
 		}
 		
        public function _toArray() {
			return $this::remove_nondbkeys(get_object_vars($this));
 		}
    }
