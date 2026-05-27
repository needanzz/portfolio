# AGENTS.md — IS-Portfolio

Panduan ini digunakan oleh AI agent (Claude Code, Copilot, dll.) untuk memahami struktur,
konvensi, dan cara kerja proyek ini tanpa penjelasan ulang setiap sesi.

---

## 1. Project Overview

**Nama Proyek**: IS-Portfolio
**Pemilik**: Muhammad Danil Aminuddin
**Profesi**: Full Stack Web Developer
**Deskripsi**: Website portofolio pribadi bergaya Information System (IS) — menampilkan
profil, proyek, keahlian, pengalaman, pendidikan, harga freelance, dan form kontak dalam
antarmuka dengan sidebar, navbar, dan multi halaman.
**Target Audience**: Rekruter, klien potensial, dan kolega profesional.
**Bahasa Konten**: Bilingual — Indonesia (default) dan English (toggle).

---

## 2. Tech Stack

| Layer       | Teknologi                                     |
|-------------|-----------------------------------------------|
| Framework   | Laravel 13                                    |
| PHP         | PHP 8.3+                                      |
| Frontend    | Laravel Blade + Bootstrap 5                   |
| Database    | MySQL                                         |
| Auth        | Laravel Breeze / Sanctum (untuk admin panel)  |
| Icons       | Bootstrap Icons                               |
| JS Utility  | Vanilla JS / Alpine.js (ringan, tanpa Vue)    |
| Build Tool  | Vite (default Laravel terbaru)                |
| Deployment  | Shared Hosting via cPanel                     |

---

## 3. Tema & Styling

```css
/* Warna utama — gunakan variabel ini secara konsisten */
--color-primary:    #263F93;   /* Biru navy — elemen utama, sidebar aktif, tombol */
--color-secondary:  #ffffff;   /* Putih — aksen, highlight, badge aktif */
--color-bg:         #ffffff;   /* Background utama halaman */
--color-text:       #1a1a2e;   /* Teks utama */
--color-muted:      #6c757d;   /* Teks sekunder / placeholder */
--color-surface:    #f4f6fb;   /* Background card / sidebar */
--color-border:     #dee2e6;   /* Border card, divider */

/* Dark mode — diaktifkan via class .dark-mode pada <body> */
--color-bg-dark:      #0f1120;
--color-surface-dark: #1a1d35;
--color-text-dark:    #e8eaf6;
```

**Font**:
- Heading: `Poppins` (Google Fonts)
- Body: `Inter` (Google Fonts)

**Aturan styling**:
- Selalu gunakan CSS variable di atas, jangan hardcode warna
- Gunakan Bootstrap 5 utility class sebisa mungkin sebelum menulis custom CSS
- Custom CSS ditulis di `resources/css/app.css`
- Jangan gunakan `!important` kecuali terpaksa

---

## 4. Struktur Folder

```
IS-Portfolio/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ProfileController.php
│   │   │   ├── ProjectController.php
│   │   │   ├── SkillController.php
│   │   │   ├── ExperienceController.php
│   │   │   ├── FreelancePriceController.php
│   │   │   └── ContactController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Project.php
│   │   ├── Skill.php
│   │   ├── Experience.php
│   │   ├── Education.php
│   │   ├── FreelancePrice.php
│   │   └── ContactMessage.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   │   └── app.css          # Custom CSS utama
│   ├── js/
│   │   └── app.js           # JS utama (sidebar toggle, dark mode, dll.)
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        # Layout utama (sidebar + navbar + content)
│       ├── components/
│       │   ├── sidebar.blade.php
│       │   ├── navbar.blade.php
│       │   └── project-card.blade.php
│       └── pages/
│           ├── dashboard.blade.php
│           ├── profile.blade.php
│           ├── projects/
│           │   ├── index.blade.php
│           │   └── show.blade.php
│           ├── skills.blade.php
│           ├── experience.blade.php
│           ├── freelance-price.blade.php
│           └── contact.blade.php
├── routes/
│   ├── web.php              # Route halaman publik
│   └── api.php              # Route API internal (filter proyek, dll.)
└── public/
    ├── images/              # Foto profil, thumbnail proyek
    └── uploads/             # File yang diupload via admin
```

---

## 5. Layout Utama

File: `resources/views/layouts/app.blade.php`

**Struktur HTML**:
```
<body>
  <div id="app-wrapper">
    @include('components.sidebar')
    <div id="main-content">
      @include('components.navbar')
      <div id="page-content">
        @yield('content')
      </div>
    </div>
  </div>
</body>
```

