<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'kategori' => 'Novel', 'stok' => 5, 'deskripsi' => 'Kisah persahabatan anak-anak Belitung.', 'created_at' => $now, 'updated_at' => $now],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'penerbit' => 'Hasta Mitra', 'tahun_terbit' => 1980, 'kategori' => 'Sejarah', 'stok' => 3, 'deskripsi' => 'Novel sejarah era kolonial Belanda.', 'created_at' => $now, 'updated_at' => $now],
            ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'penerbit' => 'Kompas', 'tahun_terbit' => 2018, 'kategori' => 'Pengembangan Diri', 'stok' => 8, 'deskripsi' => 'Pengantar filsafat Stoic untuk kehidupan modern.', 'created_at' => $now, 'updated_at' => $now],
            ['judul' => 'Clean Code', 'penulis' => 'Robert C. Martin', 'penerbit' => 'Prentice Hall', 'tahun_terbit' => 2008, 'kategori' => 'Teknologi', 'stok' => 4, 'deskripsi' => 'Panduan menulis kode yang bersih dan rapi.', 'created_at' => $now, 'updated_at' => $now],
            ['judul' => 'Atomic Habits', 'penulis' => 'James Clear', 'penerbit' => 'Avery', 'tahun_terbit' => 2018, 'kategori' => 'Pengembangan Diri', 'stok' => 6, 'deskripsi' => 'Membangun kebiasaan baik secara bertahap.', 'created_at' => $now, 'updated_at' => $now],
            ['judul' => 'Sapiens', 'penulis' => 'Yuval Noah Harari', 'penerbit' => 'Harper', 'tahun_terbit' => 2011, 'kategori' => 'Sains', 'stok' => 2, 'deskripsi' => 'Sejarah singkat umat manusia.', 'created_at' => $now, 'updated_at' => $now],
        ];

        $this->db->table('buku')->insertBatch($data);
    }
}
