<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Tests\Unit\Loaders;

use Perf2k2\Dotenv\Loaders\UnsafeLoader;
use PHPUnit\Framework\TestCase;

class UnsafeLoaderTest extends TestCase
{

    public function testLoad(): void
    {
        // Arrange

        $loader = new UnsafeLoader();

        // Act

        $loader->load(['variable' => 'value']);

        // Assert

        $this->assertSame('value', getenv('variable'));
        $this->assertSame('value', $_ENV['variable']);
    }

    public function testLoadWithExistingVariable(): void
    {
        // Arrange

        $loader = new UnsafeLoader();

        // Act

        putenv('variable=original_value');
        $loader->load(['variable' => 'new_value']);

        // Assert

        $this->assertSame('new_value', getenv('variable'));
        $this->assertSame('new_value', $_ENV['variable']);
    }

    public function tearDown(): void
    {
        putenv('variable');
        unset($_ENV['variable']);
    }
}
