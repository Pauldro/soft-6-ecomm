<?php 
	$itemexporter = new ItemCSVExport();
	$itemexporter->export_csv('template=product-page', $fields = false, 'spectrum.txt');
?>
