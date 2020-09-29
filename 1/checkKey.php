<?php
function checkKey() {
    return (bool)strpos($_GET['b'], $_GET['a']);
}

$_GET['a'] = 'test';
$_GET['b'] = 'bbb';
var_dump(checkKey()); // false

$_GET['a'] = 'aa';
$_GET['b'] = 'bbaabsksksks';
var_dump(checkKey()); // true
