<?php

namespace Tests\Feature\integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostIntegrationTest extends TestCase
{
    //use DatabaseTransactions;
    
    public function test_a_slug_is_generated_and_save_to_the_database()
    {
        
        $user =$this->defaultUser();
        
        $post = factory(Post::class)->make([
            'title' => 'como instalar Laravel',
        ]);
        
        /*$post = new Post([
           'user_id' => $user->id,
        ]);*/
        
        $user->$posts()->save($post);
        
        $this->assertSame(
            'como-instalar-laravel',
             $post->fresh()->slug
        );
        
        /* $this->seeInDatabase('post',[
         'slug' => 'como-instalar-laravel'
         ]);*/
                
        //$post = Post::first();
        
       /* $this->assertSame(
            'como-instalar-laravel',
            $post->freshs()->lug
        );*/
    }
}
