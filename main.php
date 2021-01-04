<?php
$p=isset($_GET['p']) ? $_GET['p'] : 'home';
if($p=='layanan') include('layanan.php');
if($p=='bahan') include('bahan.php');
if($p=='pelanggan') include('pelanggan.php');
if($p=='barang') include('barang.php');
if($p=='user') include('user.php');
if($p=='penjualan') include('penjualan.php');
if($p=='pembelian') include('pembelian.php');
?>