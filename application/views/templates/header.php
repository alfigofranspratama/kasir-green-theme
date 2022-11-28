<?php
error_reporting(0);
?>
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

    <style>
        @media (min-width: 992px) {
            .navbar-expand-lg .navbar-collapse {
                display: none !important;
                flex-basis: auto;
            }
            footer {
                bottom: 0;
            }
        }

        @media (max-width: 600px) {
            .tidak-ada {
                display: none;
            }
        }

        .btn-secondary {
            background-color: #198754 !important;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #14ba6d !important;
            cursor: pointer;
            -webkit-transition: background-color 2s ease-out;
            -moz-transition: background-color 2s ease-out;
            -o-transition: background-color 2s ease-out;
            transition: background-color 2s ease-out;
            border: none;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler a {
            color: #fff;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgb(17 26 104 / 10%);
        }

        .detailed {
            font-weight: 600;
        }

        .card-header {
            border-radius: 15px 15px 0px 0px !important;
        }

        .card-title {
            font-size: 24px;
            color: white;
            font-weight: bold;
        }

        .active>.page-link,
        .page-link.active {
            background-color: #198754 !important;
        }

        hr.underline {
            text-decoration: underline;
        }

        a.nav-link {
            color: #ddd;
        }

        .hijau {
            background-color: #198754 !important;
            border: none;
        }

        .hijau:hover {
            background-color: #14ba6d !important;
            cursor: pointer;
            -webkit-transition: background-color 2s ease-out;
            -moz-transition: background-color 2s ease-out;
            -o-transition: background-color 2s ease-out;
            transition: background-color 2s ease-out;
            border: none;
        }



        footer {
            /* background-color: #198754; */
            position: absolute;
            width: 100%;
        }

        .footer {
            font-size: 18px;
            font-weight: bold;
        }

        .footer a {
            text-decoration: none;
            color: white;
        }

        .footer a:hover {
            text-decoration: underline;
            color: #ddd;
        }
    </style>
</head>

<body onload="startTime()">
        <nav>
            <div class="logo">

            </div>
        </nav>
        <?php
        $query = $this->db->query("SELECT max(id_nota) as notaTerbesar FROM tb_keranjang")->row_array();
        $nota = $query['notaTerbesar'];
        $urutan = (int) substr($nota, 4, 3);
        $urutan++;
        $huruf = "NOTA";
        $nota = $huruf . sprintf("%03s", $urutan);
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-green">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <b><?= $user['nama_toko']; ?></b>
                </a>
                <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </a>
                <div class="collapse navbar-collapse hilang" id="navbarSupportedContent">
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
        </nav>