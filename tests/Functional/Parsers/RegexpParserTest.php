<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Tests\Functional\Parsers;

use Perf2k2\Dotenv\Parsers\RegexpParser;
use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;

class RegexpParserTest extends TestCase
{

    public function testCompareWithPhpdotenvParse(): void
    {
        // Arrange

        $content = file_get_contents(__DIR__ . '/../../resources/example.env');
        $parser = new RegexpParser();

        // Act

        $phpDotenvResult = Dotenv::parse($content);
        $customDotenvResult = $parser->parse($content);

        // Assert

        $this->assertSame($phpDotenvResult, $customDotenvResult);
    }
}
