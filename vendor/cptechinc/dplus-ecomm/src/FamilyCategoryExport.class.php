<?php
    class FamilyCategoryExport {
        public function export_csv() {
            $selectorstring = 'template=family-page';
            $this->file = wire('config')->documentstoragedirectory . 'catform.txt';
            
            $csvfields = array(
                'CAT-1' => '',
                'Cat 1 desc' => '',
                'Cat_1_Img' => '',
                'CAT-2' => '',
                'Cat 2 desc' => '',
                'Cat_2_Img' => '',
                'CAT-3' => '',
                'Cat 3 Desc' => '',
                'cat_3_img' => '',
                'CAT-4' => '',
                'Cat 4 Desc' => '',
                'cat_4_img' => '',
                'CAT-5' => '',
                'Cat 5 Desc' => '',
                'cat_5_img' => '',
                'Fam ID' => '',
                'Family Display Names' => '',
                'Family_Img' => '',
                'Table Y/N' => '',
                'Short Descriptio' => '',
                'Manufactur / Spec A' => '',
                'Spec B/sub desc' => '',
                'Spec C' => '',
                'Spec D' => '',
                'Spec E' => '',
                'Spec F' => '',
                'Spec G' => '',
                'Spec H' => ''
            );
            
            $this->data = array();
            $this->data[] = array_values($fields);
            
            $pages = wire('pages')->find($selectorstring);
            
            foreach ($pages as $page) {
                
                $data = $csvfields;
                $data['CAT-1'] = '';
                $data['Cat 1 desc'] = '';
                $data['Cat_1_Img'] = '';
                $data['CAT-2'] = '';
                $data['Cat 2 desc'] = '';
                $data['Cat_2_Img'] = '';
                $data['CAT-3'] = '';
                $data['Cat 3 Desc'] = '';
                $data['cat_3_img'] = '';
                $data['CAT-4'] = '';
                $data['Cat 4 Desc'] = '';
                $data['cat_4_img'] = '';
                $data['CAT-5'] = '';
                $data['Cat 5 Desc'] = '';
                $data['cat_5_img'] = '';
                $data['Fam ID'] = '';
                $data['Family Display Names'] = '';
                $data['Family_Img'] = '';
                $data['Table Y/N'] = '';
                $data['Short Descriptio'] = '';
                $data['Manufactur / Spec A'] = '';
                $data['Spec B/sub desc'] = '';
                $data['Spec C'] = '';
                $data['Spec D'] = '';
                $data['Spec E'] = '';
                $data['Spec F'] = '';
                $data['Spec G'] = '';
                $data['Spec H'] = '';
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
