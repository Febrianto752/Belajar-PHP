<?php
require_once 'function.php';

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id='$id'")[0];


if (isset($_POST['ubah'])) {

  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil diubah');
            document.location.href='index.php';
          </script>";
    exit;
  } else {
    echo "<script>
            alert('Data gagal diubah');
            document.location.href='index.php';
          </script>";
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h1>UBAH DATA MAHASISWA</h1>

  <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
    <label for="npm">Npm : </label>
    <input type="number" name="npm" id="npm" value="<?= $mhs['npm']; ?>"><br>

    <label for="nama">Nama : </label>
    <input type="text" name="nama" id="nama" value="<?= $mhs['nama']; ?>"><br>

    <label for="jurusan">Jurusan : </label>
    <input type="text" name="jurusan" id="jurusan" value="<?= $mhs['jurusan']; ?>"><br>

    <label for="email">Email : </label>
    <input type="email" name="email" id="email" value="<?= $mhs['email']; ?>"><br>

    <label for="gambar">Gambar</label>
    <img src="img/<?= $mhs['gambar']; ?>" alt="gambar" style="width:80px; height:80px;">
    <br>
    <input type="file" name="gambar" id="gambar"><br><br>

    <button type="submit" name="ubah">Ubah Data Mahasiswa</button>
  </form>
</body>

</html>