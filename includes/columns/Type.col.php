<?php
$ListDirectory->addColumn('Type', function($filename) {
	//Is it a directory?
	if (is_dir($filename)) return array('data' => "Directory");
	//Return Extension for files.
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	return array('data' => $ext);
});
