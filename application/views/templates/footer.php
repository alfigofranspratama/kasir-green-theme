</div>
<footer class="hijau mt-5">
    <div class="text-center footer">Powered By : <a href="https://github.com/alfigofranspratama">Alfigo Frans Pratama</a></div>
</footer>


<?= $this->session->flashdata('pesan'); ?>




<script src="<?= base_url('vendor') ?>/bootstrap/js/bootstrap.min.js"></script>

<!-- jQuery -->
<script src="<?= base_url('vendor/') ?>plugins/jquery/jquery.min.js"></script>

<!-- Ini saya juga -->
<script src="<?= base_url('vendor/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('vendor/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        $('#laporan').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#barang').DataTable({
            responsive: true
        });
    });
</script>

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
</head>