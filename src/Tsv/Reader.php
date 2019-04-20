<?php

namespace Tsv;

use ArrayObject;

class Reader
{
    /**
     * @param string $filename
     * @param callable $callable
     */
    public static function readRows(string $filename, callable $callable): void
    {
        $file = ReaderFactory::create($filename);
        foreach ($file as $row) {
            $callable($row);
        }
    }

    /**
     * @param string $filename
     * @return array
     */
    public static function readAll(string $filename): array
    {
        $rows = new ArrayObject();
        self::readRows($filename, function ($row) use ($rows) {
            $rows->append($row);
        });
        return (array)$rows;
    }
}
