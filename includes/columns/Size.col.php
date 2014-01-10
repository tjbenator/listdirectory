<?php
function format_bytes($bytes) {
	if ($bytes < 1024) {
		return $bytes .' B';
	} elseif ($bytes < 1024^2) {
		return round($bytes / 1024, 2) .' K';
	} elseif ($bytes < 1024^3) {
		return round($bytes / 1024^2, 2) . ' M';
	} elseif ($bytes < 1024^4) {
		return round($bytes / 1024^3, 2) . ' G';
	} else {
		return round($bytes / 1024^4, 2) .' T';
	}
}


$ListDirectory->addColumn('Size', function($filename) {
	$size = filesize($filename);
	return array('data' => format_bytes($size), 'customkey' => $size);
});

