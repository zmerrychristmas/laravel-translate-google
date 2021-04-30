<?php

namespace Huybin\Translator\Traits;


trait ApiLimit
{
    protected $request_count = 0;
    protected $request_per_sec;
    protected $sleep_for_sec;

    protected function apiLimitCheck()
    {
        if ($this->request_count >= $this->request_per_sec) {
            sleep($this->sleep_for_sec);
            $this->request_count = 0;
        }
        $this->request_count++;
    }
}