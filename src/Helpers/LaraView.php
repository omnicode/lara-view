<?php

namespace LaraView\Helpers;

use Illuminate\Support\Facades\Config;
use LaraLink\Facades\LaraLink;
use MyDevData\Components\ACL;

class LaraView
{
    /**
     * @param $path
     * @param array $options - @TODO
     * @return string
     */
    public static function image($path, array $options = [])
    {
        return '<img src="' . asset('img/' . trim($path, '/')) . '" />';
    }

    /**
     * @param string $path
     * @return string
     */
    public static function css($path = '')
    {
        return '<link href="' . asset('css/' . trim($path, '/')) . '" rel="stylesheet">';
    }

    /**
     * @param string $path
     * @return string
     */
    public static function script($path = '')
    {
        return '<script src="' . asset('js/' . trim($path, '/')) . '"></script>';
    }

    /**
     * @return mixed
     */
    public static function sortParams()
    {
        $params = app('request')->all();
        unset($params['crud']);
        return $params;
    }

}

