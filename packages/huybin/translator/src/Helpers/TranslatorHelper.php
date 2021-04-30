<?php

namespace Huybin\Translator\Helpers;


class TranslatorHelper
{
    public static function getConfig(){
        $config = resolve('config')->get('laravel_translator');
        return $config;
    }
}