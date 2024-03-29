<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bento Kopi</title>
<!-- Tambahkan link Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  .navbar {
    background-color: #fff; /* Ubah warna navbar menjadi putih */
    overflow: hidden;
    display: flex;
    justify-content: space-between; /* Menjadikan flex container dan menyebar item ke dua ujung */
    align-items: center; /* Memposisikan item secara vertikal di tengah */
  }
  .navbar-brand {
    padding: 15px 20px;
    color: #28a745; /* Ubah warna teks menjadi hijau (#28a745) */
    text-decoration: none;
    font-size: 20px;
  }
  .navbar-brand:hover {
    background-color: #555;
  }
  .navbar-search {
    flex: 1; /* Membuat bagian pencarian memanjang sejauh mungkin */
    text-align: center; /* Pindahkan fitur pencarian ke tengah */
    padding: 15px 0; /* Sesuaikan padding jika diperlukan */
  }
  .search-button {
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    background-color: #ddd; /* Ubah warna latar belakang menjadi abu */
    color: black; /* Ubah warna teks menjadi hitam */
    cursor: pointer;
  }
  .search-button:hover {
    background-color: #bbb; /* Ubah warna latar belakang menjadi abu tua saat dihover */
  }
  .icon {
    font-size: 24px;
    margin-left: 10px;
  }
  .navigation-bar {
    background-color: #f2f2f2; /* Warna latar belakang */
    padding: 15px 20px;
    display: flex;
    flex-direction: column;
  }
  .navigation-bar-item {
    margin-bottom: 10px; /* Memberikan jarak antar tombol */
    padding: 10px 20px; /* Padding tombol */
    background-color: #28a745; /* Warna latar belakang tombol */
    color: #fff; /* Warna teks */
    border: none; /* Hapus border */
    border-radius: 4px; /* Border radius */
    cursor: pointer;
    text-decoration: none;
    font-size: 16px;
    text-align: center;
  }
  .navigation-bar-item:hover {
    background-color: #218838; /* Warna latar belakang tombol saat dihover */
    
  }
  .navigation-sort {
    background-color: #f2f2f2; /* Warna latar belakang */
    padding: 15px 20px;
  }
  .product-table {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .product-menu {
    width: 23%; /* Lebar menu produk */
    padding: 20px;
    background-color: #f9f9f9; /* Warna latar belakang */
    border: 1px solid #ddd; /* Border */
    margin-bottom: 20px;
  }
  .product-menu-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: center;
  }
  .product-menu-description {
    margin-bottom: 10px;
  }
  .add-to-cart-button {
    padding: 10px 20px;
    background-color: #28a745; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
  }
  .add-to-cart-button:hover {
    background-color: #218838; /* Warna latar belakang saat dihover */
  }
</style>
</head>
<body>

<div class="navbar">
  <a href="#" class="navbar-brand"><strong>BetoKopi</strong></a>
  <div class="navbar-search">
    <input type="text" class="search-input" placeholder="Cari">
    <!-- Tombol Pencarian (Cari) -->
    
 
    </div>
  <!-- Ikon Keranjang -->
  <div class="icon" style="margin-right: 10px;"><i class="fas fa-shopping-cart"></i></div>
  <!-- Ikon Profil dan Nama -->
  <div class="icon"><i class="fas fa-user"></i> Bima</div>
</div>

<div class="navigation-bar" style="flex-direction: row;">
  <a href="#" class="navigation-bar-item" style="flex-grow: 1; margin-right: 10px;">Semua</a>
  <a href="#" class="navigation-bar-item" style="flex-grow: 1; margin-right: 10px;">Coffe</a>
  <a href="#" class="navigation-bar-item" style="flex-grow: 1; margin-right: 10px;">Milk</a>
  <a href="#" class="navigation-bar-item" style="flex-grow: 1; margin-right: 10px;">Tea</a>
  <a href="#" class="navigation-bar-item" style="flex-grow: 1;">Noodle</a>
</div>


<div class="navigation-sort">
  <p>NAVIGATION SORT BY</p>
</div>

<div class="product-menu-title" style="text-align: left; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Coffee</div>


<div class="product-table">

