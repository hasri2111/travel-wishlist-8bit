# Travel Wishlist 8 BIT

Aplikasi web sederhana berbasis PHP & MySQL yang dikembangkan oleh kelompok 8 BIT untuk mencatat dan membagikan destinasi wisata impian atau yang telah dikunjungi oleh setiap anggota kelompok.

## ✨ Fitur Utama
- Registrasi dan login untuk masing-masing anggota
- Menambahkan wishlist wisata (nama tempat, kota, tanggal, rating, deskripsi, dan foto)
- Menampilkan semua wishlist dalam tampilan kartu (card)
- Edit dan hapus data wishlist
- Upload gambar destinasi
- Rating ditampilkan dalam bentuk bintang ⭐
- Tampilan menarik dan responsif

## ⚙️ Teknologi yang Digunakan
- PHP
- MySQL
- HTML & CSS
- XAMPP 

## 🗂 Struktur Database
**Database:** `travel_8bit`  
**Tabel:** `users`, `wishlist`  
Contoh kolom pada tabel `wishlist`:  
- id  
- nama_wisata  
- kota  
- tanggal  
- rating  
- deskripsi  
- foto

## 🚀 Cara Menjalankan
1. Clone repositori ini atau download file ZIP
2. Ekstrak ke `htdocs` (jika menggunakan XAMPP)
3. Import file `travel_8bit.sql` ke phpMyAdmin
4. Jalankan server Apache & MySQL dari XAMPP
5. Akses via browser ke `http://localhost/TRAVEL_8BIT/
6. Registrasi akun, lalu login dan mulai gunakan

## 👨‍👩‍👧‍👦 Anggota Kelompok 8 BIT
- Ade Ainun Fitra Ramadhan  
- Hasriani
- Hairan  
- Riswan  
- Rifqa Wulandari. M 
- Andi Ahmad Zulkifli  
- Sukmayani 
- Hasriani  

## ℹ️ Catatan
- Semua data tersimpan di database lokal
- File gambar wisata disimpan di folder `/uploads`
- Aplikasi ini dapat digunakan sebagai sistem dokumentasi perjalanan pribadi kelompok
