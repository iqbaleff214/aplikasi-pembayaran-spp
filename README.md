<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://avatars.githubusercontent.com/u/87377917?s=200&v=4" width="200" alt="404NFID Logo"></a></p>


## Aplikasi Pembayaran SPP

## Database Schema / Skema Database
<img src="https://github.com/iqbaleff214/aplikasi-pembayaran-spp/blob/main/screenshots/database.png" alt="database schema">

## Installation / Instalasi
Pastikan versi php Anda telah mendukung Laravel 10. Setelah repo ini diclone, bukalah CLI dan posisikan direktori aktif ke repo ini.

### Manual Setup
Jalankan perintah berikut untuk menginstal dependensi php
```
composer install
```
Jalankan perintah berikut untuk mengatur _environment variable_
```
cp .env.example .env
```
Pastikan Anda telah membuat database baru di MySQL dan silakan sesuaikan file `.env` dengan database Anda (harus membuat database-nya terlebih dahulu).
Jalankan perintah berikut untuk membuat _key_ untuk web app Anda
```
php artisan key:generate
```
Jalankan perintah berikut untuk menghubungkan folder public Anda dengan storage
```
php artisan storage:link
```
Jalankan perintah berikut untuk membuat skema database
```
php artisan migrate --seed
```
Kemudian jalankan perintah berikut
```
npm install && npm run build
```
Terakhir, jalankan perintah berikut untuk menyalakan web server bawaan laravel
```
php artisan serve
```
Setelah perintah di atas dijalankan, web app Anda bisa sudah bisa diakses

## Login
Untuk login aplikasi silakan masukkan username dan password berikut

| Username | iqbaleff214 |
|----------|-------------|
| Password | admin       |

## Screenshot
<img src="https://github.com/iqbaleff214/aplikasi-pembayaran-spp/blob/main/screenshots/ss-1.png" alt="screenshot aplikasi">

<br>

<img src="https://github.com/iqbaleff214/aplikasi-pembayaran-spp/blob/main/screenshots/ss-2.png" alt="screenshot aplikasi">

<br>

<img src="https://github.com/iqbaleff214/aplikasi-pembayaran-spp/blob/main/screenshots/ss-3.png" alt="screenshot aplikasi">


## License / Lisensi

Berlisensi di bawah [MIT license](https://github.com/iqbaleff214/aplikasi-pembayaran-spp/blob/main/LICENSE).
