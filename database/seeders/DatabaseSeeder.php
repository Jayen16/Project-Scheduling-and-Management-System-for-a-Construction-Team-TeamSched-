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


        \App\Models\User::factory(5)->hasEmployee(['type'=>'manpower'])->asManpower()->create();
        \App\Models\User::factory(1)->hasEmployee(['type'=>'admin'])->asAdmin()->create();
        \App\Models\User::factory(1)->hasEmployee(['type'=>'supervisor'])->asSuperVisor()->create();
        \App\Models\User::factory(1)->hasEmployee(['type'=>'manager'])->asManager()->create();
    }
}
