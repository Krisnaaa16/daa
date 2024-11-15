# **Dokumen Persyaratan Bisnis (BRD)**  
### **Proyek:** Aplikasi Sistem Simpan-Pinjam Koperasi  
**Versi:** 1.0  
**Tanggal:** 14 November 2024  

---

## **1. Tujuan Proyek**
- **Objektif**: Aplikasi ini dirancang untuk mempermudah anggota koperasi dalam melakukan simpanan, mengajukan pinjaman, dan memantau status pembayaran cicilan. Selain itu, aplikasi ini membantu admin atau petugas koperasi dalam mengelola data anggota, mencatat simpanan, mengelola pinjaman, dan mencatat pembayaran cicilan.

---

## **2. Fitur Utama**

### **Untuk Anggota**
- **Melakukan Simpanan**: Anggota dapat melakukan simpanan dalam bentuk simpanan wajib atau sukarela.
- **Mengajukan Pinjaman**: Anggota dapat mengajukan pinjaman dengan jumlah tertentu dan jangka waktu tertentu.
- **Melihat Status Pinjaman dan Pembayaran Cicilan**: Anggota dapat memantau status pengajuan pinjaman, sisa pinjaman, serta jadwal pembayaran cicilan.

### **Untuk Admin/Petugas Koperasi**
- **Pengelolaan Data Anggota**: Admin dapat menambah, mengedit, atau menonaktifkan data anggota.
- **Pencatatan Simpanan**: Admin dapat mencatat simpanan yang dilakukan oleh anggota.
- **Pengelolaan Pinjaman**: Admin dapat memproses pengajuan pinjaman, menyetujui atau menolak pengajuan, serta menentukan jadwal cicilan.
- **Pencatatan Pembayaran Cicilan Pinjaman**: Admin dapat mencatat pembayaran cicilan yang dilakukan anggota, serta mengupdate saldo pinjaman.

---

## **3. Persyaratan Fungsional**

### **Sistem Login**
- **Akses Berdasarkan Peran**: Anggota dan admin/petugas koperasi dapat login dengan hak akses berbeda.

### **Pengelolaan Data Anggota**
- **Admin**: Menambah, memperbarui, atau menonaktifkan data anggota koperasi.

### **Pengaturan & Tampilan Simpanan dan Pinjaman**
- **Admin**: Mengelola data simpanan, pengajuan pinjaman, status pinjaman, dan cicilan anggota.
- **Anggota**: Mengajukan pinjaman, melihat status pinjaman, dan melakukan simpanan.

---

## **4. Persyaratan Non-Fungsional**

- **Kegunaan**: Antarmuka mudah digunakan oleh anggota dan admin koperasi.
- **Keamanan**:
  - Hanya admin yang bisa mengelola data anggota, simpanan, dan pinjaman.
  - Anggota hanya dapat mengakses informasi sesuai haknya tanpa hak pengelolaan.

---

## **5. Model, Migrasi, Seeder, dan Resource yang Perlu Dibuat Pada Container `docker exec -it sample bash`**

### **Anggota**
- **Model**: `Anggota`. Menyimpan informasi dasar anggota koperasi (nama, alamat, telepon, tanggal lahir, tanggal bergabung, status aktif).
- **Migration**: Struktur tabel berikut ini akan dibuat pada database:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `nama`: `varchar(255)` - Nama anggota
  - `alamat`: `text` - Alamat anggota
  - `telepon`: `varchar(15)` - Nomor telepon anggota
  - `tanggal_lahir`: `date` - Tanggal lahir anggota
  - `tanggal_gabung`: `date` - Tanggal bergabung anggota
  - `status_aktif`: `boolean` - Status keanggotaan aktif atau tidak
  - `created_at`: `timestamp`
  - `updated_at`: `timestamp`
- **Seeder**: Data anggota awal untuk pengujian.
- **Resource**: Endpoint API untuk data anggota, dapat diakses oleh admin.

