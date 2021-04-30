<?php

namespace Tests\Unit;

use Huybin\Translator\Repositories\GoogleApiTranslate;
use Mockery;
use Tests\TestCase;

class GoogleTranslateTest extends TestCase
{

    public $source = 'en';
    public $target = 'vi';
    public $config;

    private $translate;

    public function setUp(): void
    {
        parent::setUp();
        $this->config = $this->app['config']->get('laravel_translator');
        $this->translate = Mockery::mock(new GoogleApiTranslate($this->config['google']['api_key']));
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    /** @test */
    public function it_will_return_google()
    {
        $response = $this->translate->getServiceName();
        $this->assertEquals($response, 'Google');
    }

    /** @test */
    public function it_can_translate_string_from_english_to_vietnamese()
    {
        $text = "Hello everyone!";
        $response = $this->translate->translate($text, 'vi', 'en');
        $this->assertEquals("Xin chào tất cả mọi người!", $response);
    }

    /** @test */
    public function it_can_translate_string_from_english_to_vietnamese_without_locale()
    {
        $text = "Hello everyone!";
        $this->translate
            ->shouldReceive('translate')->with($text, 'vi')
            ->once()
            ->andReturn('Xin chào tất cả mọi người!');
        $response = $this->translate->translate($text, 'vi');
        $this->assertEquals("Xin chào tất cả mọi người!", $response);
    }

        /** @test */
    public function it_cant_translate_string_of_null_from_english_to_vietnamese()
    {
        $text = null;
        $this->expectException("TypeError");
        $response = $this->translate->translate($text, 'vi');
    }
}