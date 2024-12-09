<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIPPolindra - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: var(--bs-primary);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            font-size: 1rem;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #38bdf8;
            color: #fff;
        }

        .sidebar .brand {
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="brand">Admin Dashboard</div>
        <a href="<?= BASEURL; ?>/admin/dashboard" class="active">Dashboard</a>
        <a href="<?= BASEURL; ?>/admin/mahasiswa">Mahasiswa</a>
        <a href="<?= BASEURL; ?>/admin/prestasi">Prestasi</a>
        <a href="<?= BASEURL; ?>/admin/kompetisi">Kompetisi</a>
        <a href="<?= BASEURL; ?>/login/logout">Logout</a>
    </div>

    <div class="content">
        
    </div>