<?php namespace BTorrent;

class Tree implements \JsonSerializable {
	public $struct = array();
	
	public function __construct(array $arr, $root = '/')
	{
		$tree = new Dir($root);
		foreach ($arr as $item) {
			$branch = &$tree;
			$filename = array_pop($item['path']);
			foreach ($item['path'] as $k => $dir) {
				$d = &$branch->findDir($dir);
				if (!$d) {
					$d = &$branch->addDir(new Dir($dir));
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
