<?php
$exclude[] = "./mirrors";
function Mirrors_Header () {
	 return "<th class='sorttable_nosort'>Mirrors</th>\n";
}

$Mirrors =  NULL;
function Mirrors_Item ($file) {
	global $Mirrors;
	/* Read Mirrors File Once and store*/
	if ($Mirrors == NULL) {
		$lines = file('mirrors');
		foreach ($lines as $line) {
			$parts = explode(",", $line);
			$Mirrors[$parts[0]][] = $parts[1];
		}

	}
	
	/* Create Cell */
	$result = "<td>";
	$count = 1;
	if ( isset($Mirrors[$file['name']]) ) {
		$Mirrors_ = $Mirrors[$file['name']];
		foreach ( $Mirrors_ as $Mirror) {
			$result .= "<a href=" . $Mirror . ">" . $count . "</a>  ";
			$count++;
		}
	}
	$result .= "</td>\n";

	/* Show the result */
	echo $result;
}

