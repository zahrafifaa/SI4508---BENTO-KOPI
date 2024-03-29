// Fungsi untuk menggeser tabel produk ke kiri
function slideLeft() {
    const container = document.querySelector('.product-table-container');
    container.scrollLeft -= 100; // Menggeser ke kiri sejauh 100 piksel
  }
  
  // Fungsi untuk menggeser tabel produk ke kanan
  function slideRight() {
    const container = document.querySelector('.product-table-container');
    container.scrollLeft += 100; // Menggeser ke kanan sejauh 100 piksel
  }
  