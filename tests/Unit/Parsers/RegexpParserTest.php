<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Tests\Unit\Parsers;

use PHPUnit\Framework\TestCase;
use Perf2k2\Dotenv\Parsers\RegexpParser;

class RegexpParserTest extends TestCase
{

    public function testParse(): void
    {
        // Arrange

        $parser = new RegexpParser();
        $content = <<<EOF
# Comment
ENV_VARIABLE1=asd
ENV_VARIABLE2=true
ENV_VARIABLE3=
ENV_VARIABLE4=null
ENV_VARIABLE5=12345
EOF;

        // Act

        $result = $parser->parse($content);

        // Assert

        $this->assertCount(5, $result);
        $this->assertSame('asd', $result['ENV_VARIABLE1']);
        $this->assertSame('true', $result['ENV_VARIABLE2']);
        $this->assertSame('', $result['ENV_VARIABLE3']);
        $this->assertSame('null', $result['ENV_VARIABLE4']);
        $this->assertSame('12345', $result['ENV_VARIABLE5']);
    }
}
