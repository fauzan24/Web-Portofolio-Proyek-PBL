**PortoLearn — README**

Deskripsi singkat
- **PortoLearn**: Aplikasi ini dirancang sebagai ruang pribadi bagi setiap mahasiswa untuk membangun dan mengelola portofolio digital secara terstruktur yang memuat deskripsi proyek, tangkapan layar, kode sumber, serta video demonstrasi. Melalui aplikasi ini, mahasiswa dapat melacak perkembangan pembelajaran secara berkelanjutan dan membagikan hasil proyek kepada dosen sebagai bahan evaluasi dan penilaian. Selain itu, portofolio digital yang dihasilkan dapat dimanfaatkan sebagai aset profesional yang mendukung pengembangan karier mahasiswa di masa depan, dengan dukungan fitur pengorganisasian proyek berdasarkan semester maupun mata kuliah agar pengelolaan dan penelusuran proyek menjadi lebih sistematis dan efisien. ringkas

Instalasi
- **Sistem**: Windows (Laragon direkomendasikan) atau LAMP/AMP stack dengan PHP 7.x/8.x dan MySQL.
- **Langkah 1 — Salin berkas:** Tempatkan seluruh folder proyek ke direktori web server (mis. `C:/laragon/www/portolearn`).
- **Langkah 2 — Impor database:** Impor salah satu file SQL yang tersedia (`portolearn (1).sql` atau `portolearn (2).sql`) ke MySQL melalui phpMyAdmin atau CLI.
- **Langkah 3 — Konfigurasi koneksi:** Buka [koneksi.php](koneksi.php) dan sesuaikan `host`, `username`, `password`, dan `database` sesuai lingkungan Anda.
- **Langkah 4 — Jalankan aplikasi:** Akses aplikasi di browser: `http://localhost/portolearn/`.

Penggunaan singkat
- **Login:** Gunakan halaman [login.php](login.php) untuk masuk.
- **Dashboard:** Peran pengguna memiliki dashboard masing-masing:
  - Admin: [admin/dashboard_admin.php](admin/dashboard_admin.php)
  - Dosen: [dosen/dashboard_dosen.php](dosen/dashboard_dosen.php)
  - Mahasiswa: [mahasiswa/dashboard_mahasiswa.php](mahasiswa/dashboard_mahasiswa.php)

Fitur Utama
- **Manajemen pengguna:** Tambah/edit/hapus dosen dan mahasiswa via folder `admin` (mis. [admin/kelola_user.php](admin/kelola_user.php)).
- **Input proyek mahasiswa:** Mahasiswa dapat menambah proyek di [mahasiswa/form_tambah_proyek.php](mahasiswa/form_tambah_proyek.php) dan mengelola proyeknya.
- **Penilaian & komentar dosen:** Dosen melihat detail proyek dan memberi nilai/komentar melalui [dosen/form_penilaian_dosen.php](dosen/form_penilaian_dosen.php) dan [dosen/simpan_komentar.php](dosen/simpan_komentar.php).
- **Profil & autentikasi:** Pengaturan akun dan ganti password di [kelola_akun/ganti_password.php](kelola_akun/ganti_password.php) dan prosesnya di [kelola_akun/proses_ganti_password.php](kelola_akun/proses_ganti_password.php).

File penting (lokasi)
- **Koneksi DB:** [koneksi.php](koneksi.php)
- **Login:** [login.php](login.php) dan [proses_login.php](proses_login.php)
- **Template umum:** [template/header.php](template/header.php), [template/footer.php](template/footer.php), [template/sidebar.php](template/sidebar.php), [template/topbar.php](template/topbar.php)
- **Folder aset:** `asset/bootstrap/` berisi CSS/JS Bootstrap untuk tampilan.

Alur singkat penggunaan
- Mahasiswa menambah proyek → Dosen membuka [detail_projek.php](dosen/detail_projek.php) atau [detail_proyek.php](mahasiswa/detail_proyek.php) → Dosen memberi nilai/komentar → Nilai disimpan via [dosen/simpan_nilai.php](dosen/simpan_nilai.php).

Troubleshooting umum
- Jika muncul error koneksi database: periksa pengaturan di [koneksi.php](koneksi.php) dan apakah database sudah diimpor.
- Jika tampilan tidak rapi: pastikan `asset/bootstrap/css/bootstrap.min.css` dan `asset/bootstrap/js/bootstrap.bundle.min.js` dapat diakses.
- Periksa hak akses file/permission jika upload atau simpan data gagal.

Keamanan & catatan
- File [koneksi.php](koneksi.php) berisi kredensial DB — jangan commit kredensial sensitif ke repo publik.
- Pastikan input user divalidasi dan gunakan prepared statements untuk mencegah SQL injection.

Langkah berikut yang direkomendasikan
- Tambahkan file `README.md` ini ke repo (sudah ditambahkan).
- Jika ingin, saya bisa: menambahkan instruksi pengaturan akun admin default, memperbarui dokumentasi fungsi utama, atau menyiapkan skrip instal otomatis.

Kontak / Bantuan
- Beri tahu saya langkah mana yang ingin Anda perbaiki atau tambahkan dokumentasinya.
