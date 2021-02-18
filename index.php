<?php
include 'lib/BladeOne/lib/BladeOne.php';
use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/lib/cache';
$blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.

require_once('lib/config/db.php');

$db = new db();
echo $blade->run("index",array("variable1"=>"value1")); // it calls /views/hello.blade.php