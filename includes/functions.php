<?php
/* Include all *.col.php */
foreach (glob(dirname(__file__)."/columns/*.col.php") as $the_column)
{
    include "$the_column";
}

/* Get column specific stylesheets */
function get_col_styles() {
	global $includes_uri;
	echo "<!--Begin Column Styles-->\n";
	foreach (glob(dirname(__file__)."/columns/*.col.css") as $the_style) {
		echo "\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"".$includes_uri.'/columns/'.basename($the_style)."\" />\n";
	}
	echo "\t<!--End Column Styles-->\n";
	/* */
}

function _format_bytes($a_bytes) {
    if ($a_bytes < 1024) {
        return $a_bytes .' B';
    } elseif ($a_bytes < 1048576) {
        return round($a_bytes / 1024, 2) .' KiB';
    } elseif ($a_bytes < 1073741824) {
        return round($a_bytes / 1048576, 2) . ' MiB';
    } elseif ($a_bytes < 1099511627776) {
        return round($a_bytes / 1073741824, 2) . ' GiB';
    } elseif ($a_bytes < 1125899906842624) {
        return round($a_bytes / 1099511627776, 2) .' TiB';
    } elseif ($a_bytes < 1152921504606846976) {
        return round($a_bytes / 1125899906842624, 2) .' PiB';
    } elseif ($a_bytes < 1180591620717411303424) {
        return round($a_bytes / 1152921504606846976, 2) .' EiB';
    } elseif ($a_bytes < 1208925819614629174706176) {
        return round($a_bytes / 1180591620717411303424, 2) .' ZiB';
    } else {
        return round($a_bytes / 1208925819614629174706176, 2) .' YiB';
    }
}

/* Takes path and regex.  EXAMPLE: ./path/*.txt 		*/
/* Echos out table with directory */
function ls_directory($g, $ext_excludes = array()) {
	$columns = explode(" ", columns);
	$excludes = array_merge(array('.', '..', './index.php', './includes', './README.md'), $ext_excludes);
	$key = "0";
	foreach (glob($g) as $dirfile) {
		if(in_array($dirfile, $excludes))
			continue;

		$files[$key]['path'] = substr( $dirfile, 0, ( strrpos( $dirfile, "/" ) +1 ) );
		$files[$key]['name'] = substr( $dirfile, ( strrpos( $dirfile, "/" ) +1 ) );
		$key++;
	}

	if (!empty($files)) sort($files);


	if (!empty($files)) { 
?>

		<table id='list' class='sortable'>
			<thead>
				<tr>
					<?php
					foreach ($columns as $column) {
						$header = $column."_Header";
						echo $header();
					}
					?>
				</tr>
			</thead>
			<tbody>
<?php 
			/* Display Files! */
		foreach ($files AS $file) {
				echo "<tr>\n";
                                        foreach ($columns as $column) {
                                                $item = $column."_Item";
                                                echo $item($file);
                                        }

				echo "</tr>\n\n";
		}
					
?>
			</tbody>
		</table>
<?php 
		} else {
			/* Message if the directory is empty. */
			echo "This directory appears to be empty.";
		}
/*************************************************************/	
}


?>
