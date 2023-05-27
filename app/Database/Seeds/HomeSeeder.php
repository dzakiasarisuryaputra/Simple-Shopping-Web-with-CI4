<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HomeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_brg' => 'Brokoli',
                'deskripsi' => 'Sayur kribo bermanfaat!',
                'gambar' => '...'
            ],
            [
                'nama_brg' => 'Timun',
                'deskripsi' => 'Sayur segar penghilang pedas!',
                'gambar' => '...'
            ],
            [
                'nama_brg' => 'Kol',
                'deskripsi' => 'Sayuran menyegarkan mantap',
                'gambar' => '...'
            ]
        ];
        $this->db->table('home')->insertBatch($data);
    }
}
