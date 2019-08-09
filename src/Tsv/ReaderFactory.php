<?php

namespace Tsv;

use SplFileObject;

class ReaderFactory
{
    /**
     * @param string $filename
     * @return SplFileObject
     */
	public static function create(string $filename): SplFileObject
	{
		$filtered = "php://filter/read=convert.iconv.utf-16%2Futf-8/resource=$filename";
		$file = new SplFileObject($filtered, 'rb');
		$file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY | SplFileObject::READ_AHEAD | SplFileObject::DROP_NEW_LINE);
		$file->setCsvControl("\t", "\"", "\t");
		return $file;
	}
}
