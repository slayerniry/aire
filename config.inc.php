<?php

$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

//define('RP_MAIN_CONF', $_SERVER["DOCUMENT_ROOT"] . '/aire/');
define('RP_MAIN_CONF', $_SERVER["DOCUMENT_ROOT"] . '/aire/');

define("CHAMP", "CC");

require_once(RP_MAIN_CONF . "include/constant.php");
require_once(RP_MAIN_CONF . "debug.php");

require(RP_MAIN_CONF . "vendor/autoload.php");

date_default_timezone_set('Africa/Nairobi');

@ini_alter('error_log', RP_MAIN . 'log/error.log');
@ini_alter('display_errors', 1);

@ini_alter('max_execution_time', '-1');
@ini_alter('max_input_time', '1024');
@ini_alter('opcache.enable', '1');
@ini_alter('opcache.enable_file_override', '1');
@ini_alter('opcache.memory_consumption', '1024');

@ini_alter('memory_limit', '1024M');
@ini_alter('upload_max_filesize', '5M');

@ini_alter('output_buffering', '14096');
@ini_alter('default_charset', 'iso-8859-1');

/*
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$sql_details = array(
	'user' => $_ENV['DB_USER'],
	'pass' => $_ENV['DB_PWD'],
	'db'   => $_ENV['DB_NAME'],
	'host' => $_ENV['DB_HOST']
);

*/


error_reporting(1);
