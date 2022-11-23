<?php

namespace Src;

class Session
{
    public static function set($name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name): ?string
    {
        return $_SESSION[$name] ?? null;
    }

    public static function clear($name): void
    {
        unset($_SESSION[$name]);
    }
}