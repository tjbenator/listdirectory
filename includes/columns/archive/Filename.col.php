<?php
function Filename_Header () {
return "<th>Filename</th>\n";
}

function Filename_Item ($file) {
	return "<td width='50%'><a class='row' href='".$file['name']."'>".$file['name']."</td>\n";
}
