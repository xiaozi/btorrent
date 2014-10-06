<?php namespace BTorrent;

class Dir implements \JsonSerializable {
	public $name = null;
	public $subdirs = array();
	public $files = array();

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function &addFile(File &$file)
	{
		$this->files[] = &$file;
		return $file;
	}

	public function &addDir(Dir &$dir)
	{
		$this->subdirs[] = &$dir;
		return $dir;
	}

	public function &findDir($name)
	{
		$foundDir = false;
		foreach ($this->subdirs as $subdir) {
			if ($subdir->name == $name) {
				$foundDir = &$subdir;
				break;
			}
		}
		return $foundDir;
	}

	public function jsonSerialize()
	{
		return array(
			'name' => $this->name,
			'children' => array_merge($this->subdirs, $this->files),
			'open' => true,
		);
	}
}