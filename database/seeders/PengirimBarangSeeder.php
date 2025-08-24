<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PengirimBarang;

class PengirimBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengirimBarangs = [
            [
                'nama' => 'Toyota Motor Corporation',
                'alamat' => '1 Toyota-Cho, Toyota City, Aichi Prefecture 471-8571',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Honda Motor Co., Ltd.',
                'alamat' => '2-1-1 Minami-Aoyama, Minato-ku, Tokyo 107-8556',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Aisin Corporation',
                'alamat' => '2-1 Asahi-machi, Kariya, Aichi 448-8650',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Denso Corporation',
                'alamat' => '1-1 Showa-cho, Kariya, Aichi 448-8661',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Sumitomo Wiring Systems',
                'alamat' => '4-1-1 Kandaizumi-cho, Yokkaichi, Mie 510-0298',
                'negara' => 'jp',
            ],
            [
                'nama' => 'Tuas Power Supply Pte Ltd',
                'alamat' => '25 Tuas Avenue 20, Singapore 638824',
                'negara' => 'sg',
            ],
            [
                'nama' => 'Jurong Engineering Limited',
                'alamat' => '1 Jurong Island Highway, Singapore 627833',
                'negara' => 'sg',
            ],
            [
                'nama' => 'PSA Corporation Limited',
                'alamat' => '460 Alexandra Road, PSA Building Singapore 119963',
                'negara' => 'sg',
            ],
            [
                'nama' => 'Keppel Corporation',
                'alamat' => '1 HarbourFront Avenue, Keppel Bay Tower Singapore 098632',
                'negara' => 'sg',
            ],
            [
                'nama' => 'Sembcorp Marine',
                'alamat' => '80 Tuas South Boulevard, Singapore 637051',
                'negara' => 'sg',
            ],
        ];

        foreach ($pengirimBarangs as $data) {
            PengirimBarang::create($data);
        }
    }
}
