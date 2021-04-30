<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTranslatorTest extends TestCase
{
    /**
     * Test get Client translate
     *
     * @return void
     */
    public function testGetClient()
    {
        $config = $this->app['config']->get('laravel_translator');
        if ($config['default_translator'] == 'google') {
            $this->get('/api/api-translate')
                ->assertJson([
                 "status" => 200,
                 "Service" => "Google"
            ]);
        } else if($config['default_translator'] == 'stichoza') {
            $this->get('/api/api-translate')
                ->assertJson([
                 "status" => 200,
                 "Service" => "Stichoza"
            ]);
        }

    }

    /**
     * Test translate from english to vietnamese
     *
     * @return void
     */
    public function testTranslate()
    {
        $response = $this->json('post', '/api/translate', ['text' => 'Hello everyone!'])
                ->assertJson([
                    "success" => true,
                    "error" => null,
                    "translation" => "Xin chào tất cả mọi người!"
                ]);
        $this->assertEquals(200, $response->status());
    }

    /**
     * Test translate from english to vietnamese with text length: 1638 character
     * 
     * @return void
     */
    public function testTranslateLongtext()
    {
        $text = 'where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.where good ideas find you.';
        $response_text = 'nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi nào tốt ý tưởng tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi nào tốt ý tưởng tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi nào tốt tôi deas find you. where good idea find you. where good idea find you. where good idea find you. where good idea find you. where good idea find you. where good idea find you. where good idea find you. Where good idea find you. bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn. nơi ý tưởng tốt tìm thấy bạn.';
        $response = $this->json('post', '/api/translate', ['text' => $text])
                ->assertJson([
                    "success" => true,
                    "error" => null,
                    "translation" => $response_text
                ]);
        $this->assertEquals(200, $response->status());
    }

    public function testTranslateSymbol()
    {
        $response = $this->json('post', '/api/translate', ['text' => '𝔞𝔰'])
            ->assertJson([
                "success" => true,
                "error" => null,
                "translation" => '𝔞𝔰'
            ]);
        $this->assertEquals(200, $response->status());
    }
}