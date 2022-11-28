<?php
$query = $this->db->query("SELECT max(id_nota) as notaTerbesar FROM tb_keranjang")->row_array();
$nota = $query['notaTerbesar'];
$urutan = (int) substr($nota, 4,3);
$urutan++;
$huruf = "NOTA";
$nota = $huruf . sprintf("%03s", $urutan);
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-3 tidak-ada">
            <div class="card">
                <div class="card-header bg-green">
                    <div class="card-title text-center">
                        Menu
                    </div>
                </div>
                <div class="card-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') {
                                                    echo "active";
                                                } ?>" aria-current="page" href="<?= base_url('dashboard') ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'kasir') {
                                                    echo "active";
                                                } ?>" aria-current="page" href="<?= base_url('kasir/trx/') . $nota ?>"><i class="fas fa-desktop"></i> Kasir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'barang') {
                                                    echo "active";
                                                } ?>" aria-current="page" href="<?= base_url('barang') ?>"><i class="fas fa-box"></i> Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'laporan') {
                                                    echo "active";
                                                } ?>" aria-current="page" href="<?= base_url('laporan') ?>"><i class="fas fa-bullhorn"></i> Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'pengaturan') {
                                                    echo "active";
                                                } ?>" aria-current="page" href="<?= base_url('pengaturan') ?>"><i class="fas fa-cog"></i> Pengaturan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>