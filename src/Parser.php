<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv;

interface Parser
{

    /**
     * @param string $content
     * @return array<string,string>
     * @throws Exception
     */
    public function parse(string $content): array;
}
