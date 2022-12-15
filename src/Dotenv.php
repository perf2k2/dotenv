<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv;

use Perf2k2\Dotenv\Loaders\SafeLoader;
use Perf2k2\Dotenv\Loaders\UnsafeLoader;
use Perf2k2\Dotenv\Parsers\RegexpParser;
use Perf2k2\Dotenv\Readers\FileGetContentsReader;

class Dotenv
{
    private $reader;
    private $parser;
    private $loader;

    public function __construct(Reader $reader, Parser $parser, Loader $loader)
    {
        $this->reader = $reader;
        $this->parser = $parser;
        $this->loader = $loader;
    }

    public static function createImmutable(): Dotenv
    {
        return new Dotenv(new FileGetContentsReader(), new RegexpParser(), new SafeLoader());
    }

    public static function createMutable(): Dotenv
    {
        return new Dotenv(new FileGetContentsReader(), new RegexpParser(), new UnsafeLoader());
    }

    public function load(string $path, string $fileName = '.env'): void
    {
        $fullPath = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $fileName;

        $fileContent = $this->reader->read($fullPath);
        $variables = $this->parser->parse($fileContent);
        $this->loader->load($variables);
    }
}
