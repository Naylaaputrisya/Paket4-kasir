<div class="row well">
    <div class="col-md-4">
        <div class="card-header">
            <h3 class="">Tambah User</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="nama" class="form-label"> ID User:</label>
                    <input type="text" class="form-control" id="nama" placeholder="Enter Name" name="id">
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" id="nama" placeholder="Enter Name" name="Username">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="Password">
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level<span style="color: red;"> *</span></label>
                    <select class="form-control" name="level" id="level">
                        <option value="">Pilih Level</option>
                        <option value="Admin">Admin</option>
                        <option value="Petugas">Petugas</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<?php

include '../koneksi/koneksi.php';
if(isset($_POST['submit'])) {
    $name= $_POST['Username'];
    $password= md5($_POST['Password']);
    $level= $_POST['level'];
    $id= $_POST['id'];

    $result = mysqli_query($koneksi, "INSERT INTO user (User_id, Username, Password, level) VALUES('$id','$name','$password','$level')");
    echo "<script>alert('Berhasil mendaftar akun')</script>";
    header("location:index.php?page=user");
}

?>