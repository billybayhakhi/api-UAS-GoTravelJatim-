# 🗺️ GoJatim Travel API

> **Proyek UAS Pemrograman API** — Aplikasi pemesanan paket wisata berbasis REST API menggunakan Laravel, JWT Authorization, dan API Key Authentication.

---

## 👨‍💻 Informasi Mahasiswa

| Field | Detail |
|---|---|
| Nama | Billy Bayhakhi |
| Aplikasi | GoJatim Travel API |
| Framework | Laravel 13.x |
| Autentikasi | JWT (tymon/jwt-auth) + API Key |

---

## ⚙️ Cara Menjalankan Project

```bash
# 1. Clone repository
git clone <url-repo>

# 2. Install dependencies
composer install

# 3. Salin file environment
cp .env.example .env

# 4. Generate key & JWT secret
php artisan key:generate
php artisan jwt:secret

# 5. Sesuaikan konfigurasi database di .env
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Buat tabel dan isi data awal
php artisan migrate --seed

# 7. Jalankan server
php artisan serve
```

---

## 🔐 Metode Autentikasi

Project ini menggunakan **dua lapis autentikasi**:

| Metode | Digunakan Untuk | Cara Penggunaan |
|---|---|---|
| **JWT Bearer Token** | Endpoint privat (profil, booking) | Header: `Authorization: Bearer <token>` |
| **API Key** | Endpoint publik (destinations, tours) | Header: `X-API-Key: <api_key>` |

---

## 📌 Daftar Endpoint API

### 🔓 Auth (Publik — Tanpa Token)

| Method | Endpoint | Deskripsi |
|---|---|---|
| `POST` | `/api/v1/auth/register` | Daftar akun baru |
| `POST` | `/api/v1/auth/login` | Login dan dapatkan JWT Token |

#### Contoh Request — Register
```json
POST /api/v1/auth/register
Content-Type: application/json

{
  "name": "Billy Bayhakhi",
  "email": "billy@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

#### Contoh Request — Login
```json
POST /api/v1/auth/login
Content-Type: application/json

{
  "email": "billy@example.com",
  "password": "password123"
}
```

#### Contoh Response — Login Berhasil
```json
{
  "success": true,
  "data": {
    "user": { "id": 1, "name": "Billy Bayhakhi", ... },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
    "type": "bearer",
    "expires_in": "3600 detik"
  }
}
```

---

### 🔒 Auth (Privat — Butuh JWT Token)

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/auth/me` | Lihat profil & riwayat booking user yang login |
| `POST` | `/api/v1/auth/logout` | Logout dan invalidasi token |
| `POST` | `/api/v1/auth/refresh` | Refresh JWT Token |

---

### 🗝️ API Keys (Privat — Butuh JWT Token)

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/api-keys` | Lihat semua API Key milik user |
| `POST` | `/api/v1/api-keys` | Buat API Key baru |
| `DELETE` | `/api/v1/api-keys/{id}` | Hapus API Key |

---

### 🏝️ Destinations (Publik — Butuh API Key)

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/destinations` | Lihat semua destinasi wisata |
| `GET` | `/api/v1/destinations/{id}` | Lihat detail 1 destinasi |
| `POST` | `/api/v1/destinations` | Tambah destinasi baru |
| `PUT` | `/api/v1/destinations/{id}` | Update destinasi |
| `DELETE` | `/api/v1/destinations/{id}` | Hapus destinasi |

#### Contoh Request — Tambah Destinasi
```json
POST /api/v1/destinations
X-API-Key: <api_key_anda>
Content-Type: application/json

{
  "name": "Pantai Papuma",
  "kabupaten": "Jember",
  "provinsi": "Jawa Timur",
  "description": "Pantai eksotis dengan batuan karang yang indah di Jember."
}
```

---

### 🧳 Tours / Paket Wisata (Publik — Butuh API Key)

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/v1/tours` | Lihat semua paket tour |
| `GET` | `/api/v1/tours/{id}` | Lihat detail 1 paket tour |
| `POST` | `/api/v1/tours` | Tambah paket tour baru |
| `PUT` | `/api/v1/tours/{id}` | Update paket tour |
| `DELETE` | `/api/v1/tours/{id}` | Hapus paket tour |

#### Contoh Request — Tambah Paket Tour
```json
POST /api/v1/tours
X-API-Key: <api_key_anda>
Content-Type: application/json

{
  "category_id": 1,
  "title": "Trip 2 Hari Kawah Ijen",
  "description": "Menyaksikan fenomena blue fire yang memukau.",
  "duration_days": 2,
  "max_people": 10,
  "price": 950000
}
```

---

### 📅 Booking (Privat — Butuh JWT Token)

| Method | Endpoint | Deskripsi |
|---|---|---|
| `POST` | `/api/v1/bookings` | Buat pemesanan paket tour baru |

#### Contoh Request — Buat Booking
```json
POST /api/v1/bookings
Authorization: Bearer <jwt_token>
Content-Type: application/json

{
  "tour_id": 1,
  "check_in": "2026-07-15",
  "jumlah_orang": 3,
  "catatan": "Mohon persiapkan raincoat"
}
```

#### Contoh Response — Booking Berhasil
```json
{
  "success": true,
  "message": "Pemesanan berhasil dibuat",
  "data": {
    "booking_code": "TRX-ABCD1234",
    "tour_id": 1,
    "check_in": "2026-07-15",
    "jumlah_orang": 3,
    "total_harga": 1050000,
    "status": "pending"
  }
}
```

---

## 🗄️ Struktur Database (ERD Singkat)

```
users ──────────< bookings >────── tours ──────────< destination_tour >────── destinations
  |                                  |
  └──────────< api_keys              └──── categories
  
blogs ──────── destinations
```

| Tabel | Relasi |
|---|---|
| `users` | hasMany bookings, hasMany api_keys |
| `tours` | belongsTo category, belongsToMany destinations, hasMany bookings |
| `bookings` | belongsTo user, belongsTo tour |
| `destinations` | belongsToMany tours, hasMany blogs |
| `api_keys` | belongsTo user |

---

## 🧪 Testing dengan Postman

Urutan pengujian yang disarankan:

1. **Register** → `POST /api/v1/auth/register`
2. **Login** → `POST /api/v1/auth/login` → Simpan `token`
3. **Buat API Key** → `POST /api/v1/api-keys` (gunakan token dari langkah 2) → Simpan `key`
4. **CRUD Destinations** → Gunakan `X-API-Key` dari langkah 3
5. **CRUD Tours** → Gunakan `X-API-Key` dari langkah 3
6. **Buat Booking** → `POST /api/v1/bookings` (gunakan `Authorization: Bearer <token>`)
7. **Cek Profil** → `GET /api/v1/auth/me` (lihat riwayat booking)

---

## 📁 Lampiran

- 🔗 **GitHub Repository:** *(link repository Anda)*
- 🧪 **Postman Collection:** https://billybayhakhi1-2418430.postman.co/...
