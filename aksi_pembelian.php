<?php
$koneksi=mysqli_connect('localhost','root','','db_iventory');
if($_GET['proses']=='tambah'){
    $koneksi=mysqli_connect('localhost','root','','db_iventory');
    $nomorfaktur = isset($_POST['txtnofaktur'])?$_POST['txtnofaktur']:'';
    $idsupplier = isset($_POST['id_supplier'])?$_POST['id_supplier']:'';
    $total = isset($_POST['total_bayar'])?$_POST['total_bayar']:'';
    $tglpembelian = isset($_POST['tgl_pembelian'])?$_POST['tgl_pembelian']:'';
    session_start();
    $user = $_SESSION['user'];
    $keterangan = isset($_POST['keterangan'])?$_POST['keterangan']:'';
    if(isset($_POST['submitt'])){
      $simpan = mysqli_query($koneksi,"insert into pembelian (faktur,tgl_pembelian,id_supplier,total_bayar,username,keterangan) values('$nomorfaktur','$tglpembelian',$idsupplier,$total,'$user','$keterangan')");
      if($simpan){
        header('location:index.php?p=pembelian');
      }
    }
  }
  if($_GET['proses']=='hapus'){
    $hapus = mysqli_query($koneksi,"DElETE FROM pembelian where faktur='$_GET[kode]' ");
    $hapusdetail=mysqli_query($koneksi,"DElETE FROM detail_pembelian where faktur like '$_GET[kode]' ");
      if($hapus and $hapusdetail){
        header('location:index.php?p=pembelian');
      }
    }
  ?>