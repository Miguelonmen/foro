<?php

namespace Tests\Feature\features;

//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Tests\TestCase;
//use Illuminate\Contracts\Container\BindingResolutionException;

class ShowPostTest extends FeatureTestCase
{
    public function test_a_user_can_see_the_post_details(){
        
          
        //Having
        $user = $this->defaultUser([
            'name' => 'Miguel',
        ]);
        
        $post = factory(\App\Post::class)->make([
            'title' => 'Este es el titulo del post',
            'content' => 'Este es el contenido del post'
        ]);
        
        $user->posts()->save($post);
        
        //dd($post->url);
        //When
        $this->visit($post->url)
            ->seeInElement('h1',$post->title)
            ->see($post->content)
            ->see($user->name);        
    }
    public function test_old_urls_are_redirected(){
        //Having
        $user = $this->defaultUser();
        
        $post = factory(\App\Post::class)->make([
            'title' => 'Old  title',
        ]);
        
        $user->post()->save($post);
        
        $url = $post->url;
        
        $post->update(['title' => 'New title']);
        
        $this->visit($url)
             ->seePageIs($post->$url);
    }
}
