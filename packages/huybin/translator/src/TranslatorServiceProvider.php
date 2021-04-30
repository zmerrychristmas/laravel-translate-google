<?php

namespace Huybin\Translator;

use Illuminate\Support\ServiceProvider;
use Huybin\Translator\Repositories\GoogleApiTranslate;
use Huybin\Translator\Repositories\StichozaApiTranslate;
use Huybin\Translator\Contracts\ApiTranslatorContract;
use Huybin\Translator\Helpers\TranslatorHelper;
use Huybin\Translator\ApiTranslate;

class TranslatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config/laravel_translator.php' => config_path('laravel_translator.php'),
        ]);

        app()->bind('laravel_translator', ApiTranslate::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/laravel_translator.php', 'laravel_translator');
        $config = TranslatorHelper::getConfig();
        $this->app->singleton(ApiTranslatorContract::class, function ($app) use ($config) {
            switch ($config['default_translator']) {
                case 'google':
                    return new GoogleApiTranslate($config['google']['api_key']);
                    break;
                default:
                    return new StichozaApiTranslate(null);
                    break;
            }
        });

        $this->app->singleton(ApiTranslate::class,function ($app) use ($config){
            return new ApiTranslate(
                resolve(ApiTranslatorContract::class),
                $config['api_limit_settings']['requests_per_batch'],
                $config['api_limit_settings']['sleep_time_between_batches']
            );
        });
    }
}
