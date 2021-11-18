<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /*public function testIndex()
    {
        $response = $this->get('/user');

//        $content = $response->baseResponse->getContent();

        $response->assertStatus(200);
    }*/

    public function testStore()
    {
        $uri = $this->getApiHost() . '/user';
        $body = [
            'name' => 'cheolwon lee',
            'email' => 'chlwn.lee@gmail.com',
            'password' => 'secret',
        ];
//        $body = json_encode($body);
//        $response = $this->post($uri, $body, [
//            'content-type' => 'application/json'
//        ]);

        $response = $this->postJson($uri, $body);
        $response->assertStatus(201);
    }

    private function getApiHost(string $scheme = 'http')
    {
        return sprintf("%s://%s", $scheme, env('API_DOMAIN'));
    }
}
