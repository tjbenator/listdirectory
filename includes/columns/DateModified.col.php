<?php
$ListDirectory->addColumn('Date Modified', function($filename) { 
	if (!defined('date_format')) {
		define('date_format', 'M d Y g:i A');
	}
	$md = filemtime($filename);
	$data = date(date_format, $md);
	return array('data' => $data, 'customkey' => $md); 
});


