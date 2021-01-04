<?php
$koneksi=mysqli_connect('localhost','root','','cuci_sepatuu');
if ($_GET['aksi']=='tambah'){
if (isset($_POST['btnSubmit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO bahan (nama,jenis,bahan) values('$_POST[nama]','$_POST[jenis]','$_POST[bahan]')");
	if ($simpan)
			header('location:index.php?p=bahan');
}
}

if ($_GET['aksi']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM bahan WHERE id='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=bahan');
}

if ($_GET['aksi']=='ubah')
{
	if (isset($_POST['btnSubmit']))
	{
	$simpan=mysqli_query($koneksi,"UPDATE bahan SET nama='$_POST[nama]',jenis='$_POST[jenis]',bahan='$_POST[bahan]' WHERE id ='$_GET[kode]' ");
	if ($simpan)
			header('location:index.php?p=bahan');
	}
}
?>