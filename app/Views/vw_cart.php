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
                    <li class="nav-item"><a class="nav-link active" href="/cart">Cart</a></li>
                    <li class="nav-item"><a class="nav-link " href="/ck">Invoice</a></li>
                    <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Checkout Page</h2>
                <p class="lead">Silahkan isi data pengiriman!</p>
            </div>
            <?php echo form_open('/checkout'); ?>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>

                    </h4>
                    <ul class="list-group mb-3">
                        <?php $total = 0;

                        foreach ($cart->contents() as $key => $c) {
                        ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0"><?= $c['name']; ?></h6>
                                    <input type="hidden" name="brg_ck[]" value="<?= $c['name']; ?>">
                                    <input class="form-control" name="qty[]" type="number" min="1" max="10" width="50px">
                                    <input type="hidden" name="hbrg_ck[]" value="<?= $c['price']; ?>">
                                </div>
                                <span class="text-muted">x Rp. <?= number_format($c['price'], 2, ',', '.'); ?></span>
                                <a href="/delete/<?= $c['rowid']; ?>" class="btn btn-danger">Hapus</a>


                            </li>
                        <?php } ?>

                        <li class="list-group-item d-flex justify-content-between">
                            <a href="/" class="btn btn-primary">Tambah Barang</a>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="uname_p" value="<?= session()->get('username'); ?>">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <div class="needs-validation">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="nama_p" class="form-label">Nama penerima</label>
                                <input type="text" class="form-control" id="firstName" name="nama_p" required>
                            </div>

                            <div class="col-12">
                                <label for="nohp" class="form-label">No.Handphone</label>
                                <input type="text" class="form-control" id="email" name="nohp" placeholder="08XXXXXXXX">
                            </div>

                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jl.Hidup..." required>
                            </div>

                            <div class="col-md-5">
                                <label for="kurir" class="form-label">Kurir</label>
                                <select class="form-select" id="country" required name="kurir">
                                    <option value="">Pilih Kurir...</option>
                                    <option value="REG 3 hari">Kurir Reguler - 3 hari estimasi</option>
                                    <option value="Kilat 2 hari">Kurir Kilat - 2 hari estimasi</option>
                                    <option value="Sameday">Sameday - Hari yang sama</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="bayar_ck" class="form-label">Pembayaran</label>
                                <select class="form-select" id="state" required name="bayar_ck">
                                    <option value="">Pilih pembayaran...</option>
                                    <option value="Minimarket">Minimarket</option>
                                    <option value="E-Wallet">E-Wallet</option>
                                    <option value="Virtual Account">Virtual Account</option>
                                </select>
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </main>

        <footer class="py-3 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; TOKO ABC 2022</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/assets/jshome/scripts.js"></script>
</body>

</html>