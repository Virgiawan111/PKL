<?php
include 'koneksi.php';

// Proses simpan jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_perangkat'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "INSERT INTO maintenance (nama_perangkat, tanggal, status)
            VALUES ('$nama', '$tanggal', '$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: Maintenance.php?pesan=sukses");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Jaringan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-blue-700 text-white min-h-screen">
            <div class="p-4 text-lg font-bold">Monitoring Jaringan</div>
            <ul class="mt-4">
                <li class="p-4 hover:bg-blue-800 cursor-pointer"><a href="home.php">Dashboard</a></li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer"><a href="perangkat_jaringan.php">Perangkat Jaringan</a></li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer"><a href="Maintenance.php">Maintenance</a></li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer"><a href="pengguna.php">Pengguna</a></li>
                <li class="p-4 hover:bg-blue-800 cursor-pointer"><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 p-8">
            <h1 class="text-2xl font-bold mb-4">Halaman Maintenance</h1>

            <!-- Notifikasi -->
            <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'sukses'): ?>
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    Data maintenance berhasil ditambahkan!
                </div>
            <?php endif; ?>

            <!-- Form -->
            <div class="bg-white shadow rounded p-4 mb-4">
                <h2 class="text-lg font-semibold mb-2">Tambah Maintenance Baru</h2>
                <form method="POST">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Perangkat</label>
                        <input type="text" name="nama_perangkat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" placeholder="Masukkan nama perangkat" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Maintenance</label>
                        <input type="date" name="tanggal" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                            <option value="Selesai">Selesai</option>
                            <option value="Dalam Proses">Dalam Proses</option>
                            <option value="Dijadwalkan">Dijadwalkan</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Maintenance</button>
                </form>
            </div>

            <!-- Tabel -->
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-lg font-semibold mb-2">Daftar Maintenance</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Nama Perangkat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM maintenance ORDER BY id DESC");
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td class="px-6 py-4"><?= $row['id']; ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['nama_perangkat']); ?></td>
                            <td class="px-6 py-4"><?= $row['tanggal']; ?></td>
                            <td class="px-6 py-4"><?= $row['status']; ?></td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-blue-500 hover:underline">Edit</a> |
                                <a href="#" class="text-red-500 hover:underline">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
