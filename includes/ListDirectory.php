<?php
class ListDirectory {
	private $columns = array();
	private $excludes = array('includes');
	private $directory;
	function __construct($directory = "./*") {
		$this->directory = $directory;
        }

	public function addExclude($path) {
		$this->excludes[] = trim($path, "./");
	}

	public function checkExcludes($path) {
		if (in_array(trim($path, "./"), $this->excludes)) {
			return true;
		}
		return false;
	}

	public function addColumn($name, $func) {
		$this->columns[$name] = $func;
	}

	public function setDirectory($dir) {
		$this->directory = $dir;
	}

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
		foreach(glob($this->directory) as $key => $dir) {
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
