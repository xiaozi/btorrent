## introduce

a lib for generate file tree for torrent file

## installation

```
composer require xiaozi/btorrent
```

## example

use like this

--------------

```php
<?php

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
```

