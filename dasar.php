<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function2.php';
$siswa = query("SELECT * FROM siswa");

$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar siswa</title>
</head>

<body>
    <h1>Daftar siswa</h1>
    <a href="tambah.php">Tambah data siswa</a>
    <br><br>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>No Induk</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($siswa as $row): ?>
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $row['nama']; ?>
                </td>
                <td>
                    <?= $row['no_induk']; ?>
                </td>
                <td>
                    <?= $row['email']; ?>
                </td>
                <td>
                    <?= $row['jurusan']; ?>
                </td>
                <td><a href="#">Ubah</a> | <a href="#">Hapus</a></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>