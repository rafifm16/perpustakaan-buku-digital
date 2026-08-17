<?php helper('form'); ?>
<?= view('templates/header') ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-5 col-lg-4">
        <div class="card p-4">
            <div class="text-center mb-3">
                <i class="bi bi-book-half" style="font-size: 2.5rem; color:#0d6efd;"></i>
                <h4 class="mt-2 mb-0">Perpustakaan Buku Digital</h4>
                <small class="text-muted">Silakan login untuk melanjutkan</small>
            </div>
            <form action="<?= base_url('login') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                           value="<?= set_value('username') ?>" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>
            <!-- <hr>
            <small class="text-muted text-center d-block">
                Akun demo: <b>admin</b> / <b>admin123</b>
            </small> -->
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
