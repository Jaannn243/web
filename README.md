**Nama : Ahmad Fauzan Adhima**
**NIM : 230605110081**
**Jurusan : Teknik Informatika**

# Blog Dinamis - Database dan Struktur Tabel

## Nama Database
Database ini digunakan untuk aplikasi **Blog Dinamis** dan nama database yang digunakan adalah:

**`dbcms`**

## Struktur Tabel

### 1. **Tabel `author`**
Tabel ini menyimpan data penulis artikel.

| Kolom       | Tipe Data     | Deskripsi                          |
|-------------|---------------|------------------------------------|
| `author_id` | `INT`         | Primary Key, ID unik penulis      |
| `name`      | `VARCHAR(100)`| Nama lengkap penulis              |

### 2. **Tabel `category`**
Tabel ini menyimpan data kategori artikel.

| Kolom        | Tipe Data     | Deskripsi                           |
|--------------|---------------|-------------------------------------|
| `category_id`| `INT`         | Primary Key, ID unik kategori       |
| `name`       | `VARCHAR(100)`| Nama kategori                       |

### 3. **Tabel `article`**
Tabel ini menyimpan data artikel.

| Kolom         | Tipe Data    | Deskripsi                          |
|---------------|--------------|------------------------------------|
| `article_id`  | `INT`        | Primary Key, ID unik artikel       |
| `title`       | `VARCHAR(255)`| Judul artikel                     |
| `content`     | `TEXT`       | Isi artikel                        |
| `publish_date`| `DATE`       | Tanggal artikel dipublikasikan     |
| `picture`     | `VARCHAR(255)`| Nama gambar terkait artikel (optional) |

### 4. **Tabel `article_author`**
Tabel ini menghubungkan artikel dengan penulis, dengan relasi **many-to-many**.

| Kolom         | Tipe Data    | Deskripsi                           |
|---------------|--------------|-------------------------------------|
| `article_id`  | `INT`        | Foreign Key dari `article`         |
| `author_id`   | `INT`        | Foreign Key dari `author`          |

### 5. **Tabel `article_category`**
Tabel ini menghubungkan artikel dengan kategori, dengan relasi **many-to-many**.

| Kolom          | Tipe Data    | Deskripsi                           |
|----------------|--------------|-------------------------------------|
| `article_id`   | `INT`        | Foreign Key dari `article`         |
| `category_id`  | `INT`        | Foreign Key dari `category`        |

## Query SQL

Berikut adalah beberapa query SQL yang digunakan untuk mengambil data artikel, penulis, dan kategori.

### 1. **Menampilkan Daftar Artikel Beserta Penulis dan Kategori**
Query berikut akan mengambil data artikel, penulis, kategori, serta gambar terkait:

```sql
SELECT 
    a.title AS title,
    a.publish_date AS publish_date,
    au.name AS author,
    c.name AS category,
    a.content AS content,
    a.picture AS picture
FROM article a
JOIN article_author aa ON a.article_id = aa.article_id
JOIN author au ON aa.author_id = au.author_id
JOIN article_category ac ON a.article_id = ac.article_id
JOIN category c ON ac.category_id = c.category_id;

# Blog Dinamis - Aplikasi Web

## Deskripsi
**Blog Dinamis** adalah sebuah aplikasi web yang memungkinkan pengguna untuk membaca artikel-artikel yang dikelola melalui basis data. Aplikasi ini dirancang untuk menampilkan artikel dengan informasi terkait seperti penulis, kategori, tanggal publikasi, dan gambar. Artikel dapat dikategorikan dalam berbagai topik, dan setiap artikel dapat memiliki beberapa penulis dan kategori yang terhubung.

Blog ini memiliki sistem backend berbasis **MySQL** yang memungkinkan pengelolaan artikel, kategori, penulis, dan gambar yang terkait. Semua data disimpan dalam tabel-tabel terstruktur dengan relasi **many-to-many** antara artikel, penulis, dan kategori.

Aplikasi ini dirancang untuk membantu pengguna dalam mengelola dan menampilkan artikel-artikel dengan tampilan yang responsif dan estetis. Pengguna dapat menikmati pengalaman membaca artikel yang terstruktur, dan navigasi antar artikel menjadi mudah dan menyenangkan.

## Fitur Utama
- **Manajemen Artikel**: Artikel dapat ditambah, diubah, dan ditampilkan dengan informasi yang terstruktur, seperti judul, konten, tanggal publikasi, penulis, dan kategori.
- **Kategori dan Penulis**: Setiap artikel dapat dikategorikan dalam beberapa kategori, dan dapat memiliki beberapa penulis yang menghubungkannya.
- **Desain Responsif**: Aplikasi menggunakan desain responsif untuk memastikan tampilan artikel yang optimal di berbagai perangkat (desktop, tablet, dan ponsel).
- **Gambar Artikel**: Setiap artikel dapat memiliki gambar yang diambil dari file lokal atau disimpan dalam basis data, memberikan nilai estetika dan visual.
- **Navigasi Mudah**: Tautan navigasi di bagian atas halaman untuk mempermudah akses ke bagian-bagian tertentu dalam aplikasi, seperti halaman utama, kategori, atau halaman lainnya.

## Teknologi yang Digunakan
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL untuk penyimpanan artikel, penulis, kategori, dan gambar
- **Desain Responsif**: Menggunakan CSS media queries untuk mendukung tampilan pada berbagai perangkat

