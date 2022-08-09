<?php
session_start();
require_once 'function.php';

if (isset($_COOKIE['key']) && isset($_COOKIE['id'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];
  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
  $row = mysqli_fetch_assoc($result);
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION['login'])) {
  header('Location: index.php');
}

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;

      if (isset($_POST['remember'])) {
        $key = hash('sha256', $row['username']);
        setcookie('key', $key, time() + 60);
        setcookie('id', $row['id'], time() + 60);
      }

      echo "<script>
            alert('anda berhasil login');
            document.location.href='index.php';
            </script>";
    }
  }

  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h1>HALAMAN LOGIN</h1>
  <?php if (isset($error)) :  ?>
    <h4 style="color: red;">Username / Password Salah</h4>
  <?php endif; ?>
  <br>
  <form method="post" action="">
    <label for="username">Username</label>
    <input type="text" name="username" id="username"><br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password"><br>

    <label for="remember">Remember</label>
    <input type="checkbox" name="remember" id="remember">

    <button type="submit" name="login">Login</button>
  </form>

  <a href="register.php">REGISTER</a>
</body>

</html>