<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Bus::insert([
            [
                'name' => 'Sagara Bus',
                'class' => 'Economy',
                'image' => '/bus/sagara-bus.jpg',
                'price' => '240000',
                'facility' => json_encode([
                    '1. AC Standar',
                    '2. Kursi Reclining',
                    '3. Televisi',
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hyperlane Bus',
                'class' => 'Executive',
                'image' => '/bus/hyperlane-bus.jpg',
                'price' => '350000',
                'facility' => json_encode([
                    '1. AC Premium',
                    '2. Kursi Reclining lebar',
                    '3. Free WIFI',
                    '4. Toilet',
                    '5. Stopover 1x',
                    '6. Televisi LED 32 inch',
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Stanpede Bus',
                'class' => 'Luxury',
                'image' => '/bus/stanpede-bus.jpeg',
                'price' => '480000',
                'facility' => json_encode([
                    '1. AC Premium ',
                    '2. Kursi Bed',
                    '3. Free WIFI',
                    '4. Toilet Premium',
                    '5. Stopover 2x',
                    '6. Selimut ',
                    '7. Makanan Ringan',
                    '8. Televisi LED 42 inch',
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
