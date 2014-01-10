<?php

function create_thumbnail($image) {
	$dir = dirname($image);
	$thumbdir = $dir . '/thumbnails';
	$name = basename($image);
	$thumbnail = $thumbdir . "/" . trim($name, "./");
	if(!file_exists($thumbdir)) mkdir($thumbdir, 0775);
	//Extensions excepted in to thumbnail function. 
	$pattern="(\.jpg$)|(\.png$)|(\.gif$)";
	//Check and see if it is an image
	if(eregi($pattern, $dir . '/' . $name)) {
		//Check to see if thumbnail exists
		if (!file_exists($thumbdir.'/'.$name)) {
			$filename_pieces = explode('.', $name);
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
					$old_image = imagecreatefromjpeg($name);
					break;
				case "png":
					$old_image = imagecreatefrompng($name);
					break;
				case "gif":
					$old_image = imagecreatefromgif($name);
					break;
			}

			imagecopyresized($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
			$newname = $thumbdir . '/' . $name;
			switch ($ext) {
				case "jpg":
					imagejpeg($new_image, $newname);
					break;
				case "png":
					imagepng($new_image, $newname);
					break;
				case "gif":
					imagegif($new_image, $newname);
					break;
			}
		}
	//Return Thumbnails
	return "<img src='$thumbnail' />";
	} else {
	//Isn't a picture so "None"
	return "None";
	}
}

$ListDirectory->addExclude('thumbnails');
$ListDirectory->addColumn('Thumbnail', function($filename) {
	$data = create_thumbnail($filename);
	return array('data' => $data);

});


