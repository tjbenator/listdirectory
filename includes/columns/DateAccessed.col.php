<?php
$ListDirectory->addColumn('Date Accessed', function($filename) {
	return array('data' => date(date_format, fileatime($filename)), 'customkey' => fileatime($filename) );
});

