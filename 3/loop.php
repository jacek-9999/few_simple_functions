<?php

function loopOver($n) {
    $elements = [3 => 'good', 5 => 'excellent', 'default' => 'ok'];
    $out = [];
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 3 === 0) {
            $status = $elements[3];
        } else if ($i % 5 === 0) {
            $status = $elements[5];
        } else {
            $status = $elements['default'];
        }
        array_push($out, "iteration $i: $status");
        echo "iteration $i: $status\n";
    }
    $fileName = 'loop_log_'.date('Y-m-d').'.txt';
    file_put_contents($fileName, implode(PHP_EOL, $out));
}
loopOver(100);