<?php

namespace Tsv;

use SplFileObject;

class WriterFactory
{
    /**
     * @param string $filename
     * @return SplFileObject
     */
	public static function create(string $filename): SplFileObject
	{
		$filtered = "php://filter/write=convert.iconv.utf-8%2Futf-16le/resource=$filename";
		$file = new SplFileObject($filtered, 'wb');
		$file->setCsvControl("\t", "\"", "\t");
		$file->fwrite("\xEF\xBB\xBF");
		return $file;
	}
}
