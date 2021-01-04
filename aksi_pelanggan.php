<?php
$koneksi=mysqli_connect('localhost','root','','cuci_sepatuu');
if ($_GET['aksi']=='tambah'){
if (isset($_POST['btnSubmit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO pelanggan (nama,alamat,no_hp,email) values('$_POST[nama]','$_POST[alamat]','$_POST[no_hp]','$_POST[email]')");
	if ($simpan)
			header('location:index.php?p=pelanggan');
}
}

if ($_GET['aksi']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=pelanggan');
}

if ($_GET['aksi']=='ubah')
{
	if (isset($_POST['btnSubmit']))
	{
	$simpan=mysqli_query($koneksi,"UPDATE pelanggan SET nama='$_POST[nama]',alamat='$_POST[alamat]',no_hp='$_POST[no_hp]',email='$_POST[email]' WHERE id_pelanggan='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=pelanggan');
	}
}
?>