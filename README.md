# Website Perpustakaan Buku Digital

Aplikasi web sederhana untuk mengelola data buku digital, dibuat dengan
**CodeIgniter 4** dan **MySQL**. Fitur:

- CRUD (Create, Read, Update, Delete) data buku
- Login & Logout menggunakan Session
- Searching (pencarian judul/penulis/penerbit/kategori) + Pagination

## 0. Requirements

- PHP 8.2.12
- Composer 2.10.2
- MySQL / MariaDB
- XAMPP (PHP 8.2.12)

## 1. Migration

```bash
php spark migrate
php spark db:seed UserSeeder
php spark db:seed BukuSeeder
```

Perintah di atas akan membuat tabel `users` & `buku`, membuat akun admin
default (**username: `admin`**, **password: `admin123`**), dan mengisi
beberapa contoh data buku.

## 2. Jalankan server

```bash
php spark serve
```

Buka browser ke `http://localhost:8080`. Kamu akan diarahkan ke halaman
login. Login dengan akun `admin` / `admin123`, lalu kamu bisa langsung
CRUD data buku, mencoba fitur pencarian, dan pagination-nya.

---

## 3. Struktur fitur yang dinilai

| Fitur                  | Lokasi Kode                                                         |
| ---------------------- | ------------------------------------------------------------------- |
| Create                 | `Buku::create()` + `Buku::store()`, view `buku/create.php`          |
| Read                   | `Buku::index()`, view `buku/index.php`                              |
| Update                 | `Buku::edit()` + `Buku::update()`, view `buku/edit.php`             |
| Delete                 | `Buku::delete()`                                                    |
| Session (login/logout) | `Auth.php`, `AuthFilter.php`, route group `filter => 'auth'`        |
| Searching              | `BukuModel::searchBuku()`, dipanggil dari `Buku::index()`           |
| Pagination             | `$this->bukuModel->paginate(5, 'buku')` + `$pager->links()` di view |

---
