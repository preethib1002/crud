<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
   protected $model = Contact::class;

    public function definition()
    {
        //$gender = $faker->randomElements(['male', 'female'])[0];
        return [
           'name' => $this->faker->name,
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'mobile' => $this->faker->phoneNumber,
            'gender' => 'male',
            'dateofbirth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'zipcode' =>  $this->faker->postcode,
        ];
    }
}
