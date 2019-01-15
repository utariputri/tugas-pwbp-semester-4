<?php 

require_once 'App/init.php';

$produk1 = new Komik ("Stitch", "Utari Putri", "Rudista Ardiansyah", 400000, 100);
$produk2 = new Game ("Free Fire", "Alif", "Arul Fahlevy", 600000, 5);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );
echo $cetakProduk->cetak();

echo "<hr>";

new Coba();