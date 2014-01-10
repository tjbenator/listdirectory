<?php
/******************************************************************************
Created by: Travis Beck

The includes folder can be anywhere as long as it is accessable via the web for 
stylesheets and javascripts. You only really need one includes folder per site
and an index.php in each folder you want to display */

/**
Define where your init.php is located.
All dependencies of listdirectory are pull realitive to the init.php
*/
$init = "includes/init.php"; $find = true; while ($find) { if (file_exists($init)) { require_once($init); $find = false; } else { $init = "../" . $init; } }

/* Define page title for this page */
define('title',  $_SERVER['REQUEST_URI']);

/* Define the directory you want to list */
define('directory', './subfolder/*');

/**
 Define files that you want to exclude in this directory. Can be realtive paths, full path, or just filename. 
This applies to this directory only.
*/
$ListDirectory->addExclude('./filename');


/* Define Columns in the order you want them to appear. 
Thumbnails
Filename
Size
DateModified
DateAccessed
inode
Permissions
*/

define('columns', 'Thumbnail, Filename, Size, Date Accessed');

/*****************************************************************************/

/** Display Header **/
include(header);

$ListDirectory->setDirectory(directory);
$ListDirectory->display(columns);

/*****************************************************************************/

/** Display Footer **/
include(footer);
?>

