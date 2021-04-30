<?php

namespace Huybin\Translator\Repositories;

use Google\Cloud\Translate\V2\TranslateClient;
use Huybin\Translator\Contracts\ApiTranslatorContract;

class GoogleApiTranslate implements ApiTranslatorContract
{
    public $handle;

    public function __construct($api_key)
    {
        $this->handle = new TranslateClient([
            'key' => $api_key
        ]);

    }

    public function getServiceName(): string
    {
    	return 'Google';
    }

    public function translate(string $text, string $locale, string $base_locale = null): string
    {
        if ($base_locale === null) {
            $detectLanguages = $this->handle->detectLanguage($text);
            if (is_array($detectLanguages) && isset($detectLanguages['languageCode']))
                $result = $this->handle->translate($text, [
                    'source' => $detectLanguages['languageCode'],
                    'target' => $locale
                ]);
            else 
                $result = $this->handle->translate($text, [
                    'target' => $locale
                ]);
        } else {
            $result = $this->handle->translate($text, [
                'source' => $base_locale,
                'target' => $locale
            ]);
        }
        return $result['text'];
    }
}