<!-- Tombol Navigasi Kiri -->
<button class="slide-button" onclick="slideLeft()">&#10094;</button>
  <!-- Menu Produk Minuman (COFFEE) -->
  <div class="product-menu" style="width: 14%;">
    <img src="img/kopi.jpg" alt="Minuman Coffe" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Coffee Milk</div>
    <div class="product-menu-description">Kopi + Susu</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <!-- Menu Produk Minuman (COFFEE) -->
  <div class="product-menu" style="width: 14%;">
    <img src="img/kopi.jpg" alt="Minuman Coffe" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Coffee Milk</div>
    <div class="product-menu-description">Kopi + Susu</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <!-- Menu Produk Noodie -->
  <div class="product-menu" style="width: 14%;">
    <img src="img/kopi.jpg" alt="Minuman Coffe" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Coffee Milk</div>
    <div class="product-menu-description">Kopi + Susu</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <!-- Menu Produk Bread -->
  <div class="product-menu" style="width: 14%;">
    <img src="img/kopi.jpg" alt="Minuman Coffe" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Coffee Milk</div>
    <div class="product-menu-description">Kopi + Susu</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <!-- Menu Produk Noodle -->
  <div class="product-menu" style="width: 14%;">
    <img src="img/kopi.jpg" alt="Minuman Coffe" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Coffee Milk</div>
    <div class="product-menu-description">Kopi + Susu</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <!-- Tombol Navigasi Kanan -->
<button class="slide-button" onclick="slideRight()">&#10095;</button>
</div>


<!-- Product Teh -->
<div class="product-menu-title" style="text-align: left; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Teh</div>

<div class="product-table">
  <!-- Menu Produk Teh -->
  <div class="product-menu" style="width: 14%;">
    <img src="img/tea.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Teh Tarik</div>
    <div class="product-menu-description">Teh Manis dan Pahit</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

   <!-- Menu Produk Teh -->
   <div class="product-menu" style="width: 14%;">
    <img src="img/tea.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Teh Tarik</div>
    <div class="product-menu-description">Teh Manis dan Pahit</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>
  
   <!-- Menu Produk Teh -->
   <div class="product-menu" style="width: 14%;">
    <img src="img/tea.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Teh Tarik</div>
    <div class="product-menu-description">Teh Manis dan Pahit</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>
  
   <!-- Menu Produk Teh -->
   <div class="product-menu" style="width: 14%;">
    <img src="img/tea.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Teh Tarik</div>
    <div class="product-menu-description">Teh Manis dan Pahit</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>
  
  <!-- Menu Produk Teh -->
  <div class="product-menu" style="width: 14%;">
    <img src="img/tea.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Teh Tarik</div>
    <div class="product-menu-description">Teh Manis dan Pahit</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>  
</div>


<!-- Product Makanan -->
<div class="product-menu-title" style="text-align: left; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Noodle</div>

<div class="product-table">
  <div class="product-menu" style="width: 14%;">
    <img src="img/mie.jpg" alt="Makanan" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Mie Goreng</div>
    <div class="product-menu-description">Mie yang digoreng dengan berbagai bumbu dan tambahan</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <div class="product-menu" style="width: 14%;">
    <img src="img/mie.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Mie</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <div class="product-menu" style="width: 14%;">
    <img src="img/mie.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Mie</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>  
  
  <div class="product-menu" style="width: 14%;">
    <img src="img/mie.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Mie</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>  
  
  <div class="product-menu" style="width: 14%;">
    <img src="img/mie.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Mie</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>    
</div>

<!-- Product Makanan -->
<div class="product-menu-title" style="text-align: left; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Bread</div>

<div class="product-table">
  <div class="product-menu" style="width: 14%;">
    <img src="img/bread.jpg" alt="Makanan" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Mie Goreng</div>
    <div class="product-menu-description">Mie yang digoreng dengan berbagai bumbu dan tambahan</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <div class="product-menu" style="width: 14%;">
    <img src="img/bread.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Kontol</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>

  <div class="product-menu" style="width: 14%;">
    <img src="img/bread.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Kontol</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>  
  
  <div class="product-menu" style="width: 14%;">
    <img src="img/bread.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Kontol</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>  
  
  <div class="product-menu" style="width: 14%;">
    <img src="img/bread.jpg" alt="Minuman Teh" style="width: 100%; margin-bottom: 10px;">
    <div class="product-menu-title" style="text-align: left;">Noodle</div>
    <div class="product-menu-description">Kontol</div>
    <button class="add-to-cart-button" style="width: 100%;">Tambah</button>
  </div>    
</div>


</body>
</html>
