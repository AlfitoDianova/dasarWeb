<?php
session_start(); // Mulai sesi

// Cek apakah pengguna belum login, jika ya, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah tombol logout telah diklik
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();
    // Hancurkan sesi
    session_destroy();
    // Redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Include file koneksi database
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Mahasiswa</title>
    <style>
        /* CSS Anda */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            padding: 100px;
            margin-left: 20px;
            margin-right: 20px;
            /* Mengatur margin kanan */
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            margin-left: 20px;
        }

        a:hover {
            background-color: #0056b3;
        }

        button {
            border: none;
            outline: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 3px;
            background-color: red;
            /* Mengubah warna latar belakang menjadi merah */
            color: #fff;
            margin-top: 20px;
            margin-left: 20px;
            /* Memberikan jarak dari table */
        }

        button:hover {
            background-color: #800000;
            /* Warna latar belakang saat dihover menjadi merah tua */
        }
    </style>

</head>

<body>
    <h2>Lihat Data Mahasiswa</h2>
    <a href="create.php">Tambah</a>
    <table border="1" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $baris = 1;
        $view = mysqli_query($koneksi, "SELECT * FROM Mahasiswa");
        while ($row = mysqli_fetch_array($view)) {
        ?>
            <tr>
                <td><?php echo $baris ?></td>
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['prodi'] ?></td>
                <td>
                    <a href="update.php?nim=<?php echo $row['nim'] ?>">Ubah</a>
                    <a href="delete_db.php?nim=<?php echo $row['nim'] ?>">Hapus</a>
                </td>
            </tr>
        <?php
            $baris++;
        }
        ?>
    </table>
    <form method="post" action="">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>

</html>