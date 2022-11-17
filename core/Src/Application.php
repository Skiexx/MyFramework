<?php

namespace Src;

use Error;

class Application
{
    private Settings $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function __get(string $key)
    {
        if ($key === 'settings') {
            return $this->settings;
        }
        throw new Error('Access a non-existent property');
    }

    function run(): void
    {
        echo 'Working';
    }
}