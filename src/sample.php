<?php

require __DIR__ . '/../vendor/autoload.php';

use Tsv\Writer;
use Tsv\Reader;

$filename = __DIR__ . '/test.tsv';

$rows = [
    [1, 'test1', "test\ttest"],
    [],
    [2, 'test2', "test\ntest"],
    [3, 'test3', "test\"test"],
];

Writer::writeAll($filename, $rows);

$readRows = Reader::readAll($filename);
var_dump($readRows);
