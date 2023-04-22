<?php

namespace App\Library;

trait Makeable
{
    protected static $instance = null;

    public static function make(...$args): static
    {
        if (! static::$instance) {
            static::$instance = new static(...$args);
        }

        return static::$instance;
    }
}
