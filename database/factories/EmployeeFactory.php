<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName'=> fake()->firstName(),
            'middleName'=> fake()->lastName(),
            'lastName'=> fake()->lastName(),
            'type'=> fake()->randomElement([ 'admin','manager','supervisor','manpower' ]),
            'employment_status'=> 'Contractual',
            'birthdate'=> fake()->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d'),
            'skill'=> 'Painter',
            'skill_category'=> 'Skilled',
            'address'=> fake()->address(),
            'contact_number'=> '0912344587',
            'status'=>fake()->randomElement([ 'Active','Inactive' ]),
        ];
    }
}
