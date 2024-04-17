<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h3 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
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
    </style>
</head>
<body>
    <h3>Tambah Data Mahasiswa</h3>
    <form method="post" action="insert_db.php">
    <table>
        <tr>
            <td><label for="textbox1">NIM</label></td>
            <td>:</td>
            <td><input type="text" id="textbox1" name="nim"></td>
        </tr>
        <tr>
            <td><label for="textbox2">Nama</label></td>
            <td>:</td>
            <td><input type="text" id="textbox2" name="nama"></td>
        </tr>
        <tr>
            <td><label for="textbox3">Program Studi</label></td>
            <td>:</td>
            <td><input type="text" id="textbox3" name="prodi"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </table>
</form>

</body>
</html>

