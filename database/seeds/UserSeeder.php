<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'slug' => Str::slug('admin'),
            'email' => 'admin@tokoku.com',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'ASP',
            'slug' => Str::slug('ASP'),
            'email' => 'silpeh@gmail.com',
            'password' => bcrypt('silvi123')
        ]);

        $user->assignRole('user');
    }
}
