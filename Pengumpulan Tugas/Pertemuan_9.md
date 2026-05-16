# Praktikum PWF Pertemuan 9: API (CRUD) & Otentikasi

**Nama:** ASYIRAAF NUFAIL DHIAURRAHMAN ARRAYYAN  
**NIM:** 20230140079  
**Mata Kuliah:** Praktikum Pemrograman Web Framework  

---

## Dokumentasi Pengujian API (Postman)

Berikut adalah bukti pengujian dari semua *endpoint* API yang telah dibuat dan dilindungi dengan *Bearer Token*:

### 1. Otentikasi & Mendapatkan Token
Melakukan `POST` ke `/api/login` untuk mendapatkan `access_token` yang akan digunakan pada request selanjutnya.
> **Endpoint:** `POST http://127.0.0.1:8000/api/login`

![SS Login & Get Token](/ss/login_admin.png)
*(Keterangan: Screenshot menampilkan body request berisi email & password, serta response 200 OK yang mengembalikan Bearer Token).*

---

### 2. CRUD Category (Tugas Praktikum 1)

**A. Create Category (POST)**
Menambahkan kategori baru ke dalam database. Wajib menggunakan Token.
> **Endpoint:** `POST http://127.0.0.1:8000/api/category`

![SS Create Category](/ss/api_add_c.png)
*(Keterangan: Screenshot menampilkan pengaturan Bearer Token di tab Authorization, input JSON di Body, dan response 201 Created).*

**B. Read All Categories (GET)**
Menampilkan seluruh daftar kategori.
> **Endpoint:** `GET http://127.0.0.1:8000/api/category`

![SS Read Category](/ss/api_read_c.png)
*(Keterangan: Screenshot menampilkan method GET dan response 200 OK dengan data seluruh kategori).*

**C. Update Category (PUT)**
Mengubah nama kategori berdasarkan ID. Wajib menggunakan Token.
> **Endpoint:** `PUT http://127.0.0.1:8000/api/category/{id}`

![SS Update Category](/ss/api_put_c.png)
*(Keterangan: Screenshot menampilkan response 200 OK dan pesan bahwa kategori berhasil diubah, authorization berwarna hijau tandanya token terisi!!!).*

**D. Delete Category (DELETE)**
Menghapus data kategori dari database berdasarkan ID. Wajib menggunakan Token.
> **Endpoint:** `DELETE http://127.0.0.1:8000/api/category/{id}`

![SS Delete Category](/ss/api_del_c.png)
*(Keterangan: Screenshot menampilkan response 200 OK dan pesan bahwa kategori berhasil dihapus, authorization berwarna hijau berisi token!!!!).*

---

### 3. CRUD Product (Tugas Praktikum 2)

**A. Create Product (POST)**
Menambahkan produk baru. Wajib menggunakan Token.
> **Endpoint:** `POST http://127.0.0.1:8000/api/product`

![SS Create Product](/ss/api_add_p.png)
*(Keterangan: Screenshot menampilkan response 201 Created setelah berhasil menginput nama produk, deskripsi, harga, stok, dan category_id).*

**B. Read All Products (GET)**
Menampilkan seluruh produk beserta relasinya dengan tabel kategori.
> **Endpoint:** `GET http://127.0.0.1:8000/api/product`

![SS Read Product](/ss/api_read_P.png)
*(Keterangan: Screenshot menampilkan response 200 OK dan daftar produk yang memuat detail kategorinya).*

**C. Update Product (PUT)**
Mengubah detail data produk berdasarkan ID. Wajib menggunakan Token.
> **Endpoint:** `PUT http://127.0.0.1:8000/api/product/{id}`

![SS Update Product](/ss/api_put_p.png)
*(Keterangan: Screenshot menampilkan response 200 OK setelah data produk berhasil diubah).*

**D. Delete Product (DELETE)**
Menghapus produk dari database berdasarkan ID. Wajib menggunakan Token.
> **Endpoint:** `DELETE http://127.0.0.1:8000/api/product/{id}`

![SS Delete Product](/ss/api_del_P.png)
*(Keterangan: Screenshot menampilkan response 200 OK dengan pesan bahwa produk berhasil dihapus).*