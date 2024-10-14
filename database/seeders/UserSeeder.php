<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Biro Hukum',
                'email' => 'hukum@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Perwakilan Unit Kerja',
                'email' => 'perwakilan@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Karo HKH',
                'email' => 'karohkh@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Sekretaris Jendral',
                'email' => 'sekretarisjendral@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Pimpinan',
                'email' => 'pimpinan@example.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
