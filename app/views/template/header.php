<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIPPolindra <?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .subtext {
            font-size: 0.8rem;
        }

        .navbar-nav a {
            font-size: 0.9rem;
        }

        .logo-container img {
            width: 100%;
            max-width: 120px;
        }

        @media (max-width: 576px) {
            .logo-container img {
                max-width: 80px;
                max-height: auto;
            }

            .navbar-brand {
                font-size: 1rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <!-- Logo -->
                    <div class="logo-container bg-white rounded-5 p-1 align-items-center justify-content-center mt-3">
                        <img src="<?= BASEURL; ?>/img/Polindra.png" alt="Logo Polindra" class="img-fluid  ">
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6 col-sm-11">
                            <!-- Teks Navbar -->
                            <a class="navbar-brand text-white ms-2 " href="<?= BASEURL; ?>/beranda">
                                PUSAT INFORMASI PRESTASI

                            </a>
                            <!-- Tombol Toggle -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Link Navigasi -->
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link <?= $data['judul'] == 'Home' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/beranda">Home</a>
                                    <a class="nav-link <?= $data['judul'] == 'Kompetisi' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/kompetisi">Kompetisi</a>
                                    <a class="nav-link <?= $data['judul'] == 'Prestasi' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/prestasi">Prestasi</a>
                                    <a class="nav-link <?= $data['judul'] == 'Pengumuman' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/pengumuman">Pengumuman</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+uj0f4RnF8IJ1QnEw5sy9IXE9MZo4" crossorigin="anonymous"></script>
</body>

</html>