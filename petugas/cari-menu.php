<?php
if(isset($_POST['search'])){
    $search = $_POST ['search'];
    $sql = $koneksi->query("SELECT * FROM produk WHERE Nama_Produk LIKE '%$search%'");
} else {
    $sql = $koneksi->query("SELECT * FROM produk");
}
?>
<div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Barang</h4>
                    <p class="card-description">
                  
                 <a href="?page=tambah-barang" title="Tambah Produk" 
                  class="btn btn-primary btn-icon-split btn-sm">
 <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                           <span class="text">Tambah Produk</span>
                        </a>
                    </p>
                    <form class="d-flex" action="?page=cari-menu" method="post">
            <input class="form-control me-2" type="search" placeholder="cari menu..." aria-label="Search" name="search">
            <br>
            <button class="btn btn-outline-light" type="submit">Cari</button>
            <br>
        </form>

                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Terjual</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $nama = $_POST ['search'];
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM produk WHERE Nama_Produk LIKE '%$nama%'");
                            while ($data= $sql->fetch_assoc()){

                                
                                    
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo "<img src='../foto/".$data['foto']."'widht='70' height='70'>";?></td>
                                <td><?php echo $data['Nama_Produk']?></td>
                                <td>Rp.<?php echo number_format ($data['Harga'])?></td>
                                <td><?php echo $data['Stok']?></td>
                                <td><?php echo $data['Terjual']?></td>
                                <td><a type='button' href='?page=edit-brg&Produk_id=<?= $data['Produk_id']; ?>' class='btn btn-sm btn-warning'>Edit</a>/<a type='button' href='?page=hapus-brg&Produk_id=<?= $data['Produk_id']; ?>' class='btn btn-sm btn-danger'>Delete</a></td>
                                <td>
                                    
                                </td>
                            </tr>
                            <?php } ?>
                        
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
