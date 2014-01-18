<?php
class ListDirectory {
	private $columns = array();
	private $excludes = array('includes');
	private $directories;
	function __construct($directory = "./*") {
		$this->directories = glob($directory, GLOB_BRACE);
        }

	/**
	*Adds file or path to exclude
	*/
	public function addExclude($path) {
		$this->excludes[] = trim($path, "./");
	}

	/**
	*Adds array of files and/or paths to excludes
	*/
	public function addExcludes($paths) {
		if (is_array($paths)) $this->excludes = array_merge($this->excludes, $paths);
	}

	/**
	*Check if file or path is in the excludes list
	*/
	public function checkExcludes($path) {
		if (in_array(trim($path, "./"), $this->excludes)) {
			return true;
		}
		return false;
	}

	/**
	*Adds column to the available columns
	*/
	public function addColumn($name, $func) {
		$this->columns[$name] = $func;
	}

	/**
	*Sets directory to list. Overwrites current defined directory.
	*/
	public function setDirectory($dir) {
		$this->directories = glob($dir, GLOB_BRACE);
	}

	/**
	*Adds directory to directories to list.
	*/
	public function addDirectory($dir) {
		$this->directories = array_merge($this->directories, glob($dir, GLOB_BRACE));
	}

	/**
	*Displays files and directories in the form of a table.
	*/
	public function display($columns = 'Filename Size') {
		$columns = explode(", ", $columns);
		echo "<table class='sortable'>\n";
		$data = array();
		echo "\t<thead>\n";
		echo "\t\t<tr>\n";
		foreach($columns as $key => $col) {
			//if(!in_array($name, $columns)) continue;
			if(!isset($this->columns[$col])) continue;
			echo "\t\t\t<th class='" . str_replace(" ", "-", $col) . "'>" . $col . "</th>\n";
		}
		echo "\t\t</tr>\n";
		echo "\t</thead>\n\n";

		echo "\t<tbody>\n";
		foreach($this->directories as $key => $dir) {
			if ($this->checkExcludes($dir)) continue;
			echo "\t\t<tr>\n";
			foreach ($columns as $key => $col) {
				if(!isset($this->columns[$col])) continue;
				$func = $this->columns[$col];
				$r = $func($dir);
				if (isset($r['customkey'])) {
					echo "\t\t\t<td class='" . str_replace(" ", "-", $col) . "' sorttable_customkey='" . $r['customkey'] . "'>";
				} else {
					echo "\t\t\t<td class='" . str_replace(" ", "-", $col) . "'>";
				}
				echo $r['data'] . "</td>\n";
			}
			echo "\t\t</tr>\n";
		}
		echo "\t</tbody>\n";
		echo "</table>\n";
	}

}
