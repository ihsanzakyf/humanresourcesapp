
# **HRIS Web App (Studi Kasus)**

Aplikasi ini dibuat sebagai bahan studi kasus untuk belajar pengembangan web menggunakan **Laravel 12**. Aplikasi ini memiliki fitur yang menyerupai **HRIS (Human Resource Information System)** dengan fungsi dasar seperti autentikasi, presensi, manajemen tugas, cuti, dan payroll.

---

## 📌 **Fitur Utama**
- **Autentikasi**
    - Login, Logout, Register
- **Dashboard**
    - Statistik presensi (Chart.js)
- **Presensi**
    - Check-in dan Check-out
- **Manajemen Tugas (Task)**
    - Buat, ubah, update status (Done, Pending)
- **Cuti**
    - Pengajuan cuti oleh karyawan
    - Persetujuan dan penolakan oleh HR
- **Payroll**
    - Mengelola data gaji karyawan
- **Manajemen Karyawan**
    - Tambah, edit, hapus data karyawan

---

## 🛠 **Teknologi yang Digunakan**
- **Framework**: Laravel 12
- **Template**: [Mazer](https://github.com/zuramai/mazer)
- **Database**: MySQL
- **Frontend Tools**:
    - Blade Template
    - Chart.js
    - Flatpickr
    - Select2
    - SweetAlert2

---

## ⚙ **Persyaratan Sistem**
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM
- Laravel CLI

---

## 🚀 **Proses Instalasi**
1. **Clone repository**
   ```bash
   git clone https://github.com/ihsanzakyf/humanresourcesapp.git
   cd humanresourcesapp
   ```

2. **Install dependency Laravel**
   ```bash
   composer install
   ```

3. **Install dependency frontend**
   ```bash
   npm install && npm run build
   ```

4. **Salin file .env**
   ```bash
   cp .env.example .env
   ```

5. **Konfigurasi database di `.env`**

6. **Generate key aplikasi**
   ```bash
   php artisan key:generate
   ```

7. **Migrasi database dan seeder**
   ```bash
   php artisan migrate --seed
   ```

8. **Jalankan server**
   ```bash
   php artisan serve
   ```

---

## ✅ **Akses HR**
```
Email: test@example.com
Password: password
```

## ✅ **Akses Developer**
```
Email: developer@mail.com
Password: password
```

---
