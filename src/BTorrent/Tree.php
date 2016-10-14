<?php namespace BTorrent;

class Tree implements \JsonSerializable {
	public $struct = array();
	
	public function __construct(array $arr, $root = '/')
	{
		$tree = new Dir($root);
		foreach ($arr as $item) {
			$branch = &$tree;
			$filename = array_pop($item['path']);
			foreach ($item['path'] as $k => $dirname) {
				$d = &$branch->findDir($dirname);
				if (!$d) {
					$dir = new Dir($dirname);
					$d = &$branch->addDir();
				}
				$branch = &$d;
			}
			$file = new File($filename, $item['length']);
			$branch->addFile($file);
		}
		$this->struct = $tree;
	}

	public function jsonSerialize()
	{
		return $this->struct;
	}
}
