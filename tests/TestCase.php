<?php

namespace Tests;
use App\User; 
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected $baseUrl = 'http://localhost';
    protected $defaultUser; 
    
    public function createApplication(){
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\kernel::class)->bootstrap();
        return $app;
    }
    public function defaultUser()
    {
        if ($this->defaultUser){
            return $this->defaultUser;
        }
            
        return $this->defaultUser = factory(\App\User::class)->create();
    }
}
