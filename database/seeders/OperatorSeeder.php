<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Operator',
                'fullname' => 'Operator',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'operator',
            ]
        );
        foreach ($data as $d) {
            User::create([
                'name' => $d['name'],
                'fullname' => $d['fullname'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role' => $d['role'],
            ]);
        }
    }
}
