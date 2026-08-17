<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    /**
     * READ (dengan Search + Pagination)
     */
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $buku = $this->bukuModel->searchBuku($keyword)
                ->paginate(5, 'buku');
        } else {
            $buku = $this->bukuModel->orderBy('id', 'DESC')->paginate(5, 'buku');
        }

        $data = [
            'title'   => 'Daftar Buku Digital',
            'buku'    => $buku,
            'pager'   => $this->bukuModel->pager,
            'keyword' => $keyword,
        ];

        return view('buku/index', $data);
    }

    /**
     * CREATE - form
     */
    public function create()
    {
        return view('buku/create', ['title' => 'Tambah Buku']);
    }

    /**
     * CREATE - simpan
     */
    public function store()
    {
        if (!$this->validate($this->bukuModel->validationRules, $this->bukuModel->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->save([
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'kategori'     => $this->request->getPost('kategori'),
            'stok'         => $this->request->getPost('stok'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * UPDATE - form
     */
    public function edit($id)
    {
        helper('form');
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Buku tidak ditemukan');
        }

        return view('buku/edit', ['title' => 'Edit Buku', 'buku' => $buku]);
    }

    /**
     * UPDATE - simpan perubahan
     */
    public function update($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Buku tidak ditemukan');
        }

        if (!$this->validate($this->bukuModel->validationRules, $this->bukuModel->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->update($id, [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'kategori'     => $this->request->getPost('kategori'),
            'stok'         => $this->request->getPost('stok'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/buku')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * DELETE
     */
    public function delete($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Buku tidak ditemukan');
        }

        $this->bukuModel->delete($id);

        return redirect()->to('/buku')->with('success', 'Buku berhasil dihapus');
    }
}
