<?php


function filterNum($param) {
    $out = array_filter(str_split($param), function ($el) {
        if (preg_match('/[0-9]/', $el)) {
            return $el;
        }
    });
    return implode('', $out);
}

var_dump(filterNum(1111));
var_dump(filterNum('1223'));
var_dump(filterNum('1223a111'));
var_dump(filterNum('qwer1'));
var_dump(filterNum('1qwerty'));
var_dump(filterNum('1a2b3c'));