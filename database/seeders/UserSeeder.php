<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create an admin
        User::factory()
            ->hasAttached(Role::whereIn('name', ['admin'])->get())
            ->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);

        // create a user
        User::factory()
            ->hasAttached(Role::whereIn('name', ['user'])->get())
            ->create([
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
            ]);

        // create some dummy users
        User::factory(10)->create()->each(function ($user) {
            $user->roles()->attach(
                Role::pluck('id')->except(0)->random(),
            );
        });
    }
}
