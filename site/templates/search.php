<?php
	$sections = $pages->get('/search/, include=all')->children("template=results");
	
	$q = $input->get->text('q');
?>
<?php include("./_head.php"); ?>

<div class="container page" id='content'>
	
	<h1>Search Results</h1>
	<!-- did $q have anything in it? -->
	<?php if ($q) : ?> 
		<!-- Find pages that match the selector -->
		<?php $matches = $pages->find(SearchResults::generate_defaultselector($q).", template!=comingsoon"); ?>
		
		<!-- did we find any matches? ... -->
		<?php if ($matches->count) : ?>
			<!-- we found matches -->
			<h5>Found <?= $matches->count; ?> results matching "<?php echo $q; ?>":</h5>
			<hr>
			
			<?php $paginator = new Paginator($input->pageNum, $pages->count, $page->fullURL->getUrl(), $page->name, $page->ajaxdata); ?>
			<?= $paginator->generate_showonpage(); ?>
			
			<?php foreach ($sections as $section) : ?>
 				<?php include($config->paths->content."search/$section->name.php"); ?>
			<?php endforeach; ?>
			
		<?php endif; ?>
		
	<?php else : ?>
		<!-- no search terms provided -->
		<h3>Please enter a search term in the search box (upper right corner)</h3>
	<?php endif; ?>

</div><!-- end content -->

<?php include("./_foot.php"); ?>
