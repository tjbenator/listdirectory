<?php
function Thumbnails_Header () {
	return "<th class='sorttable_nosort'>Thumbnail</th>\n";
}

function Thumbnails_Item ($file) {
	return "<td class='thumbnails'><div class='thumbnails'>".create_thumbnail($file['path'].$file['name'])."</div></td>\n";
}

