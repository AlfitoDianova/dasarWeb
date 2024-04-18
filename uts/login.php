<?php
session_start(); // Mulai sesi

// Cek apakah pengguna sudah login, jika ya, redirect ke halaman lain
if (isset($_SESSION['username'])) {
    header("Location: read.php");
    exit();
}

// Cek apakah form login telah disubmit
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username dan password sesuai dengan yang diinginkan
    if ($username === 'admin' && $password === 'admin') {
        // Jika sesuai, atur session
        $_SESSION['username'] = $username;

        // Atur cookie untuk menyimpan informasi login
        setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari

        // Atur penanda bahwa login berhasil untuk menampilkan notifikasi
        $_SESSION['login_success'] = true;

        // Redirect ke halaman read.php
        header("Location: read.php");
        exit();
    } else {
        // Jika tidak sesuai, tampilkan pesan error
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* CSS Anda */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Login</h2>
    <!-- Formulir login -->
    <form method="post" action="" id="loginForm">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password">
        <!-- Tambahkan checkbox untuk menampilkan password -->
        <input type="checkbox" id="showPassword">
        <label for="showPassword">Show Password</label><br>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?><br>
        <button type="submit" name="submit">Login</button>
    </form>

    <!-- Skrip JavaScript untuk menampilkan password -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ambil elemen checkbox dan password
            var checkbox = $("#showPassword");
            var password = $("#password");

            // Ketika status checkbox berubah
            checkbox.change(function() {
                // Jika checkbox dicentang, tampilkan password
                if (this.checked) {
                    password.attr("type", "text");
                } else {
                    // Jika checkbox tidak dicentang, sembunyikan password
                    password.attr("type", "password");
                }
            });
        });
    </script>
</body>

</html>
