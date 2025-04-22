<?php
include 'koneksi.php';

// Ambil jumlah perangkat
$jumlahPerangkat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM perangkat"))['total'];

// Ambil jumlah pengguna
$jumlahPengguna = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM pengguna"))['total'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jaringan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-blue-700 text-white min-h-screen">
            <div class="p-4 text-lg font-bold">Monitoring Jaringan</div>
            <ul class="mt-4">
                <li class="p-4 hover:bg-blue-800 cursor-pointer">
                    <a href="home.php">Dashboard</a>
                </li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer">
                    <a href="perangkat_jaringan.php">Perangkat Jaringan</a>
                </li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer">
                    <a href="Maintenance.php">Maintenance</a>
                </li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer">
                    <a href="pengguna.php">Pengguna</a>
                </li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer">
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="w-4/5 p-8">
            <h1 class="text-2xl font-bold mb-4">Dashboard Monitoring Jaringan</h1>

            <!-- Total Perangkat and Total Pengguna -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-lg font-semibold">Total Perangkat</h2>
                    <p class="text-2xl"><?= $jumlahPerangkat ?></p>
                </div>
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-lg font-semibold">Total Pengguna</h2>
                    <p class="text-2xl"><?= $jumlahPengguna ?></p>
                </div>
            </div>

            <!-- Tabel Daftar Perangkat -->
            <div class="bg-white shadow rounded p-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Perangkat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">MAC Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">IP Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Brand</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kecepatan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Tampilkan data perangkat di sini -->
                        <!-- Ini hanya contoh, Anda bisa mengambil data dari database -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
