<?php
function DateModified_Header () {
	return "<th>Date Modified</th>\n";
}

function DateModified_Item ($file) {
	return "<td sorttable_customkey='".filemtime($file['path'].$file['name'])."'>".date(date_format, filemtime($file['path'].$file['name']))."</td>\n";
}

