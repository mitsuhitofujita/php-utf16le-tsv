<?php

namespace Tsv;

class Writer
{
    /**
     * @param string $filename
     * @param callable $callable
     */
    public static function write(string $filename, callable $callable): void
    {
        $file = WriterFactory::create($filename);
        $callable($file);
    }

    /**
     * @param string $filename
     * @param array $rows
     */
    public static function writeAll(string $filename, array $rows): void
    {
        self::write($filename, function($file) use ($rows) {
            foreach ($rows as $row) {
                $file->fputcsv($row);
            }
        });
    }
}
