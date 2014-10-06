<?php

error_reporting(E_ALL);

require __DIR__ . '/Dir.php';
require __DIR__ . '/File.php';
require __DIR__ . '/Tree.php';

use BTorrent\Dir;
use BTorrent\File;
use BTorrent\Tree;

$arr = array(
	array(
		'length' => 111,
		'path' => array('dir1', 'dir2-1', 'file1.txt'),
	),
	array(
		'length' => 222,
		'path' => array('dir1', 'dir2-2', 'file2.md'),
	),
);

$tree = new Tree($arr);
// var_dump($tree);
echo json_encode($tree);

