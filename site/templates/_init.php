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
	include_once($config->paths->templates.'classes/Family.class.php');
	include_once($config->paths->templates.'classes/Product.class.php');
	$session->sessionName = session_name();

	//$page->querystring = $querystring = "?".return_querystring($config->filename);
	//$page->PageURL = $page->httpUrl.$querystring;

	$config->styles->append($config->urls->templates.'styles/libs/bootstrap.min.css');
	$config->styles->append($config->urls->templates.'styles/styles.css');

	/*
	$config->styles->append('https://fonts.googleapis.com/icon?family=Material+Icons');
	$config->styles->append($config->urls->templates.'styles/libraries.css');
	
	$config->styles->append($config->urls->templates.'styles/libs/fuelux.css');*/


	$config->scripts->append($config->urls->templates.'scripts/libs/bootstrap.min.js');
	$config->scripts->append($config->urls->templates.'scripts/scripts.js');
	/*$config->scripts->append($config->urls->templates.'scripts/js-config.js');
	$config->scripts->append($config->urls->templates.'scripts/libraries.js');
	$config->scripts->append($config->urls->templates.'scripts/libs/key-listener.js');
	$config->scripts->append($config->urls->templates.'scripts/classes.js');
	
	$config->scripts->append($config->urls->templates.'scripts/fuelux.js');*/

	$site = $pages->get('/config/');
	$user->loggedin = is_validlogin(session_id());
