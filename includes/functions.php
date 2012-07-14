<?php
echo "<!--Including 'functions.php'-->\n";

/* Include all *.col.php */
foreach (glob(dirname(__file__)."/columns/*.col.php") as $the_column)
{
    include "$the_column";
}
/* */

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

function create_thumbnail($image) {
	//Extensions excepted in to thumbnail function. 
	$pattern="(\.jpg$)|(\.png$)|(\.gif$)";
	//Check and see if it is an image
	if(eregi($pattern, $image)) {
		//Check to see if thumbnail exists
		if (!file_exists('thumbnails/'.$image)) {
			$filename_pieces = explode('.', $image);
			$ext = strtolower(array_pop($filename_pieces));
			//start resizing		
			$image_size = getimagesize($image);
			$image_width = $image_size[0];
			$image_height = $image_size[1];
			
			$new_size = ($image_width + $image_height) / ($image_width * ($image_height/45));
			$new_width = $image_width * $new_size;
			$new_height = $image_height * $new_size;
			
			$new_image = imagecreatetruecolor($new_width, $new_height);
			
			switch ($ext) {
				case "jpg":
					$old_image = imagecreatefromjpeg($image);
					break;
				case "png":
					$old_image = imagecreatefrompng($image);
					break;
				case "gif":
					$old_image = imagecreatefromgif($image);
					break;
			}
			
			imagecopyresized($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
			switch ($ext) {
				case "jpg":
					imagejpeg($new_image, 'thumbnails/'.$image);
					break;
				case "png":
					$newname = 'thumbnails/'.$image;
					imagepng($new_image, $newname);
					break;
				case "gif":
					imagegif($new_image, 'thumbnails/'.$image);
					break;
			}
		}
	//Return Thumbnail
	return "<img src='thumbnails/$image' />";
	} else {
	//Isn't a picture so "None"
	return "None";
	}
}


/* Takes path and regex.  EXAMPLE: ./path/*.txt 		*/
/* Echos out table with directory */
function ls_directory($g, $ext_excludes = array()) {
	$columns = explode(" ", columns);
	$excludes = array_merge(array('.', '..', './index.php', './includes', './thumbnails', ./'README.md'), $ext_excludes);
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
