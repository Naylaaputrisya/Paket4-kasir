<?php
include("koneksi/koneksi.php");
include("header.php");

if (isset($_POST['tambah'])) {
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $nomeja = $_POST['nomeja'];

    $sql = $koneksi->query("INSERT INTO penjualan (Tanggal_Penjualan) VALUES ('$tanggal')");
    $id_transaksi_baru = mysqli_insert_id($koneksi);
    
    $sql = $koneksi->query("INSERT INTO pelanggan (Pelanggan_id, Nama_Pelanggan, No_meja) VALUES ('$id_transaksi_baru', '$nama', '$nomeja')");
    $id_pelanggan_baru = mysqli_insert_id($koneksi);
    
    $menu_jumlah = $_POST['menu'];
    $jumlah_array = $_POST['jumlah'];
    foreach ($menu_jumlah as $i => $item) {
        $item_parts = explode("|", $item);
        $produk_id = $item_parts[0];
        $harga = $item_parts[1];
        $jumlah = $jumlah_array[$i];

        $sql3 = $koneksi->query("INSERT INTO detail_penjualan (Detail_id, Produk_id, Jumlah_Produk, Subtotal) VALUES ('$id_transaksi_baru', '$produk_id', '$jumlah', '$harga')");
        $sql4 = $koneksi->query("UPDATE produk SET Stok = Stok - $jumlah  WHERE Produk_id = '$produk_id'");
        $sql5 = $koneksi->query("UPDATE produk SET Terjual = Terjual + $jumlah WHERE Produk_id = '$produk_id'");
    }

    header("Location: daftar-transaksi.php");
    exit();
}


?>

  
        <script>
            // Fungsi untuk menambahkan input field untuk menu
            function tambahMenu() {
                var container = document.getElementById("menuContainer");
                var newMenuInput = document.createElement("div");

                newMenuInput.innerHTML = `
                          <div class="">
                              <label for="menu" class="form-label">Menu</label>
                              <select id="menu" name="menu[]" class="form-control">
                                <option>Pilih Menu</option>
                                  <?php
                                  $sql6 = $koneksi->query("SELECT * FROM produk");
                                  while ($data= $sql6->fetch_assoc()) {
                                      echo "<option value='" . $data['Produk_id'] . "|" . $data['Harga'] . "'>" . $data['Nama_Produk'] . " - Rp." . number_format($data['Harga']) ." - Stok:" . $data['Stok'] . "</option>";
                                  }
                                  ?>
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="jumlah" class="form-label">jumlah</label>
                              <input type="number" min="1" class="form-control" id="jumlah" name="jumlah[]">
                          </div>
                `;

                container.appendChild(newMenuInput);
            }
        </script>        
      </head>
    
      <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pelanggan</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="p-4" id="main-content">
          <div class="card mt-5">
            <div class="card-body">
                <div class="container mt-5">
                    <h2>Tambah Transaksi</h2>
                    <form action="" method="POST">
                        <div class="col-2">
                            <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                            <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="tanggal" name="tanggal" readonly required>
                        </div>
                        <div>
                            <label for="nama" class="form-label">Nama Anda</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div>
                            <label for="nomeja" class="form-label">No Meja</label>
                            <input type="number" min="1" class="form-control" id="nomeja" name="nomeja" required>
                        </div>
                        <div id="menuContainer">
                          <div>
                              <label for="menu" class="form-label">Menu</label>
                              <select id="menu" name="menu[]" class="form-control">
                                <option>Pilih Menu</option>
                                <?php
                                    $sql7 = $koneksi->query("SELECT * FROM produk WHERE Stok > 0");
                                    while ($data = $sql7->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $data['Produk_id'] . '|' . $data['Harga']; ?>"><?php echo $data['Nama_Produk'] . " - Rp." . number_format($data['Harga']) . " - Stok:" . $data['Stok']; ?></option>

                                <?php } ?>

                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="jumlah" class="form-label">jumlah</label>
                              <input type="number" min="1" class="form-control" id="jumlah" name="jumlah[]" required>
                          </div>
                          
                        </div>

                        <button type="button" class="btn btn-warning me-3" onclick="tambahMenu()">Tambah Menu+</button>

                        <button type="submit" name="tambah" class="btn btn-primary">Pesan</button>
                    </form>
                </div>            
            </div>
          </div>
        </div>
      </body>
    </html>