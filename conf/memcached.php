<?php
header("Content-Type:text/html;charset=utf-8");
$mem = new Memcache;
$mem->connect("127.0.0.1", 11211) or die ("Could not connect");

$version = $mem->getVersion();
echo "Memcached Server version:  ".$version."<br>";

$mem->set('key1', 'This is first value', 0, 60);
$val = $mem->get('key1');
echo "Get key1 value: " . $val ."<br>";

$mem->replace('key1', 'This is replace value', 0, 60);
$val = $mem->get('key1');
echo "Get key1 value: " . $val . "<br>";

$arr = array('aaa', 'bbb', 'ccc', 'ddd');
$mem->set('key2', $arr, 0, 60);
$val2 = $mem->get('key2');
echo "Get key2 value: ";
print_r($val2);
echo "<br>";

$mem->delete('key1');
$val = $mem->get('key1');
echo "Get key1 value: " . $val . "<br>";

$mem->flush();
$val2 = $mem->get('key2');
echo "Get key2 value: ";
print_r($val2);
echo "<br>";

$mem->close();
?>
Memcached Test tools for <a href="http://lnmp.jp.ai" target="_blank">LNMP info</a> <a href="http://code.jp.ai/wiki/lnmp" target="_blank">LNMP Q&A</a>
