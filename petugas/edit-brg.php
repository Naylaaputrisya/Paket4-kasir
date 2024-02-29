<?php
include_once("../koneksi/koneksi.php");

if (isset($_POST['update'])) {
    $id = $_GET['Produk_id'];

    $Nama_Produk = $_POST['Nama_produk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];

    if ($_FILES["foto"]["name"]) {
        $target = "../foto/";
        $time = date('dmYHis');
        $type = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
        $targetfile = $target . $time. '.' . $type;
        $filename = $time . '.' . $type;

        $uploadOk = 1;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetfile)) {
            $foto = $filename;
        } else {
            echo "maaf, terjadi kesalahan saat mengupload file gambar.";
        }
    }
    if (!isset($foto)) {
        $foto = $_POST['existing_foto'];
    }
    $result = mysqli_query($koneksi, "UPDATE produk SET Nama_Produk='$Nama_Produk', Harga='$Harga', Stok='$Stok', foto='$foto' WHERE Produk_id=$id");

    if ($result) {
        echo "<script>alert('Berhasil mengedit produk');window.location='?page=stok';</script>";
        exit();
    } else {
        echo "error: " . $sql . "<br>" . $koneksi->error;
    }
}

$id = $_GET['Produk_id'];

$result = mysqli_query($koneksi, "SELECT * FROM produk WHERE Produk_id=$id");

while ($barang_data = mysqli_fetch_array($result)) {
    $Nama_produk = $barang_data['Nama_Produk'];
    $Harga = $barang_data['Harga'];
    $Stok = $barang_data['Stok'];
    $foto = $barang_data['foto'];
}
$koneksi->close();
?>

<div class="row well">
    <div class="col-md-4">
        <div class="card well">
            <div class="card-header">
                <h3 class="">Update barang</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 mt-3">
                        <label for="nama" class="form-label">Nama Produk:</label>
                        <input type="text" class="form-control" id="Nama_produk" value="<?php echo $Nama_produk; ?>" placeholder="Masukan Nama" name="Nama_produk">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga:</label>
                        <input type="text" class="form-control" id="Harga" value="<?php echo $Harga; ?>" placeholder="Masukan Harga" name="Harga">
                    </td>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok:</label>
                        <input type="text" class="form-control" id="Stok" value="<?php echo $Stok; ?>" placeholder="Masukan Stok" name="Stok">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto<span style="color: red;"> *</span></label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <input type="hidden" name="existing_foto" value="<?php echo $foto; ?>">
                        <p style="color: blue;">hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</P>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>