# Talent Track

Talent Track adalah website yang dikembangkan untuk membantu siswa menemukan jalur karier yang sesuai dengan minat dan keterampilan mereka. Website ini menyediakan informasi berbagai profesi seperti Chef, Programmer, Lawyer, Animator, dan masih banyak lagi, sehingga siswa dapat mengeksplorasi pilihan karier mereka secara mudah dan terorganisir.

---

## Instalasi Project dan Set-Up Database

**1. Download File MySQL**

Tekan file `career_database (2).sql` yang ada di GitHub repository lalu download.

**2. Masuk ke Database**

Buka Laragon, klik kanan → MySQL → phpMyAdmin. Isi username dengan `root` dan kosongkan password.

**3. Menambahkan Database**

Tekan tombol **"New"** dan masukkan nama database `career_database`, lalu tekan **"Create"**.

**4. Import File MySQL**

Tekan tab **"Import"**, masukkan file SQL yang sudah didownload, lalu tekan tombol **"Import"** di bagian bawah.

**5. Git Clone**

Buka terminal Laragon dan ketik:
```
git clone https://github.com/Laragoons/Talent-Track.git
```

**6. Pindah Directory**
```
cd Talent-Track
```

**7. Jalankan Local Host**
```
php -S localhost:3000 -t public\
```

**8. Buka Aplikasi**

Paste `http://localhost:3000` pada browser untuk masuk ke halaman aplikasi.

---

## Fitur Utama

1. Pengguna dapat mendaftarkan akun dan login untuk mengakses seluruh fitur aplikasi.
2. Pengguna dapat memilih minat dari 15 kategori yang tersedia seperti Coding, Cooking, Law, Photography, dan lainnya.
3. Halaman Home menampilkan rekomendasi karier yang disesuaikan dengan minat pengguna secara otomatis.
4. Pengguna dapat melihat detail setiap karier, termasuk deskripsi, skill yang dibutuhkan, dan tanggung jawab pekerjaan.
5. Pengguna dapat menyimpan karier favorit dan mengelolanya di halaman Saved Careers.
6. Pengguna dapat melihat seluruh daftar karier yang tersedia di halaman Full Career List.
7. Pengguna dapat mengelola minat dan karier tersimpan melalui halaman Profile.

---

## Entitas yang Digunakan

Proyek ini menggunakan 5 entitas utama:

- **Users** — Menyimpan data akun pengguna yang diperlukan untuk proses register dan login.
- **Interests** — Menyimpan 15 kategori minat yang dapat dipilih oleh pengguna.
- **Careers** — Menyimpan data seluruh jalur karier beserta deskripsi dan gambarnya.
- **User Interests** — Menyimpan relasi antara pengguna dan minat yang telah dipilih.
- **Saved Careers** — Menyimpan relasi antara pengguna dan karier yang telah disimpan.

---

## Cara Penggunaan

1. Pengguna membuat akun di halaman Register.
2. Pengguna login dengan akun yang sudah dibuat.
3. Pengguna memilih minat di halaman Choose Interest.
4. Pengguna masuk ke Home dan melihat rekomendasi karier sesuai minatnya.
5. Pengguna menekan "More Details" untuk melihat informasi lengkap suatu karier.
6. Pengguna menekan ikon bookmark untuk menyimpan karier ke daftar tersimpan.
7. Pengguna dapat melihat karier tersimpan di halaman Saved Careers.
8. Pengguna dapat mengelola minat dan profil di halaman Profile.

---

## Arsitektur Project

- **Frontend:** HTML, Tailwind CSS, JavaScript
- **Backend:** PHP (MVC Pattern), MySQL
- **Design:** Figma

---

## Kontributor (Kelompok 5)

- Axelle Questine Farrell Then
- Charles
- Elvan Emmanuel Firdellia
- Ryo Marvel
