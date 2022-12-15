<?php

declare(strict_types=1);

namespace Perf2k2\Dotenv\Loaders;

use Perf2k2\Dotenv\Loader;

class SafeLoader implements Loader
{

    /** @inheritDoc  */
    public function load(array $variables): void
    {
        foreach ($variables as $name => $value) {
            $putEnvString = sprintf('%s=%s', $name, $value);

            if (getenv($name) !== false) {
                continue;
            }

            putenv($putEnvString);
            $_ENV[$name] = $value;
        }
    }
}
