<div class="col-md-4 col-sm-12">
    <div class="card h-100">
        <div class="card-header bg-green">
            <div class="card-title text-center">
                Transaksi
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= base_url('kasir/keranjang/') . $this->uri->segment(3) ?>">
                <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Tgl. Transaksi</b></label>
                    <div class="col-sm-8 mb-2">
                        <input type="date" class="form-control form-control-sm" name="tgl_input" value="<?= date("Y-m-d") ?>" disabled readonly>
                    </div>
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode Barang</b></label>
                    <div class="col-sm-8 mb-2">
                        <div class="input-group">
                            <input type="text" name="kode_barang" id="kode_barang" class="form-control form-control-sm border-right-0" list="datalist1" onchange="changeValue(this.value)" aria-describedby="basic-addon2" required autocomplete="off">
                            <datalist id="datalist1">
                                <?php
                                foreach ($barang as $row) :
                                ?>
                                    <option value="<?= $row->kode_barang; ?>"><?= $row->kode_barang ?></option>
                                <?php
                                endforeach;
                                ?>
                            </datalist>
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0" id="basic-addon2" style="border-radius:0px 15px 15px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                                    </svg></span>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nama Barang</b></label>
                    <div class="col-sm-8 mb-2">
                        <div class="input-group">
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control form-control-sm" list="datalist2" onchange="namaValue(this.value)" aria-describedby="basic-addon2" required autocomplete="off">
                            <datalist id="datalist2">
                                <?php
                                foreach ($barang as $row) :
                                ?>
                                    <option value="<?= $row->nama_barang; ?>"><?= $row->nama_barang ?></option>
                                <?php
                                endforeach;
                                ?>
                            </datalist>
                        </div>
                    </div>
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Harga</b></label>
                    <div class="col-sm-8 mb-2">
                        <input type="number" class="form-control form-control-sm" disabled id="harga_barang" onchange="total()" value="" name="harga_barang" readonly>
                    </div>
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Quantity</b></label>
                    <div class="col-sm-8 mb-2">
                        <input type="number" class="form-control form-control-sm" id="quantity" onchange="total()" name="quantity" placeholder="0" required>
                    </div>
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Sub-Total</b></label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="subtotal" name="subtotal" onchange="total()" name="sub_total" readonly>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-shopping-cart mr-2"></i> Tambahkan Ke Keranjang</button>
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Keranjang -->
<div class="col-md-4 col-sm-12">
    <div class="card h-100">
        <div class="card-header bg-green">
            <div class="card-title text-center">
                <i class="fas fa-shopping-cart"></i> Keranjang Belanja
            </div>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group row mb-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barangKeranjang as $row) :
                            ?>
                                <tr>
                                    <td>
                                        <?= $row->nama_barang; ?>
                                    </td>
                                    <td>
                                        <?= $row->qty ?>
                                    </td>
                                    <td>
                                        <?= number_format($row->harga_barang, 2, ".", ","); ?>
                                    </td>
                                    <td>
                                        <?= number_format($row->sub_total, 2, ".", ","); ?>
                                    </td>
                                    <td>
                                        <a class="text-danger" href="<?= base_url('kasir/hapuskeranjang/' . $row->id_nota . "/" . $row->kode_barang) ?>" onclick="javascript:return confirm('Yakin hapus <?= $row->nama_barang ?> dari keranjang belanja?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <hr>
            <form method="POST" action="<?= base_url('kasir/bayar/') . $this->uri->segment(3) ?>">
                <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Total</b></label>
                    <div class="col-sm-8 mb-2">
                        <input type="number" class="form-control form-control-sm" name="total" value="<?= $total ?>" id="totalbrg" readonly>
                    </div>
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Bayar</b></label>
                    <div class="col-sm-8 mb-2">
                        <input type="number" class="form-control form-control-sm" name="bayar" id="bayarnya" onchange="totalnya()">
                    </div>
                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kembali</b></label>
                    <div class="col-sm-8 mb-2">
                        <input type="number" class="form-control form-control-sm" name="kembalian" id="total1" readonly>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-sm" name="save1" value="simpan" type="submit">
                        <i class="fa fa-shopping-cart mr-2"></i> Bayar</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>
</div>


<script type="text/javascript">
    var harga_barang = new Array();

    <?php
    foreach ($barang as $row) :
    ?>
        harga_barang['<?= $row->kode_barang ?>'] = {
            harga_barang: '<?= $row->harga_barang ?>'
        };
    <?php
    endforeach;
    ?>

    var harga_nama = new Array();
    <?php
    foreach ($barang as $row) :
    ?>
        harga_nama['<?= $row->nama_barang ?>'] = {
            harga_nama: '<?= $row->harga_barang ?>'
        };
    <?php
    endforeach;
    ?>

    var nama_barang = new Array();
    <?php
    foreach ($barang as $row) :
    ?>
        nama_barang['<?= $row->kode_barang ?>'] = {
            nama_barang: '<?= $row->nama_barang ?>'
        };
    <?php
    endforeach;
    ?>

    var id_barang = new Array();
    <?php
    foreach ($barang as $row) :
    ?>
        id_barang['<?= $row->nama_barang ?>'] = {
            id_barang: '<?= $row->kode_barang ?>'
        };
    <?php
    endforeach;
    ?>

    function changeValue(kode_barang) {
        document.getElementById("nama_barang").value = nama_barang[kode_barang].nama_barang;
        document.getElementById("harga_barang").value = harga_barang[kode_barang].harga_barang;
    };

    function namaValue(kode_barang) {
        document.getElementById("kode_barang").value = id_barang[kode_barang].id_barang;
        document.getElementById("harga_barang").value = harga_nama[kode_barang].harga_nama;
    };

    function total() {
        var harga = parseInt(document.getElementById('harga_barang').value);
        var jumlah_beli = parseInt(document.getElementById('quantity').value);
        var jumlah_harga = harga * jumlah_beli;
        document.getElementById('subtotal').value = jumlah_harga;
    }

    function totalnya() {
        var harga = parseInt(document.getElementById('totalbrg').value);
        var pembayaran = parseInt(document.getElementById('bayarnya').value);
        var kembali = pembayaran - harga;
        document.getElementById('total1').value = kembali;
    }

    function printContent(print) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(print).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>