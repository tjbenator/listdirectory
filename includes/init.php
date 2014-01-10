<?
/* Includes are in the same folder as this config */
$includes = dirname(__FILE__);

/* Include the List Directory Class and initialize the object. */
include($includes . '/ListDirectory.php');
$ListDirectory = new ListDirectory();

/* Include our site wide configuration file */
include($includes . '/config.php');

include($includes . '/functions.php');

/* Include all *.col.php */
foreach (glob($includes . "/columns/*.col.php") as $the_column)
{
    include "$the_column";
}

/* Header and Footer locations */
define('header', $includes . '/header.php');
define('footer', $includes . '/footer.php');
define('menu', $includes . '/menu.php');
