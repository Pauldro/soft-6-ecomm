<?php 
    $eventresults = new EventSearchResults($page->fullURL, '#ajax-modal', '', true, $q, $section);
    $eventresults->generate_filter($input);
    $eventresults->set('ajaxdata', "data-focus='#event-results' data-loadinto='#event-results'");
    $selector = trim($eventresults->generate_processwireselector());
    $matches = $pages->find("$selector, limit=$session->display");
?>

<!-- EVENTS -->
<?php $matches = $pages->find($selector.", template=event, limit=$session->display"); ?>
<?php if ($matches->count) : ?>
    <?php $ajaxdata = "data-focus='#events-results' data-loadinto='#events-results'"; ?>
    <?php $paginator = new Paginator($input->pageNum, $pages->find($selector.", template=event|events")->count, $page->fullURL->getUrl(), $page->name, $page->ajaxdata); ?>
    <div id="events-results">
        <h3>Events</h3>
        <hr>
        <?php foreach ($matches as $match) : ?>
            <div class='row'>
                <div class='col-md-12'>
                    <h3><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h3>
                    <p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-2'>
                    <a href='<?= $match->url; ?>'>
                        <img class='img-responsive' src='<?= $match->images->url; ?>' >
                    </a>
                </div>
                <div class='col-md-10'>
                    <h4><?= $match->startdate; ?></h4>
                    <?php $chars = 300; ?>
                    <?php $match->body = substr($match->body, 0, $chars); ?>
                    <?php $match->body = substr($match->body, 0, strrpos($match->body,' ')); ?>
                    <?php $match->body = $match->body . " ..."; ?>
                    <p><?php echo $match->body; ?></p>
                </div>
            </div>
            </br>
            <hr>
        <?php endforeach; ?>
    </div>
    <?= $paginator; ?>
<?php endif; ?>
