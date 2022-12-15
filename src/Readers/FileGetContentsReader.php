<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Readers;

use Perf2k2\Dotenv\Exception;
use Perf2k2\Dotenv\Reader;

class FileGetContentsReader implements Reader
{

    /** @inheritDoc  */
    public function read(string $path): string
    {
        if (!file_exists($path)) {
            throw new Exception("Unable to find file with environment variables: {$path}");
        }

        $content = @file_get_contents($path);

        if ($content === false) {
            throw new Exception("Unable to read file with environment variables: {$path}");
        }

        return $content;
    }
}