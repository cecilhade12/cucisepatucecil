<?php
if($_GET['proses']=='hapus'){
    $koneksi=mysqli_connect('localhost','root','','db_iventory');
    $nomorfaktur = isset($_GET[kode])?$_GET[kode]:'';
    session_start();
    $hapus = mysqli_query($koneksi,"delete from detail_penjualan where faktur like '$_GET[kode]'");
    if($hapus){
      header('location:index.php?p=penjualan&aksi=edit&kode=$nomorfaktur');
    }    
  }
?>