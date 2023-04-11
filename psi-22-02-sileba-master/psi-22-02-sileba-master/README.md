# PSI-2022ge-02 SILEBA
Please read [RULES.md](RULES.md).

## General Discription
Sistem E-Learning SMK Negeri 3 Balige berbasis Web merupakan sebuah sistem yang mengintegrasikan setiap bisnis proses yang dapat dilakukan untuk mendukung proses belajar mengajar yang bertujuan untuk membantu SMK Negeri 3 Balige dalam memudahkan proses belajar mengajar. Dengan menerapkan sistem E-learning ini para siswa dapat menerima materi yang dapat diakses dari manapun dengan waktu yang tidak terbatas, para guru dapat lebih mudah memgumpulkan dan memberi nilai pada tugas siswa, dan operator tidak kesulitan dalam mendaftarkan akun, atau data lainnya dikarenakan sistem ini meniliki tampilan yang sederhana dan nyaman dipakai serta mudah untuk diakses.


## Features
Adapun fungsi- fungsi utama yang ada pada E-Learning SMK Negeri 3 Balige ini adalah:
- Fungsi Registrasi\
Fungsi registrasi hanya dimiliki oleh admin, yaitu untuk mendaftarkan seluruh akun pengguna yaitu guru dan siswa, pada Sistem Informasi E-Learning SMK Negeri 3 Balige
- Fungsi Login\
Fungsi ini digunakan untuk melakukan validasi pengguna yang telah melakukan registrasi, agar dapat mengakses fitur yang ada pada sistem
- Fungsi Mengelola Materi Pembelajaran\
Fungsi ini digunakan oleh guru untuk menambahkan maupun menghapus materi pembelajaran, berdasarkan mata pelajaran yang diajarkan.
- Fungsi Melihat Materi Pembelajaran\
Fungsi ini digunakan oleh siswa untuk melihat materi pembelajaran, berdasarkan mata pelajaran yang diambil oleh siswa.
- Fungsi Mengelola Tugas\
Fungsi ini digunakan oleh guru untuk mengunggah tugas, maupun menghapus tugas berdasarkan mata pelajaran yang diajarkan, sehingga dapat diakses oleh siswa.
- Fungsi Mengumpulkan Tugas\
Fungsi ini digunakan oleh siswa untuk melihat tugas yang sudah diunggah, dan mengunggah jawaban dari tugas, maupun menghapus jawaban tugas yang sudah diunggah, berdasarkan mata pelajaran yang diajarkan.
- Mengelola Nilai Tugas\
Fungsi ini digunakan oleh guru memberikan penilaian terhadap tugas yang telah dikumpulkan siswa
- Mengelola Profile\
Fungsi ini digunakan oleh semua pengguna yaitu admin, guru dan siswa untuk mengelola profil, seperti mengubah data diri, mengubah profil, dan menghapus data diri maupun profil.  
- Mengelola ruang kelas\
Fitur ini berfungsi untuk menambah ruangan kelas, mengedit ruangan kelas dan menghapus ruangan kelas. Kelas yang sudah ditambahkan ataupun dihapus dapat dilihat oleh operator sekolah.
- Mengelola mata pelajaran\
Fitur ini berfungsi untuk menampilkan daftar mata pelajaran, menambah mata pelajaran, mengedit mata pelajaran dan menghapus mata pelajaran. Mata pelajaran yang sudah ditambahkan ataupun diubah dapat dilihat oleh operator sekolah.


## Architectural Design

## Database Design


## Installation Guide
- Clone repository https://github.com/proyek-mahasiswa/psi-22-02-sileba
- Buka file repository pada penyimpanan Anda, kemudian pada file .env sesuaikan nama database, username, serta password sesuai dengan database Anda.
- Buka terminal lalu jalankan **composer install**.
- Setelah composer sudah terinstall, kemudian jalankan **php artisan key:generate**.
- Kemudian lakukan migrate pada database dengan menjalankan **php artisan migrate:fresh --seed**.
- Agar file dapat diakses ke publik, jalankan **php artisan storage:link**.
- Jalankan **php artisan serve** untuk menjalankan aplikasi ini.


### Minimum Hardware Requirements
Kebutuhan dan spesifikasi minimum perangkat keras yang dibutuhkan untuk menjalankan aplikasi ini yaitu:
- Processor: Intell(R) Core(TM) i5 CPU @2.10GHz
- RAM: 4 GB	
- Hard Disk : 1 TB
- Standard Keyboard 104 keys (based QWERTY)


### Minimum Software Requirements
Kebutuhan dan spesifikasi minimum perangkat lunak yang dibutuhkan untuk menjalankan aplikasi ini yaitu:
- Web Browser : Google Chrome, Mozilla Firefox, Microsoft Edge 
- Sistem Operasi : Windows, Linux, iOS
- DBMS : MySQL
- Development Tools : Visual Studio Code, phpMyAdmin
- Web Server : Apache
- Web Service : Framework Laravel


# Contributors
+ 12S19004 - Marhta Delima Kristiani Batubara (@marhtabatubara)
+ 12S19014 - Kartika Lidya Rotua Sianipar (@kartikalidya)
+ 12S19022 - Nico Julyonethree Rajagukguk (@NicoRajagukguk)
+ 12S19039 - Anugerah Salomo Rafael Simanjuntak (@Anugerahuga5)
+ 12S19059 - Rut Yana Gultom (@Rut-Gultom)