**Aturan layout**:
- Sidebar selalu ada di kiri, lebar penuh: `260px`
- Saat dilipat (collapsed), sidebar menjadi `64px` — hanya tampilkan icon
- `#main-content` otomatis menyesuaikan lebar saat sidebar collapsed
- Transisi sidebar menggunakan CSS transition, bukan JS animation library
- Di mobile (`< 768px`): sidebar tersembunyi default, muncul via hamburger menu sebagai overlay

---

## 6. Sidebar

File: `resources/views/components/sidebar.blade.php`

**Menu navigasi**:

| Label (ID)       | Label (EN)         | Icon (Bootstrap Icons) | Route             |
|------------------|--------------------|------------------------|-------------------|
| Dashboard        | Dashboard          | `bi-house-door`        | `/`               |
| Profil & Tentang | Profile & About    | `bi-person-circle`     | `/profile`        |
| Proyek           | Projects           | `bi-folder2-open`      | `/projects`       |
| Keahlian         | Skills             | `bi-tools`             | `/skills`         |
| Pengalaman       | Experience         | `bi-briefcase`         | `/experience`     |
| Harga Freelance  | Freelance Price    | `bi-tags`              | `/freelance-price`|
| Kontak           | Contact            | `bi-envelope`          | `/contact`        |

**Aturan sidebar**:
- Menu aktif ditandai dengan background `--color-primary` dan teks putih
- Aksen kiri (border-left 3px) warna `--color-secondary` pada menu aktif
- Saat collapsed, semua label disembunyikan — hanya icon yang tampil
- Tooltip muncul saat hover icon di mode collapsed
- Nama dan foto profil tampil di bagian atas sidebar (hanya saat expanded)

---

## 7. Navbar

File: `resources/views/components/navbar.blade.php`

**Konten navbar**:
- Kiri: tombol toggle sidebar (hamburger icon)
- Tengah: judul halaman aktif (dinamis via `@yield('title')`)
- Kanan (kiri ke kanan):
  - Toggle bahasa: tombol `ID | EN`
  - Toggle dark mode: icon `bi-moon` / `bi-sun`

**Aturan navbar**:
- Navbar `position: sticky; top: 0;` agar selalu terlihat saat scroll
- Background navbar mengikuti `--color-bg` (atau `--color-bg-dark`)
- Tinggi navbar: `56px`

---

## 8. Halaman & Konten

### Dashboard (`/`)
- Sambutan singkat: nama, profesi, tagline
- Kartu statistik: jumlah proyek, tahun pengalaman, teknologi dikuasai
- Preview 3 proyek terbaru dengan tombol "Lihat Semua"

### Profile & About (`/profile`)
- Foto profil, nama lengkap, profesi
- Bio singkat (dari database, bisa diedit via admin)
- Pendidikan (tabel: institusi, jurusan, tahun)
- Sosial media: GitHub, LinkedIn, Instagram, Email

### Projects (`/projects`)
- Daftar semua proyek dalam format card grid
- Setiap card: thumbnail, nama proyek, deskripsi singkat, tag teknologi, link demo/repo
- Fitur filter berdasarkan kategori (Web, Mobile, dll.) — via API `GET /api/projects?category=`
- Fitur search berdasarkan nama proyek — via API `GET /api/projects?search=`

### Skills (`/skills`)
- Dikelompokkan per kategori: Frontend, Backend, Database, Tools, dll.
- Setiap skill: nama, icon/logo, level (Beginner / Intermediate / Advanced)

### Experience & Education (`/experience`)
- Timeline pengalaman kerja: perusahaan, posisi, periode, deskripsi
- Timeline pendidikan: institusi, jurusan, periode

### Freelance Price (`/freelance-price`)
- Tabel atau kartu paket harga per jenis layanan
- Setiap paket: nama layanan, fitur yang termasuk, harga mulai dari, tombol "Hubungi"

### Contact (`/contact`)
- Form: nama, email, subjek, pesan
- Submit form menyimpan ke tabel `contact_messages` di database
- Kirim notifikasi email ke pemilik via `Mail` facade Laravel
- Tampilkan info kontak: WhatsApp, Email, LinkedIn

---

## 9. Database & API

### Tabel utama

| Tabel               | Kolom penting                                                        |
|---------------------|----------------------------------------------------------------------|
| `projects`          | id, title, description, category, tech_stack (JSON), thumbnail, demo_url, repo_url, is_featured, order, created_at |
| `skills`            | id, name, category, level, icon_url, order                          |
| `experiences`       | id, company, position, start_date, end_date, description, type (work/education) |
| `freelance_prices`  | id, service_name, features (JSON), price_start, is_active           |
| `contact_messages`  | id, name, email, subject, message, is_read, created_at              |
| `site_settings`     | id, key, value (untuk bio, foto profil, tagline, dll.)              |

