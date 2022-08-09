<?php
require_once 'koneksi.php';

function query($data) {
    global $koneksi;
    $result = mysqli_query($koneksi, $data);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {

    global $koneksi;

    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $gambar = upload();

    $query = "INSERT INTO mahasiswa VALUES'','$npm','$nama','$jurusan','$email','$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $sizeFile = $_FILES['gambar']['size'];
    $tmpFile = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];

    if ($error === 4) {
        echo "<script>
          alert('Upload gambar terlebih dahulu!');
          document.location.href='index.php';
        </script>";
        exit;
    }

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
          alert('File yang anda upload bukan gambar ');
          document.location.href='index.php';
        </script>";
        exit;
    }

    if ($sizeFile > 2000000) {
        echo "<script>
          alert('Ukuran gambar terlalu besar');
          document.location.href='index.php';
        </script>";
        exit;
    }

    $namaFile = uniqid();
    $namaFile .= '.';
    $namaFile .= $ekstensiGambar;

    move_uploaded_file($tmpFile, 'img/' . $namaFile);

    return $namaFile;
}

function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");

    return mysqli_affected_rows($koneksi);
}

function ubah($data) {
    global $koneksi;

    $id = $data['id'];
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $gambar = htmlspecialchars($data['gambarLama']);

    if ($_FILES['gambar']['error'] === 0) {
        $gambar = upload();
    }

    mysqli_query($koneksi, "UPDATE mahasiswa SET npm='$npm', nama='$nama', jurusan='$jurusan', email='$email', gambar='$gambar' WHERE id='$id'");

    return mysqli_affected_rows($koneksi);
}

function register($data) {
    global $koneksi;

    $username = htmlspecialchars(strtolower(stripslashes($data['username'])));
    $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['password']));
    $password2 = htmlspecialchars(mysqli_real_escape_string($koneksi, $data['password2']));

    mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_affected_rows($koneksi) === 1) {
        echo "<script>
          alert('username sudah dipakai, silakan masukan username lain!');
          </script>";
        return 0;
    }

    if ($password !== $password2) {
        echo "<script>
          alert('konfirmasi password tidak match');
          </script>";
        return 0;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO users VALUES('','$username','$password')");

    return mysqli_affected_rows($koneksi);
}