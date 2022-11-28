<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Ini Adalah GAYA -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/css/style.css">
    <!-- Dan ini adalah saya hehe -->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body onload="startTime()">
    <?php
    $query = $this->db->query("SELECT max(id_nota) as notaTerbesar FROM tb_keranjang")->row_array();
    $nota = $query['notaTerbesar'];
    $urutan = (int) substr($nota, 4, 3);
    $urutan++;
    $huruf = "NOTA";
    $nota = $huruf . sprintf("%03s", $urutan);
    ?>
    <div class="row mt-3 mb-3">
        <div class="col-6 mx-auto">
            <div class="card" id="print">
                <div class="bg-white border-0 pb-0 pt-4">
                    <h5 class='card-tittle mb-0 text-center'><b><?= $user['nama_toko'] ?></b></h5>
                    <div class="container">
                        <p class='p-5 pt-0 pb-0 small text-center'><?= $user['alamat'] ?></p>
                    </div>
                    <p class='small text-center'>Telp. <?= $user['telepon'] ?></p>
                    <div class="row">
                        <div class="col-6 col-sm-7 pr-0">
                            <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                                <li><?= $this->uri->segment(3)
                                    ?></li>
                                <li>KASIR : admin</li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-5 pl-0">
                            <ul class="pl-0 small" style="list-style: none;">
                                <li>TGL : 26-11-2022</li>
                                <li style="display: flex;">JAM :&nbsp;<div id="txt"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body small pt-0">
                    <hr class="mt-0">
                    <div class="row">
                        <div class="col-5 pr-0">
                            <span><b>Nama Barang</b></span>
                        </div>
                        <div class="col-1 px-0 text-center">
                            <span><b>Qty</b></span>
                        </div>
                        <div class="col-3 px-0 text-right">
                            <span><b>Harga</b></span>
                        </div>
                        <div class="col-3 pl-0 text-right">
                            <span><b>Subtotal</b></span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2">
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($struk as $row) :
                        ?>
                            <div class="col-5 pr-0">
                                <span><?= $row->nama_barang ?></span>
                            </div>
                            <div class="col-1 px-0 text-center">
                                <span><?= $row->qty ?></span>
                            </div>
                            <div class="col-3 px-0 text-right">
                                <span><?= number_format($row->harga_barang, 2, ".", ","); ?></span>
                            </div>
                            <div class="col-3 pl-0 text-right">
                                <span><?= number_format($row->sub_total, 2, ".", ",") ?></span>
                            </div>
                            <?php
                        endforeach;
                        ?>
                        <div class="col-12">
                            <hr class="mt-2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="mt-2">
                            <ul class="list-group border-0">
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Total</b>
                                    <span><b><?= number_format($trx['total'], 2, ".", ",") ?></b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Bayar</b>
                                    <span><b><?= number_format($trx['bayar'], 2, ".", ",") ?></b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Kembalian</b>
                                    <span><b><?= number_format($trx['kembali'], 2, ".", ",") ?></b></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12 mt-3 text-center">
                            <p>* TERIMA KASIH TELAH BERBELANJA*</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>
    <meta http-equiv="refresh" content="0; url=<?= base_url('kasir/trx/') . $nota ?>">
    <script src="<?= base_url('vendor') ?>/bootstrap/js/bootstrap.min.js"></script>

    <!-- jQuery -->
    <script src="<?= base_url('vendor/') ?>plugins/jquery/jquery.min.js"></script>

    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>

</body>

</html>