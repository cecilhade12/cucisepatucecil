<?php
$koneksi=mysqli_connect('localhost','root','','cuci_sepatuu');
if ($_GET['aksi']=='tambah'){
if (isset($_POST['btnSubmit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO layanan (nama_layanan) values('$_POST[nama_layanan]')");
	if ($simpan)
			header('location:index.php?p=layanan');
}
}

if ($_GET['aksi']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM layanan WHERE id_layanan='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=layanan');
}

if ($_GET['aksi']=='ubah'){
	if (isset($_POST['btnSubmit'])) {
	$simpan=mysqli_query($koneksi,"UPDATE layanan SET 
		nama_layanan='$_POST[nama_layanan]'
		WHERE id_layanan='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=layanan');
}
}
?>