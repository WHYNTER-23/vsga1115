<?php
// variabel awal
$nama = '';
$username = '';
include 'conn.php';

// handler submit
if (isset($_POST['btn_submit'])) {
  // echo 'anda mengklik submit';
  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  // tampung variabel POST
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  // validasi password sama cpassword
  if ($password == $cpassword) {
    // echo 'password sama';
    // lanjut ke insert data
    $s = "INSERT INTO tb_user (username, password, nama) VALUES ('$username', '$password', '$nama') ";
    // echo "$s";
    $q = mysqli_query($cn, $s) or die(mysqli_error($cn));

    echo '
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <div class="block_foto">
    <img src="foto_profil.jpg" alt="LOGO" class="foto rounded-circle" />
    <p>JONATAN</p>
    </div>
    register berhasil silahkan <a href="latihan_12.php">login</a>
    ';
    exit;
  } else {
    echo 'konfirmasi password salah';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan 16</title>
  <link rel='stylesheet' href='style.css' />
  <link rel='stylesheet' href='bootstrap.min.css' />
</head>

<body>
  <h1>Form Register</h1>
  <div class='block_foto'>
    <img src='foto_profil.jpg' alt='LOGO' class='foto rounded-circle' />
    <p>JONATAN</p>
  </div>
  <form method="post">
    Nama:
    <div>
      <input type="text" name="nama" minlength="3" maxlength="50" required value='<?= $nama ?>'>
    </div>
    Username:
    <div>
      <input type="text" name="username" minlength="3" maxlength="20" required value='<?= $username ?>'>
    </div>
    Password:
    <div>
      <input type="password" name="password" minlength="3" maxlength="20" required>
    </div>
    Konfirmasi Password:
    <div>
      <input type="password" name="cpassword" minlength="3" maxlength="20" required>
    </div>
    <button type="submit" name="btn_submit">Submit</button>
  </form>
</body>

</html>