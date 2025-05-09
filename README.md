# SmartPresence
## Sistem Absensi Siswa Berbasis Web

<p align="center">
  <img src="/public/LogoUnsulbar.png" alt="SmartPresence Logo" width="300"/>
</p>

### Muhammad Ali Sadikin  
### D0223332  
### Framework Web Based  
### 2025  

---

## Role dan Fitur-fiturnya

| **Role**     | **Fitur**                                                                 |
|--------------|--------------------------------------------------------------------------|
| **Admin**    | Mengelola data siswa, mengatur pengguna, melihat statistik absensi.     |
| **Guru**     | Mencatat kehadiran siswa dan memperbaharui data siswa.                  |
| **Orang Tua**| Melihat riwayat kehadiran anak melalui akun mereka.                     |

---

## Struktur Tabel Database

### Tabel `roles` (Peran Pengguna)

| Nama Field | Tipe Data            | Keterangan                             |
|------------|----------------------|----------------------------------------|
| `id`       | Integer (Primary Key)| ID unik setiap peran                   |
| `name`     | String               | Nama peran (`admin`, `guru`, `orangtua`)|

### Tabel `users` (Data Pengguna)

| Nama Field | Tipe Data            | Keterangan                              |
|------------|----------------------|-----------------------------------------|
| `id`       | Integer (Primary Key)| ID pengguna                             |
| `name`     | String               | Nama pengguna                           |
| `email`    | String (Unique)      | Email untuk login                       |
| `password` | String               | Password login                          |
| `role_id`  | Integer (Foreign Key)| Relasi ke tabel `roles`                 |

### Tabel `students` (Data Siswa)

| Nama Field | Tipe Data            | Keterangan        |
|------------|----------------------|-------------------|
| `id`       | Integer (Primary Key)| ID siswa          |
| `name`     | String               | Nama siswa        |
| `class`    | String               | Kelas siswa       |

### Tabel `parent_student` (Relasi Orang Tua dan Siswa)

| Nama Field  | Tipe Data            | Keterangan                             |
|-------------|----------------------|----------------------------------------|
| `id`        | Integer (Primary Key)| ID unik relasi                         |
| `parent_id` | Integer (Foreign Key)| ID orang tua (mengacu ke `users`)      |
| `student_id`| Integer (Foreign Key)| ID siswa (mengacu ke `students`)       |

### Tabel `attendances` (Data Absensi)

| Nama Field        | Tipe Data             | Keterangan                         |
|-------------------|-----------------------|------------------------------------|
| `id`              | Integer (Primary Key) | ID unik absensi                    |
| `student_id`      | Integer (Foreign Key) | ID siswa yang hadir                |
| `attendance_date` | Date                  | Tanggal absensi                    |
| `status`          | Enum (`Hadir`, `Tidak Hadir`) | Status kehadiran siswa     |

---

## Relasi Antar Tabel

| Jenis Relasi | Tabel yang Terlibat                        | Keterangan                                         |
|--------------|--------------------------------------------|----------------------------------------------------|
| One-to-Many  | `roles` ➝ `users`                          | Satu role dapat dimiliki oleh banyak pengguna      |
| Many-to-Many | `users` ↔ `students` melalui `parent_student` | Satu orang tua bisa memiliki beberapa anak     |
| One-to-Many  | `students` ➝ `attendances`                | Satu siswa memiliki banyak catatan absensi         |
