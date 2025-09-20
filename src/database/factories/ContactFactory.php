<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition()
    {
        return [
            'name'=>$this->faker->name, 
            'email'=>$this->faker->safeEmail, 
            'gender'=>$this->faker->randomElement(['男性', '女性', 'その他']), 
            'department'=>$this->faker->numberBetween(1,5), 
            'message'=>$this->faker->paragraph, 
        ];
    }
}
