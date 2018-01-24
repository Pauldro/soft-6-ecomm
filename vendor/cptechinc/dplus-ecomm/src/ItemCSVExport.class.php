<?php 
    class ItemCSVExport {
        use ThrowErrorTrait;
        
        protected $data = false;
        protected $file;
        
        public function __construct() {
        }
        
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            } else {
                $this->error("This property ($property) is not accessible");
                return false;
            }
        }
        
        public function get_pagefields(Page $page) {
            $fields = array();
            foreach ($page->fields as $field) {
                $fields[] = $field['name'];
            }
            return $fields;
        }
        
        public function export_csv($selectorstring = 'include=all', $fields = false, $filename = false) {
            $filename = $filename ? $filename : $filename = wire('input')->cookie->wire;
            $this->file = wire('config')->documentstoragedirectory . $filename;
            
            if ($fields instanceof Page) {
                $fields = $this->get_pagefields($fields);
            } elseif (!is_array($fields)) {
                $fieldnames = array();
                $fields = $this->get_pagefields(wire('pages')->get($selectorstring.', limit=1'));
            }
            
            $this->data = array();
            $this->data[] = array_values($fields);
            
            $pages = wire('pages')->find($selectorstring);
            
            foreach ($pages as $page) {
                $pagearray = array();
                foreach ($fields as $field) {
                    $pagearray[$field] = $page->$field;
                }
                $this->data[] = $pagearray;
            }
            
            //echo json_encode($this->data);
            //Open file pointer.
            $fp = fopen($this->file, 'w');
            //Loop through the associative array.
            foreach($this->data as $row){
                //Write the row to the CSV file.
                fputcsv($fp, $row);
            }
            
            //Finally, close the file pointer.
            
            fclose($fp);
            
            if (file_exists($this->file)) {
                header('Content-Description: File Transfer');
            	header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($this->file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($this->file));
                ob_clean();
                flush();
                readfile($this->file);
                exit;
            }

        }
        
        
    }
