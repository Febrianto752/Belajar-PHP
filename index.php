<?php
session_start();
require_once 'function.php';

$query = "SELECT * FROM mahasiswa";
$mahasiswa = query($query);

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Halaman List Mahasiswa</title>
  </head>

  <body>
    <h1>Daftar Mahasiswa</h1>
    <a href="cetak.php" target="_blank">Cetak Pdf</a> <br>
    <a href="tambah.php">Tambah Daftar Mahasiswa</a>
    <br><br>
    <form action="" method="post">
      <input type="text" name="keyword" class="keyword" placeholder="Masukan keyword yang ingin dicari"
        autocomplete="off">
      <button type="submit" name="cari">Cari</button>
    </form>
    <br><br>
    <table border="1" cellspacing='0' cellpadding='5' class="tableMhs">
      <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Npm</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>Gambar</th>
      </tr>
      <?php $no = 1;?>
      <?php foreach ($mahasiswa as $mhs): ?>
      <tr>
        <td><?=$no++;?> </td>
        <td><a href="ubah.php?id=<?=$mhs['id'];?>">Ubah</a> | <a href="hapus.php?id=<?=$mhs['id'];?>"
            onclick="return confirm('yakin?');">Hapus</a> </td>
        <td><?=$mhs['npm']++;?> </td>
        <td><?=$mhs['nama']++;?> </td>
        <td><?=$mhs['jurusan']++;?> </td>
        <td><?=$mhs['email']++;?> </td>
        <td><img src="img/<?=$mhs['gambar']++;?>" alt="gambar"> </td>

      </tr>
      <?php endforeach;?>
    </table>

    <br><br>
    <a href="logout.php">Logout</a>


    <!-- <script src="js/script.js"></script> -->
    <script src="javascript/main.js"></script>
  </body>

</html>