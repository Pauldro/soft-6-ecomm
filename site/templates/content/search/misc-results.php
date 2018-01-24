<?php $httpurl = new \Purl\Url($page->fullURL->getUrl()); ?>
<?php $httpurl->path = $section->url; ?>

<!-- MISCELLANEOUS -->
<?php $matches = $pages->find($selector.", template=about|contact|basic-page, limit=$session->display"); ?>
<?php if ($matches->count) : ?>
    <?php $ajaxdata = "data-focus='#misc-results' data-loadinto='#misc-results'"; ?>
    <?php $paginator = new Paginator($input->pageNum, $pages->find($selector.", template=product-page|kit-page")->count, $page->fullURL->getUrl(), $page->name, $page->ajaxdata); ?>
    <div id="misc-results">
        <h3>Miscellaneous</h3>
        <hr>
        <?php foreach ($matches as $match) : ?>
            <div class='row'>
                <div class='col-md-12'>
                    <ul class='nav'>
                        <?php if ($match->template != 'basic-page' || $match->template == 'contact') : ?>
                            <li><h4><a href='<?= $match->url; ?>'><?= $match->title; ?></a></h4></li>
                            <li><p class='small'><a href='<?= $match->url; ?>' class='text-muted'><?= $match->url; ?></a></p></li>
                        <?php else : ?>
                            <li><h4><a href='<?= $match->parent->url; ?>'><?= $match->title; ?></a></h4></li>
                            <li><p class='small'><a href='<?= $match->parent->url; ?>' class='text-muted'><?= $match->parent->url; ?></a></p></li>
                        <?php endif; ?>
                        
                        <?php $express = "/(\w+\')? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?$q ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\w+)? ?(\'\w+)?/i"; ?>
                        <?php if ($match->template != 'login-page' && $match->template != 'contact') : ?>
                            <?php $para = $match->body; ?>
                            <?php preg_match($express, $para, $result); ?>
                            <?php preg_replace("/$q/","<strong>$q</strong>", $result[0]); ?>
                            <?php $result[0] .= "..."; ?>
                            <?php echo $result[0]; ?>
                        <?php elseif ($match->template == 'contact') : ?>
                            <?php $para = $match->headline; ?>
                            <?php preg_match($express, $para, $result); ?>
                            <?php preg_replace("/$q/","<strong>$q</strong>", $result[0]); ?>
                            <?php $result[0] .= "..."; ?>
                            <?php echo $result[0]; ?>
                        <?php endif; ?>
                    </ul>
                    <hr>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $paginator; ?>
<?php endif; ?>
