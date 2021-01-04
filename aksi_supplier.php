<?php
$koneksi=mysqli_connect('localhost','root','','db_iventory');
if ($_GET['aksi']=='tambah'){
if (isset($_POST['btnSubmit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO supplier (nama_supplier,telp,email,alamat,kelurahan,kecamatan,kota,provinsi) values('$_POST[nama_supplier]','$_POST[telp]','$_POST[email]','$_POST[alamat]','$_POST[kelurahan]','$_POST[kecamatan]','$_POST[kota]','$_POST[provinsi]')");
	if ($simpan)
			header('location:index.php?p=supplier');
}
}

if ($_GET['aksi']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM supplier WHERE id_supplier='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=supplier');
}

if ($_GET['aksi']=='ubah'){
	if (isset($_POST['btnSubmit'])) {
	$simpan=mysqli_query($koneksi,"UPDATE supplier SET 
		nama_supplier='$_POST[nama_supplier]',
		telp='$_POST[telp]',
		email='$_POST[email]',
		alamat='$_POST[alamat]',
		kelurahan='$_POST[kelurahan]',
		kecamatan='$_POST[kecamatan]',
		kota='$_POST[kota]',
		provinsi='$_POST[provinsi]'
		WHERE id_supplier='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=supplier');
}
}
?>