### **Simpanan**
- **Model**: `Simpanan`. Menyimpan data simpanan anggota, termasuk jenis simpanan, jumlah, dan tanggal.
- **Migration**:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `anggota_id`: `bigint UNSIGNED` (Foreign Key ke tabel `anggota`)
  - `jenis`: `enum(['wajib', 'sukarela'])` - Jenis simpanan
  - `jumlah`: `decimal(15, 2)` - Jumlah simpanan
  - `tanggal`: `date` - Tanggal simpanan
  - `created_at`: `timestamp`
  - `updated_at`: `timestamp`
- **Seeder**: Data simpanan awal untuk pengujian.
- **Resource**: Endpoint API untuk data simpanan, dapat diakses oleh admin.

### **Pinjaman**
- **Model**: `Pinjaman`. Menyimpan data pinjaman yang diajukan anggota.
- **Migration**:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `anggota_id`: `bigint UNSIGNED` (Foreign Key ke tabel `anggota`)
  - `jumlah`: `decimal(15, 2)` - Jumlah pinjaman
  - `jangka_waktu`: `int` - Jangka waktu pinjaman (dalam bulan)
  - `bunga`: `decimal(5, 2)` - Persentase bunga pinjaman
  - `status`: `enum(['menunggu', 'disetujui', 'ditolak'])` - Status pinjaman
  - `created_at`: `timestamp`
  - `updated_at`: `timestamp`
- **Seeder**: Data pinjaman awal untuk pengujian.
- **Resource**: Endpoint API untuk data pinjaman, dapat diakses oleh admin.

### **Cicilan**
- **Model**: `Cicilan`. Menyimpan data cicilan pinjaman yang dibayar oleh anggota.
- **Migration**:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `pinjaman_id`: `bigint UNSIGNED` (Foreign Key ke tabel `pinjaman`)
  - `jumlah`: `decimal(15, 2)` - Jumlah cicilan
  - `tanggal_bayar`: `date` - Tanggal pembayaran cicilan
  - `created_at`: `timestamp`
  - `updated_at`: `timestamp`
- **Seeder**: Data cicilan awal untuk pengujian.
- **Resource**: Endpoint API untuk data cicilan, dapat diakses oleh admin.

---

## **6. Analisis Permissions untuk Anggota dan Admin**

Pada sistem simpan-pinjam ini, permissions digunakan untuk membatasi akses anggota terhadap fitur yang sesuai dengan kebutuhan dan peran mereka, sementara admin memiliki akses penuh ke seluruh sistem. Permissions ini memastikan anggota hanya dapat mengakses dan mengelola data mereka sendiri.

### **Permissions yang Diperlukan**

Anggota hanya memerlukan akses terbatas untuk melakukan simpanan, mengajukan pinjaman, dan melihat status pinjaman. Berikut adalah permissions yang akan diberikan kepada role `anggota`:

1. **Permissions untuk Anggota**
   - `view_own_simpanan`: Mengizinkan anggota melihat data simpanan mereka sendiri.
   - `create_pinjaman`: Mengizinkan anggota mengajukan pinjaman.
   - `view_own_pinjaman`: Mengizinkan anggota melihat status pinjaman mereka sendiri.
   - `view_own_cicilan`: Mengizinkan anggota melihat status pembayaran cicilan pinjaman mereka.

### **Implementasi Model dan Seeder untuk Permissions**

#### **Model: `Permission`**

Model `Permission` disediakan oleh paket Spatie Laravel Permission. Model ini akan menyimpan data permissions dengan atribut berikut:
- `id`: Primary key dari permission.
- `name`: Nama dari permission (contoh: `view_own_simpanan`).
- `guard_name`: Guard untuk permission (default: `web`).

#### **Seeder: PermissionsSeeder**
Seeder `PermissionsSeeder` akan digunakan untuk membuat dan menetapkan permissions kepada role `anggota`, memungkinkan mereka mengakses fitur sesuai dengan hak yang ditentukan. Admin akan memiliki akses penuh secara default, sehingga tidak diperlukan seeder khusus untuk admin.

---

## **Changelog**

| Versi | Tanggal       | Penulis           | Deskripsi                          |
|-------|---------------|-------------------|------------------------------------|
| 1.0   | 14-11-2024    | Marco Krisna      | Draft dokumen awal                 |

--- 
