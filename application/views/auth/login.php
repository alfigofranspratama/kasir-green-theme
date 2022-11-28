<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/fontawesome/css/all.min.css">

    <style>
        .main {
            height: 100vh;
        }

        .login-box {
            width: 400px;
        }

        .card-header {
            background-color: #198754;
            color: #fff;
        }

        .card-header:hover {
            background-color: #14ba6d;
            -webkit-transition: background-color 2s ease-out;
            -moz-transition: background-color 2s ease-out;
            -o-transition: background-color 2s ease-out;
            transition: background-color 2s ease-out;
        }

        .card-title h2 {
            font-weight: bold;
        }

        body {
            font-family: monospace;
        }

        .btn-primary {
            background-color: #198754;
            border: none;
        }

        .btn-primary:hover {
            background-color: #14ba6d;
            cursor: pointer;
            -webkit-transition: background-color 2s ease-out;
            -moz-transition: background-color 2s ease-out;
            -o-transition: background-color 2s ease-out;
            transition: background-color 2s ease-out;
            border: none;
        }
    </style>
</head>

<body>
    <div class="main justify-content-center align-items-center d-flex flex-column">
        <div class="login-box">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h2>Kasir Login</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('auth') ?>" method="post">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" name="username" id="staticEmail">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" required name="password" id="inputPassword">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary mb-3 mx-auto">Login</button>
                            </div>
                            <div class="col-5"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?= $this->session->flashdata('pesan') ?>
    <script src="<?= base_url('vendor') ?>/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>