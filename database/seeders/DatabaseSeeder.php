<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);

        $role = Role::create(['name'=> 'Admin']);
        \App\Models\User::first()->assignRole($role);
        $user->assignRole($role);
    }
}
