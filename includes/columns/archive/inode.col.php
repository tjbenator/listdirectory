<?php
function inode_Header () {
return "<th>inode</th>\n";
}

function inode_Item ($file) {
	return "<td>" . fileinode($file['name']) . "</td>\n";
}
