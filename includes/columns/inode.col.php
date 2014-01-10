<?php
$ListDirectory->addColumn('inodes', function($filename) { return array('data' => fileinode($filename)); });
