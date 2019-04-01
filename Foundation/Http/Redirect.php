<?php
namespace Foundation\Http;

class Redirect
{
    public function route($route, array $params = [])
    {
        return $this->to(url()->route($route, $params));
    }

    public function to($url)
    {
        return header(sprintf('Location: %s', $url));
    }
}
