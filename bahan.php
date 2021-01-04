 	      <section class="content">
  <div class="box">
    <div class="box-body">
          <?php
            $page= isset($_GET['page'])?$_GET['page']:'list';
            switch($page){
                case 'list':
              ?>
                <h1>List Bahan</h1>
                <p><a href="?p=bahan&page=entri" class="btn btn-primary"><i class=""></i>+ Tambah Data</a></p>
                <table class="table table-bordered text-center mt-3">
                    <tr>
                    <th>No</th>
                    <th>Nama Bahan</th>
					<th>Jenis</th>
					<th>Bahan</th>
					<th>Aksi</th>
                    
					
                    <?php
                        $koneksi=mysqli_connect("localhost","root","","cuci_sepatuu");
                        $data = mysqli_query($koneksi,"select * from bahan");
                        $i =1;
                        while ($row=mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $row['nama']?></td>
                        <td><?php echo $row['jenis']?></td>
						<td><?php echo $row['bahan']?></td>
                        <td>
                        <a href="aksi_bahan.php?aksi=hapus&kode=<?php echo $row['id']?>" class="btn btn-danger pr-2 pl-2" ><i class="fas fa-trash mr-2"></i>Hapus
                        <a href="?p=bahan&page=edit&kode=<?php echo $row['id']?>" class="btn btn-primary ml-2 pr-2 pl-2"><i class="far fa-edit mr-2"></i>Edit
                        </td>
                    </tr>
                    <?php $i++;}?>
                </table>
                <?php
                    break;
                    case 'entri':
                ?>
                    <h2>Input Data Bahan</h2>
                    <form class="form-group mt-5" method="post" action="aksi_bahan.php?aksi=tambah">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                Nama Bahan
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Bahan">
                            </div>
                        </div>
						<div class="row mt-2">
                            <div class="col-md-2">
                                Jenis
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="jenis" class="form-control" placeholder="Masukan Jenis">
                            </div>
                        </div>
						
                        <div class="row mt-2">
                            <div class="col-md-2">
                                Bahan
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="bahan" class="form-control" placeholder="Masukan Bahan">
                            </div>
                        </div>
                        
                            <div class="col-md-5">
                                <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
                                <input type="reset" name="btnReset" value="Reset" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                    <?php
                        break;
                        case 'edit':
						$koneksi=mysqli_connect('localhost','root','','cuci_sepatuu');
                        $ambil = mysqli_query($koneksi,"select * from bahan where id='$_GET[kode]'");
                        $data = mysqli_fetch_array($ambil);
                    ?>
                    <h2>Edit Data Pelanggan</h2>
                    <form class="form-group mt-5" method="post" action="aksi_bahan.php?aksi=ubah&kode=<?php echo $data['id']?>">
                         <div class="row mt-2">
                            <div class="col-md-2">
                                Nama Bahan
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Bahan" value="<?= $data['nama']?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                Jenis
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="jenis" class="form-control" placeholder="Masukan Jenis" value="<?= $data['jenis']?>">
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-2">
                                Bahan
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="bahan" class="form-control" placeholder="Masukan Bahan" value="<?= $data['bahan']?>">
                            </div>
                        </div>
                            <div class="col-md-5">
                                <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
                                <input type="reset" name="btnReset" value="Reset" class="btn btn-danger">
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