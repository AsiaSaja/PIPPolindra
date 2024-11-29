<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIPPolindra <?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .navbar-text {
            font-size: 1rem;
            font-weight: bold;
        }

        @media (max-width: 576px) {
            .logo-container img {
                max-width: 80px;
                max-height: auto;
            }

            .navbar-brand {
                font-size: 0.9rem;
                text-align: center;
            }

            .navbar-text {
                font-size: 0.8rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container align-items-center">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="<?= BASEURL; ?>/home">
                <div class="logo-container bg-white rounded-5 p-1 me-2">
                    <img src="<?= BASEURL; ?>/img/Polindra.png" alt="Logo Polindra" class="img-fluid">
                </div>
                <span class="text-white navbar-text">
                    PUSAT INFORMASI PRESTASI<br>Politeknik Negeri Indramayu
                </span>
            </a>

            <!-- Tombol Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Link Navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link <?= $data['judul'] == 'Home' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/home">Home</a>
                    <a class="nav-link <?= $data['judul'] == 'Kompetisi' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/kompetisi">Kompetisi</a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+uj0f4RnF8IJ1QnEw5sy9IXE9MZo4" crossorigin="anonymous"></script>
</body>

</html>
