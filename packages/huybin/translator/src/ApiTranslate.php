<?php

namespace Huybin\Translator;


use Huybin\Translator\Contracts\ApiTranslatorContract;
use Huybin\Translator\Traits\ApiLimit;

class ApiTranslate
{
    use ApiLimit;

    protected $translator;

    public function __construct(ApiTranslatorContract $translator, $request_per_second, $sleep_for_sec)
    {
        $this->translator = $translator;
        $this->request_per_sec = $request_per_second;
        $this->sleep_for_sec = $sleep_for_sec;
    }

    public function translate($text, $locale, $base_locale = null) : string
    {
        $this->apiLimitCheck();
        return $this->translator->translate($text, $locale, $base_locale);
    }

    public function getServiceName()
    {
        return $this->translator->getServiceName();
    }
}
