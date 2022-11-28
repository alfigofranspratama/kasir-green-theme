<div class="col-md-7 col-sm-12">
    <!-- BAR CHART -->
    <div class="card h-100">
        <div class="card-header bg-green">
            <div class="card-title text-center">
                Pengaturan
            </div>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pengaturan') ?>" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Toko</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_toko" class="form-control" id="staticEmail" value="<?= $user['nama_toko'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="telepon" class="form-control" value="<?= $user['telepon'] ?>" id="inputPassword" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" required class="form-control" cols="30" rows="4"><?= $user['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" required name="username" class="form-control" value="<?= $user['username'] ?>" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="******" id="inputPassword">
                    </div>
                </div>
                <button type="submit" style="float: right;" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>