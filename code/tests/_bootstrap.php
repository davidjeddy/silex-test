<?php
/**
* @author Eugene Terentev <eugene@terentev.net>
*/
// Composer
require_once( dirname(__DIR__) . '/vendor/autoload.php');

// Set environment
defined('ENV') or define('ENV', 'tst');

// Environment
$dotenv = new \Dotenv\Dotenv( dirname(__DIR__));
$dotenv->load();
$dotenv->required('DB_USER_TEST');
$dotenv->required('DB_PASS_TEST');