<?php
function format_bytes($bytes) {
	if ($bytes < 1024) {
		return $bytes .' B';
	} elseif ($bytes < 1048576) {
		return round($bytes / 1024, 2) .' K';
	} elseif ($bytes < 1073741824) {
		return round($bytes / 1048576, 2) . ' M';
	} elseif ($bytes < 1099511627776) {
		return round($bytes / 1073741824, 2) . ' G';
	} else {
		return round($bytes / 1099511627776, 2) .' T';
	}
}


$ListDirectory->addColumn('Size', function($filename) {
	$size = filesize($filename);
	return array('data' => format_bytes($size), 'customkey' => $size);
});

