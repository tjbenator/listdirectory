<?php
/* You can use the addColumn method with a call back method to create your new column
$ListDirectory->addColumn( string $name, $callback);
You must return an array with the key 'data'. 'customkey' is optional.
*/
$ListDirectory->addColumn('Basename', function($filename) {
	return array('data' => basename($filename), 'customkey' => $filename);
});
