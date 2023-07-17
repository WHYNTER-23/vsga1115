<?php
// Step 1: session_start harus diletakkan paling atas
session_start();

if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];

  echo "Aksi pada metode GET adalah $aksi";

  if ($aksi == 'logout') {
    unset($_SESSION['lat_jwd_username']);
    echo "Anda sudah logout dan silahkan refresh kembali!";
    echo "<script>location.replace('?')</script>";
    exit;
  }
}

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

if (isset($_POST['btn_login'])) {
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  echo "<p>Selamat datang user, username anda: $username dengan password $password</p>";

  $cn = mysqli_connect(
    'localhost', // nama host = localhost
    'root', // nama user-db = root
    '', // password db = (blank)
    'db_vsga' // nama-database = (lihat di phpmyadmmin)
  );

  $s = "SELECT 1 FROM tb_user WHERE username = '$username' AND password = '$password'";
  echo $s;
  $q = mysqli_query($cn, $s) or die(mysqli_error($cn));

  if (mysqli_num_rows($q) == 1) {
    // Step 2: Set SESSION
    $_SESSION['lat_jwd_username'] = $username;

    echo "<h1>Password benar anda sedang login</h1>";
  } else {
    echo "<h1>Password salah silahkan login kembali</h1>";
  }
}

if (isset($_SESSION['lat_jwd_username'])) {
  // Sedang login
  // Tampilkan welcome
  echo "
  <head>
      <link rel='stylesheet' href='style.css' />
      <link rel='stylesheet' href='bootstrap.min.css' />
    </head>
  <h1>Selamat datang user, anda sedang login</h1>
  <div class='block_foto'>
      <img src='Universal Logo 3.jpg' alt='LOGO' class='foto rounded-circle' />
      <p>JONATAN</p>
    </div>
  ";
  echo "<a href='?aksi=logout'>Logout</a>";
  echo "| <a href='latihan_17.php'>Ubah Password</a>";
  exit;
} else {
  // Tampilkan form login
  echo "
    <head>
      <link rel='stylesheet' href='style.css' />
      <link rel='stylesheet' href='bootstrap.min.css' />
    </head>
    <h1>LOGIN FORM</h1>
    <div class='block_foto'>
      <img src='Universal Logo 3.jpg' alt='LOGO' class='foto rounded-circle' />
      <?php
        echo 'JONATAN'
      ?>
    </div>
    <hr>
    <h4>Form dengan</h4>
    <form method='POST'>
      Username:
      <input type='text' name='username' required minlength='3' maxlength='20'>
      <br>
      Password:
      <input type='password' name='password' required minlength='3' maxlength='20'>
      <button type='submit' name='btn_login'>Login</button>
    </form>
    ";
}
