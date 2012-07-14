<?php
/******************************************************************************
Created by: Travis Beck

The includes folder can be anywhere as long as it is accessable via the web for 
stylesheets and javascripts. You only really need one includes folder per site
and an index.php in each folder you want to display */


/* Define files that you want to exclude in this directory (must include ./ 
or full path). This applies to this directory only.			     */
$exclude = array('./filename');


/*
Define where your config.php is located. The menu.php, styles.css, 
sorttables.js, header.php, and footer.php will be pulled relative to 
config.php                                                                   */
require_once './includes/config.php';

/* Define the directory you want to list */
define('directory', './*');

/* Define page title for this page */
define('title',  $_SERVER['REQUEST_URI']);

/* Define Columns in the order you want them to appear. 
Thumbnails
Filename
Size
DateModified
DateAccessed
inode
Permissions
Mirrors
*/

define('columns', 'Filename Mirrors Size DateModified');

/* Define the Date Format. This is used on all columns. For more info visit: 
http://php.net/manual/en/function.date.php					*/
define('date_format', "M d Y g:i A");

/*****************************************************************************/

/** Display Header **/
include($header);

/******************************************************************************
List directory
******************************************************************************/
	echo "\n<!----List Directories Begin---->\n";
	ls_directory(directory, $exclude);
	echo "\n<!----List Directories End---->\n\n";
/*****************************************************************************/
/** Display Footer **/
include($footer);
?>

