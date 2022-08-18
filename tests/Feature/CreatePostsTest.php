<?php
class CreatePostsTest extends FeatureTestCase   //TestCase
{    
    public function test_a_user_create_a_post()
    {
        //Having
        
        $user = $this->defaultUser();
       
        $title = 'Esta es una pregunta';
        $content = 'este es el contenido';
        $this->actingAs($user);
        
        //when
        $this->visit(route('posts.create'))
            ->type($title,'title')
            ->type($content,'content')
            ->press('Publicar');
        //Then
        $this->seeInDatabase('posts',[
            'title' => $title,
            'content' => $content,
            'pending' => true,
            'user_id' => $user->id,
        ]);
        
        //Test a user is redirected to the post details after creating it.
        $this->see($title);               
            
    }
    
}
?>