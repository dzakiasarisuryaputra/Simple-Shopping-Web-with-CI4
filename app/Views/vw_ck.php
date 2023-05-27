<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Checkout example · Bootstrap v5.2</title>
    <!-- Custom styles for this template -->
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/assets/csshome/styles.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-lg-5">
            <a class="navbar-brand" href="/">Hi <?= session()->get('name'); ?>, Welcome to Toko ABC!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="/member">Member</a></li>
                    <li class="nav-item"><a class="nav-link " href="/cart">Cart</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/ck">Invoice</a></li>
                    <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5">
        <div class="container px-lg-5">
            <div class="row justify-content-center">
                <div class="p-2 p-lg-2">
                    <?php foreach ($checkout as $key => $row) { ?>
                        <h4 class="d-flex justify-content-between align-items-center">
                            <strong class="text-muted">INVOICE ID.<?= $row['id_ck']; ?></strong>
                        </h4>

                        <ul class="list-group mb shadow">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Nama penerima</h6>
                                </div>
                                <span class="text-muted"><?= $row['nama_p']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">No.Hp</h6>
                                </div>
                                <span class="text-muted"><?= $row['nohp']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Alamat</h6>
                                </div>
                                <span class="text-muted"><?= $row['alamat']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Pesanan</h6>
                                    <?php $brg = explode(",", $row['brg_ck']);
                                    $harga = explode(",", $row['hbrg_ck']);
                                    $q = explode(",", $row['qty']);
                                    $i = 0;
                                    $sub = 0;
                                    $total = 0;
                                    foreach ($brg as $list) { ?>
                                        <span class="text-muted">
                                            <?= $list . " : " . $q[$i] . " x Rp." . number_format($harga[$i], 2, ',', '.'); ?>
                                            <?= "<br/>"; ?>
                                        </span>
                                    <?php
                                        $sub = $q[$i] * $harga[$i];
                                        $total += $sub;

                                        $i++;
                                    } ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Jasa Pengiriman</h6>
                                </div>
                                <span class="text-muted"><?= $row['kurir']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Pembayaran</h6>
                                </div>
                                <span class="text-muted"><?= $row['bayar_ck']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total Belanja</strong>
                                <strong>Rp. <?= number_format($total, 2, ',', '.'); ?></strong>
                            </li>
                        </ul>
                        <br />
                    <?php } ?>
                </div>
                <a href="/" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/assets/jshome/scripts.js"></script>
</body>

</html>