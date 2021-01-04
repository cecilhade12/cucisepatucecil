 	      <section class="content">
  <div class="box">
    <div class="box-body">
          <?php
            $page= isset($_GET['page'])?$_GET['page']:'list';
            switch($page){
                case 'list':
              ?>
                <h1>List Layanan</h1>
                <p><a href="?p=layanan&page=entri" class="btn btn-primary"><i class=""></i>+ Tambah Data</a></p>
                <table class="table table-bordered text-center mt-3">
                    <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
					<th>Aksi</th>
                    
					
                    <?php
                        $koneksi=mysqli_connect("localhost","root","","cuci_sepatuu");
                        $data = mysqli_query($koneksi,"select * from layanan");
                        $i =1;
                        while ($row=mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $row['nama_layanan']?></td>
                        <td>
                        <a href="aksi_layanan.php?aksi=hapus&kode=<?php echo $row['id_layanan']?>" class="btn btn-danger pr-2 pl-2" ><i class="fas fa-trash mr-2"></i>Hapus
                        <a href="?p=layanan&page=edit&kode=<?php echo $row['id_layanan']?>" class="btn btn-primary ml-2 pr-2 pl-2"><i class="far fa-edit mr-2"></i>Edit
                        </td>
                    </tr>
                    <?php $i++;}?>
                </table>
                <?php
                    break;
                    case 'entri':
                ?>
                    <h2>Input Data Layanan</h2>
                    <form class="form-group mt-5" method="post" action="aksi_layanan.php?aksi=tambah">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                Nama Layanan
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="nama_layanan" class="form-control" placeholder="Masukan Nama Supplier">
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
                        $ambil = mysqli_query($koneksi,"select * from layanan where id_layanan='$_GET[kode]'");
                        $data = mysqli_fetch_array($ambil);
                    ?>
                    <h2>Edit Data Layanan</h2>
                    <form class="form-group mt-5" method="post" action="aksi_layanan.php?aksi=ubah&kode=<?php echo $data['id_layanan']?>">
                         <div class="row mt-2">
                            <div class="col-md-2">
                                Nama Layanan
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="nama_layanan" class="form-control" placeholder="Masukan Nama Supplier" value="<?= $data['nama_layanan']?>">
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