<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 3/4/18
 * Time: 11:30 AM
 */
namespace Test\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guest_cannot_favorite_reply(){
        $this->withExceptionHandling();
        $this->post('replies/1/favorites')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_favorite_a_reply(){
        $this->signIn();
        $reply = create('App\Reply');

        $this->post('replies/'.$reply->id.'/favorites');

        $this->assertCount(1, $reply->favorites);
    }

    /**
     * @test
     *
     */
    public function an_authenticated_user_can_only_favorite_a_reply_once(){
        $this->signIn();
        $reply = create('App\Reply');
        $this->post('replies/'.$reply->id.'/favorites');
        $this->post('replies/'.$reply->id.'/favorites');

        $this->assertCount(1,$reply->favorites);

    }
}