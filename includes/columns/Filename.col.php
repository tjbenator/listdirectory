<?php
$ListDirectory->addColumn('Filename', function($filename) {
	return array('data' => "<a href='$filename'>" . basename($filename) . "</a>");
});
