<?php 
    $catresults = new CatSearchResults($page->fullURL, '#ajax-modal', '', true, $q, $section);
    $catresults->generate_filter($input);
    $catresults->set('ajaxdata', "data-focus='#cat-results' data-loadinto='#cat-results'");
    $selector = trim($catresults->generate_processwireselector());
    $matches = $pages->find("$selector, limit=$session->display");
?>

<!-- CATEGORIES -->
<?php $matches = $pages->find($selector.", template=category-page|family-page, limit=$session->display"); ?>
<?php if ($matches->count) : ?>
    <?php $ajaxdata = "data-focus='#categories-results' data-loadinto='#categories-results'"; ?>
    <?php $paginator = new Paginator($input->pageNum, $pages->find($selector.", template=family-page|category-page")->count, $page->fullURL->getUrl(), $page->name, $page->ajaxdata); ?>
    <div id="categories-results">
        <h3>Categories</h3>
        <hr>
        <?php foreach ($matches as $match) : ?>
            <h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4>
            <p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p>
        <?php endforeach; ?>
    </div>
    <?= $paginator; ?>
<?php endif; ?>
