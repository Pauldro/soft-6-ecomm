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
	include_once($config->paths->vendor.'cptechinc/dplus-helper-classes/vendor/autoload.php');
	include_once($config->paths->vendor.'cptechinc/dplus-content-classes/vendor/autoload.php');
	include_once($config->paths->vendor.'cptechinc/dplus-ecomm/vendor/autoload.php');
	include_once($config->paths->vendor.'cptechinc/dplus-ecomm/src/Traits/CreatePageTraits.trait.php');
	include_once($config->paths->vendor.'cptechinc/dplus-ecomm/src/Page/ProductPage.class.php');
	include_once($config->paths->vendor.'cptechinc/dplus-ecomm/src/Page/FamilyPage.class.php');
	include_once($config->paths->vendor.'cptechinc/dplus-ecomm/src/Page/CategoryPage.class.php');
	
	
	$session->sessionName = session_name();
	
	$page->filename = $_SERVER['REQUEST_URI'];
	$page->script = str_replace($config->urls->root, '', $_SERVER['SCRIPT_NAME']);
	$page->fullURL = new \Purl\Url($page->httpUrl);
	$page->fullURL->path = '';
	
	if (!empty($page->filename) && $page->filename != '/') {
		$page->fullURL->join($page->filename);
	}
	
	$page->bootstrap = new Contento();
	$page->stringerbell = new StringerBell();
	Paginator::setup_displayonpage();

	$config->styles->append($config->urls->templates.'styles/libs/bootstrap.min.css');
	$config->styles->append($config->urls->templates.'styles/styles.css');

	$config->scripts->append($config->urls->templates.'scripts/libs/bootstrap.min.js');
	$config->scripts->append($config->urls->templates.'scripts/libs/uri.js');
	$config->scripts->append($config->urls->templates.'scripts/scripts.js');

	$site = $pages->get('/config/');
	$user->loggedin = is_loggedin(session_id(), false);
	
