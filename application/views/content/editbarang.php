<div class="col-9">
    <div class="card h-100">
        <div class="card-header bg-green">
            <div class="card-title text-center">
                Edit Barang
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="<?= base_url('barang/editbrg/') . $barang['id_barang'] ?>">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Kode Barang</label>
                    <input type="text" disabled class="form-control" value="<?= $barang['kode_barang'] ?>" readonly name="kode_barang" value="<?= set_value('kode_barang') ?>" placeholder="ex : BRG-31" id="inputEmail4">
                    <?= form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang'] ?>" placeholder="ex : Sabun Cair Lifebuoy" value="<?= set_value('nama_barang') ?>" id="inputPassword4">
                    <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Harga Barang</label>
                    <div class="input-group">
                        <span class="bg-green input-group-text" id="basic-addon2">Rp.</span>
                        <input type="number" min="1" class="form-control" aria-describedby="basic-addon2" value="<?= $barang['harga_barang'] ?>" name="harga_barang" value="<?= set_value('harga_barang') ?>" placeholder="ex : 5000">
                    </div>
                    <?= form_error('harga_barang', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Tanggal Input</label>
                    <div class="input-group">
                        <input type="date" disabled readonly value="<?= date("Y-m-d"); ?>" class="form-control" aria-describedby="basic-addon2" name="tgl_input">
                        <button class="btn btn-primary input-group-text" id="basic-addon2" type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>