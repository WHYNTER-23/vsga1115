<link rel='stylesheet' href='style.css' />
<link rel="stylesheet" href="bootstrap.min.css">
<?php
if (isset($_POST['btn_upload'])) {
  echo '<pre>';
  // var_dump($_POST);
  var_dump($_FILES);
  echo '</pre>';

  // file size validation
  $size = $_FILES['profil']['size'];
  if ($size > 1000000) {
    die('maaf ukuran lebih dari 1mb | <a href="javascript:history.go(-1)>Kembali</a>"');
  } else if ($size < 10000) {
    die('maaf file terlalu kecil carilah ukuran lebih dari 10kb');
  }

  // ekstension validation
  $ekstensi = $_FILES['profil']['type'];
  if ($ekstensi != 'image/jpeg') {
    die('maaf ekstensi harus JPG');
  }

  // image dimension vallidation
  $tmp_name = $_FILES['profil']['tmp_name'];
  $info = getimagesize($tmp_name);

  // echo "<pre>";
  // var_dump($info);
  // echo "</pre>";

  // echo "image width: $info[0]<br>";
  // echo "image width: $info[1]<br>";

  $panjang = $info[0];
  $lebar = $info[1];

  echo "panjang : $panjang | lebar : $lebar ";

  if ($panjang > 1000 || $lebar > 1000) {
    // die('maaf dimensi gambar melebihi 1000px');
  }
  // exit;

  // show image after upload
  $target = 'uploads/img/foto_profil.jpg';

  if (!file_exists('uploads')) mkdir('uploads');
  if (!file_exists('uploads/img')) mkdir('uploads/img');

  if (move_uploaded_file($tmp_name, $target)) {
    // show image
    $img_uploaded = "<img src='$target' class='img-thumbnail'>";
    echo "
    <div class='block_foto'>
    <img src='Universal Logo 3.jpg' alt='LOGO' class='foto rounded-circle' />
    <p>JONATAN</p>
    </div>
    <div class='alert alert-success'>upload sukses</div>$img_uploaded";
  } else {
    die('upload gagal');
  }
  // place uploaded file into directory
  exit;
}
?>

<style>
  .btn-block {
    width: 100%
  }
</style>

<div class="container">
  <h1>Advance Upload File</h1>
  Advance item :
  <ol>
    <li>File size validation</li>
    <li>extension validation</li>
    <li>images dimension (width or height) validation</li>
    <li>show images after upload</li>
    <li>place uploaded file into directory</li>
  </ol>
  <form method=post enctype=multipart/form-data>
    <div class="form-group">
      <label for="profil">profil kamu:</label>
      <input class="form-control mt-1" type="file" name="profil" id="profil" accept=".jpg,.jpeg">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block mt-2" name=btn_upload>upload</button>
    </div>
  </form>
</div>