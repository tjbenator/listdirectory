<?php
$ListDirectory->addColumn('Filename', function($filename) {
	return array('data' => basename($filename));
});
