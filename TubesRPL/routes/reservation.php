<?php
// Lakukan pengecekan ketersediaan meja berdasarkan tanggal dan waktu yang diterima
$tgl_reservasi = $_GET['tgl_reservasi'];
$wkt_reservasi = $_GET['wkt_reservasi'];

// Contoh pengecekan ketersediaan meja
// Di sini Anda dapat memanggil fungsi atau melakukan query ke database untuk memeriksa ketersediaan meja

// Misalnya, kita anggap meja tersedia jika tanggal dan waktu reservasi tidak jatuh pada hari Minggu dan waktu antara 10:00 dan 20:00
//$is_available = (date('N', strtotime($reservation_date)) != 7) && (strtotime($reservation_time) >= strtotime('10:00') && strtotime($reservation_time) <= strtotime('20:00'));

// Simpan hasil pengecekan ketersediaan meja dalam session
session_start();
$_SESSION['tgl_tersedia'] = $tgl_reservasi;
$_SESSION['wkt_tersedia'] = $wkt_reservasi;
$_SESSION['tersedia'] = $tersedia;

// Redirect ke halaman reservation blade
header('Location: reservation.blade.php');
exit;
?>
