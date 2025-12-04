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

Identitas Pengembang
Nama: Muhammad Adin Nugroho
NPM: 50422970
Kelas: 4IA24
Mata Kuliah: Rekayasa Perangkat Lunak 2
Universitas: Gunadarma