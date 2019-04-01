<?php
namespace Foundation\Http;

class Input
{
    public function get($key, $default = null)
    {
        return $this->has($key) ? $_REQUEST[$key] : $default;
    }

    public function has($key)
    {
        return isset($_REQUEST[$key]);
    }
}
