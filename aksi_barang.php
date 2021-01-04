<?php
$koneksi=mysqli_connect('localhost','root','','db_iventory');
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO barang (nama_barang,id_jenis,satuan,harga_beli,harga_jual,stok) values(
		'$_POST[namabarang]',
		'$_POST[id_jenis]',
		'$_POST[satuan]',
		'$_POST[hargabeli]',
		'$_POST[hargajual]',
		'$_POST[stok]')");
	if ($simpan)
			header('location:index.php?p=barang');
}
}

if ($_GET['proses']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM barang WHERE id_barang='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=barang');
}

if ($_GET['proses']=='ubah'){
	if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"UPDATE barang SET 
		nama_barang='$_POST[namabarang]',
		id_jenis='$_POST[id_jenis]',
		satuan='$_POST[satuan]',
		harga_beli='$_POST[hargabeli]',
		harga_jual='$_POST[hargajual]',
		stok='$_POST[stok]' 
		WHERE id_barang='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=barang');
}
}
?>