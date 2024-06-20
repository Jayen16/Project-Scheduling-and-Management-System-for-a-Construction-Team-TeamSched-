<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function asAdmin(): static
    {

        return $this->state(fn (array $attributes) => [
            'username'=> 'admin',
            'password'=> 'admin',

        ])->afterCreating(function (User $user) {
            $user->addRole('admin'); 
        });
    }

    public function asManpower(): static
    {

        return $this->state(fn (array $attributes) => [
            'username'=> 'manpower',
            'password'=> 'manpower',

        ])->afterCreating(function (User $user) {
            $user->addRole('manpower'); 
        });
    }
    
    public function asSuperVisor(): static
    {
        return $this->state(fn (array $attributes) => [

            'username'=> 'supervisor',
            'password'=> 'supervisor',

        ])->afterCreating(function (User $user) {
            $user->addRole('supervisor'); 
        });
    }
    
    public function asManager(): static
    {

        return $this->state(fn (array $attributes) => [
            'username'=> 'manager',
            'password'=> 'manager',
        ])->afterCreating(function (User $user) {
            $user->addRole('manager'); 
        });
    }

    
}
