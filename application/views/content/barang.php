<?php
$query = $this->db->query("SELECT max(kode_barang) as kodeTerbesar FROM tb_barang")->row_array();
$kodeBarang = $query['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
<div class="col-md-9 col-sm-12">
    <div class="card h-100">
        <div class="card-header bg-green">
            <div class="card-title text-center">
                Tambah Barang
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="<?= base_url('barang') ?>">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Kode Barang</label>
                    <input type="text" disabled class="form-control" name="kode_barang" value="<?= $kodeBarang ?>" readonly placeholder="ex : BRG-31" id="inputEmail4">
                    <?= form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="ex : Sabun Cair Lifebuoy" value="<?= set_value('nama_barang') ?>" id="inputPassword4">
                    <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Harga Barang</label>
                    <div class="input-group">
                        <span class="bg-green input-group-text" id="basic-addon2">Rp.</span>
                        <input type="number" min="1" class="form-control" aria-describedby="basic-addon2" name="harga_barang" value="<?= set_value('harga_barang') ?>" placeholder="ex : 5000">
                    </div>
                    <?= form_error('harga_barang', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Tanggal Input</label>
                    <div class="input-group">
                        <input type="date" disabled readonly value="<?= date("Y-m-d"); ?>" class="form-control" aria-describedby="basic-addon2" name="tgl_input">
                        <button class="btn btn-primary input-group-text" id="basic-addon2" type="submit">+ Tambah</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>

<div class="row mt-3">
    <div class="col-3 tidak-ada"></div>
    <div class="col-md-9 col-sm-12">
        <div class="card h-100">
            <div class="card-header bg-green">
                <div class="card-title text-center">
                    Data Barang
                </div>
            </div>
            <div class="card-body">
                <table id="barang" class="table table-bordered table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="20%">Kode Barang</th>
                            <th width="20%">Nama Barang</th>
                            <th width="20%">Harga Barang</th>
                            <th width="20%">Tanggal Input</th>
                            <th width="20%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($barang as $row) :
                        ?>
                            <tr>
                                <td><?= $row->kode_barang; ?></td>
                                <td><?= $row->nama_barang; ?></td>
                                <td><?= number_format($row->harga_barang, 2, ",", "."); ?></td>
                                <td><?= $row->tgl_input; ?></td>
                                <td>
                                    <a href="<?= base_url('barang/edit/') . $row->id_barang ?>" class="badge rounded-pill text-bg-primary" style="border: none;"><i class="fas fa-pen"></i></a>
                                    <a class="badge rounded-pill text-bg-danger" style="border: none;" href="<?= base_url('barang/hapus/') . $row->id_barang; ?>" onclick="javascript:return confirm('Hapus <?= $row->nama_barang ?> ?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>