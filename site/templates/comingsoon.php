<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<title><?php echo strip_tags(html_entity_decode($page->get('title|pagetitle|headline|title'))); ?></title>
        <!--
        <link rel="shortcut icon" href="<?php echo $config->urls->files."images/ddplus.ico"; ?>">

        <link rel="icon" href="<?php //echo $config->urls->files; ?>images/park-icon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="<?php //echo $config->urls->files; ?>images/park-icon.png"> -->

		<meta name="description" content="<?php echo $page->summary; ?>" />
        <?php foreach($config->styles->unique() as $css) : ?>
        	<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" />
        <?php endforeach; ?>
	    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
        <script src="<?php echo $config->urls->templates.'scripts/libs/jquery.js'; ?>"></script>
		<!-- <script src="<?php echo $config->urls->templates.'scripts/libs/moment.js'; ?>"></script> -->
		<script>//moment().format();</script>
        <style media="screen">
            body { 
              background: url("<?php echo $page->images->url; ?>") no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }
            .blurred {
            	background-color: #fff;
				filter: blur(2px);
				height: 27%;
                width: 58%;
                position: absolute;
                left: 19%;
                Top: 6%;
            }
			.coming-soon {
				position: relative;
				left: 22%;
                Top: 8%;
				height: 21%;
                width: 55%;
			}
			.sidexside {
                display: inline-block;
                margin-right: 20px;
            }
            ul {padding: 0;}
        </style>
	</head>
    <body>
        <div class="blurred">
        </div>
		<div class="coming-soon">
			<h1><?= $site->company_name; ?> <?= $page->title; ?>!</h1>
            <h4><?= $page->body; ?></h4>
            <p><?= $page->body_2; ?></p>
            <ul>
                <li class="sidexside">
                    <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                </li>
                <li class="sidexside">
                    <a href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                </li>
                <li class="sidexside">
                    <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                </li>
            </ul>
		</div>
    </body>
</html> 
