# Analisis Sistem Simpan-Pinjam

## Tujuan Aplikasi

Aplikasi ini dirancang untuk memudahkan anggota koperasi dalam melakukan simpanan dan pengajuan pinjaman serta membantu admin/petugas koperasi dalam mengelola dan mencatat transaksi simpan-pinjam. Fitur utama mencakup pengelolaan data anggota, pencatatan simpanan, pengajuan dan persetujuan pinjaman, serta pencatatan pembayaran cicilan pinjaman.

## Aktor

### Admin/Petugas Koperasi:
- Memiliki akses untuk mengelola data anggota, mencatat simpanan, memverifikasi dan mencatat pinjaman yang diajukan oleh anggota, serta mencatat pembayaran cicilan pinjaman.
- Mengelola informasi simpanan dan pinjaman yang mencakup jumlah simpanan, jumlah pinjaman, jangka waktu, bunga, status pinjaman, dan status pembayaran cicilan.

### Anggota:
- Memiliki akses untuk melakukan simpanan dan pengajuan pinjaman serta melihat status transaksi simpan-pinjam mereka.
- Tidak perlu melakukan registrasi tambahan untuk mengakses aplikasi (cukup terdaftar sebagai anggota koperasi).

## Fitur dan Fungsionalitas

### Fitur untuk Anggota:

1. **Melakukan Simpanan**:
   - Anggota dapat melakukan simpanan sesuai dengan jenis simpanan yang diinginkan, seperti simpanan wajib atau simpanan sukarela.
   - **Detail Simpanan**: Setiap transaksi simpanan mencakup informasi jumlah simpanan, tanggal simpanan, dan jenis simpanan.

2. **Mengajukan Pinjaman**:
   - Anggota dapat mengajukan pinjaman baru dengan memasukkan jumlah pinjaman yang diinginkan, jangka waktu, dan bunga pinjaman.
   - **Detail Pengajuan Pinjaman**: Setiap pengajuan mencakup informasi jumlah pinjaman, tanggal pengajuan, jangka waktu, dan status persetujuan pinjaman (menunggu, disetujui, atau ditolak).

3. **Melihat Status Pinjaman dan Pembayaran Cicilan**:
   - Anggota dapat melihat status pinjaman mereka, termasuk detail cicilan yang telah dibayarkan, sisa pinjaman, dan tanggal jatuh tempo.

### Fitur untuk Admin/Petugas Koperasi:

1. **Pengelolaan Data Anggota**:
   - Admin dapat menambah, mengedit, atau menonaktifkan data anggota.
   - **Detail Anggota**: Data anggota mencakup nama, alamat, nomor telepon, tanggal lahir, tanggal bergabung, dan status keanggotaan.

2. **Pencatatan Simpanan**:
   - Admin dapat mencatat transaksi simpanan anggota, baik untuk simpanan wajib maupun sukarela.
   - **Detail Simpanan**: Setiap transaksi simpanan yang dicatat menyertakan jumlah simpanan, tanggal, dan jenis simpanan.

3. **Pengelolaan Pinjaman**:
   - Admin dapat memverifikasi dan menyetujui atau menolak pinjaman yang diajukan oleh anggota.
   - **Detail Pinjaman**: Data pinjaman yang dikelola mencakup jumlah pinjaman, jangka waktu, bunga, status pinjaman, dan informasi lainnya terkait pengajuan.

4. **Pencatatan Pembayaran Cicilan Pinjaman**:
   - Admin dapat mencatat pembayaran cicilan pinjaman yang dilakukan oleh anggota.
   - **Detail Pembayaran Cicilan**: Setiap transaksi pembayaran cicilan mencakup tanggal pembayaran, jumlah yang dibayarkan, dan sisa pinjaman yang belum lunas.

---

Analisis ini memberikan gambaran umum tentang fitur dan aktor dalam sistem Simpan-Pinjam. Aplikasi ini diharapkan dapat mempermudah operasional koperasi dan memberikan kemudahan bagi anggota dalam mengelola simpanan dan pinjaman mereka.
