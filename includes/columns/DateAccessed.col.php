<?php
function DateAccessed_Header () {
	return "<th>Date Accessed</th>\n";
}

function DateAccessed_Item ($file) {
	return "<td sorttable_customkey='".fileatime($file['path'].$file['name'])."'>".date(date_format, fileatime($file['path'].$file['name']))."</td>\n";
}

