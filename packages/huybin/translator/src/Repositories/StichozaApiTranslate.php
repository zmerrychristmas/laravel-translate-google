<?php

namespace Huybin\Translator\Repositories;


use Stichoza\GoogleTranslate\GoogleTranslate;
use Huybin\Translator\Contracts\ApiTranslatorContract;

class StichozaApiTranslate implements ApiTranslatorContract
{
    public $handle;

    public function __construct($api_key = null)
    {
        $this->handle = new GoogleTranslate(); // Can use another translate like yandex
    }

    public function getServiceName(): string
    {
        return 'Stichoza';
    }

    public function translate(string $text, string $locale, string $base_locale = null): string
    {
        if ($base_locale === null)
            $this->handle->setSource();
        else
            $this->handle->setSource($base_locale);
        $this->handle->setTarget($locale);
        try {
            return $this->handle->translate($text);
        } catch (\ErrorException $e) {
            return false;
        }
    }
}