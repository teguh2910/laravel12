<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PenjualBarang;

class PenjualBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualBarangs = [
            [
                'nama' => 'Toyota Sales Corporation Japan',
                'alamat' => '1-1-2 Koraku, Bunkyo-ku, Tokyo 112-8566',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Honda Trading Corporation',
                'alamat' => '2-1-1 Minami-Aoyama, Minato-ku, Tokyo 107-8556',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Aisin Trading Corporation',
                'alamat' => '2-1 Asahi-machi, Kariya, Aichi 448-8650',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Denso Sales Japan',
                'alamat' => '1-1 Showa-cho, Kariya, Aichi 448-8661',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Mitsubishi Motors Corporation',
                'alamat' => '33-8 Shiba 5-chome, Minato-ku, Tokyo 108-8410',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Nissan Motor Co., Ltd.',
                'alamat' => '1-1 Takashima 1-chome, Nishi-ku, Yokohama, Kanagawa 220-8686',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Singapore Auto Parts Trading',
                'alamat' => '150 Genting Lane, Singapore 349568',
                'negara' => 'sg',
            ],
            [
                'nama' => 'Asia Pacific Motors',
                'alamat' => '71 Pioneer Road, Singapore 628504',
                'negara' => 'sg',
            ],
            [
                'nama' => 'Southeast Auto Components',
                'alamat' => '2 Tuas Avenue 20, Singapore 638824',
                'negara' => 'sg',
            ],
            [
                'nama' => 'Pacific Rim Trading Co.',
                'alamat' => '5 Changi Business Park Vista, Singapore 486041',
                'negara' => 'sg',
            ],
        ];

        foreach ($penjualBarangs as $data) {
            PenjualBarang::create($data);
        }
    }
}
