<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Tests\Functional;

use Perf2k2\Dotenv\Dotenv;
use Perf2k2\Dotenv\Loaders\SafeLoader;
use Perf2k2\Dotenv\Parsers\RegexpParser;
use Perf2k2\Dotenv\Readers\FileGetContentsReader;
use PHPUnit\Framework\TestCase;

class DotenvTest extends TestCase
{

    public function testLoad(): void
    {
        // Arrange

        $dotenv = new Dotenv(
            new FileGetContentsReader(),
            new RegexpParser(),
            new SafeLoader(),
        );

        // Act

        $dotenv->load(__DIR__ . '/../resources', 'example.env');

        // Assert

        $this->assertSame('asd', getenv('ENV_VARIABLE1'));
        $this->assertSame('true', getenv('ENV_VARIABLE2'));
        $this->assertSame('', getenv('ENV_VARIABLE3'));
        $this->assertSame('null', getenv('ENV_VARIABLE4'));
        $this->assertSame('12345', getenv('ENV_VARIABLE5'));
    }
}
