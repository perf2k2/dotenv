<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv;

interface Loader
{

    /**
     * @param array<string,string> $variables
     * @return void
     */
    public function load(array $variables): void;
}
