<?php
require_once 'function.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "<script>
          alert('Data Berhasil dihapus');
          document.location.href='index.php';
        </script>";
  exit;
} else {
  echo "<script>
          alert('Data gagal dihapus');
          document.location.href='index.php';
        </script>";
  exit;
}
