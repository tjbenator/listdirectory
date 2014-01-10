<?php
/* Where is your stylesheet? */
define('main_css', '/css/main.css');

/* Default is to use jquery's cdn */
define('jquery', 'http://code.jquery.com/jquery-1.10.1.min.js');

/**
Location of sorttable javascript
Source: http://www.kryogenix.org/code/browser/sorttable/ 
Author: Stuart Langridge
*/
define('sorttable', '/js/sorttable.js');


/**
Global Excludes
*/
$ListDirectory->addExclude('css');
$ListDirectory->addExclude('js');
$ListDirectory->addExclude('includes');
$ListDirectory->addExclude('img');
$ListDirectory->addExclude('index.php');

/* Define the Date Format. This is used on all columns. For more info visit: 
http://php.net/manual/en/function.date.php                                      */
define('date_format', "M d Y g:i A");
