<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'     => 'admin',
            'password'     => password_hash('admin123', PASSWORD_DEFAULT),
            'nama_lengkap' => 'Administrator Perpustakaan',
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ];

        // Cegah duplikat jika seeder dijalankan berkali-kali
        $exists = $this->db->table('users')->where('username', 'admin')->get()->getRow();
        if (!$exists) {
            $this->db->table('users')->insert($data);
        }
    }
}
