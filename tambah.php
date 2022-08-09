<?php
require_once 'function.php';



if (isset($_POST['tambah'])) {

  if (tambah($_POST) > 0) {
    echo "<script>
          alert('Data Berhasil ditambahkan');
          document.location.href='index.php';
        </script>";
  } else {
    echo "<script>
          alert('Data Gagal ditambahkan');
          document.location.href='index.php';
        </script>";
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h1>TAMBAH DAFTAR MAHASISWA</h1>

  <form method="post" action="" enctype="multipart/form-data">
    <label for="npm">Npm : </label>
    <input type="number" name="npm" id="npm" placeholder="Masukan npm"><br>

    <label for="nama">Nama : </label>
    <input type="text" name="nama" id="nama" placeholder="Masukan nama"><br>

    <label for="jurusan">Jurusan : </label>
    <input type="text" name="jurusan" id="jurusan" placeholder="Masukan jurusan"><br>

    <label for="email">Email : </label>
    <input type="email" name="email" id="email" placeholder="Masukan jurusan"><br>

    <label for="gambar">Gambar</label>
    <input type="file" name="gambar" id="gambar"><br>

    <button type="submit" name="tambah">Tambah</button>
  </form>
</body>

</html>