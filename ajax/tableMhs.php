<?php
require_once '../function.php';
$keyword = $_GET['keyword'];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE npm LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR email LIKE '%$keyword%'");

?>

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
  <?php $no = 1; ?>
  <?php foreach ($mahasiswa as $mhs) : ?>
    <tr>
      <td><?= $no++; ?> </td>
      <td><a href="ubah.php?id=<?= $mhs['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('yakin?');">Hapus</a> </td>
      <td><?= $mhs['npm']++; ?> </td>
      <td><?= $mhs['nama']++; ?> </td>
      <td><?= $mhs['jurusan']++; ?> </td>
      <td><?= $mhs['email']++; ?> </td>
      <td><img src="img/<?= $mhs['gambar']++; ?>" alt="gambar"> </td>

    </tr>
  <?php endforeach; ?>
</table>