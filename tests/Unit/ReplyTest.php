<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     * @test
     * @return void
     */
    function it_has_an_owner(){
        $reply = factory('App\Reply')->create();
        $this->assertInstanceOf('App\User',$reply->owner);
    }

}
