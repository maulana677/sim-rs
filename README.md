<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Panduan Penggunaan Website

1. <b>Clone project di repositori public</b>

-   Buka terminal atau command prompt.
-   Kloning repository dari GitHub dengan menggunakan perintah git clone.

    <b>git clone https://github.com/maulana677/sim-rs</b>.

2. <b>Install Dependensi dengan Composer</b>

-   Masuk ke direktori proyek yang baru saja Anda kloning,

    <b>cd sim-rs</b> atau sesuai dengan nama folder yang anda buat.

-   Jalankan Composer untuk menginstal semua dependensi PHP yang diperlukan oleh Laravel.

    <b>composer install</b>

3. <b>Konfigurasi File .env</b>

-   Salin file .env.example menjadi .env

    <b>cp .env.example .env</b>

-   Buka file .env dan sesuaikan konfigurasi yang diperlukan seperti koneksi database, dll.

4. <b>Generate Application Key</b>

-   Generate application key yang digunakan oleh Laravel untuk enkripsi.

    <b>php artisan key:generate</b>

5. <b>Migrate Database</b>

-   Jalankan migrasi untuk membuat tabel-tabel di database sesuai dengan skema yang telah didefinisikan.

    <b>php artisan migrate</b>

    <b>php artisan db:seed</b>

6. <b>Install Dependencies</b>

-   Jalankan perintah

    <b>npm install</b>
    <b>npm run dev</b>

7. <b>Jalankan Server Development</b>

-   Untuk menjalankan server development Laravel, gunakan perintah berikut.

    <b>php artisan serve</b>
