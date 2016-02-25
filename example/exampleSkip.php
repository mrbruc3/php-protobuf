<?php
require_once 'output/set_skip_foo.php';
require_once 'output/set_skip_result.php';

$res = new ResultA();
$res->set(ResultA::URL, "http://www.test.nl");
$res->set(ResultA::TITLE, "test");
$res->set(ResultA::SNIPPETS, "snippy");

$foo = new Foo();
$foo->set(Foo::BAR, 1);
$foo->set(Foo::BAZ, "two");
$foo->append(Foo::SPAM, 3.0);
$foo->append(Foo::SPAM, 4.0);
$foo->set(Foo::RESULTA, $res);

$packed = $foo->serializeToString();

echo "Hex: " . bin2hex($packed) . "\n";
echo "Serialized: \n" . $packed . "\n===========\n";


$foo->reset();

try {
	$foo->parseFromString($packed);
} catch (Exception $ex) {
	die('Upss.. there is a bug in this example');
}

$foo->dump();
?>
