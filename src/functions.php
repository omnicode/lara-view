<?php

if (!function_exists('__')) {
    function __($id = null, $parameters = [], $domain = 'messages', $locale = null)
    {
        return trans($id, $parameters, $domain, $locale );
    }
}
