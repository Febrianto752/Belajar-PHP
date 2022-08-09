<?php

require_once 'function.php';

if (isset($_POST['buatAkun'])) {
  if (register($_POST) > 0) {
    echo "<script>
    alert('Berhasil Membuat Akun Baru');
    document.location.href='login.php';
  </script>";
  } else {
    echo "<script>
    alert('Gagal Membuat Akun Baru');
    document.location.href='login.php';
  </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>
  <h1>HALAMAN REGISTER</h1>

  <form method="post" action="">
    <label for="username">Username</label>
    <input type="text" name="username" id="username"><br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password"><br>

    <label for="password2">Password2</label>
    <input type="password" name="password2" id="password2"><br>

    <button type="submit" name="buatAkun">Buat Akun</button>
  </form>
  <br>
  <a href="login.php">&laquo; Kembali</a>
</body>

</html>