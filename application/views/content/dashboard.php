<div class="col-md-9 col-sm-12">
    <!-- BAR CHART -->
    <div class="card card-success h-100">
        <div class="card-header">
            <div class="card-title text-center">
                Data Transaksi Bulanan
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="bulananChart" style="min-height: 250px; height: 250px; max-height: 1000px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>

<?php
$bln1 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '1' ")->num_rows();
$bln2 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '2' ")->num_rows();
$bln3 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '3' ")->num_rows();
$bln4 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '4' ")->num_rows();
$bln5 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '5' ")->num_rows();
$bln6 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '6' ")->num_rows();
$bln7 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '7' ")->num_rows();
$bln8 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '8' ")->num_rows();
$bln9 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '9' ")->num_rows();
$bln10 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '10' ")->num_rows();
$bln11 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '11' ")->num_rows();
$bln12 = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '12' ")->num_rows();
?>

<script src="<?= base_url('vendor') ?>/jquery/jquery.min.js"></script>
<script src="<?= base_url('vendor/chart.js/Chart.min.js') ?>"></script>

<script>
    var xValues = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var yValues = [<?= $bln1 ?>, <?= $bln2 ?>, <?= $bln3 ?>, <?= $bln4 ?>, <?= $bln5 ?>, <?= $bln6 ?>, <?= $bln7 ?>, <?= $bln8 ?>, <?= $bln9 ?>, <?= $bln10 ?>, <?= $bln11 ?>, <?= $bln12 ?>];
    var barColors = ["red", "green", "blue", "orange", "brown", "yellow", "pink", "purple", "gray", "cyan", "skyblue", "indigo"];

    new Chart("bulananChart", {
        label: "Data Transaksi",
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
</script>