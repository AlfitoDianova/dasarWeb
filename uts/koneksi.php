<?php
    $koneksi = mysqli_connect("localhost", "root", "", "uts");
    
    // Periksa koneksi
    if (!$koneksi) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }
    
?>
