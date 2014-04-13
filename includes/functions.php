<?php
function breadcrumbs($dir = null) {
	$dir = (!is_null($dir)) ? $dir : $_SERVER['REQUEST_URI'];
	$crumbs = explode('/', $dir);
	$breadcrumbs .= "<div class='breadcrumbs'>";
	$link = "";
	for ($x = 0; $x < count($crumbs) - 1; $x++) {
		$link .= $crumbs[$x];
		$link .= "/";
		$name = (strlen($crumbs[$x]) > 0) ? $crumbs[$x] : "Home";
		if ($x != 0) $breadcrumbs .= " &#9658; ";
		if ($x != count($crumbs) - 2) {
			$breadcrumbs .= "<a href='$link'>" . $name . "</a>";
		} else {
			$breadcrumbs .= $name;
		}
	}
	$breadcrumbs .= "</div>";
	return $breadcrumbs;
}
