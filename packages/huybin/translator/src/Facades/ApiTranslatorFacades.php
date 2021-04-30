<?php
namespace Huybin\Translator\Facades;

use Illuminate\Support\Facades\Facade;

class ApiTranslatorFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel_translator';
    }
}