<?php
session_start();
include 'conn.php';

$username = $_SESSION['lat_jwd_username'];
echo "username: $username sedang login";

if (isset($_POST['btn_ubah_password'])) {
  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  // ambil variabel
  $password_lama = $_POST['password_lama'];
  $s = "SELECT 1 FROM tb_user WHERE username='$username' AND PASSWORD='$password_lama'";
  $q = mysqli_query($cn, $s) or die(mysqli_error($cn));
  if (mysqli_num_rows($q) == 1) {
    // jika password lama benar maka lanjut ubah password
    // echo '<br>lanjut ubah password';

    // cek apakah password baru == cpassword baru ??
    $password_baru = $_POST['password_baru'];
    $cpassword_baru = $_POST['cpassword_baru'];
    if ($password_baru == $cpassword_baru) {
      // echo '<br>lanjut ubah password tahap 2';

      $s = "UPDATE tb_user SET password='$password_baru' WHERE username='$username' ";
      $q = mysqli_query($cn, $s) or die(mysqli_error($cn));

      echo '
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="bootstrap.min.css" />
      <div class="block_foto">
      <img src="foto_profil.jpg" alt="LOGO" class="foto rounded-circle" />
      <p>JONATAN</p>
      </div>
      <br>ubah password berhasil!';
      exit;
    } else {
      // pesan kesalahan
      echo 'password baru salah!<hr>';
    }
  } else {
    // pesan kesalahan
    echo 'password lama salah!';
  }
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan 17</title>
  <link rel='stylesheet' href='style.css' />
  <link rel='stylesheet' href='bootstrap.min.css' />
</head>

<body>
  <h1>UBAH PASSWORD</h1>
  <div class="block_foto">
    <img src="foto_profil.jpg" alt="LOGO" class="foto rounded-circle" />
    <p>JONATAN</p>
  </div>
  <p>silahkan ubah password anda</p>
  <form action="" method="post">
    <div>
      password lama:
      <input type="password" name="password_lama" minlength="3" maxlength="20" required>
    </div>
    <div>
      password baru:
      <input type="password" name="password_baru" minlength="3" maxlength="20" required>
    </div>
    <div>
      konfirmasi password baru:
      <input type="password" name="cpassword_baru" minlength="3" maxlength="20" required>
    </div>
    <div>
      <button name=btn_ubah_password>ubah password</button>
    </div>
  </form>
</body>

</html>