<?php

if (!class_exists('PHPUnit_Framework_TestCase', false)
    && class_exists('PHPUnit\\Framework\\TestCase')) {
    class_alias('PHPUnit\\Framework\\TestCase', 'PHPUnit_Framework_TestCase');
}

require_once __DIR__ . '/../classes/StableSort.php';
require_once __DIR__ . '/../functions.php';
