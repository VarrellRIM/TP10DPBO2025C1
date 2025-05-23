# TP10DPBO2025C1

## Janji
Saya Varrell Rizky Irvanni Mahkota dengan NIM 2306245 mengerjakan TP10 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Dokumentasi


## Desain Program

### Struktur Database
Program ini menggunakan database MySQL dengan nama `music_store` yang terdiri dari 3 tabel dengan 2 relasi (PK-FK):

1. **Tabel `artists`**
   - `id` (Primary Key, Auto Increment)
   - `name` (Nama artis/band)
   - `country` (Negara asal)
   - `formed_year` (Tahun terbentuk)

2. **Tabel `albums`**
   - `id` (Primary Key, Auto Increment)
   - `title` (Judul album)
   - `release_year` (Tahun rilis)
   - `genre` (Genre musik)
   - `artist_id` (Foreign Key ke table artists)

3. **Tabel `songs`**
   - `id` (Primary Key, Auto Increment)
   - `title` (Judul lagu)
   - `duration` (Durasi lagu)
   - `album_id` (Foreign Key ke table albums)
   - `track_number` (Nomor urut lagu dalam album)

### Struktur Folder (MVVM Architecture)
Program ini menerapkan arsitektur MVVM (Model-View-ViewModel) dengan struktur folder sebagai berikut:

- **model/**
  - Artist.php - Model untuk representasi dan operasi CRUD data artist
  - Album.php - Model untuk representasi dan operasi CRUD data album
  - Song.php - Model untuk representasi dan operasi CRUD data lagu
  
- **viewmodel/**
  - ArtistViewModel.php - ViewModel untuk menghubungkan Artist model dengan view
  - AlbumViewModel.php - ViewModel untuk menghubungkan Album model dengan view
  - SongViewModel.php - ViewModel untuk menghubungkan Song model dengan view
  
- **views/**
  - artist_list.php - View untuk menampilkan daftar artis
  - artist_form.php - View untuk form tambah/edit artis
  - album_list.php - View untuk menampilkan daftar album
  - album_form.php - View untuk form tambah/edit album
  - song_list.php - View untuk menampilkan daftar lagu
  - song_form.php - View untuk form tambah/edit lagu
  - `template/` - Folder yang berisi komponen template
    - header.php - Header untuk semua halaman
    - footer.php - Footer untuk semua halaman
  
- **config/**
  - Database.php - Class untuk koneksi database
  
- **database/**
  - music_store.sql - File SQL untuk membuat dan mengisi database
  
- index.php - Controller dan entry point aplikasi

### Penerapan Arsitektur MVVM

1. **Model**
   - Bertanggung jawab untuk mengakses dan memanipulasi data
   - Berkomunikasi dengan database melalui PDO
   - Menerapkan prepared statements untuk keamanan
   - Contoh: Artist.php menangani operasi CRUD untuk tabel artists

2. **ViewModel**
   - Bertindak sebagai perantara antara Model dan View
   - Memproses dan memformat data dari Model untuk ditampilkan di View
   - Contoh: AlbumViewModel.php mengambil data album dari Model dan menyediakan data tersebut ke View, termasuk mengambil data artis untuk dropdown

3. **View**
   - Menampilkan UI kepada pengguna
   - Menerapkan data binding dengan ViewModel
   - Contoh: song_form.php menampilkan form yang mengikat data ke SongViewModel

### Alur Kerja
1. **Menampilkan Data (Read)**:
   - User mengakses index.php
   - index.php memilih ViewModel berdasarkan parameter `entity`
   - ViewModel mengambil data dari Model
   - Data ditampilkan di View (list)

2. **Menambah Data (Create)**:
   - User mengklik tombol "Add New" dan diarahkan ke form
   - User mengisi form dan submit
   - Form mengirim data ke ViewModel
   - ViewModel memanggil Model untuk menyimpan data
   - User diarahkan kembali ke halaman list

3. **Mengubah Data (Update)**:
   - User mengklik tombol edit pada data yang ingin diubah
   - ViewModel mengambil data dari Model berdasarkan id
   - View menampilkan form dengan data yang sudah ada
   - User mengubah data dan submit
   - ViewModel memanggil Model untuk update data
   - User diarahkan kembali ke halaman list

4. **Menghapus Data (Delete)**:
   - User mengklik tombol delete pada data yang ingin dihapus
   - Konfirmasi penghapusan muncul
   - Jika user mengkonfirmasi, ViewModel memanggil Model untuk menghapus data
   - Halaman list direfresh untuk menampilkan data terbaru

## Data Binding
Implementasi data binding dalam aplikasi ini dapat dilihat pada:

- Form edit yang mengisi nilai input berdasarkan data yang diambil dari ViewModel
- Dropdown select yang mengisi opsi dan memilih nilai berdasarkan data relasi
- Nilai input yang secara otomatis terikat ke parameter POST saat form disubmit

## Catatan Penting
**Jangan lupa untuk mengubah kredensial database di file Database.php:**

```php
private $host = "localhost";
private $db_name = "music_store";
private $username = "root";
private $password = "";
```