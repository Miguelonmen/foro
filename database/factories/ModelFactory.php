<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
$factory->define(App\User::class,function (Faker\Generator $faker){
   static $password;
   return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'password' => $password ?: $password = bcrypt('secret'),
       'remember_token' => str_random(10),   
   ];
});

$factory->define(App\Post::class,function (Faker\Generator $faker){
       return [
            'title' => $faker->sentence,
            'content' => $faker->paragraph,
           'pending' => $faker->boolean()
           //'user_id' => 
        ];
 });

class ModelFactory extends Factory
{
    
    public function definition()
    {
        return [
            //
        ];
    }
}
