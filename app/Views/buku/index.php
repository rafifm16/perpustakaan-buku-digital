<?= view('templates/header') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0"><i class="bi bi-journal-bookmark-fill"></i> Daftar Buku</h4>
    <a href="<?= base_url('buku/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Buku
    </a>
</div>

<div class="card p-3 mb-3">
    <form action="<?= base_url('buku') ?>" method="get" class="row g-2">
        <div class="col-md-10">
            <input type="text" name="keyword" class="form-control"
                   placeholder="Cari judul, penulis, penerbit, atau kategori..."
                   value="<?= esc($keyword ?? '') ?>">
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-outline-primary">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($buku)): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            Tidak ada data buku ditemukan.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1 + ($pager->getPerPage('buku') * ($pager->getCurrentPage('buku') - 1)); ?>
                    <?php foreach ($buku as $b): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($b['judul']) ?></td>
                            <td><?= esc($b['penulis']) ?></td>
                            <td><?= esc($b['penerbit']) ?></td>
                            <td><?= esc($b['tahun_terbit']) ?></td>
                            <td><span class="badge bg-info text-dark"><?= esc($b['kategori']) ?></span></td>
                            <td><?= esc($b['stok']) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('buku/edit/' . $b['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="<?= base_url('buku/delete/' . $b['id']) ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus buku \'<?= esc($b['judul'], 'js') ?>\'?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    <?= $pager->links('buku', 'bootstrap5') ?>
</div>

<?= view('templates/footer') ?>
