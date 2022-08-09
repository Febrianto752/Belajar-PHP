<?php
session_start();
session_unset();
$_SESSION = [];
session_destroy();

setcookie('key', '', time() - 999);
setcookie('id', '', time() - 999);

header('Location: login.php');
