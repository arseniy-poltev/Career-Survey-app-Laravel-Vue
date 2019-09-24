<?php

namespace App\Helpers;

use App\Config;

class CustomSettings
{
    static $available = [
        'services.stripe.key',
        'services.stripe.secret',
    ];

    public function index()
    {
        $data = [];
        foreach (self::$available as $key) {
            $data[$key] = $this->show($key);
        }
        return $data;
    }

    public function show($name)
    {
        return ($config = Config::where('key', $name)->first()) ? $config->value : config($name, null);
    }
}