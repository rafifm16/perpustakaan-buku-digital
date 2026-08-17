<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'buku';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'judul', 'penulis', 'penerbit', 'tahun_terbit',
        'kategori', 'stok', 'deskripsi',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'judul'        => 'required|min_length[3]|max_length[150]',
        'penulis'      => 'required|min_length[3]|max_length[100]',
        'penerbit'     => 'required|max_length[100]',
        'tahun_terbit' => 'required|numeric',
        'kategori'     => 'required|max_length[50]',
        'stok'         => 'required|numeric',
    ];

    protected $validationMessages = [
        'judul' => [
            'required'   => 'Judul buku wajib diisi',
            'min_length' => 'Judul buku minimal 3 karakter',
        ],
        'penulis' => [
            'required' => 'Nama penulis wajib diisi',
        ],
        'tahun_terbit' => [
            'required' => 'Tahun terbit wajib diisi',
            'numeric'  => 'Tahun terbit harus berupa angka',
        ],
        'stok' => [
            'required' => 'Stok wajib diisi',
            'numeric'  => 'Stok harus berupa angka',
        ],
    ];

    /**
     * Fitur pencarian buku berdasarkan judul, penulis, penerbit, atau kategori.
     */
    public function searchBuku(string $keyword)
    {
        return $this->groupStart()
            ->like('judul', $keyword)
            ->orLike('penulis', $keyword)
            ->orLike('penerbit', $keyword)
            ->orLike('kategori', $keyword)
            ->groupEnd();
    }
}
