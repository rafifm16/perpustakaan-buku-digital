<?= view('templates/header') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Buku</h4>
    <a href="<?= base_url('buku') ?>" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card p-4">
    <form action="<?= base_url('buku/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="<?= set_value('judul') ?>" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="<?= set_value('penulis') ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="<?= set_value('penerbit') ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" value="<?= set_value('tahun_terbit') ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= set_value('kategori') ?>" placeholder="Novel, Sains, dll" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" value="<?= set_value('stok') ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"><?= set_value('deskripsi') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
    </form>
</div>

<?= view('templates/footer') ?>
