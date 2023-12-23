<?php

namespace Database\Seeders;

use App\Models\Toilet;
use Illuminate\Database\Seeder;

class ToiletSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'title' => 'Kamar Mandi 1 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 2 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 3 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 4 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 5 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 6 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 7 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 8 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 9 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kamar Mandi 10 ',
                'cover' => 'pemandian.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],
            [
                'title' => 'Kolam',
                'cover' => 'kolam.jpeg',
                'price' => '5000',
                'stock' => '10',
                'description' => 'Sangat la bersih',
            ],


        );
        foreach ($data as $d) {
            Toilet::create([
                'title' => $d['title'],
                'cover' => $d['cover'],
                'price' => $d['price'],
                'stock' => $d['stock'],
                'description' => $d['description'],
            ]);
        }
    }
}
