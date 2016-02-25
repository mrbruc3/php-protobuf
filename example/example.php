<?php
require_once 'output/pb_proto_foo.php';


$res = new ResultA();
$res->setUrl("test");


$foo = new Foo();
$foo->setBar(1);
$foo->setBaz('two');
$foo->appendSpam(3.0);
$foo->appendSpam(4.0);
$foo->setResultA($res);

$packed = $foo->serializeToString();

$foo->reset();

try {
	$foo->parseFromString($packed);
} catch (Exception $ex) {
	die('Upss.. there is a bug in this example');
}

$foo->dump();
?>
