<?
/******************************************************************************
User configured options are at the top of index.php such as page title, listing
directories, and excludes.
******************************************************************************/

/* Includes are in the same folder as this config */
$includes = dirname(__FILE__);

/* This is where the css and js files are stored */
$includes_uri = 'http://'.str_replace(array($_SERVER['DOCUMENT_ROOT']), $_SERVER['SERVER_NAME'].'/', $includes);

/* Functions that are used on each page */
include_once(dirname(__FILE__) . '/functions.php');

/* Header and Footer locations */
$header = dirname(__FILE__) . '/header.php';
$footer = dirname(__FILE__) . '/footer.php';
$menu = dirname(__FILE__) . '/menu.php';
