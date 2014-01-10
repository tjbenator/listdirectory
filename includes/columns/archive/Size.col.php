<?php
function Size_Header () {
	 return "<th>Size</th>\n";
}

function Size_Item ($file) {
         return "<td sorttable_customkey='".filesize($file['name'])."'>"._format_bytes(filesize($file['name']))."</td>\n";
}

