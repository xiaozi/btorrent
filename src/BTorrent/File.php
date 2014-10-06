<?php namespace BTorrent;

class File implements \JsonSerializable {
	public $name = null;
	public $size = 0;

	public function __construct($name, $size)
	{
		$this->name = $name;
		$this->size = $size;
	}

	public function humanSize()
	{
		$size = $this->size;
		if($size >= 1<<30)
			return number_format($size / (1<<30), 2) . ' GB';
		if($size >= 1<<20)
			return number_format($size / (1<<20), 2) . ' MB';
		if($size >= 1<<10)
			return number_format($size / (1<<10), 2) . ' KB';
		return number_format($size) . ' bytes';
	}

	public function fileExt()
	{
		return pathinfo($this->name, PATHINFO_EXTENSION);
	}

	public function jsonSerialize()
	{
		$ext = $this->fileExt();
		return array(
			'name' => $this->name,
			'size' => $this->humanSize(),
			'ext' => $ext,
			// 'icon' => 'icon-' . $ext,
		);
	}
}