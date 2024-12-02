<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIPPolindra <?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #0d6efd; /* Warna biru Bootstrap */
            color: white;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0; /* Sidebar di sebelah kiri */
            padding-top: 20px;
            transition: all 0.3s ease; /* Animasi buka/tutup */
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .sidebar a:hover {
            background-color: #0253b3;
        }

        .sidebar a.active {
            background-color: #0253b3;
        }

        .sidebar .sidebar-header {
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px; /* Menyesuaikan ruang untuk sidebar */
            transition: margin-left 0.3s ease; /* Animasi buka/tutup */
        }

        .content.full {
            margin-left: 0; /* Konten memenuhi layar jika sidebar tersembunyi */
        }

        .toggle-button {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .toggle-button:hover {
            background-color: #0253b3;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 200px;
                transform: translateX(-100%); /* Sidebar tersembunyi default */
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Tombol Toggle -->
    <button class="toggle-button" onclick="toggleSidebar()">☰ Menu</button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            
        </div>
        <a href="<?= BASEURL; ?>/admin/mahasiswa" class="<?= $data['judul'] == 'Mahasiswa' ? 'active' : ''; ?>">Mahasiswa</a>
        <a href="<?= BASEURL; ?>/admin/prestasi" class="<?= $data['judul'] == 'Prestasi' ? 'active' : ''; ?>">Prestasi</a>
        <a href="<?= BASEURL; ?>/admin/kompetisi" class="<?= $data['judul'] == 'Kompetisi' ? 'active' : ''; ?>">Kompetisi</a>
        <a href="<?= BASEURL; ?>/login/logout">Logout</a>
    </div>

    <!-- Konten -->
    <div class="content" id="content">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang, admin! Anda dapat mengelola data melalui sidebar.</p>
        <!-- Konten dashboard lainnya -->
    </div>

    