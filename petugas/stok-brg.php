<?php
if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = $koneksi->query("SELECT * FROM produk WHERE Nama_Produk LIKE '%$search%'");
} else {
    $sql = $koneksi->query("SELECT * FROM produk");
}
?>
<div class="row">
        <div class="col-lg-12 grid-margin strecth-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Barang</h4>
                    <p class="card-description">
                    <!-- Add class <code>.table</code> -->
                        <a href="?page=tambah-barang" title="Tambah Barang"
                            class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                                <span class="text">Tambah Produk</span>
                        </a>
                    </p>

                    <form class="d-flex" action="?page=cari-menu" method="POST">
                        <input class="form-control me-2" type="search" placeholder="cari menu..." aria-label="Search" name="search"> <br>
                        <button class="btn btn-outline-light" type="submit">Cari</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Terjual</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM produk");
                                while ($data= $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo "<img src='../foto/".$data['foto']."' width='70' height='70'>";?></td>
                                <td><?php echo $data['Nama_Produk']?></td>
                                <td>Rp.<?php echo number_format($data['Harga'])?></td>
                                <td><?php echo $data['Stok']?></td>
                                <td><?php echo $data['Terjual']?></td>
                                <td><a type="button" href="?page=edit-brg&Produk_id=<?php echo $data['Produk_id']?>"
                                       class="btn btn-sm btn-primary btn-icon-split btn-sm">
                                       <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                       <span class="text">Edit</span>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapusnya')"' href="?page=hapus-brg&Produk_id=<?php echo $data['Produk_id']?>"
                                       class="btn btn-danger btn-icon-split btn-sm">
                                       <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                       <span class="text">Hapus</span> 
                                    </a>
                                <td></td>
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


