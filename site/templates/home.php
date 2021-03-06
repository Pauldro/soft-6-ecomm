<?php include('./_head.php'); ?>
	<div class="jumbotron page-banner" style="background: url('<?= $page->pagebanner->height(900)->url; ?>'); background-size: cover;">
		<!-- <div class="container tsp-background">
			<h1 class="white-text"><?php echo $page->get('pagetitle|headline|title') ; ?></h1>
		</div> -->
	</div>
	<div class="container page">
		<?php if ($user->logged_in) : ?>
			<h2>Welcome, <?php echo $user->username; ?>!</h2>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-8">
				<img class="img-responsive" src="<?php echo $page->main_image->url; ?>" alt="">
			</div>
			<div class="col-md-4">
				<h1><?php echo $page->headline; ?></h1>
				<p><?php echo $page->body; ?></p>
			</div>
			<div class="col-md-12">
				<h2><?php echo $page->headline_2; ?></h2>
				<p><?php echo $page->body_2; ?></p>
			</div>
		</div>
		</br>
		<?php include $config->paths->content."common/featured-products.php"; ?>
		</br>
		<?php include $config->paths->content."common/newsletter.php"; ?>
		</br>
		<h2>Upcoming Events</h2>
	    <div class="row">
	        <?php $events = $pages->find("template=event, limit=4, sort=startdate") ?>
	        <?php foreach ($events as $event) : ?>
	            <div class="col-md-3">
	                <a href="<?php echo $event->url; ?>">
	                    <img class="img-responsive" src="<?php echo $event->images->url; ?>" alt="">
	                </a>
	                <h4><a href="<?php echo $event->url; ?>"><?php echo $event->title; ?></a></h4>
	                <h5><?php echo $event->startdate; ?></h5>
	                <p><?php echo $event->address; ?></p>
	            </div>
	        <?php endforeach; ?>
	    </div>
	</div>

<?php include('./_foot.php'); // include footer markup ?>
