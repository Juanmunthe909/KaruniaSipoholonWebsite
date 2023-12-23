<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Hotels;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'name' => 'Kamar 1',
                'room' => '2 orang',
                'cover' => '200.jpeg',
                'price' => '200000',
                'stock' => '18',
                'description' => 'Kamar mandi di luar dan springbed 1',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 2',
                'room' => '2 orang',
                'cover' => '200.jpeg',
                'price' => '200000',
                'stock' => '18',
                'description' => 'Kamar mandi di luar dan springbed 1',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 3',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 4',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 5',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 6',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 7',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 8',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 9',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 10',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 11',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 12',
                'room' => '2 orang',
                'cover' => '250.jpeg',
                'price' => '250000',
                'stock' => '18',
                'description' => 'Kamar mandi di dalam dan 2 tempat tidur',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 13',
                'room' => '2 orang',
                'cover' => '300.jpeg',
                'price' => '300000',
                'stock' => '18',
                'description' => 'Kamar lebih besar dan extra bed 2/3',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 14',
                'room' => '2 orang',
                'cover' => '300.jpeg',
                'price' => '300000',
                'stock' => '18',
                'description' => 'Kamar lebih besar dan extra bed 2/3',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 15',
                'room' => '2 orang',
                'cover' => '300.jpeg',
                'price' => '300000',
                'stock' => '18',
                'description' => 'Kamar lebih besar dan extra bed 2/3',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 16',
                'room' => '2 orang',
                'cover' => '300.jpeg',
                'price' => '300000',
                'stock' => '18',
                'description' => 'Kamar lebih besar dan extra bed 2/3',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 17',
                'room' => '2 orang',
                'cover' => '300.jpeg',
                'price' => '300000',
                'stock' => '18',
                'description' => 'Kamar lebih besar dan extra bed 2/3',
                'category' => 'Free Wifi dan TV',
            ],
            [
                'name' => 'Kamar 18',
                'room' => '2 orang',
                'cover' => '300.jpeg',
                'price' => '300000',
                'stock' => '18',
                'description' => 'Kamar lebih besar dan extra bed 2/3',
                'category' => 'Free Wifi dan TV',
            ],
        );
        foreach ($data as $d) {
            Hotel::create([
                'name' => $d['name'],
                'room' => $d['room'],
                'cover' => $d['cover'],
                'price' => $d['price'],
                'stock' => $d['stock'],
                'description' => $d['description'],
                'category' => $d['category']
            ]);
        }
    }
}
