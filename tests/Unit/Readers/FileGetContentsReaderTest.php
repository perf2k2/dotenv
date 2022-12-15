<?php

namespace Perf2k2\Dotenv\Tests\Unit\Readers;

use PHPUnit\Framework\TestCase;
use Perf2k2\Dotenv\Readers\FileGetContentsReader;

class FileGetContentsReaderTest extends TestCase
{

    public function testRead(): void
    {
        // Arrange

        $reader = new FileGetContentsReader();
        $expected = <<<EOF
# Comment
ENV_VARIABLE1=asd
ENV_VARIABLE2=true
ENV_VARIABLE3=
ENV_VARIABLE4=null
ENV_VARIABLE5=12345
EOF;

        // Act

        $result = $reader->read(__DIR__ . '/../../resources/example.env');

        // Assert

        $this->assertNotEmpty($result);
        $this->assertSame($expected, $result);
    }

    public function testNonExistentFileRead(): void
    {
        // Arrange

        $reader = new FileGetContentsReader();

        // Act & Assert

        $this->expectExceptionMessage('Unable to find file with environment variables: /dev/null/.env');
        $reader->read('/dev/null/.env');
    }
}