### API Endpoints (internal)

```
GET  /api/projects              # Semua proyek
GET  /api/projects?category=X  # Filter by kategori
GET  /api/projects?search=X    # Search by nama
GET  /api/skills                # Semua skill
```

- Semua response API dalam format JSON
- API tidak memerlukan autentikasi (data publik)

---

## 10. Fitur Tambahan

### Dark Mode
- Toggle via tombol di navbar
- Implementasi: tambah/hapus class `.dark-mode` pada `<body>`
- Preferensi disimpan di `localStorage` dengan key `theme`
- Semua warna dark mode menggunakan CSS variable (lihat bagian 3)

### Multi Bahasa (ID/EN)
- Implementasi via Laravel Localization (`resources/lang/id/` dan `resources/lang/en/`)
- Toggle bahasa menyimpan pilihan di `session('locale')`
- Route toggle: `GET /language/{locale}` (menyimpan ke session lalu redirect back)
- Semua string teks di Blade menggunakan `__('key')` atau `@lang('key')`
- Jangan hardcode teks langsung di Blade — selalu gunakan key translasi

### Filter & Search Proyek
- Filter kategori: tombol pill/chip di atas grid proyek
- Search: input teks real-time
- Keduanya memanggil API `/api/projects` dengan parameter query
- Gunakan `fetch()` vanilla JS — tidak perlu Axios

### Form Kontak
- Validasi di sisi server via Laravel `FormRequest`
- Tampilkan pesan sukses/error menggunakan Bootstrap Alert
- Rate limiting: maksimal 5 pesan per IP per jam (via Laravel `throttle`)

---

## 11. Naming Conventions

| Konteks              | Konvensi          | Contoh                              |
|----------------------|-------------------|-------------------------------------|
| Controller           | PascalCase        | `ProjectController.php`             |
| Model                | PascalCase        | `Project.php`                       |
| Blade view           | kebab-case        | `project-card.blade.php`            |
| Route URL            | kebab-case        | `/freelance-price`                  |
| Tabel database       | snake_case plural | `freelance_prices`                  |
| Kolom database       | snake_case        | `tech_stack`, `is_featured`         |
| CSS class custom     | kebab-case        | `.sidebar-menu-item`                |
| JS variable          | camelCase         | `isDarkMode`, `activeCategory`      |
| JS function          | camelCase         | `toggleSidebar()`, `filterProjects()`|
| Lang key             | snake_case        | `projects.filter_all`               |

---

## 12. Development Commands

```bash
# Install dependencies
composer install
npm install

# Jalankan dev server
php artisan serve
npm run dev

# Buat migration baru
php artisan make:migration create_projects_table --create=projects

# Buat controller baru
php artisan make:controller ProjectController --resource

# Buat model baru
php artisan make:model Project -m   # sekaligus buat migration

# Jalankan migration
php artisan migrate

# Seed database
php artisan db:seed

# Clear semua cache
php artisan cache:clear && php artisan config:clear && php artisan view:clear && php artisan route:clear

# Build untuk production (sebelum upload ke cPanel)
npm run build
```

---

## 13. Deployment ke cPanel (Shared Hosting)

1. Build asset terlebih dahulu: `npm run build`
2. Upload semua file **kecuali** `node_modules/` dan `.git/`
3. Pastikan `public/` di-point ke `public_html/` atau buat subdomain
4. Set `.env` untuk environment production:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - Isi `DB_*` sesuai database cPanel
5. Jalankan `php artisan migrate --force` via SSH atau Laravel Manager
6. Set permission folder `storage/` dan `bootstrap/cache/` menjadi `775`

---

## 14. Hal yang TIDAK Boleh Diubah AI

- Warna primary (`#263F93`) dan secondary (`#ffffff`) — jangan diganti tanpa konfirmasi
- Struktur layout utama (sidebar kiri + navbar atas + konten kanan) — jangan diubah
- Behavior sidebar: collapsed = 64px icon only, expanded = 260px dengan label
- Semua teks UI harus menggunakan key translasi (`__('key')`), bukan hardcode
- Jangan tambahkan dependency besar (Vue, React, jQuery) tanpa konfirmasi pemilik
- Nama folder proyek: `IS-Portfolio` — jangan diubah

---

*AGENTS.md ini dibuat untuk proyek IS-Portfolio milik Muhammad Danil Aminuddin.*
*Update file ini setiap kali ada perubahan arsitektur atau konvensi baru.*
