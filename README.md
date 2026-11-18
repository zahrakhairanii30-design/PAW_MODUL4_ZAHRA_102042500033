# Sistem Peminjaman Buku - Modul 4 (Starter Code Praktikan)

Selamat datang di proyek praktikum **Modul 4: Pengembangan Aplikasi Web - Sistem Peminjaman Buku**.

## Langkah Awal Menjalankan Proyek:
1. Pastikan server web dan database MySQL pada **XAMPP** atau **Laragon** sudah aktif.
2. Buka terminal pada folder proyek ini.
3. Jalankan perintah tautan symlink storage:
   ```bash
   php artisan storage:link
   ```
4. Buat migrasi penambahan kolom peran (`role`) pada tabel `users`:
   ```bash
   php artisan make:migration add_role_to_users_table --table=users
   ```
5. Buat migrasi penambahan kolom sampul (`cover`) pada tabel `buku`:
   ```bash
   php artisan make:migration add_cover_to_buku_table --table=buku
   ```
6. Jalankan migrasi:
   ```bash
   php artisan migrate
   ```
7. Buat middleware otorisasi peran:
   ```bash
   php artisan make:middleware RoleMiddleware
   ```
8. Lengkapi kode pada file-file bertanda `// TODO` sesuai instruksi pada modul.
9. Jalankan seeder akun default:
   ```bash
   php artisan db:seed --class=AdminSeeder
   ```
10. Jalankan server lokal:
    ```bash
    php artisan serve
    ```
11. Buka `http://127.0.0.1:8000` di peramban web.
