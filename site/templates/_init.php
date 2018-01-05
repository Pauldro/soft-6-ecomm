<?php

/**
 * Initialization file for template files 
 * 
 * This file is automatically included as a result of $config->prependTemplateFile
 * option specified in your /site/config.php. 
 * 
 * You can initialize anything you want to here. In the case of this beginner profile,
 * we are using it just to include another file with shared functions.
 *
 */

	include_once("./_func.php"); // include our shared functions
	include_once("./_dbfunc.php"); // include our shared functions
	include_once("./_dplus.php");
	include_once($config->paths->vendor.'cptechinc/dplus-content-classes/vendor/autoload.php');
	include_once($config->paths->templates.'classes/Family.class.php');
	include_once($config->paths->templates.'classes/Product.class.php');
	$session->sessionName = session_name();

	$page->fullURL = new \Purl\Url($page->httpUrl);
	$page->fullURL->path = '';
	if (!empty($config->filename) && $config->filename != '/') {
		$page->fullURL->join($config->filename);
	}
	
	$page->bootstrap = new Contento();
	$page->stringerbell = new StringerBell();

	$config->styles->append($config->urls->templates.'styles/libs/bootstrap.min.css');
	$config->styles->append($config->urls->templates.'styles/styles.css');

	$config->scripts->append($config->urls->templates.'scripts/libs/bootstrap.min.js');
	$config->scripts->append($config->urls->templates.'scripts/scripts.js');

	$site = $pages->get('/config/');
	$user->loggedin = is_loggedin(session_id(), false);
