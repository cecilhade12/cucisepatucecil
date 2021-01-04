<section class="content">
  <div class="box">
    <div class="box-body">
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Barang</h1>
<p><a href="laporanbarang.php" class="btn btn-default">Laporan Barang</a></p>
<p><a href="?p=barang&aksi=entri" class="btn btn-primary">Tambah data</a></p>
<div class="col-sm-5">

</div>

<table class="table table-condensed">
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Jenis Barang</th>
		<th>Satuan</th>
		<th>Harga Beli</th>
    <th>Harga Jual</th>
    <th>Stok</th>
	</tr>
	<?php
	$koneksi=mysqli_connect("localhost","root","","db_iventory"); 
	$data=mysqli_query($koneksi,"SELECT * FROM barang,jenis_barang where barang.id_jenis=jenis_barang.id_jenis");
	$no=1;
	while ($row=mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['nama_barang'] ?></td>
		<td><?php echo $row['nama_jenis']?></td>
		<td><?php echo $row['satuan'] ?></td>
    <td><?php echo $row['harga_beli']?></td>
    <td><?php echo $row['harga_jual']?></td>
    <td><?php echo $row['stok']?></td>
    <?php
            if ($_SESSION['level']=='admin') {
            ?>
		<td><a href="aksi_barang.php?proses=hapus&kode=<?php echo $row['id_barang'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</a>
		<a href="?p=barang&aksi=edit&kode=<?php echo $row['id_barang'] ?>" class="btn btn-primary">Edit</a>
		</td>
    <?php
        }
    ?>
	</tr>
	<?php
	$no++;
	}
	?>
</table>

<?php
break;
case 'entri':
?>
<h1>Input Data Barang</h1>
<form class="form-horizontal" role="form" action="aksi_barang.php?proses=tambah" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namabarang" placeholder="Nama Barang" name="namabarang">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jenis Barang</label>
    <div class="col-sm-10">
      <select class="form-control" id="id_jenis" placeholder="jurusan" name="id_jenis">
	  <?php 
	  $koneksi=mysqli_connect("localhost","root","","db_iventory"); //koneksi ke mysql
		$data=mysqli_query($koneksi,"SELECT * FROM jenis_barang");
		while ($row=mysqli_fetch_array($data)) {
			echo "<option value=$row[id_jenis]>$row[nama_jenis]</option>";
		}
		?>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="satuan" placeholder="Satuan" name="satuan">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Harga Beli</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hargabeli" placeholder="Harga Beli" name="hargabeli">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Harga Jual</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hargajual" placeholder="Harga Jual" name="hargajual">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Stok</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="stok" placeholder="Stok" name="stok">
    </div>
  </div>

 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>

<?php
break;
case 'edit':

$koneksi=mysqli_connect('localhost','root','','db_iventory');
$ambil=mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$_GET[kode]'");
$data=mysqli_fetch_array($ambil);
?>
<h1>Edit Jenis Barang</h1>
<form class="form-horizontal" role="form" action="aksi_barang.php?proses=ubah&kode=<?php echo $data['id_barang']?>" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namabarang" placeholder="Nama Barang" name="namabarang" value="<?= $data['nama_barang']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jenis Barang</label>
    <div class="col-sm-10">
      <select class="form-control" id="id_jenis" placeholder="jurusan" name="id_jenis">
    <?php 
    $koneksi=mysqli_connect("localhost","root","","db_iventory"); //koneksi ke mysql
    $data1=mysqli_query($koneksi,"SELECT * FROM jenis_barang");
    while ($row=mysqli_fetch_array($data1)) {
      echo "<option value=$row[id_jenis]>$row[nama_jenis]</option>";
    }
    ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="satuan" placeholder="Satuan" name="satuan" value="<?= $data['satuan']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Harga Beli</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hargabeli" placeholder="Harga Beli" name="hargabeli" value="<?= $data['harga_beli']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Harga Jual</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hargajual" placeholder="Harga Jual" name="hargajual" value="<?= $data['harga_jual']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Stok</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="stok" placeholder="Stok" name="stok" value="<?= $data['stok']?>">
    </div>
  </div>

 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
<?php
break;
}
?>
</div>
  </div>
  
</section>