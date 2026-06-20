# Greenwashing vs Greenhushing Experiment Platform

Platform eksperimen berbasis web ini dirancang untuk penelitian akademis atau studi perilaku konsumen terkait efek **Greenwashing** dan **Greenhushing** pada persepsi dan keputusan pembelian produk (dalam hal ini menggunakan studi kasus smartphone).

Aplikasi ini telah di-deploy dan dapat diakses secara langsung di: **[https://greenhushing.vercel.app/](https://greenhushing.vercel.app/)**

## 🎯 Tujuan Proyek

Proyek ini dibangun secara khusus dengan tujuan:
1. **Fasilitas Penelitian (Data Collection):** Memfasilitasi alur eksperimen yang runtut, mulai dari pengisian profil, kuesioner *pre-test*, simulasi pasar (*market simulation*), hingga pemberian *rating* atau ulasan produk.
2. **A/B Testing Terkontrol:** Membagi responden ke dalam dua kelompok manipulasi (perlakuan) yang berbeda tanpa mereka sadari. Pengelompokan ini dilakukan secara sistematis melalui **Sistem Kode Akses**.
3. **Analisis Perilaku Pengguna:** Menyimpan metrik dan keputusan pengguna, seperti produk apa yang mereka nilai lebih tinggi setelah terpapar narasi pemasaran yang mengandung *Greenwashing* atau *Greenhushing*.

## 🔑 Kode Akses (Access Code)

Untuk memulai eksperimen, responden diwajibkan memasukkan kode akses. Kode ini akan menentukan skenario/narasi mana yang akan mereka hadapi:

- **`ABCD`** ➔ Mengarahkan responden ke simulasi **Greenwashing** (Menampilkan kombinasi produk *onephone* dan *zenophone*).
- **`TUVW`** ➔ Mengarahkan responden ke simulasi **Greenhushing** (Menampilkan kombinasi produk *onephone* dan *neuphone*).

## 🛠 Tech Stack (Teknologi yang Digunakan)

Aplikasi ini dibangun menggunakan arsitektur web modern yang memastikan performa tinggi dan pengelolaan infrastruktur yang minim (*serverless*):

### Backend & Core Logic
- **[Laravel 11](https://laravel.com/) (PHP 8.2)**: Framework utama yang menangani *routing*, manajemen *session* responden, *middleware* pelindung alur eksperimen, dan pengolahan data.

### Frontend & UI/UX
- **[Tailwind CSS](https://tailwindcss.com/)**: Digunakan untuk menyusun antarmuka (UI) yang modern, cantik, bersih, dan responsif.
- **[Blade Templating](https://laravel.com/docs/11.x/blade)**: Sistem *template* bawaan Laravel untuk memisahkan logika dari tampilan antarmuka.
- **[Vite](https://vitejs.dev/)**: *Build tool* untuk memproses dan mengompres aset *frontend* (CSS dan JS) dengan sangat cepat.

### Database & Infrastruktur
- **[Supabase](https://supabase.com/) (PostgreSQL)**: Bertindak sebagai *Database-as-a-Service* (DBaaS) yang menyimpan seluruh data profil responden, log aktivitas, skor *pre-test*, dan hasil *rating* secara aman.
- **[Vercel](https://vercel.com/) (Serverless)**: Platform hosting *cloud* terdepan. Aplikasi Laravel dikonfigurasi menggunakan `vercel-php` sehingga berjalan murni sebagai *Serverless Functions* tanpa perlu *provisioning* server tradisional.

## 🚀 Alur Pengguna (User Flow) Eksperimen

1. **Profil Diri:** Responden menyetujui *consent* dan mengisi profil demografi dasar.
2. **Validasi Akses:** Responden diminta memasukkan kode unik (ABCD / TUVW).
3. **Tahap Pre-test:** Pengisian kuesioner awal untuk mengukur pengetahuan dasar atau tendensi psikologis partisipan sebelum diberi perlakuan.
4. **Simulasi Pasar (Treatment):** Responden akan membaca dan mengeksplorasi deskripsi produk dengan bahasa pemasaran yang berbeda (dimanipulasi sesuai kode akses mereka).
5. **Penilaian (Rating):** Responden memberikan *rating* atau membuat keputusan berbasis manipulasi narasi lingkungan yang baru saja mereka baca.
