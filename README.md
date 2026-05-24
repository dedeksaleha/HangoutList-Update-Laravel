# 📌 Proyek Hangout List - Tugas Eloquent ORM

Aplikasi web Laravel 11 untuk mengelola data tempat hangout menggunakan **Eloquent ORM** dan **Relasi Antar Tabel**.

---

## ✅ Pemenuhan Tugas 
* **Model & Migration:** Menggunakan Model `Hangout` dan `Category`.
* **Relasi Tabel:** Hubungan *One-to-Many* antara Tabel Kategori dan Tempat Hangout.
* **Fitur Filter:** Menggunakan fungsi `where()` untuk pencarian data.

---

## 🛠️ Implementasi Kode Method Eloquent

Berikut adalah fungsi wajib yang sudah diterapkan di `HangoutController.php`:

1. **Menampilkan Data & Relasi:**
   `Hangout::with('category')->get();`
2. **Tambah Data (`create`):**
   `Hangout::create($request->all());`
3. **Cari Data (`find`):**
   `$hangout = Hangout::find($id);`
4. **Filter Data (`where`):**
   `Hangout::where('category_id', $id)->get();`
5. **Edit Data (`update`):**
   `$hangout->update($request->all());`
6. **Hapus Data (`delete`):**
   `$hangout->delete();`

---
*Dibuat untuk memenuhi Tugas Mata Kuliah Pemrograman Berbasis Web (PBW).*
