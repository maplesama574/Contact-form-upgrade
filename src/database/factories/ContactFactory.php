<?php

namespace Database\Factories;

use App\Models\Contact;         
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['男性', '女性', 'その他']),
            'tel' => $this->faker->numerify('0##########'), 
            'address' => $this->faker->address(),             
            'building' => $this->faker->secondaryAddress(),  
            'department' => $this->faker->randomElement([
    '1.商品のお届けについて',
    '2.商品の交換について',
    '3.商品トラブル',
    '4.ショップへのお問い合わせ',
    '5.その他'
            ]),
            
            'message' => $this->faker->text(120),
        ];
    }
}
