<?php


define("DB_HOST", "localhost");
define("DB_NAME", "airemg_aire");
define("DB_USER", "airemg_aire");
define("DB_PWD", "@1re.mg2024");


define('RP_MAIN', RP_MAIN_CONF );
define('ROOT_PATH', RP_MAIN_CONF );

define('HTTP_MAIN', "https://" . $_SERVER["HTTP_HOST"] . "/");

define('HTTP_MAIN_MENU', HTTP_MAIN);

define('RP_RESSOURCES',    RP_MAIN . 'ressources/');

define('RP_IMG',    RP_MAIN . 'pages/img/');

define('RP_IMPORT', RP_MAIN . 'pages/import/');
define('RP_PJ', RP_MAIN . 'pages/piece_jointe/');

define('HTTP_PJ', HTTP_MAIN . 'pages/piece_jointe/');

define('HTTP_IMG',    HTTP_MAIN . 'pages/img/');
define('HTTP_FONT',    HTTP_MAIN . 'pages/font/');
define('HTTP_PAGE', HTTP_MAIN . "pages/");

define('HTTP_EXEC', HTTP_MAIN . "execution/");
define('HTTP_AJAX', HTTP_MAIN . "ajax/");

define('HTTP_LANG_DATATABLE', HTTP_MAIN . "ressources/");


define('HTTP_PAGE_CV', HTTP_PAGE . "cv/");
define('HTTP_EXEC_CV', HTTP_EXEC . "cv/");
define('HTTP_AJAX_CV', HTTP_AJAX . "cv/");

define('HTTP_PAGE_CREATION', HTTP_PAGE . "creation/");
define('HTTP_EXEC_CREATION', HTTP_EXEC . "creation/");
define('HTTP_AJAX_CREATION', HTTP_AJAX . "creation/");

define('HTTP_PAGE_ADMIN', HTTP_PAGE . "admin/");
define('HTTP_EXEC_ADMIN', HTTP_EXEC . "admin/");
define('HTTP_AJAX_ADMIN', HTTP_AJAX . "admin/");

define('HTTP_PAGE_ACTIVTE', HTTP_PAGE . "activite/");
define('HTTP_EXEC_ACTIVITE', HTTP_EXEC . "activite/");
define('HTTP_AJAX_ACTIVITE', HTTP_AJAX . "activite/");

define('HTTP_PAGE_EDITION', HTTP_PAGE . "edition/");
define('HTTP_EXEC_EDITION', HTTP_EXEC . "edition/tcpdf/examples/");
define('HTTP_AJAX_EDITION', HTTP_AJAX . "edition/");

define('RP_PDF', RP_MAIN . 'execution/edition/tcpdf/');
