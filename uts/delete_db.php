<?php  
    function sukses(){
        echo "<script>alert('Data berhasil dihapus';
            window.location.href = 'read.php';</script>";
    }
    function gagal(){
        echo "<script>alert('Data berhasil hapus';
            window.location.href = 'read.php';</script>";
    }

    if(isset($_GET['nim'])){
        $nim = $_GET['nim'];
        include "koneksi.php";
        $delete = mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE nim='$nim'");

        if($delete) {
            // Jika berhasil, redirect ke halaman read.php
            header("Location: read.php");
            exit(); // Pastikan tidak ada output lain sebelum melakukan redirect
        } else {
            // Jika gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
            echo "Gagal menambahkan data mahasiswa.";
        }
    }
?>