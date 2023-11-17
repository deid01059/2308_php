<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase; //테스트후 DB롤백(기존상태로초기화) 해주는것
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{
    // php artisan make:test 테스트파일명
    // 테스트파일명의 끝이 Test로 끝날 것
    use RefreshDatabase; //테스트 완료후 DB 초기화를 위한 트레이드

    // 게스트로 리다이렉트했을때
    public function test_index_게스트_리다이렉트(){
        $response = $this->get('/board');
        $response->assertRedirect('/user/login');
    }

}
