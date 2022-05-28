<?php
    $edit = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user = '$_GET[kode]'");
    $e = mysqli_fetch_assoc($edit);
?>
<form role="form" method="post" action="index.php?page=update_user">
<!-- <form role="form" method="post" action=""> -->

    
    <div class="card-body">

        <div class="form-group col-md-6">
        <label for="namalengkap">Nama Lengkap</label>
        <input type="hidden" name="id" value="<?php echo $e['id_user']; ?>">
        <input type="text" class="form-control" name="nama" value="<?php echo $e['nama']; ?>"  placeholder="Masukkan nama lengkap">
        </div>
        <div class="form-group col-md-6">
        <label for="notelp">Telp/HP</label>
        <input type="text" class="form-control" name="telp" value="<?php echo $e['telp']; ?>"placeholder="Masukkan no. HP">
        </div>
        <div class="form-group col-md-6">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $e['username']; ?>" placeholder="Masukkan username">
        </div>
        <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="pass" value="<?php echo $e['pass']; ?>" placeholder="Masukkan password">
        </div>
        <div class="form-group col-md-6">
            <select class="form-control" id="status" name="stat">
                <option selected>
                    <?php echo $e['level_status']; 
                    ?>
                </option>
                <option value="admin">admin</option>
                <option value="user">user</option>
                <option value="operator">operator</option>

            </select>
        </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>