<div class="col-md-3 col-sm-12">
    <!-- BAR CHART -->
    <div class="card card-success h-100">
        <div class="card-header">
            <div class="card-title text-center">
                Filter Laporan
            </div>
        </div>
        <div class="card-body">
            <form action="<?= base_url('laporan') ?>" method="GET">
                <div class="form-input mb-3">
                    <label for="" class="">Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control">
                </div>
                <div class="form-input mb-3">
                    <label for="" class="">Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="col-md-6 col-sm-12">
    <!-- BAR CHART -->
    <div class="card card-success h-100">
        <div class="card-header">
            <div class="card-title text-center">
                Data Laporan
            </div>
        </div>
        <div class="card-body">
            <table id="laporan" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Kode Nota</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($laporan as $row) :
                    ?>
                        <tr>
                            <td><?= $row->tgl_transaksi; ?></td>
                            <td><?= $row->kode_nota; ?></td>
                            <td><?= number_format($row->total, 2, ",", "."); ?></td>
                            <td><?= number_format($row->bayar, 2, ",", "."); ?></td>
                            <td><?= number_format($row->kembali, 2, ",", "."); ?></td>
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