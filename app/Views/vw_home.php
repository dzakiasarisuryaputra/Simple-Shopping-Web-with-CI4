<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/assets/csshome/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-lg-5">
            <a class="navbar-brand" href="#">Hi <?= session()->get('name'); ?>, Welcome to Toko ABC!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="/member">Member</a></li>
                    <li class="nav-item"><a class="nav-link " href="/cart">Cart</a></li>
                    <li class="nav-item"><a class="nav-link " href="/ck">Invoice</a></li>
                    <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (session()->getFlashdata('addS')) {
        echo "<p style='text-align:center'>";
        echo session()->getFlashdata('addS');
        echo "</p>";
    }
    ?>

    <!-- Header-->
    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center shadow">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Welcome to Toko ABC!</h1>
                    <p class="fs-4">Penyedia sayuran segar yang diperoleh dari kebun organik.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content-->
    <section class="pt-4">
        <div class="container px-lg-5">
            <div class="row gx-lg-5">
                <!--content-->
                <?php foreach ($home as $key => $row) { ?>
                    <div class="col-lg col-xxl-4 mb-5">
                        <?php echo form_open('/addCart');
                        echo form_hidden('id', $row['id_brg']);
                        echo form_hidden('price', $row['harga']);
                        echo form_hidden('name', $row['nama_brg']);
                        echo form_hidden('gambar', $row['gambar']); ?>

                        <div class="card bg-light border-0 shadow">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <br />
                                <img src="/assets/images/<?= $row['gambar']; ?>" class="rounded shadow" width="150 rem" height="100rem">
                                <h2 class="fs-4 fw-bold"><?= $row['nama_brg']; ?></h2>
                                <p class="mb-0"><?= $row['deskripsi']; ?></p>
                                <hr />
                                <button type="submit" class="btn btn-primary btn-lg ">Rp. <?= number_format($row['harga'], 2, ',', '.'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                <?php } ?>
                <!--end content-->
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; TOKO ABC 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/assets/jshome/scripts.js"></script>
</body>

</html>