<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Parsers;

use Perf2k2\Dotenv\Exception;
use Perf2k2\Dotenv\Parser;

class RegexpParser implements Parser
{

    /** @inheritDoc  */
    public function parse(string $content): array
    {
        $result = [];

        if (preg_match_all('/^([A-Za-z0-9_]+)=([^\r\n]*)/m', $content, $matches) === false) {
            throw new Exception('Error occurred while processing content with environment variables');
        }

        foreach ($matches[1] as $line => $variableName) {
            if (!array_key_exists($line, $matches[2])) {
                throw new Exception("Unable to get value of \"{$variableName}\" variable");
            }

            $variableValue = $matches[2][$line];
            $result[$variableName] = $variableValue;
        }

        return $result;
    }
}
