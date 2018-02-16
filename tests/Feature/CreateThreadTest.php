<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function guest_may_not_create_threads(){
        $this->withExceptionHandling();

        $this->get('/threads/create')
            ->assertRedirect('/login');
        $this->post('/threads')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_auth_user_can_create_new_forum_threads(){
        //Given a signed in user
        $this->signIn();
        //when hit the endpoint to create a new thread
        $thread = create('App\Thread');

        $this->post('/threads',$thread->toArray());
        //then, when we visit the thread page.
        //we should see the new thread
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
