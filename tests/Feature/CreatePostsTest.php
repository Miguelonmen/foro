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
    
    public function test_creating_a_post_require_authentication()
    {
        //when
        $this->visit(route('posts.create'))
             ->seePageIs(route('login'));
        //Then
        //$this->seePageIs(route('login'));
          
    }
    
    public function test_create_post_form_validation(){
        //When
        $this->actingAs($this->defaultUser())
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeErrors([
                'title' => 'El campo titulo es obligatorio',
                'content' => 'El campo content es obligatorio'
            ]);
            //->seeInElement('#field_title.has-error .help-block','El campo titulo es obligatorio')
            //->seeInElement('#field_content.has-error .help-block','El campo contenido es obligatorio');
    }
    
}
?>