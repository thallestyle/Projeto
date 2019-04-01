<?php
namespace Foundation\Html;

use Container;

class Url
{
    public function route($route, array $params = [])
    {
        $data = getRoute($route);

        $extraParams = '';
        foreach($params as $key => $value) {
            $extraParams .= sprintf('&%s=%s', $key, $value);
        }

        return sprintf('%s?page=%s&action=%s%s',
            Container::get('app.url'),
            $data[0],
            $data[1],
            $extraParams
        );
    }
}
