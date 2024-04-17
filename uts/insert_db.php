<?php
    include "koneksi.php";

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $insert = mysqli_query($koneksi,"INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim','$nama','$prodi')");

    // Periksa apakah query INSERT berhasil
    if($insert) {
        // Jika berhasil, redirect ke halaman read.php
        header("Location: read.php");
        exit(); // Pastikan tidak ada output lain sebelum melakukan redirect
    } else {
        // Jika gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
        echo "Gagal menambahkan data mahasiswa.";
    }
?>
