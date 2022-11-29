<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       // $gender = $faker->randomElement(['male', 'female']);
       $status=['hot','cold','warm'];
        return [
            'name'=>$this->faker->company(),
            'business_type_id'=>$this->faker->randomElement([1,2]),
            'phone1'=>$this->faker->phoneNumber(),
            'phone2'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->unique()->safeEmail,
            'state_id'=>$this->faker->numberBetween(1,59),
            'town'=>$this->faker->city,
            'zip_code'=>$this->faker->postcode(),
            'address'=>$this->faker->address,
            'status'=>$this->faker->randomElement($status),
            
        ];
    }
}
