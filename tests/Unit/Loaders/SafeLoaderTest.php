<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Tests\Unit\Loaders;

use PHPUnit\Framework\TestCase;
use Perf2k2\Dotenv\Loaders\SafeLoader;

class SafeLoaderTest extends TestCase
{

    public function testLoad(): void
    {
        // Arrange

        $loader = new SafeLoader();

        // Act

        $loader->load(['variable' => 'value']);

        // Assert

        $this->assertSame('value', getenv('variable'));
        $this->assertSame('value', $_ENV['variable']);
    }

    public function testLoadWithExistingVariable(): void
    {
        // Arrange

        $loader = new SafeLoader();

        // Act

        putenv('variable=original_value');
        $_ENV['variable'] = 'original_value';
        $loader->load(['variable' => 'new_value']);

        // Assert

        $this->assertSame('original_value', getenv('variable'));
        $this->assertSame('original_value', $_ENV['variable']);
    }

    public function tearDown(): void
    {
        putenv('variable');
        unset($_ENV['variable']);
    }
}
