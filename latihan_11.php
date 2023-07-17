<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  echo "Selamat datang user, username anda: $username dengan password $password";

  $cn = mysqli_connect(
    'localhost', // nama host = localhost
    'root', // nama user-db = root
    '', // password db = (blank)
    'db_vsga' // nama-database = (lihat di phpmyadmmin)
  );

  $s = "SELECT 1 FROM tb_user WHERE username = '$username' AND password = '$password'";

  $q = mysqli_query($cn, $s) or die(mysqli_error($cn));

  if (mysqli_num_rows($q) == 1) {
    echo "<h1>Password benar anda sedang login</h1>";
  } else {
    echo "<h1>Password salah silahkan login kembali</h1>";
  }
}
?>

<head>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<h1>PHP Form Handler</h1>
<div class="block_foto">
  <img src="Universal Logo 3.jpg" alt="LOGO" class="foto rounded-circle" />
  <?php
  echo "JONATAN"
  ?>
</div>
<hr>
<form method="POST">
  Username:
  <input type="text" name="username">
  <br>
  Password:
  <input type="password" name="password">
  <button type="submit">Login</button>
</form>