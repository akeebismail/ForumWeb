<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 2/28/18
 * Time: 11:55 AM
 */
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChannelTest extends TestCase{
    use DatabaseMigrations;

    /**
     * @test
     */

    public function a_channel_consists_of_a_thread(){
        $this->withExceptionHandling();
       // $this->get('threa');
        $channel = create('App\Channel');
        $thread = create('App\Thread',['channel_id'=>$channel->id]);
        $this->assertTrue($channel->threads->contains($thread));
    }

}