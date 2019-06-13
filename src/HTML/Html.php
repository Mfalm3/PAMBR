<?php

namespace Mfalm3\View;

use Mfalm3\Config\Config;
use eftec\bladeone\BladeOne;

class Html
{

    public $blade;

    public function __construct()
    {
        $views = Config::PATH_TO_VIEWS;
        $cache = Config::PATH_TO_VIEWS_CACHE;
        $this->blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);
    }

    public function view($file, ...$params)
    {
        try
        {
           $rendered = $this->blade->run($file, ...$params);
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }

        return $rendered;
    }

    public function redirect($url)
    {
       return array(header("location: " . $url),exit());
    }
}
