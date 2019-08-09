<?php

require __DIR__ . '/../vendor/autoload.php';

use Tsv\Writer;
use Tsv\Reader;

$filename = __DIR__ . '/test.tsv';

$rows = [
    [1, 'test1', "test\ttest,test"],
    [],
    [2, 'test2', "test\ntest\n\ntest"],
    [3, 'test3', "\\test test\\"],
    [4, 'test4', "\"test\"test\""],
];

Writer::writeAll($filename, $rows);

$readRows = Reader::readAll($filename);
var_dump($readRows);
