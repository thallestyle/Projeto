<?php
namespace Foundation\Html;

use Container;

class Assets
{
    protected $url;

    public function __construct()
    {
        $this->url = Container::get('app.url');
    }

    public function img($file)
    {
        return sprintf('%s/assets/%s/%s', $this->url, 'img', $file);
    }

    public function js($file)
    {
        return sprintf('%s/assets/%s/%s', $this->url, 'js', $file);
    }

    public function css($file)
    {
        return sprintf('%s/assets/%s/%s', $this->url, 'css', $file);
    }
}
