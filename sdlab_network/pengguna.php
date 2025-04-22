<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna Jaringan</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <!-- Tabel untuk menampilkan daftar pengguna -->
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-lg font-semibold mb-2">Daftar Pengguna</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Pengguna</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                   