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
            <a class="navbar-brand" href="/">Hi <?= session()->get('name'); ?>, Welcome to Toko ABC!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/member">Member</a></li>
                    <li class="nav-item"><a class="nav-link " href="/cart">Cart</a></li>
                    <li class="nav-item"><a class="nav-link " href="/ck">Invoice</a></li>
                    <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br />

    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center shadow">
            <div class="m-4 m-lg-5">
                <h3 class="display-5 fw-bold">Hi <?= session()->get('name'); ?>!</h3>
                <p class="fs-4">Jadilah member dari Toko ABC agar dapat menikmati kemudahan dalam mencari sayuran sehat dan bernutrisi tinggi!</p>
                <form method="post" action="/member/process/<?= session()->get('username'); ?>">
                    <input type="hidden" name="role" value="member">
                    <button type="submit" class="btn btn-primary">Become Member!</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/assets/js/scripts.js"></script>
</body>

</html>