<?php  
    function sukses(){
        echo "<script>alert('Data berhasil diubah';
            window.location.href = 'read.php';</script>";
    }
    function gagal(){
        echo "<script>alert('Data berhasil diubah';
            window.location.href = 'read.php';</script>";
    }

    if(isset($_GET['nim'])){
        $nim = $_GET['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];

        include "koneksi.php";
        $update = mysqli_query($koneksi,"UPDATE mahasiswa set nama='$nama', prodi='$prodi' WHERE nim='$nim'");

        if($update) {
            // Jika berhasil, redirect ke halaman read.php
            header("Location: read.php");
            exit(); // Pastikan tidak ada output lain sebelum melakukan redirect
        } else {
            // Jika gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
            echo "Gagal menambahkan data mahasiswa.";
        }
    }
?>