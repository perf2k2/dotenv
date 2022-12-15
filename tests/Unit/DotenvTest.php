<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Tests\Unit;

use Perf2k2\Dotenv\Dotenv;
use Perf2k2\Dotenv\Loader;
use Perf2k2\Dotenv\Parser;
use Perf2k2\Dotenv\Reader;
use PHPUnit\Framework\TestCase;

class DotenvTest extends TestCase
{

    public function testCreateImmutable(): void
    {
        $this->assertInstanceOf(Dotenv::class, Dotenv::createImmutable());
    }

    public function testCreateMutable(): void
    {
        $this->assertInstanceOf(Dotenv::class, Dotenv::createMutable());
    }

    public function testLoad(): void
    {
        // Arrange

        $reader = $this->createMock(Reader::class);
        $reader->method('read')->willReturn('');

        $parser = $this->createMock(Parser::class);
        $parser->method('parse')->willReturn([]);

        $loader = $this->createMock(Loader::class);
        $dotenv = new Dotenv($reader, $parser, $loader);

        // Act & Assert

        $loader->expects($this->once())->method('load');
        $dotenv->load(__DIR__);
    }
}
