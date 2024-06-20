<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);


        \App\Models\User::factory(3)->hasEmployee(['type' => 'manpower', 'status' => 'Active'])->asManpower()->create();
        \App\Models\User::factory(1)->hasEmployee(['type' => 'admin', 'status' => 'Active'])->asAdmin()->create();
        \App\Models\User::factory(1)->hasEmployee(['type' => 'supervisor', 'status' => 'Active'])->asSuperVisor()->create();
        \App\Models\User::factory(1)->hasEmployee(['type' => 'manager', 'status' => 'Active'])->asManager()->create();

    }
}
