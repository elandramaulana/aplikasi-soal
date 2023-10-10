<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $jsonData = file_get_contents('D:\Tugas Iqbal\Unand\Neo\Project\aplikasi-soal\User.json');
        $data = json_decode($jsonData, true);

        foreach ($data as $user) {
            User::create([
                'nim' => $user['nim'],
                'nip' => $user['nip'],
                'email' => $user['email'],
                'name' => $user['name'],
                'password' => Hash::make($user['password']), // Hash the password before saving to the database
                'role' => $user['role'], // You can directly insert the 'role' field even if it's not used in the register function
            ]);
        }
    }
}

