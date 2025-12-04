Capital HR – Human Resource Management Web Application

Repository ini berisi project Capital HR, sebuah aplikasi web berbasis Laravel yang digunakan untuk pengelolaan Sumber Daya Manusia (SDM) secara modern, real-time, dan terstruktur. Aplikasi ini dikembangkan sebagai bagian dari tugas Rekayasa Perangkat Lunak 2 (RPL2).

📌 Deskripsi Aplikasi

Capital HR adalah aplikasi Human Resource Management System (HRMS) berbasis web yang memudahkan proses pengelolaan data karyawan, kehadiran, kontak, dan informasi SDM lainnya.
Aplikasi ini dapat digunakan oleh:

Karyawan/Staf: untuk melihat data diri, informasi kontak, kehadiran, dan data SDM lain yang relevan.

Admin HRD/Manajemen: untuk mengelola seluruh SDM, termasuk data karyawan, gaji, performa, dan kehadiran.

Aplikasi ini mendukung proses CRUD sederhana namun lengkap, serta dibangun dengan teknologi modern untuk mempermudah pengembangan dan pemeliharaan.

💡 Teknologi yang Digunakan
Komponen	Teknologi
Bahasa Pemrograman	PHP 8.x
Framework Backend	Laravel 11/12
Basis Data	MySQL
Frontend	Blade Template Engine, TailwindCSS
ORM	Eloquent Laravel
Autentikasi	Laravel Auth / Middleware Auth
Tools	Git, GitHub
🎯 Tujuan Aplikasi

Aplikasi ini dikembangkan untuk:

Memberikan kemudahan kepada karyawan dalam memeriksa data diri, kontak, dan kehadiran.

Memfasilitasi admin HRD dalam pengelolaan SDM: data karyawan, absensi, gaji, evaluasi kinerja, dan promosi.

Menyediakan sistem HR berbasis web yang mudah diakses, real-time, serta terstruktur.

⚙️ Batasan Masalah

Aplikasi berjalan di browser web modern.

Backend menggunakan bahasa PHP.

Framework yang digunakan adalah Laravel.

Proses CRUD dilakukan melalui antarmuka berbasis teks/form input.

📦 Fitur Utama (Kebutuhan Spesifik)

Berikut daftar fitur lengkap beserta kebutuhan sistemnya.

1. Login & Session Management

Fitur:

Autentikasi user.

Validasi kredensial login.

Logout.

Proteksi halaman menggunakan middleware auth.

Hak akses berdasarkan role: Admin HR & Karyawan.

Antarmuka:

Form login (email/username & password).

Tampilan error apabila login gagal.

Teknis Implementasi:

Laravel Auth

Middleware auth

Model User

Hash password

Validasi FormRequest

2. CRUD Data Karyawan

Fitur:

Tambah data karyawan.

Lihat daftar karyawan.

Update data.

Hapus data.

Validasi input.

Pagination dan sorting.

Pencarian sederhana.

Antarmuka:

Tabel daftar karyawan.

Form Add/Edit/Delete.

Teknis Implementasi:

Migration employees

Eloquent ORM

Controller EmployeeController

Route resource

Relasi dengan tabel lain (presence, performance, dsb.)

3. Pencatatan Kehadiran (Absensi)

Fitur:

Input status hadir/izin/sakit per tanggal.

Catatan tambahan untuk setiap absensi.

Rekap bulanan per karyawan.

Validasi agar tanggal tidak duplikat.

Antarmuka:

Form absensi.

Tabel rekap.

Filter tanggal/bulan.

Teknis Implementasi:

Migration attendances

Relasi belongsTo dengan employees

Policy untuk hak akses

Query filter tanggal

4. Dashboard Ringkasan

Fitur:

Tampilan metrik cepat:

Total karyawan

Kehadiran hari ini

Jumlah izin/sakit

Daftar update terbaru

Antarmuka:

Halaman dashboard dengan cards dan tabel.

Teknis Implementasi:

Controller DashboardController

Query agregasi

Blade components

🗂️ Struktur Folder Project (Ringkasan)
/app
    /Models
    /Http/Controllers
/resources
    /views
    /components
/database
    /migrations
/public
/routes
    web.php
README.md
composer.json

🚀 Cara Menjalankan Project
1. Clone Repository
git clone https://github.com/Adin-ho/rpl2_act7
cd rpl2_act7

2. Install Dependencies
composer install
npm install

3. Konfigurasi Environment

Duplikat file .env.example menjadi .env:

cp .env.example .env


Lalu isi konfigurasi database MySQL:

DB_DATABASE=capital_hr
DB_USERNAME=root
DB_PASSWORD=

4. Generate Key
php artisan key:generate

5. Migrasi Database
php artisan migrate

6. Jalankan Server
php artisan serve


Aplikasi dapat diakses di:

👉 http://localhost:8000