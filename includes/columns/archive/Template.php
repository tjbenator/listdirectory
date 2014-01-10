<?php
/* Copy and Rename this file "columnname".col.php */

/* For this example we will create a column that displays filesize */

/*If you column needs a file for storage such as a thumbnail folder, you can exclude within this file.!*/
exclude[] = "./filename";

/* Change columnname below to your columns name. */
function columnname_Header () {
	/* Nothing special here. Just put the name of the column*/
	return "<th>Filesize</th>\n";
}

/* Change columnname below to your columns name. */
/* $file is an array with 'name' and 'path' */
function columnname_Item ($file) {
	/* Say you had a 1000 byte file
	/* You can use a custom key that will be used with the sorttable javascript (Default is to sort by filename) */
	$key = filesize($file['path'].$file['name']);
	$information = filesize($file['name']);
	return "<td sorttable_customkey='$key'>" . $information . "</td>\n";
	/* Output: <td sorttable_customkey='1000'>1000</td> */
}

