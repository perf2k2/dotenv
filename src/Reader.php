<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv;

interface Reader
{

    /**
     * @param string $path
     * @return string
     * @throws Exception
     */
    public function read(string $path): string;
}
