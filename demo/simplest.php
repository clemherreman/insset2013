<?php
function test($expected, $got) {
    if ($expected !== $got) {
        echo sprintf('WARNING: expected %s, got %s', $expected, $got);
    } else {
        echo sprintf('OK: expected %s, got %s', $expected, $got);
    }

    echo PHP_EOL;
}


 
function add($a, $b) {
    return $a + $b;
}

test(2, add(1, 1));



function fibonacci($n) {
    if ($n == 0) {
        return 0;
    }

    if ($n == 1) {
        return 1;
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}

test(1, fibonacci(1));
test(1, fibonacci(2));
test(2, fibonacci(3));
test(3, fibonacci(4));
test(5, fibonacci(5));
