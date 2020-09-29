<?php

$arr = [
    'zzzz' => 'xxxx',
    'vvvv' => 'yyyy',
    'dddd' => 'rrrr',
    'tttt' => '5555',
    '4444' => 'uuuu'
];

$obj = new stdClass();
$obj->a = [1, 2, 3, 4, ['a', 'b']];
$obj->b = new stdClass();

var_dump($arr);
var_dump($obj);
// changed
var_dump(json_decode(json_encode($arr), 1));
var_dump(json_decode(json_encode($obj), 1));
