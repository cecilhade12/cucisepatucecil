<?php
$koneksi=mysqli_connect('localhost','root','','db_iventory');
if($_GET['proses']=='tambah'){
    $koneksi=mysqli_connect('localhost','root','','db_iventory');
    $nomorfaktur = isset($_POST['txtnofaktur'])?$_POST['txtnofaktur']:'';
    $idpelanggan = isset($_POST['id_pelanggan'])?$_POST['id_pelanggan']:'';
    $total = isset($_POST['total_bayar'])?$_POST['total_bayar']:'';
    $tglpenjualan = isset($_POST['tgl_penjualan'])?$_POST['tgl_penjualan']:'';
    session_start();
    $user = $_SESSION['user'];
    $keterangan = isset($_POST['keterangan'])?$_POST['keterangan']:'';
    if(isset($_POST['submitt'])){
      $simpan = mysqli_query($koneksi,"insert into penjualan (faktur,tgl_penjualan,id_pelanggan,total_bayar,id_user,keterangan) values('$nomorfaktur','$tglpenjualan',$idpelanggan,$total,'$user','$keterangan')");
      if($simpan){
        header('location:index.php?p=penjualan');
      }
    }
  }
  if($_GET['proses']=='hapus'){
    $hapus = mysqli_query($koneksi,"DElETE FROM penjualan where faktur='$_GET[kode]' ");
    $hapusdetail=mysqli_query($koneksi,"DElETE FROM detail_penjualan where faktur like '$_GET[kode]' ");
      if($hapus and $hapusdetail){
        header('location:index.php?p=penjualan');
      }
    }
  ?>