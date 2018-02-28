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
        $thread = make('App\Thread');

        $response = $this->post('/threads', $thread->toArray());

        //$this->post('/threads',$thread->toArray());
        $this->get($response->headers->get('Location'))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
    /** @test */
    public function a_thread_requires_a_title(){
        $this->publishThread(['title'=>null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_thread_requires_a_body(){
        $this->publishThread(['body'=>null])
            ->assertSessionHasErrors('body');
    }
    /** @test */
    public function a_thread_requires_a_channel_id(){
        factory('App\Channel',2)->create();
        $this->publishThread(['channel_id'=>null])
            ->assertSessionHasErrors('channel_id');
    }
    public function publishThread($override =[]){
        $this->withExceptionHandling()->signIn();
        $thread = make('App\Thread',$override);
       return $this->post('/threads', $thread->toArray());
    }
}
