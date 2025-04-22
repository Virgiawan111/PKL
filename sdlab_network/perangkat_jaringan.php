<?php
include 'koneksi.php';

// Mengambil data perangkat dari database
$query = "SELECT * FROM perangkat2";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perangkat Jaringan</title>
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
            <h1 class="text-2xl font-bold mb-4">Perangkat Jaringan</h1>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Perangkat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">MAC Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">IP Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Brand</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kecepatan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    // Menampilkan data perangkat dari database
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='px-6 py-4 text-sm font-medium text-gray-900'>" . $row['id'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-500'>" . $row['nama_perangkat'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-500'>" . $row['mac_address'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-500'>" . $row['ip_address'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-500'>" . $row['brand'] . "</td>";
                        echo "<td class='px-6 py-4 text-sm text-gray-500'>" . $row['kecepatan'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Menutup koneksi setelah selesai
mysqli_close($conn);
?>
